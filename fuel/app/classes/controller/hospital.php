<?php
use \Model\HospitalModel;

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
      $hospital_data = HospitalModel::get_hospitals(0,10);
      $view = View::forge('hospitalviews/hospital_list');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'Hospital List';
      $view->hospital_css = 'hospital.css';
      $view->hospital_data = $hospital_data;
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
    public function action_hospital_details() { //$hospital_id

        if(isset($_GET["hospital_id"])){
          $hospital_id = $_GET["hospital_id"];
          $everything_data = HospitalModel::get_everything(0,10, $hospital_id);
          $view = View::forge('hospitalviews/hospital_details');
          $view->contents = View::forge('hospitalviews/template');
          $view->title = 'Hospital Details';
          $view->hospital_css = 'hospital.css';
          $view->everything_data = $everything_data;
          return $view;
        }
        else{
        $view = View::forge('hospitalviews/hospital_details');
        $view->contents = View::forge('hospitalviews/template');
        $view->title = 'Hospital Details';
        $view->hospital_css = 'hospital.css';
        //$view->details_data = $details_data;
        return $view;
      }
    }

    //TODO: serves up a view with the details for a specific msdrg
    public function action_msrg_details($msdrg_id) {

    }
}


