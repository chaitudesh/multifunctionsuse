<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weather extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Weather_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['weather'] = null;
        $data['error'] = null;
        $this->load->view('weather_view', $data);
    }

    public function fetch()
    {
        $city = $this->input->post('city');
        $weather_data = $this->Weather_mode->get_weather($city);

        if ($weather_data) {
            $data['weather'] = $weather_data;
            $data['error'] = null;
        } else {
            $data['weather'] = null;
            $data['error'] = 'City not found or API error.';
        }

        $this->load->view('weather_view', $data);
    }
}
?>