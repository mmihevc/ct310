<?php

//use HospitalModel\Model;
use \Model\HospitalModel;
use \DEBUG;

class Controller_Hospital extends Controller {

    //TODO: directs you to the homepage (serve up the homepage view)
    public function action_home() {
      //$this->template->title = 'Home Page';
      //$this->template->hospital_css = 'hospital.css';
      //$this->template->contents = View::forge('hospitalviews/template');
      $view = View::forge('hospitalviews/home');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'Home Page';
      $view->hospital_css = 'hospital.css';
      return Response::forge($view);
      //return Response::forge(View::forge('hospitalviews/home'));
      //$this->$template->$contents = View::forge('hospitalviews/home');
    }

    //TODO: directs you to the about page (serve up the about page view)
    public function action_about() {
      $view = View::forge('hospitalviews/about');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'About Us';
      $view->hospital_css = 'hospital.css';
      return Response::forge($view);
    }

    //TODO: directs you to a page listing the hospitals, it would be smart to limit the data flow using pagination or something like that...
    //https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
    //You could do something like this with a file, but you could also just load all the data into a database for easier access
    public function action_hospital_list() {
      $start = 0;
      if(isset($_GET["start"])) {
        $start = $_GET["start"];
      }
      $hospital_data = HospitalModel::get_hospitals($start, 20);
      $view = View::forge('hospitalviews/hospital_list');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'Hospital List';
      $view->hospital_css = 'hospital.css';
      $view->hospital_data = $hospital_data;
      $view->start = $start;
      return Response::forge($view);
    }

    //TODO: directs you to a page listing the msdrgs, maybe do some pagination similar to the hospital list
    //Something similar to the hospital list view
    public function action_msdrg_list() {
      $start = 0;
      if(isset($_GET["start"])) {
        $start = $_GET["start"];
      }
      $drg_data = HospitalModel::get_drgs($start, 20);
      $view = View::forge('hospitalviews/msdrg_list');
      $view->contents = View::forge('hospitalviews/template');
      $view->title = 'MSDRG List';
      $view->drg_data = $drg_data;
      $view->start = $start;
      return Response::forge($view);
    }

    //TODO: serves up the view with the details for a specific hospital
    public function action_hospital_details() {
      $start = 0;
      if(isset($_GET["start"])) {
        $start = $_GET["start"];
      }
        if(isset($_GET["hospital_id"])){
            $hospital_id = $_GET["hospital_id"];
            $everything_data = HospitalModel::get_everything(0, 20, $hospital_id);
            $view = View::forge('hospitalviews/hospital_details');
            $view->contents = View::forge('hospitalviews/template');
            $view->title = 'Hospital Details';
            $view->hospital_css = 'hospital.css';
            $view->everything_data = $everything_data;
            $view->start = $start;
            return $view;
          }
          else{
            $view = View::forge('hospitalviews/hospital_details');
            $view->contents = View::forge('hospitalviews/template');
            $view->title = 'Hospital Details';
            $view->hospital_css = 'hospital.css';
            $view->start = $start;
            return $view;
         }
    }

    //TODO: serves up a view with the details for a specific msdrg
    public function action_msdrg_details() {
      $start = 0;
      if(isset($_GET["start"])) {
        $start = $_GET["start"];
      }
      if (isset($_GET['msdrg_id'])) {
        $msdrg_id = $_GET['msdrg_id'];
        $details = HospitalModel::get_msdrg_details(0, 20, $msdrg_id);
        $view = View::forge('hospitalviews/msdrg_details');
        $view->contents = View::forge('hospitalviews/template');
        $view->title = 'MSDRG Details';
        $view->drg_data = $details;
        $view->start = $start;
        return $view;
      } else {
        $view = View::forge('hospitalviews/msdrg_details');
        $view->contents = View::forge('hospitalviews/template');
        $view->title = 'MSDRG Details';
        $view->start = $start;
        return $view;
      }

    }
    public function post_new_comment(){
        session_start();
        if (strlen(Input::post('response')) > 0 && isset($_SESSION['username'])) {
            $user = $_SESSION['username'];
            CT310HospitalModel::add_hospital_comment(
            Input::post('comment'), Input::post('id'));
            
        }
        return Response::redirect('index/php/ct310hospital/hospital_details/'). Input::post('id'));
        
        
    }
    public function post_comment_response(){
        session_start();
        Debug::dump ($_POST);
        if (strlen(Input::post('response')) > 0 && isset($_SESSION['username'])) {
            $user = $_SESSION['username'];
            CT310HospitalModel::add_hospital_comment(
            Input::post('response'),
            Input::post('provider_id'),
            $user,
            Input::post('id'));
                
        }
        return Response::redirect('index.php/310hospital/hospital_details/' . Input::post('provider-id'));
    }
    
}
