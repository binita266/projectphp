<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/referal.php';

 include '../header.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $s = new Referal();
    $referal = $s->getReferalById($id, $dbcon);
	

   // var_dump($referal);

}
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_refer_detail_wrapper">
<?php
echo  "Name : " . $referal->friend_name . "<br />";
echo  "Email : " . $referal->friend_email . "<br />";
echo  "Comment : " . $referal->comment . "<br />";
echo  "Date : " . $referal->referal_date . "<br />";
?>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php include "../footer.php"; ?>
 
