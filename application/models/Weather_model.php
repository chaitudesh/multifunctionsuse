<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather_model extends CI_Model {

    public function get_weather($city) {
        $api_key = $this->config->item('weather_api_key');
        $url = "http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$api_key}&units=metric";

        // echo $url;die;
        

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        // echo $response;
        
        // $response = file_get_contents($url);
        $data = json_decode($response, true);
        // print_r($data);die;  
        if ($data['cod'] == 200) {
            return $data;
        } else {
            return false;
        }
    }
}
