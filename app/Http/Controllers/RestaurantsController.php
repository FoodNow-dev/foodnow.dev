<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Review;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Log;

class RestaurantsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['request'] = $request;
        $data['restaurants'] = (isset($request->search)) ? Restaurant::search($request->search)->paginate(6) :  Restaurant::with('user')->orderBy('created_at', 'desc')->paginate(6);
        return view('restaurants.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->session()->flash('ERROR_MESSAGE', 'Invalid Inputs');
        $this->validate($request, Restaurant::$rules);
        $request->session()->forget('ERROR_MESSAGE');

        $restaurant = new Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->url = $request->input('url');
        $restaurant->address = $request->input('address');
        $restaurant->city = $request->input('city');
        $restaurant->state = $request->input('state');
        $restaurant->zipcode = $request->input('zipcode');
        $restaurant->save();
        
        if (!empty($request->file('image'))) {
            if ($request->file('image')->isValid()) {

                $restaurant->image = '/img/restaurant-images/' . $restaurant->id . $request->file('image')->getClientOriginalName();

                $request->file('image')->move(
                    base_path() . '/public/img/restaurant-images/', $restaurant->image
                );  
            };
        };

        $restaurant->save();

        Log::info('Created Restaurant: ' . $restaurant);

        $request->session()->flash('SUCCESS_MESSAGE', 'Restaurant was saved successfully');

        return redirect()->action('RestaurantsController@show', $restaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['restaurant'] = Restaurant::findOrFail($id);
        return view('restaurants.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data['restaurant'] = Restaurant::findOrFail($id);

        if(!$data['restaurant']->ownedBy($request->user())) {
            $request->session()->flash('ERROR_MESSAGE', 'You do not have permission');
            return redirect()->action('RestaurantsController@index');
        } 
        return view('restaurants.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->session()->flash('ERROR_MESSAGE', 'Invalid Inputs');
        $this->validate($request, Restaurant::$rules);
        $request->session()->forget('ERROR_MESSAGE');

        $restaurant = Restaurant::findOrFail($id);

        if(!$restaurant->ownedBy($request->user())) {
            $request->session()->flash('ERROR_MESSAGE', 'You do not have permission');
            return redirect()->action('RestaurantsController@index');
        } 

        $restaurant->title = $request->get('title');
        $restaurant->url = $request->get('url');
        $restaurant->content = $request->get('content');
        $restaurant->save();

        Log::info('Updated restaurant: ' . $restaurant);

        $request->session()->flash('SUCCESS_MESSAGE', 'restaurant was saved successfully');

        return redirect()->action('RestaurantsController@show', $restaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $review = Review::where('rest_id', '=', $id);

        $review->delete();
        $restaurant->delete();
        return back();
    }

    public function setReview(Request $request) {

        $review = Review::with('restaurant')->firstOrCreate([
            'rest_id' => $request->input('rest_id'),
            'created_by' => $request->user()->id
        ]);

        $review->score = $request->input('score');
        $review->content = $request->input('content');
        $review->price = $request->input('price');

        $review->save();

        $restaurant = $review->restaurant;

        $restaurant->score = $restaurant->score();
        $restaurant->price = $restaurant->price();

        $data = [
            'score' => $restaurant->score,
            'price' => $restaurant->price,
            'content' => $review->content
        ];

        return back()->with($data);
    }

    public function setFavorite(Request $request) {

        $favorite = Favorite::with('restaurant')->firstOrCreate([
            'rest_id' => $request->input('rest_id'),
            'user_id' => $request->user()->id
        ]);

        $favorite->save();

        return back();
    }
}
