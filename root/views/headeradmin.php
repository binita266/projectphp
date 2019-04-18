<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <title>Admin</title>
</head>


  <!-- HEADER -->
  <header id="main-header" class="bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
            <i class="fas fa-cog"></i> Admin Dashboard</h1>
        </div>
      </div>
    </div>
  </header>
  
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
  </nav>


  <!-- ACTIONS -->
  <ul class="nav nav-tabs">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">FAQ</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../../views/faq/addFaq.php">Add FAQ</a>
        <a class="dropdown-item" href="../../views/faq/listfaqs.php">List FAQS</a>
    </li>
	
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Contact Forms</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../../root/views/faq/addFaq.php">List Forms</a>
    </li>
	
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">FAQ</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../../root/views/faq/addFaq.php">Add FAQ</a>
        <a class="dropdown-item" href="../../views/faq/listfaqs.php">List FAQS</a>
    </li>
	
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">FAQ</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="../../root/views/faq/addFaq.php">Add FAQ</a>
        <a class="dropdown-item" href="../../views/faq/listfaqs.php">List FAQS</a>
    </li>
   </ul>
 
