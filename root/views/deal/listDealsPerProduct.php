<?php
//simple user view

include "../header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Deal.php';
require_once '../../model/User.php';

$_GET['productid'] = 101;//write now hardcoded but will be removed whn linked to nav
$dbcon = Database::getDb();
$d = new Deal();
$product_id = $_GET['productid'];
$deals =  $d->getDealByProductId($product_id,$dbcon);


?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
   <h2>Deal for a product for simple user  view</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Title</th>
        <th>Start</th>
        <th>End</th>
        <th>Action</th>
      </tr>
    </thead>
    <?
    foreach($deals as $deal){
      $dealid = $deal->id;
      $caption = $deal->caption;
      $start_date = $deal->start_date;
      $end_date = $deal->end_date;

   ?>
    <tbody>
      <tr>
        <td><a href="dealDetail.php?id=<?= $dealid; ?>"><?= $caption; ?></a></td>
        <td><?= $start_date; ?></td>
        <td><?= $end_date; ?></td>
        <td >
            <a href="dealDetail.php?id=<?= $dealid; ?>" class="btn btn-info">Info</a>  
                
      </td>
      </tr>
   
    </tbody>

  <?
    }
  ?>
  </table>
</div>

<!-- FOOTER -->
<?php include "../footer.php"; ?>