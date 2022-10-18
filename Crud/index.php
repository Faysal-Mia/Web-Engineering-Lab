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
              <h4>Product Details
                <a href="create.php" class="btn btn-primary float-end">Add Product</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Expire Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM product";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run)>0)
                      {
                        foreach($query_run as $product)
                        {
                          ?>
                          <tr>
                            <td><?= $product['id']; ?></td>
                            <td><?= $product['name']; ?></td>
                            <td><?= $product['description']; ?></td>
                            <td><?= $product['quantity']; ?></td>
                            <td><?= $product['price']; ?></td>
                            <td><?= $product['expire_date']; ?></td>
                            <td>
                              <a href="view.php?id=<?= $product['id']; ?>" class="btn btn-info">View</a>
                              <a href="update.php?id=<?= $product['id']; ?>" class="btn btn-success">Update</a>
                              <form action="code.php" method="POST" class="d-inline">
                                  <button type="submit" name="delete_product" value="<?= $product['id'];?>" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else
                      {
                        echo "<h5> No record found! </h5>";
                      }
                    ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>