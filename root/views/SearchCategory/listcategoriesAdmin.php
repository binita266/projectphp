<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php
$page_title = "Admin ListCategories";
session_start();
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

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
$c = new Category();
$mycategory = $c->getAllCategories(Database::getDb());

?>

<!--Content-->
<main id="main_searchCategoryAdmin">
        <h2>ADMIN => Search Category</h2>
        <div class="container">
            <div class="row">
                <?php foreach($mycategory as $category){ ?>
                <div class="col-md-3 category">
                    <a href="categoryDetail.php?id=<?php echo $category->id ?>">
                        <?php echo $category->title; ?></a>
                    <form action='updateCategory.php' method='post'>
                        <input type='hidden' value='<?= $category->id; ?>' name='id' />
                        <input type='submit' value='Update' name='update' class="btn btn-default" />
                    </form>
                    <form action='deleteCategory.php' method='post'>
                        <input type='hidden' value='<?= $category->id; ?>' name='id' />
                        <input type='submit' value='Delete' name='delete' class="btn btn-danger" />
                    </form>
                </div>
                <?php } ?>
            </div>
            <a href="addCategory.php" class="btn btn-default">Add new</a>
            <a href="listcategories.php" class="btn btn-default">User View</a>
        </div>

</main>
<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>
