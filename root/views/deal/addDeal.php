<!--
Author:    Rohit Arora; n01269796;
-->

<?php 
include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Deal.php';
require_once '../../model/User.php';
require_once "function.php";


session_start();
//$_GET['productid'] = 33;
if(isset($_SESSION['id'])){
$db = Database::getDb();
$caption = $start_date =  $end_date = $msg = $product_id="";
$captionerr = $start_dateerr = $end_dateerr = "";

$u = new User();
if(!isset($_GET['productid'])){
    $userid = $_SESSION['id'];
    $products = $u->getAllProductsByUserId($userid ,$db);
    if(!$products){header("Location: ../login-register/userProfile.php");}
    $pvalue = "<select class='dropdown'  name='product_id'>";
    foreach ($products as $product) {
     $pvalue .=  "<option value='$product->id'>$product->name</option>";
    }
    $pvalue .= " </select>";
}else{
  $product = $p->getProductById($_GET['productid'],$db);
  $productname = $product->name;
  $pvalue ="<select class='dropdown'  name='product_id'>" .
        "<option value='$product->id'>$productname</option>".
        "</select>";
  }

 //waiting for user add button submit
    if(isset($_POST['dealAdd'])){
       $caption = $_POST['caption'];
       $start_date = $_POST['start_date'];  
       $end_date = $_POST['end_date'];
       $product_id = $_POST['product_id'];
       		
      // checking validation
      $valid = validateDeal($captionerr,$start_dateerr,$end_dateerr, $caption,$start_date,$end_date);
       if($valid)
       {
           $d = new Deal();
           $effectedRow = $d->addDeal($caption,$start_date,$end_date,$product_id, $db);
           if($effectedRow){
               $msg = "Thanks!! your Deal have been sucessfully added";
               
           } else {
                //header("Location: customerr.php");
               $msg =  "Error Occured Please try again";
           }

        }
	}
}else{
  header("Location: ../login-register/login.php");
}


 ?>
<?= $msg;?>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  

<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form class="form-horizontal" method="post">
      <legend><h3>Enter Deal Information</h3></legend> 
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="caption">
       Deal Title
      </label>
      <div class="col-sm-10">
       <input class="form-control" id="caption" name="caption" type="text" value="<?= $caption;?>" />
       <span  style="color: red"> <?= $captionerr;?></span>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="date">
       Start Date
      </label>
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control" id="start_date" name="start_date" placeholder="YYYY/MM/DD" type="text" value="<?= $start_date;?>" />
       </div> <span  style="color: red"> <?= $start_dateerr;?></span>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="date">
       End Date
      </label>
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <input class="form-control form-control" id="end_date" name="end_date" placeholder="YYYY/MM/DD" type="text" value="<?= $end_date;?>" />
       </div><span  style="color: red"> <?= $end_dateerr;?></span>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="caption">
       Product
      </label>
      <div class="col-sm-10">
        <?= $pvalue?>
      </div>
     </div>
     <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <button class="btn btn-primary " name="dealAdd" type="submit">
        Submit
       </button>
       <span><a href="../login-register/userProfile.php" class="btn btn-primary">Back to profile</a> </span>
      </div>
     </div>
    </form>
   </div>
   <img class="col-md-6" style="height: 10%;width: 10%;" src="../../img/deal.jpg" alt="deal image">
  </div>
 </div>
</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var start_date=$('#start_date'); //our date input has the name "date"
		var end_date=$('#end_date');
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		start_date.datepicker({
			format: 'yyyy/mm/dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
		end_date.datepicker({
			format: 'yyyy/mm/dd',
			//container: container,
			todayHighlight: true,
			autoclose: true,
		})

		$("form :input").attr("autocomplete", "off");
	})
</script>






 
	




<!-- FOOTER -->
<?php include "../footer.php"; ?>
