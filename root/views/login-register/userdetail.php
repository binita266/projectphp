<?php
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/User.php';
require_once '../../model/Product.php';
require_once '../../model/Deal.php';
require_once '../../model/Feedback.php';
//waiting for getting id of user when click a user in  listuser.php
session_start();
if($_SESSION['username'] == "admin"){

    if(isset($_GET['id'])) {
        $userid = $_GET['id'];
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
      header("Location: listAllUsers.php");
    }
}else{
  header("Location: login.php");
}

?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <div class="container">

      <div class="jumbotron">
       <a href='logout.php' class='btn btn-danger'>logout</a> 
      <h1>For Admin</h1><br/>
      <h1><?= "Fullname  : " . $fullname . "<br/>";?></h1>
      <p><?= "Username  : " . $username ."<br/>";?></p>
      <p><?= "email  : " . $email ."<br/>";?></p>
      <p><?= "address  : " . $address ." , ".$city." , ".$province." , ".$postal_code ."<br/>";?></p>
      <p><?= "phone number  : " . $phone_number ."<br/>";?></p>
      <p><?= "Username  : " . $username ."<br/>";?></p>
      </div>
      <a href="listAllUsers.php" class="btn btn-primary">Back To Users List</a>
      <a href="deleteUser.php?id=<?= $userid?>" class="btn btn-danger">Delete User</a> 

      <div class="col-sm-12">
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
        <div class="col-sm-8">
          <h3>Deals for a Product by <?= $fullname; ?> </h3>            
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Title</th>
                <th>Product Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Action</th>
              </tr>
            </thead>
            <?
            $count = 0; 
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
              ++ $count;
           ?>
            <tbody>
              <tr>
                <td><?= $count; ?></td>
                <td><a href="../deal/dealDetail.php?id=<?= $dealid; ?>"><?= $caption; ?></a></td>
                <td><a href="../CRUD-products/detailsProduct.php?id=<?= $product_id ?>"><?= $productname; ?></a></td>
                <td><?= $start_date; ?></td>
                <td><?= $end_date; ?></td>
                <td >
                    <a href="../deal/dealDetail.php?id=<?= $dealid; ?>" class="btn btn-info">Info</a> 
                    <a href="../deal/deleteDeal.php?id=<?= $dealid; ?>" class="btn btn-danger">Delete</a>         
              </td>
              </tr>
           
            </tbody>

          <?
            }}
          ?>
          </table>
        </div>


       <!--       displaying list of feedbacks -->
        <div class="col-sm-8">
          <h3>feedback for a Product by <?= $fullname; ?></h3>            
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Title</th>
                <th>Product Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <?                
            $count = 0;
            foreach($products as $product){
                $product_id = $product->id;
                $productname = $product->name;
                //deals of user per product
                $f = new Feedback();
                $feedbacks = $f->getFeedbackByProductId($product_id,$db);
                
            foreach($feedbacks as $feedback){
              
              $feedbackid = $feedback->id;
              $title = $feedback->title;
              ++ $count;
           ?>
            <tbody>
              <tr>
                 <td><?= $count; ?></td>
                <td><a href="../feedback/feedbackDetail.php?id=<?= $feedbackid ?>"><?= $title; ?></a></td>
                <td><a href="../CRUD-products/detailsProduct.php?id=<?= $product_id ?>"><?= $productname; ?></a></td>
                <td >
                    <a href="../feedback/feedbackDetail.php?id=<?= $feedbackid?>" class="btn btn-info">Info</a>
                    <a href="../feedback/deleteFeedback.php?id=<?= $feedbackid?>" class="btn btn-danger">Delete</a>        
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

