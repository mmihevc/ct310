<?php ini_set('memory_limit', '512M'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php echo $contents ?>
    <table>
      <tr>
        <th>MPN</th>
        <th>Hospital</th>
        <th>State</th>
        <th>Average Covered Charges</th>
        <th>Average Total Payments</th>
        <th>Average Medicare Payments</th>
      </tr>
      <?php
        foreach ($drg_data as $row) {
          echo "<tr>";
          echo "<td>" . $row['Provider_Id'] . "</td>";
          echo "<td>" . $row['Provider_Name'] . "</td>";
          echo "<td>" . $row['Provider_State'] . "</td>";
          echo "<td>" . $row['Average_Covered_Charges'] . "</td>";
          echo "<td>" . $row['Average_Total_Payments'] . "</td>";
          echo "<td>" . $row['Average_Medicare_Payments'] . "</td>";
          echo "</tr>";
        }
      ?>
    </table>

    <nav>
     <ul class="list justify-content-sm-center">
       <?php
         if ($start > 0) {
           $prev_path = Uri::base() . 'index.php/hospital/msdrg_details?start=' . max($start - 20, 0);
           echo '<li class="page-item"><a class="page-link" href="' . $prev_path . '">Previous</a></li>';
         }
        ?>
        <?php
          $next_path = Uri::base() . 'index.php/hospital/msdrg_details?start=' . ($start + 20);
          echo '<li class="page-item"><a class="page-link" href="' . $next_path . '">Next</a></li>';
         ?>
     </ul>
   </nav>

  </body>
</html>
