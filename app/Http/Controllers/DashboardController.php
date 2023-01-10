<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DateTime;
class DashboardController extends Controller
{
     public function index()
    {  
         return view('index');
    }

    public function get_asteroid_data(Request $request) { 
     $requestData = $request->all();
     if(array_key_exists('daterange',$requestData) &&  $requestData['daterange']){
     $daterange = $requestData['daterange'];
     $dates = explode('-',$daterange);
     $startDate = date('Y-m-d',strtotime($dates[0]));
     $endDate = date('Y-m-d',strtotime($dates[1]));
     }else{
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+7 days', strtotime($startDate)));
     }
     $earlier = new \DateTime($startDate);
     $later = new \DateTime($endDate);
     $abs_diff = $later->diff($earlier)->format("%a");
     if($abs_diff > 7){
         echo json_encode(array('message'=>'Date range exceed!'));die;
     }
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,"https://api.nasa.gov/neo/rest/v1/feed?start_date=".urlencode($startDate)."&end_date=".urlencode($endDate)."&api_key=DEMO_KEY");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $get_data = curl_exec($curl);
     $data = array();
     $list = array();   
     $response = json_decode($get_data, true);
     if(array_key_exists('error',$response) && !empty($response['error'])){
         echo json_encode(array('message'=>'Date not found!'));die;
     }  
     if($response){
     //echo "<pre>";print_r($response);die;
     $result = $response['near_earth_objects'];
     foreach($result as $key => $value){
      $data[$key] = ($value)?count($value):0;
      foreach($value as $v){
        $temp['id'] = $v['id'];
        $temp['size'] = $v['estimated_diameter']['kilometers']['estimated_diameter_max'];
        $temp['speed'] = $v['close_approach_data'][0]['relative_velocity']['kilometers_per_hour'];
        $temp['distance'] = $v['close_approach_data'][0]['miss_distance']['kilometers'];
        $list[] = $temp;
      }
     }
     $speed = array_column($list, 'speed');
     array_multisort($speed, SORT_DESC, $list);
     $fastest_asteroid = "Asteroid id - ".$list[0]['id'].', ' .$list[0]['speed'].' Km/h';

     $distance = array_column($list, 'distance');
     array_multisort($distance, SORT_ASC, $list);
     $closest_asteroid = "Asteroid id - ".$list[0]['id'].', ' .$list[0]['distance'].' Km';

     $size = array_column($list, 'size');
     $avg_size_asteroid =  array_sum($size)/count($size).' Km';
   
     ksort($data);

        $json_data = array(
            "fastestAsteroid" => $fastest_asteroid, 
            "closestAsteroid" => $closest_asteroid, 
            "asteroidAveragesize" => $avg_size_asteroid, 
            "data" => $data,
        );

        echo json_encode($json_data);die;
     }else{
         echo json_encode(array('message'=>'Date not found!'));die;
     }  
   }
}
