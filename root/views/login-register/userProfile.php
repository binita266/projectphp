<?php
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/User.php';
require_once '../../model/Product.php';
require_once '../../model/Deal.php';

//waiting for getting id of user when click a user in  listuser.php
session_start();
if(isset($_SESSION['id'])){
        $userid = $_SESSION['id'];
        $db = Database::getDb();
        $u = new User();
        $user = $u->getUserById($userid, $db);
        $fullname = $user->fname . " " . $user->lname;
        $username = $user->username;
        $email = $user->email;
        $address = $user->address;
        $city = $user->city;
        $province = $user->province;
        $postal_code = $user->postal_code;
        $alternative_email = $user->alternative_email;
        $phone_number = $user->phone_number;

        //product of users
        $products =  $u->getAllProductsByUserId($userid,$db);
}else{
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
      <div class="jumbotron">
        <h1 class="col-sm-9">User View</h1>
        <div class="col-sm-3">
          <a href="updateUser.php?id=<?= $userid?>" class="btn btn-primary">Update Profile</a>
          <a href="updatePassword.php?id=<?= $userid?>" class="btn btn-primary">Update Password</a> 
          <a href="membership.php" class="btn btn-info">Membership</a> 
          <a href="logout.php?id=<?= $userid?>" class="btn btn-warning">Log Out</a> 
          <a href="deleteUser.php?id=<?= $userid?>" class="btn btn-danger">Unregister your account</a> 
        </div>
        <h1><?= "Fullname  : " . $fullname . "<br/>";?></h1>
        <p><?= "Username  : " . $username ."<br/>";?></p>
        <p><?= "email  : " . $email ."<br/>";?></p>
        <p><?= "address  : " . $address ." , ".$city." , ".$province." , ".$postal_code ."<br/>";?></p>
        <p><?= "phone number  : " . $phone_number ."<br/>";?></p>
        <p><?= "Username  : " . $username ."<br/>";?></p>
      </div>

     
      
      

<!--       displaying list of products -->
      <div class="col-sm-6">
          <a href="../CRUD-products/newProduct.php" class="btn btn-primary">Add New Product</a> 
          <h2>Products Of <?= $fullname?> </h2>           
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Product Name</th>
                <th>Categories</th>
                <th>Action</th>
              </tr>
            </thead>
            <?  
              $count = 0;
              foreach($products as $product){
                $productid = $product->id;
                $productname = $product->name;
                $category = $product->title;
                ++ $count;
           ?>
            <tbody>
              <tr>
                <td><?= $count; ?></td>
                <td><a href="../CRUD-products/detailsProduct.php?id=<?= $productid ?>"><?= $productname; ?></a></td>
                <td><?= $category; ?></td>
                <td ><a href="../CRUD-products/detailsProduct.php?id=<?= $productid?>" class="btn btn-info">Info</a></td>
              </tr>
            </tbody>
          <?
            }
          ?>
          </table>
        </div>


  <!--       displaying list of deals -->
        <div class="col-sm-6">
          <a href="../deal/addDeal.php" class="btn btn-primary">Add New deal</a> 
          <h2>Deal for a product for user profile view</h2>            
          <table class="table table-hover">
            <thead>
              <tr>
                
                <th>Title</th>
                <th>Product Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Action</th>
              </tr>
            </thead>
            <?
            foreach($products as $product){
                $product_id = $product->id;
                $productname = $product->name;
                //deals of user per product
                $d = new Deal();
                $deals =  $d->getDealByProductId($product_id,$db);
                
            foreach($deals as $deal){
              $dealid = $deal->id;
              $caption = $deal->caption;
              $start_date = $deal->start_date;
              $end_date = $deal->end_date;

           ?>
            <tbody>
              <tr>
                <td><a href="../deal/dealDetail.php?id=<?= $dealid; ?>"><?= $caption; ?></a></td>
                <td><a href="../CRUD-products/detailsProduct.php?id=<?= $product_id ?>"><?= $productname; ?></a></td>
                <td><?= $start_date; ?></td>
                <td><?= $end_date; ?></td>
                <td >
                    <a href="../deal/dealDetail.php?id=<?= $dealid; ?>" class="btn btn-info">Info</a>         
              </td>
              </tr>
           
            </tbody>

          <?
            }}
          ?>
          </table>
        </div>

  </div>

<!-- Footer -->
<?php include "../footer.php"; ?>
