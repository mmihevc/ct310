<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style>
</style>
<title><?php echo $title ?></title>
</head>

  <body>
    <?php echo $contents ?>
    <div class="row">
      <div class ="col">
        <table id="detailsTable" class="detailstbl">
          <thead class ="thread-dark">
            <tr>
              <th>DRG Number</th>
              <th>DRG Description</th>
              <th>Average Cover Charges</th>
              <th>Average Total Payments</th>
              <th>Average Medicare Payments</th>

              <!-- <th>DRG Definition</th>
              <th>Street Address</th>
              <th>City<th>
              <th>Zip</th>
              <th>Referral Decription</th>
              <th>Total Discharges</th>
              <th>Average Covered Charges</th>
              <th>Total Payments on Average</th>
              <th>Average Medicare Payments</th> -->
            </tr>
            </thead>
            <tbody>

              <?php
              // if(isset($everything_data) ){
              foreach($everything_data as $row){
                echo "<tr>\n";
                // $l = Uri::base(). "ct310/index/hospital/hospital_details/" .$row["Provider_Name"];
                $data = explode('-', $row["DRG_Definition"]);
                $number = trim($data[0]); //number
                $description = trim($data[1]); //description
                $drg = Uri::base(). "index.php/hospital/drg_details.php?drg=" .$number;
                echo "<td><a href ='$drg'>" . $number . "</a></td>";
                echo "<td>" . $description . "</td>";
                echo "<td>" . $row["Average_Covered_Charges"] . "</td>";
                echo "<td>" . $row["Average_Total_Payments"] . "</td>";
                echo "<td>" . $row["Average_Medicare_Payments"] . "</td>";
                // echo "<td>" . $row["DRG_Definition"] . "</td>";
                // echo "<td>" . $row["Provider_Street_Address"] . "</td>";
                // echo "<td>" . $row["Provider_City"] . "</td>";
                // echo "<td>" . $row["Provider_Zip_Code"] . "</td>";
                // echo "<td>" . $row["Hospital_Referral_Region_HRR_Description"] . "</td>";
                // echo "<td>" . $row["Total_Discharges"] . "</td>";



              echo "</tr>\n";
            }
          //}
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
