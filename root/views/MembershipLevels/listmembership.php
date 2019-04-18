


<?php
require_once '../../model/Database.php';
require_once '../../model/membership.php';

include '../header.php';

$dbcon = Database::getDb();
$s = new Member();
$mymember =  $s->getAllMembers(Database::getDb());
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_refer_list_wrapper">
					<h1>List of Membership Types</h1>
<?php
foreach($mymember as $member){
    echo "<li><a href='membershipDetail.php?id=$member->id'>" .  $member->title  . "</a>".
        "<form action='updatemembership.php' method='post'>" .
        "<input type='hidden' value='$member->id' name='id' />".
        "<input type='submit' value='Update' name='update' />".
        "</form>" .
        "<form action='deletemembership.php' method='post'>" .
        "<input type='hidden' value='$member->id' name='id' />".
        "<input type='submit' value='Delete' name='delete' />".
        "</form>" .
        "</li>";
}




// close table>

echo "</table>";

?>

<p><a href="addmembership.php">Add a new record</a></p>

				</div>
			</DIV>			
		</div>
	</div>
</div>

<?php include "../footer.php"; ?>


