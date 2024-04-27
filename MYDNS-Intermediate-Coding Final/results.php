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
    <?php require_once('navbar.php');
      ?>
    <?php
      require_once('db.php');

      $sql = "SELECT * FROM restaurants";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
          ?>
          <div class="container">
            <h2>Voting Results</h2>
            <table class="table">
              <thead>
                  <tr>
                    <th>Restaurants</th>
                    <th>Votes</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['votes']; ?></td>
                      </tr>
                      <?php
                  }
                  ?>
              </tbody>
            </table>
          </div>
          <?php
      } 

      mysqli_close($conn);
      ?>

     </body>
</html>