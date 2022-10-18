<?php
session_start();
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

  <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Update Product
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
                  <form action="code.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                        <div class="mb-3">
                        <label>Product Name</label>
                        <input type="text" name="name" value="<?=$product['name']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label>Product Description</label>
                        <input type="text" name="description" value="<?=$product['description']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label>Quantity</label>
                        <input type="text" name="quantity" value="<?=$product['quantity']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                        <label>Price</label>
                        <input type="text" name="price" value="<?=$product['price']; ?>" class="form-control">
                        </div>

                        <div class="mb-4">
                        <label>Expire Date</label>
                        <input type="date" name="date" value="<?=$product['expire_date']; ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                        <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
                        </div>

                  </form>
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