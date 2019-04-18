<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php
session_start();
$page_title = "Search Result";

include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Category.php';

$id= $_GET['id'];
$dbcon = Database::getDb();
$c = new Category();
$myresult = $c->getResults($id, Database::getDb());
// var_dump($myresult);
?>

<!--Content-->
<main id="main_searchResult">
    <div class="conteiner">
        <h2>Search Result</h2>
        
        <?php foreach($myresult as $result){ ?>

            <a href="../../views/CRUD-products/detailsProduct.php?id=<?php echo $result->id; ?>" >
                <div class="item row">
                    <div class="col-md-9 item-info">
                        <span class="bold"><?php echo $result->name; ?></span><br>
                        <span><?php echo $result->description; ?></span>
                    </div>
                    <div class="col-md-3 searchResult_image">
                        <img src="../../views/CRUD-products/<?= $result->img_path; ?>" >
                    </div>
                </div>
            </a>

        <?php } ?>
        
    </div>
</main>
<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>