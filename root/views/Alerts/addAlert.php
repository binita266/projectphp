<?php 
session_start();
require_once '../../model/Database.php';
require_once '../../model/Alert.php';

$db = Database::getDb();
$a = new Alert();

if(isset($_POST['addAlert'])){
	$alertTitle = $_POST['alert_title'];
	$alertContent = $_POST['alert_content'];

	
	$_SESSION['alertTitle'] = $alertTitle;
	$_SESSION['alertContent'] = $alertContent;
	$a->addAlert($db, $alertTitle, $alertContent);
}






$page_title = "New Product";
include dirname( __FILE__) . "../../header.php";
?>
<section class="section-content">
	<div class="container">
		<div class="row">
			<div class="col">
				<form action="" method="POST">
					<label for="alert_title"></label><br>
					<input type="text" name="alert_title" id="alert_title" value=<?php echo $_SESSION['alertTitle'] ?>>
					<label for="alert_content"></label><br>
					<input type="text" name="alert_content" id="alert_content" value=<?php echo $_SESSION['alertContent'] ?>>
					<input type="submit" name="addAlert">
				</form>
			</div>
		</div>
	</div>
</section>
<?php 
include dirname( __FILE__) . "../../footer.php";
 ?>