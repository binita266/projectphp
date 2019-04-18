<?php
session_start();
require_once '../../model/Database.php';
require_once '../../model/Product.php';


$db = Database::getDb();
$p = new Product();
$categories = $p->getCategories($db);


if(isset($_POST['update'])){
    $id = $_POST['id'];

    $dbcon = Database::getDb();
    $p = new Product();
    $product = $p->getProductById($id, $dbcon);
    // var_dump($product);
    var_dump($product->img_path);

}

if(isset($_POST['updprod'])){
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
    $id= $_POST['pid'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $img = $target_path;
    $user_id = $_POST['user_id'];

    $dbcon = Database::getDb();
    $p = new Product();
    $count = $p->updateProduct($id, $name, $description, $category_id, $img, $user_id, $dbcon);

    if($count){
        header("Location: listProducts.php");
    } else {
        echo  "problem updating";
    }
}

?>
<?php
$page_title = "Update Products";
include dirname( __FILE__) . "../../header.php";
 ?>
<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


<form action="" method="post" class="ProductForm" enctype="multipart/form-data">
    <input type="hidden" name="pid" value="<?= $product->id; ?>" />
    Name: 
    <input type="text" name="name" value="<?= $product->name; ?>" /><br/>
    Description:
    <textarea type="text" name="description" id="description" cols="30" rows="10"><?= $product->description; ?></textarea><br>
    Category: 
    <select name="category_id" >
                    <?php foreach ($categories as $cat){
                          echo "<option value='$cat->id'>" . $cat->title . "</option>";
                    }?>      
                  </select><br />
    Img: 
<!--     <input type="text" name="image_id" value="<?= $product->image_id; ?>" /><br /> -->
<input type="file" name="upfile" id="upfile" value=<?php echo $product->img_path; ?>>
    <input type="hidden" name="user_id" value="<?= $product->user_id; ?>" /> <br />
    <input type="submit" name="updprod" value="Update Product" class="form-button">
    <!-- <img src="<?php echo $product->img_path; ?>" alt="">   -->
</form>


</div>
        </div>
    </div>
</section>

<?php
$page_title = "Update Products";
include dirname( __FILE__) . "../../footer.php";
 ?>

