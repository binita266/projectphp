<!DOCTYPE html>
<html lang="en">
<h1> Membership Levels </h1>

<?php
require_once '../model/Database.php';
require_once '../model/membership.php';

$dbcon = Database::getDb();
$s = new Member();
$mymember =  $s->getAllMembers(Database::getDb());




foreach($mymember as $member){
    echo "<li><a href='memberDetail.php?id=$member->id'>" .  $member->title  . "</a>".
        "<form action='updatemember.php' method='post'>" .
        "<input type='hidden' value='$member->id' name='id' />".
        "<input type='submit' value='Update' name='update' />".
        "</form>" .
        "<form action='deletemember.php' method='post'>" .
        "<input type='hidden' value='$member->id' name='id' />".
        "<input type='submit' value='Delete' name='delete' />".
        "</form>" .
        "</li>";
}




// close table>

echo "</table>";

?>

<p><a href="addmembership.php">Add a new record</a></p>



</body>

</html>