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
            </tr>
            </thead>
            <tbody>

              <?php
              //if(isset($everything_data) ){
                foreach($everything_data as $row){
                  echo "<tr>\n";
                  $data = explode(' - ', $row["DRG_Definition"]);
                  $number = trim($data[0]); //number
                  $description = trim($data[1]); //description
                  $drg = Uri::base(). "index.php/hospital/msdrg_details.php?msdrg_id=" .$number;
                  echo "<td><a href ='$drg'>" . $number . "</a></td>";
                  echo "<td>" . $description . "</td>";
                  echo "<td>" . $row["Average_Covered_Charges"] . "</td>";
                  echo "<td>" . $row["Average_Total_Payments"] . "</td>";
                  echo "<td>" . $row["Average_Medicare_Payments"] . "</td>";
                  echo "</tr>\n";
              }
            //}
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <nav label="navigation">
      <ul class="list justify-content-sm-center">
        <?php
          if ($start > 0) {
            $prev_path = Uri::base() . 'index.php/hospital/hospital_details?start=' . max($start - 20, 0);
            echo '<li class="page-item"><a class="page-link" href="' . $prev_path . '">Previous</a></li>';
          }
         ?>
         <?php
            $next_path = Uri::base() . 'index.php/hospital/hospital_details?start=' . ($start + 20);
            echo '<li class="page-item"><a class="page-link" href="' . $next_path . '">Next</a></li>';
          ?>
      </ul>
    </nav>
<?php 
  function has_edit_priviledge($comment_user, $is_admin ) {
      if ($is_admin) {
          return true;
      } else if (isset($_SESSION('username')) && $_SESSION('username') == $comment_user) {
          return true
      } else {
          return false;
      }
      
  } 
      function generate_comment_item($comment, $is_admin){
          $id = $comment['comment_id'];
          
          $logged_in = isset($_SESSION['username']);
          
          $priveledges = has_edit_priveledge($comment['user'], $is_admin);
          
          $top_level = ($comment['parent_id'] == null) ?"bg-white text-dark": "";
           $indented = ($comment['parent_id'] == null) ? "":  "style=padding-left 30px;";
           $response = ($comment['parent_id'] == null) ? "says" : "responds";
          echo "<small class='form-text text-muted' $indented> " .$comment['user'] . $response</small>";
          echo "<div class = 'input-group mb-3' $indented;
          
       if ($priveledges) {
           echo "<input type 'text' id = 'comments-$id' class='form-control $top_level' aria-label = 'Comment' . $comment['comment'] . "'>";
            
       } else {
           echo "<input type 'text' id = 'comments-$id' class='form-control $top_level' aria-label = 'Comment' . $comment['comment'] . "' readonly>";
       }
       if ($logged_in) {
       echo "< button class = 'button btn-success upvote"'. "id=" . $comment['comment_id'] . ">Upvote<button>"
                echo "< button class = 'button btn-warning downvote"'. "id=" . $comment['comment_id'] . ">Downvote<button>"
       }
       if ($priveleges){
        echo "< button class = 'button btn-drk update"'. "id=" . $comment['comment_id'] . ">Update<button>"
         echo "< button class = 'button btn-danger delete"'. "id=" . $comment['comment_id'] . ">Delete<button>"
       } 
          foreach($hospital_comments as $c) {
              echo form::open (array(
              "action" => "/index.php/ct310Hospital/comment_response/hospital",
                  "method" => "post"
              ));
              
        echo"<input id = 'provider-id' name = 'provider-id' type = 'hidden' value = '". $hospital_details['Provider_id']). "'>";
        echo "<inout id= 'id' name = 'id' type = 'hidden' value = '". $c['comment_id']). "'>";
              
              generate_comment_item($c, $is_admin);
              
              foreach($hospital_responses as $r) {
                  if ($r['parent_id'] == $c ['comment_id']) {
                      generate_comment_item($r, $is_admin);
                  }
              }
              if (isset(_$SESSION['username'])) { 
                  echo 
                      '<div class = "input-group mb-3">
                      <input type = "text" class = "form-control" placeholder = "Your response..." name= "response">
                      <button class = "btn btn-outline-secondary" type = "submit">Respond</button>
                      </div>';
                  
              }
              echo '<div style = "height:20px"></div>';
              echo Form::close();
          }
          ?>
      <?php
          if (isset($_SESSION['username'])){
              echo  Form::open (array (
              "action" => "/index.php/ct310hospital/new_comment/hospital",
                  "method" => "post"  
              ));
         echo "<input id = 'id' type 'hidden' value = '". $hospital_details['Provider_id'] . "'>";
        echo '<label for = " comment">Make a new comment: </label>';
        echo '<input type = "text" class = "form-control" name = "comment" placeholder = " Comment here" aria-label= "Comment"';
         echo '<div style = "height: 20px"></div>';
        echo '<button type = "submit" class= "btn btn-primary">Submit</button>';
              echo Form::close();
   
          }
          ?>
       
       
          
      }
      
  </body>
</html>
