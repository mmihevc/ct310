<?php
namespace Model;
use \DB;

class hospitalModel extends \Model{
  public static function get_hospitals($from, $amount){
    return DB::query(
      "SELECT Provider_Name, Provider_State, Provider_Id FROM `medicare` LIMIT $amount OFFSET $from", DB::SELECT
    )->execute()->as_array();
  }
} 
 ?>
