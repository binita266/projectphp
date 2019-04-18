<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/membership.php';
include '../header.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $s = new Member();
    $member = $s->getMemberById($id, $dbcon);

    //var_dump($student);

}?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_refer_detail_wrapper">
<?php			
echo  "Membership Levels : " . $member->title. "<br ><br>";
echo  "Price : " . $member->price . "<br >";

?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "../footer.php"; ?>