<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
  </head>
  <body>
    <?php echo $contents ?>

    <img src="https://www.cs.colostate.edu:4444/~mmihevc/ct310/assets/img/logo.png?1587274978" alt="">

    <form id="input_form" action="home.php" method="post">
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        </div>
      </form>

    <script>
        $( "#input_form" ).submit(function( event ) {
          alert("yo yo yo");
          var myUName = document.getElementById("uname").value;
          var myPassword = document.getElementById("psw").value;
          if (myUName == "ct310" && myPassword == "cookiesareyummy"){
            alert("you are a user");
          }else if (myUName == "ct310admin" && myPassword == "RoundPiesAreBest"){
            alert("you are a admin user");
          }else {
            alert("you stupid");
          }
          event.preventDefault();
        });
    </script>

  </body>
</html>
