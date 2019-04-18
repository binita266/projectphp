<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/Product.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $dbcon = Database::getDb();

    $p = new Product();
    $product = $p->getProductById($id, $dbcon);
//    var_dump($product);
    $rating = $p->RatingList($id, $dbcon);
//    var_dump($rating);
//    $categories = $p->getCategories($id, $dbcon);

}
if(isset($_GET['addToFavorites'])){
    $product_id = $_GET['id'];
    $db = Database::getDb();
    $c = new Product();
    $my_data = $c->FavoritesAdd($_SESSION['id'], $product_id, $db);
}
if(isset($_GET['addToRating'])){
    $product_id = $_GET['id'];
    $db = Database::getDb();
    $c = new Product();
    $ratingAdd = $c->RatingAdd($_SESSION['id'], $product_id, $_GET['star'], $db);
}
?>

<?php
$page_title = "Details Product";
include dirname( __FILE__) . "../../header.php";
 ?>

<div class="content details-product">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="img-wrapper">
                    <?php echo "<img class='img-responsive' alt='product image' src=" . $product->img_path . ">" ?>

                    <a class="button" href="#">Get it</a>
<!-- ====================== Add to Favorites; Artem ====================== -->
                    <?php if(isset($_SESSION['username'])){ ?>
                    <form action="" method="get">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="submit" name="addToFavorites" value="Add to Favourites" class="button-fav" />
                    </form>
                    <?php } ?>
<!-- ====================== Reting system; Artem ====================== -->
                    <div class="currentRating"><?php echo $rating['avg_rating']; ?></div>
                    <?php if(isset($_SESSION['username'])){ ?>
                    <form action="" method="get">
                        <fieldset class="ratings">
                            <legend>Please rate</legend>
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                            <input type="radio" name="star" id="rating1" value="1"><label for="rating1"><i class="fas fa-star"></i></i></label>
                            <input type="radio" name="star" id="rating2" value="2"><label for="rating2"><i class="fas fa-star"></i></i></label>
                            <input type="radio" name="star" id="rating3" value="3"><label for="rating3"><i class="fas fa-star"></i></i></label>
                            <input type="radio" name="star" id="rating4" value="5"><label for="rating4"><i class="fas fa-star"></i></i></label>
                            <input type="radio" name="star" id="rating5" value="5"><label for="rating5"><i class="fas fa-star"></i></i></label>
                            <input type="submit" name="addToRating" value="Add to Rating" class="addToRating-button" />
                        </fieldset>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="product-title"><?php echo $product->name?></h2>
                <p class="author-label">Author:</p>
                <!-- <a class="author nlink" href="#">Nick Vakulov</a> -->
                <?php echo "<a class='dib' href=../login-register/userProfile>" . $product->fname ." ". $product->lname . "</a>" ?> 
                <p class="category-label">Category:</p>
                <a class="category nlink" href="../SearchCategory/searchResult.php?id=<?php echo $product->category_id ?>"><?php echo  $product->title?></a> <!-- Artem; Search by Category feature -->
                <p><?php echo $product->description?></p>
            </div>
        </div>
    </div>
    <!-- <div class="container-fluid">
        <h3 class="d-deals">Daily deals</h3>
        <div class="row">
            <div class="col-md-4">
                <img src="../img/baking.jpg" alt="" class="img-responsive">
                <h3 class="daily-title">Lorem ipsum.</h3>
                <p class="daily-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, laboriosam.</p>
            </div>
            <div class="col-md-4">
                <img src="../img/baking.jpg" alt="" class="img-responsive">
                <h3 class="daily-title">Lorem ipsum.</h3>
                <p class="daily-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, similique!</p>
            </div>
            <div class="col-md-4">
                <img src="../img/baking.jpg" alt="" class="img-responsive">
                <h3 class="daily-title">Lorem ipsum.</h3>
                <p class="daily-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, molestiae.</p>
            </div>
        </div>
    </div> -->
</div>
<div class="container">
<h2>Products you would like...</h2>
                <div class="row">
                    <?php foreach($product as $product){ ?>
                    <div class="col-md-4" title="<?php echo $product->name ?>">
                        <a href="detailsProduct.php?id=<?php echo $product->id ?>">
                            <?php echo $product->name ?>
							
                        </a>
						<p><?php echo $product->description ?></p>
                    </div>

                    <?php } ?>
                </div>
            </div>
<?php
$page_title = "Update Products";
include dirname( __FILE__) . "../../footer.php";
 ?>
