<?php
 namespace Model;
 use \DB;

 class HospitalModel extends \Model{
   public static function get_hospitals(){
     return DB::query(
       "SELECT Provider_Name, Provider_State, Provider_Id FROM `medicare`", DB::SELECT
     )->execute()->as_array();
   }

      public static function get_drgs($from, $amount) {
       $data = DB::query(
         "SELECT DISTINCT(DRG_Definition) FROM `medicare` LIMIT $amount OFFSET $from", DB::SELECT
         )->execute()->as_array();
         $to_return = array();
         foreach($data as $row) {
           $split = explode('-', $row['DRG_Definition']);
           $new_row = array();
           $new_row['DRG_Number'] = trim($split[0]);
           $new_row['DRG_Definition'] = trim($split[1]);
           $to_return = $new_row;
         }
         return $to_return;
       }
     // return DB::query(
     //   "SELECT DISTINCT(DRG_Definition) FROM `medicare` LIMIT $amount OFFSET $from", DB::SELECT
     // )->execute()->as_array();
   // }

   public static function get_everything($from, $amount, $hospital_id){
     return DB::query(
       "SELECT DISTINCT DRG_Definition, Provider_Id, Provider_Name, Provider_Street_Address, Provider_City, Provider_State, Provider_Zip_Code, Hospital_Referral_Region_HRR_Description,Total_Discharges, Average_Covered_Charges, Average_Total_Payments, Average_Medicare_Payments FROM `medicare` WHERE Provider_Id =$hospital_id", DB::SELECT
       // "SELECT DRG_Definition, Provider_Id, Provider_Name, Provider_Street_Address, Provider_City, Provider_State, Provider_Zip_Code, Hospital_Referral_Region_HRR_Description,Total_Discharges, Average_Covered_Charges, Average_Total_Payments, Average_Medicare_Payments FROM `medicare` WHERE ($hospital_id == Provider_Id) LIMIT $amount OFFSET $from", DB::SELECT
     )->execute()->as_array();

   }

   public static function get_msdrg_details($msdrg_id) {

     return DB::query(
       "SELECT DISTINCT Provider_Id, Provider_Name, Provider_State, Average_Covered_Charges, Average_Total_Payments, Average_Medicare_Payments FROM `medicare` WHERE DRG_Definition LIKE '%$msdrg_id%'", DB::SELECT
     )->execute()->as_array();
   }
 }
  ?>
