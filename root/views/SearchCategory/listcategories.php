<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php
session_start();
$page_title = "Search Categories";
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

$dbcon = Database::getDb();
$c = new Category();
$mycategory = $c->getAllCategories(Database::getDb());

?>
    <!--Content-->
    <main id="main_searchCategory">

            <h2>Search Category</h2>
            <div class="container">
                <div class="row">
                    <?php foreach($mycategory as $category){ ?>
                    <div class="col-md-4 category" title="<?php echo $category->description ?>">
                        <a href="searchResult.php?id=<?php echo $category->id ?>">
                            <?php echo $category->title ?>
                        </a>
                        <img class="category-image-this" src="<?php echo $category->img_path ?>">
                    </div>

                    <?php } ?>
                </div>
            </div>

    </main>
    <!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>
