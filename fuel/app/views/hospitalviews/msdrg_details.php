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
        foreach ($dsrg_data as $row) {
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

  </body>
</html>
