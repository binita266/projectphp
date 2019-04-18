<?php
session_start();

require_once '../../model/database.php';
require_once '../../model/membership.php';

include '../header.php';
if(isset($_POST['update'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $m = new Member();
    $member = $m->getMemberById($id, $dbcon);
    //var_dump($member);

}


if(isset($_POST['updateM'])){
    $id= $_POST['memberid'];
	$title = $_POST['title'];
   	$price = $_POST['price'];
	

    $db = Database::getDb();
    $m = new Member();
    $count = $m->updateMember($id, $title, $price, $db);

    if($count){
        header("Location: listmembership.php");
    } else {
        echo  "problem updating";
    }


}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_refer_update_wrapper">
					<form action="" method = "post">	
						<input type="hidden" name="memberid" value="<?= $member->id; ?>" />
						Level Description:	<input type="text" class="inputfield" name="title" value="<?= $member->title; ?>" /></br>
											
						Price: <input type="text" class="inputfield" name="price" value="<?= $member->price; ?>" /></br>
						
							
						 <input type="submit" name="updateM" value="Update Membership types">
	 
</form>
</div>
			</div>
		</div>
	</div>
</div>

<?php include "../footer.php"; ?>