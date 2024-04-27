<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <?php 
      require_once('navbar.php');
      require_once('db.php');
     ?>


     <div class="container-sm">
        <form action="" method="post">
            <div class="mb-3">
                <label for="Email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="Email" required>
              <div id="emailHelp" class="form-text">:)</div>
          </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-sm-3">
            <select class="form-select" name="select" aria-label="Default select example" required>
              <option selected>Open to vote</option>
              <option value="1">KFC</option>
              <option value="2">Subway</option>
              <option value="3">Popeyes</option>
              <option value="4">Burger King</option>
              <option value="5">Japs</option>
            </select>
          <br>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Vote</button>

      </form>
    </div>
    <br>

    <?php
    require_once('db.php')?>
    <?php
    if (isset($_POST['submit'])){
      $email = trim($_POST['Email']);
      $pword = trim($_POST['password']);
      $vote = $_POST['select'];
      
      $clean_email = mysqli_escape_string($conn, $email);
      $clean_pword = mysqli_escape_string($conn, $pword);

      $sql = "SELECT * FROM users where email = '$clean_email' AND password ='$clean_pword'";
      $result = mysqli_query($conn, $sql);
      $num_rows = mysqli_num_rows($result);

      if($num_rows > 0) {
        $sql1 = "SELECT votes FROM restaurants WHERE id = '$vote'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $votes = $row1['votes'] + 1;
        $sql = "UPDATE restaurants SET votes = '$votes' WHERE id = '$vote'";

        if (mysqli_query($conn,  $sql)) {
          
        $row = mysqli_fetch_assoc($result);?> 
        <div class="container-sm">
          <div class="row">
            <div class="col-sm-6">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Vote Counted
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          </div>
        </div>
        <?php
        }
      ?>
        <?php
      }else{
        ?>
        <br>
        <div class="container-sm">
          <div class="row">
            <div class="col-sm-6">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Incorrect information
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          </div>
        </div>
        <br>
        <?php
      }
    }

?>  
    
     <div class="container-lg">
       <div class="row">
        <div class="col-md-2 mb-2 mb-sm-0">
          <div class="card" style="">
            <img src="KFC.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">KFC</h5>
              <p class="card-text">KFC, or Kentucky Fried Chicken, is a global fast-food chain famous for its flavorful fried chicken seasoned with a secret blend of herbs and spices.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="card" style="">
            <img src="w.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Subway</h5>
              <p class="card-text">Subway offers a variety of fresh and customizable sandwiches, salads, and wraps. 
              </p>
            </div>
          </div>
        </div>
          <div class="col-md-2">
          <div class="card" style="">
            <img src="Popeyes_logo.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Popeyes</h5>
              <p class="card-text">Popeyes is a popular fast-food chain renowned for its flavorful Louisiana-style fried chicken and southern-inspired sides.
              </p>
            </div>
          </div>
        </div>
          <div class="col-md-2">
          <div class="card" style="">
            <img src="bk.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Burger King</h5>
              <p class="card-text">Burger King is a global fast-food chain known for its flame-grilled burgers, innovative menu items, and the iconic Whopper sandwich.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="card" style="">
            <img src="japs.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Japs</h5>
              <p class="card-text">Jap's Trinidad Fast Food: Serving up authentic Trinidadian flavors with a deliciously fast twist.
              </p>
            </div>
          </div>
          <br>
      </div>

      <br>
    
  </body>
</html>

<?php mysqli_close($conn); ?>