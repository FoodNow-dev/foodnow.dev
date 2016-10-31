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
        $object = urldecode($request['jsonObject']);
        $data['jsonJS'] = $object;
        $data['json'] = json_decode($object);

        $url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=" . $data['json']->place_id . "&key=AIzaSyBZU6dw9xUbnO_HXZ07ASIHhMkMHUeqpI4";

        $json = file_get_contents($url);

        $placedata = json_decode($json, TRUE);

        if($placedata['status']=="OK"){
           $data['place'] = $placedata['result'];

            $data['photos'] = [];
            
            foreach ($placedata['result']['photos'] as $key => $photo) {
                
                $photoUrl = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=" . $photo['photo_reference'] . "&key=AIzaSyBZU6dw9xUbnO_HXZ07ASIHhMkMHUeqpI4";

                $photodata = file_get_contents($photoUrl);
                
                $photoBase64 = chunk_split(base64_encode($photodata));
              
                $data['photos'][] = $photoBase64;

            }
        }

        return view('restaurants.show')->with($data);
    }





}
