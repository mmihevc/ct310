<?php
namespace Model;
use \DB;

class HospitalModel extends \Model{
  public static function get_hospitals($from, $amount){
    return DB::query(
      "SELECT Provider_Name, Provider_State, Provider_Id FROM `medicare` LIMIT $amount OFFSET $from", DB::SELECT
    )->execute()->as_array();
  }

  public static function get_drgs($from, $amount) {
    /*$data = DB::query(
      "SELECT DISTINCT(DRG_Definition) FROM `medicare` LIMIT $amount OFFSET $from", DB::SELECT
    )->execute()->as_array();
    $to_return = array();
    foreach($data as $row) {
      $split = explode(' - ',$row['DRG_Definition']);
      $new_row = array();
      $new_row['DRG_Number'] = trim($split[0]);
      $new_row['DRG_Definition'] = trim($split[1]);
      $to_return = $new_row;
    }
    return $to_return;*/
    return DB::query(
      "SELECT DISTINCT(DRG_Definition) FROM `medicare` LIMIT $amount OFFSET $from", DB::SELECT
    )->execute()->as_array();
  }
}
 ?>
