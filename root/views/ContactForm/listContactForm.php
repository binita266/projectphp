<?php
$page_title = "Admin ListContactForm";
session_start();

include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/ContactForm.php';

// Only admin will be able to make some changes!
if(isset($_SESSION['username'] )){
    if ($_SESSION['username'] !== 'admin' ) {
        header("Location: ../login-register/login.php");
        die();
    } 
}else{
    header("Location: ../login-register/login.php");
    die();
}

$dbcon = Database::getDb();
$t = new ContactForm();
$cf =  $t->getAllContactForm(Database::getDb());
?>

<!--Content-->
<main id="main_searchFaqAdmin">
        <h2>ADMIN => Contact Forms</h2>
        <div class="container">
            <div>
			 <ul class="list-group list-group-flush">
                <?php foreach($cf as $cfs){ ?>
                 
                 <li class="list-group-item"><?php echo "<a href='detailContactForm.php?id=$cfs->id'>" .  $cfs->f_name  . $cfs->l_name  . "</a>"?></li> 

		   
                    <form action='deleteContactForm.php' method='post'>
                        <input type='hidden' value='<?= $cfs->id; ?>' name='id' />
                        <input type='submit' value='Delete' name='delete' class="btn btn-danger" />
                    </form>
					</ul>
					
					</br></br>
					
                <?php } ?>
            </div>
        </div>

</main>
<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>