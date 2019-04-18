<?php
require_once '../../model/Database.php';

/*based on search input searches in products table and displays the results.  
if no entry and click submit - you must enter your search message appears
if canot find the search item in database = there was no search results message appears.
if finds the search item - displays all items
issue: it doesn't find some items that are in the database ex. Audi & iphone are in name column in database but cannot find them, and doesn't display any message.

*/


$output  = "";

//collect posting of the script
if(isset($_POST['search'])) {
	if(!empty($_POST["search"]))
	{
		$searchq = $_POST['search'];
		//preg_replace items we want to allow goes inside #[]#, the i after # upper case or lower letter, anything that is not in #[]# replace it with "" blank
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq); //remove everything that is not numbers & letters and repplaces it with blank
		$db = Database::getDb();
		
		
		
		$res = $db->query("SELECT * FROM products WHERE name LIKE '%$searchq%' OR description LIKE '%$searchq%'");
		//var_dump($res);
		
		
		
		$count = $res->fetchColumn();
		//var_dump($count);
		
		
		if($count == 0) {
			$output = "There was no search results!";
		}
		else
		{
			//this is where we collect everything in the row
			while ($row = $res->fetch(PDO::FETCH_ASSOC))  {
			
			
				$name = $row['name'];
				$desc = $row['description'];
				$catid = $row['category_id'];
				
				
				
				$output .= '<div> '.$name.' ' . ' ' .' ' . $desc .'</div>';  //.= to concatinate every out put
				
			}	
		
		}
	}else{
		$output= "you must enter your search";
	}
}




?>
<!DOCTYPE html>
<head>
	<title> SEARCH</title>
</head>
<body>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak-membership_wrapper">

					<form action="search.php" method = "post">
						<h2> Search </h2>
						
						<input type="text" class="ak_inputfield" name="search" placeholder="Search for products ..."/>	
						<input type="submit"  value=">>" />							 
						 
					</form>		
				</div>
			</div>
		</div>
	</div>

</div>
<?php print ("$output"); ?> <!--prints the output concatinated and stored in the output variable-->
</body>
</html>




<!--For example... Just like this? TO SEARCH MULTIPLE TABLES
$sql= mysql_query("SELECT wname, url, title, keywords, description, city, country, category FROM directory
 WHERE city LIKE '%$search%' ¦¦ wname LIKE '%$search%' ¦¦ title LIKE '%$search%' ¦¦ keywords LIKE '%$search%'
 ¦¦ description LIKE '%$search%' ¦¦ country LIKE '%$search%' ¦¦ category LIKE '%$search%' ¦¦ url LIKE '%$search%' JOIN SELECT * FROM list WHERE city LIKE '%$search%'", $db);
 -->