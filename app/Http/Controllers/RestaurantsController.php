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
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['radius'] = $request->input('radius');
        $data['minprice'] = $request->input('minprice');
        $data['food'] = $request->input('food');
        $data['maxprice'] = $request->input('maxprice');

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
        $restaurant->place_id = $request->input('place_id');
        
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
    public function show(Request $request)
    {
        // $data['placeId'] = $placeId; 
        return view('restaurants.randomShow');
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

    public function showData(Request $request) {
        $object = urldecode($request['jsonObject']);
        $data['jsonJS'] = $object;
        $data['json'] = json_decode($object);

        $url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $data['json']->place_id . "&key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs";

        $json = file_get_contents($url);

        $placedata = json_decode($json, TRUE);

        if($placedata['status']=="OK"){
           $data['place'] = $placedata['result'];
        }

        return view('restaurants.show')->with($data);
    }





}
