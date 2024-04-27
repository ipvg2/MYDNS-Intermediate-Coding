<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <?php require_once('navbar.php');
      ?>
    <div class="container-sm">
      <form action="" method="post">
        <div class="mb-3">
          <label for="fname" class="form-label">First Name</label>
          <input type="text" class="form-control" id="fname" name="fname" required>
        </div>
        <div class="mb-3">
          <label for="lname" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lname" name="lname" required>
        </div>
        <div class="mb-3">
          <label for="Email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="Email" required>
          <div id="emailHelp" class="form-text">:)</div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Register</button>
      </form>
      <br>
    </div>

<?php require_once('Database.php')?>
<?php require_once('makingTable.php') ?>

    <?php
      
     if (isset($_POST['submit'])){
        ?> <?php require_once('db.php')?>
        <?php
        if (!empty($_POST['fname'])) {
        $fname = trim($_POST['fname']); 
        }
        if (!empty($_POST['lname'])) {
        $lname = trim($_POST['lname']);
        }
        if ((!empty($_POST['Email'])) AND (filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL))){
        $email = trim($_POST['Email']);
        } else {
          ?>
          <div class="container-sm">
            <div class="row">
              <div class="col-sm-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Invalid Email
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
          </div>
          <?php
          die();
        }
        if (!empty($_POST['password'])) {
        $pword = trim($_POST['password']);  
        }

        $clean_fname = mysqli_escape_string($conn, $fname);
        $clean_lname = mysqli_escape_string($conn, $lname);
        $clean_email = mysqli_escape_string($conn, $email);
        $clean_pword = mysqli_escape_string($conn, $pword);

        $sql = "SELECT * FROM users where email = '$clean_email'";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);

        if($num_rows > 0) {
          $row = mysqli_fetch_assoc($result);?> 
          <div class="container-sm">
            <div class="row">
              <div class="col-sm-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Email Taken!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
          </div>
          <?php die();
        }
    
?>  
         <?php
        $sql = "INSERT INTO users (firstname, lastname, email, password)
          VALUES ('$clean_fname', '$clean_lname', '$clean_email', '$clean_pword')";

        if (mysqli_query($conn,  $sql)) {
          ?>
          <div class="container-sm">
            <div class="row">
              <div class="col-sm-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Registered Successfully!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            </div>
          </div>
        <?php
        } else {
          echo "error: " . mysqli_error($conn);
        }
        mysqli_close($conn);
        
      }
?>
  </body>
</html>