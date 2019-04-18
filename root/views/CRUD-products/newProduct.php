<?php
session_start();
//$_SESSION['id'] = 7;
echo 'User ID is: ' . $_SESSION['id'];


require_once '../../model/Database.php';
require_once '../../model/Product.php';
$db = Database::getDb();
$p = new Product();
$categories = $p->getCategories($db);

if(isset($_POST['addProduct'])){
    //image upload--------------------------------------
    $file_temp = $_FILES['upfile']['tmp_name'];
    //original path and file name of the uploaded file
    $file_name = $_FILES['upfile']['name'];
    //size of the uploaded file in bytes
    $file_size = $_FILES['upfile']['size'];
    //type of the file(if browser provides)
    $file_type = $_FILES['upfile']['type'];
    //error number
    $file_error = $_FILES['upfile']['error'];
    
    //folder to move the uploaded file
    $target_path = "uploads/";
    $target_path = $target_path .  $_FILES['upfile']['name'];
    ////move the uploaded file from tempe path to taget path
    if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
        echo "The file ".  $_FILES['upfile']['name'] . " has been uploaded ";
    } else{
        echo "There was an error uploading the file, please try again!";
}
//--------------------------------------------------

    $name = $_POST['name'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $image = $target_path;
    $user_id = $_SESSION['id'];
    
    $p->addProduct($db, $name, $description, $category_id, $image, $user_id );
    header("Location: listProducts.php");
    }

?>

<?php 

$page_title = "New Product";
include dirname( __FILE__) . "../../header.php";
 ?>
<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<form action="" method="post" enctype="multipart/form-data" class="ProductForm">
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name" /><br/>
    <label for="description">Description: </label><br>
    <!-- <input type="text" name="description" id="description" /><br /> -->
    <textarea type="text" name="description" id="description" cols="30" rows="10"></textarea><br>
    <label for="category_id">Select the category</label><br>
    <select name="category_id" id="category_id" >
        <?php foreach ($categories as $cat){
            echo "<option value='$cat->id'>" . $cat->title . "</option>";
        }?>      
    </select><br />
    <label for="upfile">Select Image</label><br>
    <input type="file" name="upfile" id="upfile" >
    <input type="submit" name="addProduct" value="Add New Product" class="form-button">
</form>
            </div>
        </div>
    </div>
</section>
<?php 
include dirname( __FILE__) . "../../footer.php";
 ?>

