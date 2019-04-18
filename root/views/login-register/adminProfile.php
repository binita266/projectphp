<?php



session_start();
if($_SESSION['username'] == "admin"){

    

    

}else{
  header("Location: login.php");
}

?>
<h2>This is Admin profile</h2>

<a href='../SearchCategory/listCategoriesAdmin.php' class='btn btn-danger'>List Categories Admin</a><br/>
<a href='../deal/listAllDeals.php' class='btn btn-danger'>list of deals </a><br/>
<a href='listAllUsers.php' class='btn btn-danger'>list of users</a><br/>
<a href='../feedback/listAllFeedbacks.php' class='btn btn-danger'>list of feedbacks</a><br/>
<a href='logout.php' class='btn btn-danger'>logout</a><br/>
<a href="../alerts/addAlert">Alert</a>