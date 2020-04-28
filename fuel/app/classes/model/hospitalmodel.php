<?php
 namespace Model;
 use \DB;

 class HospitalModel extends \Model{
   public static function get_hospitals($from, $amount){
     return DB::query(
       "SELECT Provider_Name, Provider_State, Provider_Id FROM `medicare` LIMIT $amount OFFSET $from", DB::SELECT
     )->execute()->as_array();
   }

   public static function get_drgs() {
     return DB::query(
       "SELECT DISTINCT(DRG_Definition) FROM `medicare`", DB::SELECT
       )->execute()->as_array();
    }

   public static function get_everything($hospital_id){
     return DB::query(
       "SELECT DISTINCT DRG_Definition, Provider_Id, Provider_Name, Provider_Street_Address, Provider_City, Provider_State, Provider_Zip_Code, Hospital_Referral_Region_HRR_Description,Total_Discharges, Average_Covered_Charges, Average_Total_Payments, Average_Medicare_Payments FROM `medicare` WHERE Provider_Id=$hospital_id", DB::SELECT
     )->execute()->as_array();
   }

   public static function get_msdrg_details($msdrg_id) {
     return DB::query(
       "SELECT DISTINCT Provider_Id, Provider_Name, Provider_State, Average_Covered_Charges, Average_Total_Payments, Average_Medicare_Payments FROM `medicare` WHERE DRG_Definition LIKE '%$msdrg_id%'", DB::SELECT
     )->execute()->as_array();
   }
 }
  ?>
