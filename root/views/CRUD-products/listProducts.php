<?php 
session_start();
require_once '../../model/Database.php';
require_once '../../model/Product.php';

$id = $_SESSION['id'];
$dbcon = Database::getDb();
$p = new Product();
$myproduct =  $p->getAllProducts($id, $dbcon);

$page_title = "My Products";
include dirname( __FILE__) . "../../header.php";
 ?>
<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="productsList">

<?php

foreach($myproduct as $product){
    echo "<li><a href='detailsProduct.php?id=$product->id'>" .  $product->name  . "</a>".
        "<form action='updateProduct.php' method='post'>" .
        "<input type='hidden' value='$product->id' name='id' />".
        "<input type='submit' value='Update' name='update' />".
        "</form>" .
        "<form action='deleteProduct.php' method='post'>" .
        "<input type='hidden' value='$product->id' name='id' />".
        "<input type='submit' value='DeleteProduct' name='deleteProduct' />".
        "</form>" .
        "</li>";
}
?>
                </ul>
                <a href="newProduct.php">Add new Product</a>
            </div>
        </div>
    </div>
</section> 
<?php 
include dirname( __FILE__) . "../../footer.php";
 ?>