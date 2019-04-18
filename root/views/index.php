<?php
session_start();
$page_title = "NovaEx";
include "../views/header.php";


?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <form action="#" method="POST" id="search-form">
                    <h1 class="siteNameBig"><span class="siteNameColor">N</span>ovaEx</h1>
                    <div class="row justify-content-center">
                        <form action="#" method="post">
                            <input type="search" id="search-bar" class="form-control">
                            <button type="submit" id="srch-btn"><i class='fas fa-search' ></i></button>
                        </form>
                    </div>
                    <br>
                    <a href="SearchCategory/listcategories.php" class="cat-btn">Search by Сategory</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER -->
<?php include "../views/footer.php"; ?>
