<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Review;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Contracts\Cache\Repository;

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

    public function search() 
    {
        return view('restaurants.search');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
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


    public function showData(Request $request) {

        $data['time'] = [];
       
        // Google Maps API
        // IN PRODUCTION WE WILL NEED TO USE THE BACK-END API IN ORDER TO NOT MAX OUT THE API EVERY 2 HOURS
        // Backend API
        $url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $request['place_id'] . "&key=AIzaSyBr7QFq8EX1937OqC6Ge9n7fuE0vJ8dTIo";

        // Production API
        // $url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $request['place_id'] . "&key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs";
        
        // DEV API
        // $url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $request['place_id'] . "&key=AIzaSyCiz0mHf0rFhZRI-dIr7Phh-cUVuHq9dOs";
        


        $json = file_get_contents($url);

        $placedata = json_decode($json, TRUE);


        if($placedata['status']=="OK"){
           $data['place'] = $placedata['result'];

            $data['photos'] = [];
            
            foreach ($placedata['result']['photos'] as $key => $photo) {

                // Google Maps API
                // IN PRODUCTION WE WILL NEED TO USE THE BACK-END API IN ORDER TO NOT MAX OUT THE API EVERY 2 HOURS
                // Backend API
                $photoUrl = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $request['place_id'] . "&key=AIzaSyBr7QFq8EX1937OqC6Ge9n7fuE0vJ8dTIo";

                // Production API
                // $photoUrl = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $request['place_id'] . "&key=AIzaSyC7khJALOM8uuLkCAdi4lsDQFbojqEulHs";
                
                // DEV API
                // $photoUrl = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $request['place_id'] . "&key=AIzaSyCiz0mHf0rFhZRI-dIr7Phh-cUVuHq9dOs";



                $photodata = file_get_contents($photoUrl);                        
                
                $photoBase64 = chunk_split(base64_encode($photodata));
              
                $data['photos'][] = $photoBase64;
                sleep(0.1);
            }
        foreach($data['place']['reviews'] as $key => $review) {

            $level = $review['rating'];

            switch ($level) {
                case ($level < .25) :
                    $data['starRating'][] = '/assets/img/star-rating0.png';
                    break;
                case ($level >= .25 && $level < .75) :
                    $data['starRating'][] = '/assets/img/star-rating-half.png';
                    break;
                case ($level >= .75 && $level < 1.25) :
                    $data['starRating'][] = '/assets/img/star-rating1.png';
                    break;
                case ($level >= 1.25 && $level < 1.75) :
                    $data['starRating'][] = '/assets/img/star-rating1half.png';
                    break;
                case ($level >= 1.75 && $level < 2.25) :
                    $data['starRating'][] = '/assets/img/star-rating2.png';
                    break;
                case ($level >= 2.25 && $level < 2.75) :
                    $data['starRating'][] = '/assets/img/star-rating2half.png';
                    break;
                case ($level >= 2.75 && $level < 3.25) :
                    $data['starRating'][] = '/assets/img/star-rating3.png';
                    break;
                case ($level >= 3.25 && $level < 3.75) :
                    $data['starRating'][] = '/assets/img/star-rating3half.png';
                    break;
                case ($level >= 3.75 && $level < 4.25) :
                    $data['starRating'][] = '/assets/img/star-rating4.png';
                    break;
                case ($level >= 4.25 && $level < 4.75) :
                    $data['starRating'][] = '/assets/img/star-rating4half.png';
                    break;
                case ($level >= 4.75) :
                    $data['starRating'][] = '/assets/img/star-rating5.png';
                    break;
            }
            $data['time'][$key] = Carbon::createFromTimestamp($review['time'])->diffForHumans();
        }
       $stars = $data['place']['rating'];
        switch ($stars) {
            case ($stars < .25) :
                $data['restRating'] = '/assets/img/star-rating0.png';
                break;
            case ($stars >= .25 && $stars < .75) :
                $data['restRating'] = '/assets/img/star-rating-half.png';
                break;
            case ($stars >= .75 && $stars < 1.25) :
                $data['restRating'] = '/assets/img/star-rating1.png';
                break;
            case ($stars >= 1.25 && $stars < 1.75) :
                $data['restRating'] = '/assets/img/star-rating1half.png';
                break;
            case ($stars >= 1.75 && $stars < 2.25) :
                $data['restRating'] = '/assets/img/star-rating2.png';
                break;
            case ($stars >= 2.25 && $stars < 2.75) :
                $data['restRating'] = '/assets/img/star-rating2half.png';
                break;
            case ($stars >= 2.75 && $stars < 3.25) :
                $data['restRating'] = '/assets/img/star-rating3.png';
                break;
            case ($stars >= 3.25 && $stars < 3.75) :
                $data['restRating'] = '/assets/img/star-rating3half.png';
                break;
            case ($stars >= 3.75 && $stars < 4.25) :
                $data['restRating'] = '/assets/img/star-rating4.png';
                break;
            case ($stars >= 4.25 && $stars < 4.75) :
                $data['restRating'] = '/assets/img/star-rating4half.png';
                break;
            case ($stars >= 4.75) :
                $data['restRating'] = '/assets/img/star-rating5.png';
                break;
        }

        }
        $data['user'] = Auth::user();
        $data['friends'] = $data['user']->friends()
            ->where("user_id", '=', $data['user']->id)
            ->orWhere("friend_id", '=', $data['user']->id)
            ->orderBy('last_name', 'asc')
            ->get();
        
        return view('restaurants.show')->with($data);
    }

    public function random() {
        $data = [];
        $data['user'] = Auth::user();

        $data['friends'] = $data['user']->friends()
                ->where("user_id", '=', $data['user']->id)
                ->orWhere("friend_id", '=', $data['user']->id)
                ->orderBy('last_name', 'asc')
                ->get();

        return view('restaurants.randomShow')->with($data);

    }
}


