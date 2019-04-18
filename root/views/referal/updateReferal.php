<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/referal.php';

 include '../header.php';

if(isset($_POST['update'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $s = new Referal();
    $referal = $s->getReferalById($id, $dbcon);
   // var_dump($referal);

}

if(isset($_POST['ak_updref'])){
    $id= $_POST['ak_rid'];//not sure about the id
    $friend_name = $_POST['friend_name'];
    $friend_email = $_POST['friend_email'];
    $comment = $_POST['comment'];

    $dbcon = Database::getDb();
    $s = new Referal();
    $count = $s->updateReferal($id, $friend_name, $friend_email, $comment, $dbcon);

    if($count){
        header("Location: listReferals.php");
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
						<input type="hidden" name="ak_rid" value="<?= $referal->id; ?>" /> 
						
						First Name:<br/> <input type="text" class="ak_inputfield" name="friend_name" value="<?= $referal->friend_name; ?>" /><br/>
									
						Email:<br/> <input type="text" class="ak_inputfield" name="friend_email" value="<?= $referal->friend_email; ?>" /><br /> 
												
						Comment:<br/> <input type="text" class="ak_inputfield" name="comment" value="<?= $referal->comment; ?>"/><br />
									
						<input type="submit" name="ak_updref" id="ak_updref_but" value="Update Referal">
						 
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "../footer.php"; ?>	

