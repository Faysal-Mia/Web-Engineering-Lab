<?php
require 'dbconnect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <div class="title">
      <h1 class="title1">Crud Project</h1>
    </div>

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>View Product Details
              <a class="btn btn-danger float-end" href="index.php">BACK</a>
            </h4>
          </div>
          <div class="card-body">

            <?php
            if(isset($_GET['id']))
            {
              $product_id = mysqli_real_escape_string($con, $_GET['id']);
              $query = "SELECT * FROM product WHERE id = '$product_id' ";
              $query_run = mysqli_query($con, $query);

              if(mysqli_num_rows($query_run)>0)
              {
                $product = mysqli_fetch_array($query_run);
                ?>

                        <div class="mb-4">
                        <p>
                          <b>Product Name:</b> <?=$product['name']; ?>
                        </p>
                        </div>

                        <div class="mb-4">
                        <p>
                          <b>Product Description:</b> <?=$product['description']; ?>
                        </p>
                        </div>

                        <div class="mb-4">
                        <p>
                          <b>Quantity:</b> <?=$product['quantity']; ?>
                        </p>
                        </div>

                        <div class="mb-4">
                        <p>
                          <b>Price:</b> <?=$product['price']; ?>
                        </p>
                        </div>

                        <div class="mb-3">
                        <p>
                          <b>Expire Date:</b> <?=$product['expire_date']; ?>
                        </p>
                        </div>

                <?php
              }
              else
              {
                echo "<h4>No record found</h4>";
              }
            }
            ?>

          
          </div>
        </div>
      </div>
    </div>
  </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>