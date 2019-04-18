<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale =1">
    <script src="../../libs/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../libs/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../../libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../css/header-footer.css">
    <link rel="stylesheet" href="../../css/content.css">    <!-- here is conflict with products.css file -->
    <link rel="stylesheet" href="../../css/products.css">  <!-- here is conflict with content.css file -->
    <link rel="stylesheet" href="../../css/product-admin.css">
    <link rel="stylesheet" href="../../css/contact.css">
	<link rel="stylesheet" href="../../css/referal.css">
	<link rel="stylesheet" href="../../css/membership.css">
    <link rel="stylesheet" href="../../css/feedback.css"><!--rohit modified his feature css-->
    <link rel="stylesheet" href="../../css/register.css"><!--rohit modified his feature css-->
    <link rel="stylesheet" href="../../css/login.css"><!--rohit modified his feature css-->
    <link rel="stylesheet" href="../../css/search-category.css">
    <link rel="stylesheet" href="../../css/location.css">
</head>

<body>
    <header id="header">
        <div class="logo-wrapper">
            <a href="../../views/index.php">
                <h2 class="siteName"><span class="siteNameColor">N</span>ovaEx</h2>
            </a>
        </div>
        
        <nav id="main-menu">
            <ul>
                <li><a href="../../views/Locations/location.php"><i class='fas fa-map-marker-alt'></i>Locations</a></li>

                <li><a href="../../views/CRUD-products/listProducts.php"><i class="fas fa-shopping-bag"></i>Products</a></li>

                <li><a href="#"><i class="fab fa-centos"></i>Premium</a></li>

                <li><a href="../../views/CRUD-products/listFavorites.php"><i class="far fa-star"></i>Favorites</a></li>

                <li><a href="../../views/ContactForm/addContactForm.php"><i class="far fa-address-book"></i>Contact</a></li>

				 <li><a href="../../views/faq/listFaq-user.php"><i class="far fa-question-circle"></i>FAQ</a></li>
				
                <li><a href="../../views/login-register/login.php"><i class="fas fa-user"></i>SignIn</a></li>
            </ul>
        </nav>
        <div class="hamburger-wrapper">
            <div class="hamburger"></div>
        </div>
        <nav class="mobile-menu">
            <ul>
                <li><a href="#"><i class='fas fa-map-marker-alt'></i>Delivery Address</a></li>

                <li><a href="../../views/CRUD-products/listProducts.php"><i class="fas fa-shopping-bag"></i>Products</a></li>

                <li><a href="#"><i class="fab fa-centos"></i>Premium</a></li>

                <li><a href="../../views/CRUD-products/listFavorites.php"><i class="far fa-star"></i>Favorites</a></li>

                <li><a href="../../views/ContactForm/addContactForm.php"><i class="far fa-address-book"></i>Contact</a></li>

				<li><a href="../../views/faq/listFaq-user.php"><i class="far fa-question-circle"></i>FAQ</a></li>
				
                <li><a href="../../views/login-register/login.php"><i class="fas fa-user"></i>SignIn</a></li>
            </ul>
        </nav>
        
    </header>