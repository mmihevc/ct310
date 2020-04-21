<?php

class Controller_Hospital extends Controller {

    //TODO: directs you to the homepage (serve up the homepage view)
    public function action_home() {
      $view = View::forge('hospitalviews/home');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'Home Page';
      $view->hospital_css = 'hospital.css';
      return $view;
    }

    //TODO: directs you to the about page (serve up the about page view)
    public function action_about() {
      $view = View::forge('hospitalviews/about');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'About Us';
      $view->hospital_css = 'hospital.css';
      return $view;
    }

    //TODO: directs you to a page listing the hospitals, it would be smart to limit the data flow using pagination or something like that...
    //https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
    //You could do something like this with a file, but you could also just load all the data into a database for easier access
    public function action_hospital_list() {
        //$hospital_data = hospitalModel::get_hospitals(0,10);
      $view = View::forge('hospitalviews/hospital_list');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'Hospital List';
      $view->hospital_css = 'hospital.css';
      return $view;
    }

    //TODO: directs you to a page listing the msdrgs, maybe do some pagination similar to the hospital list
    //Something similar to the hospital list view
    public function action_msdrg_list() {
        $drg_data = HospitalModel::get_drgs(0,10);
      Debug::dump($drg_data);
      $view = View::forge('hospitalviews/msdrg_list');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'MSDRG List';
      $view->drg_data = $drg_data;
      return Response::forge($view);
    }

    //TODO: serves up the view with the details for a specific hospital
    public function action_hospital_details($hospital_id) {

    }

    //TODO: serves up a view with the details for a specific msdrg
    public function action_msrg_details($msdrg_id) {

    }
}

