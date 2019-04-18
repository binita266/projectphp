<?php
$page_title = "Favorites";
session_start();

include "../../views/header.php";
require_once '../../model/Database.php';
require_once '../../model/Product.php';

if(!isset($_SESSION['username'])){
    header("Location: ../login-register/login.php");
    die();
}
$dbcon = Database::getDb();

$p = new Product();
$myfavorites = $p->FavoritesList($_SESSION['id'], $dbcon);
// var_dump($myfavorites);

// To delete from favorites
if(isset($_POST['deleteFavorites'])){

    $id= $_POST['id'];
    $dbcon = Database::getDb();
    $c = new Product();
    $count = $c->FavoritesDelete($id, $dbcon);

    if($count){
       header("Location: listFavorites.php");
    }
}

?>
<!--Content-->
<main id="an_main_Favorites">
    <div id="wrapper">
        <h2>Favorites</h2>
        <div class="container">
         <!-- <div class="row"> -->
               <?php 
                 foreach($myfavorites as $fav){
                    echo "<div><h3>" . $fav["name"] . "</h3>";
                    echo "<p>" . $fav["description"] . "</p></div>";
                    ?>
                    <form action='' method='post'>
                        <input type='hidden' value='<?php echo $fav['fid'];  ?>' name='id' />
                        <input type='submit' value='Delete' name='deleteFavorites' class="btn btn-danger" />
                    </form>
                    <?php
                }   
             ?>
            <!-- </div> -->
        </div>
    </div>
</main>
<!-- ============ Footer ============ -->
<?php include "../../views/footer.php"; ?>
