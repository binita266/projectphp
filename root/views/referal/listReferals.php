<?php
session_start();

require_once '../../model/Database.php';
require_once '../../model/referal.php';

 include '../header.php';

$dbcon = Database::getDb();
$s = new Referal();
$myref =  $s->getAllReferals(Database::getDb());
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
				<div id="ak_refer_list_wrapper">
<?php
foreach($myref as $referal){
	
    echo "<li><a href='referalDetail.php?id=$referal->id'>" .  $referal->friend_name  . "</a>".
        "<form action='updateReferal.php' method='post'>" .
        "<input type='hidden' value='$referal->id' name='id' />".
        "<input type='submit' value='Update' name='update' />".
        "</form>" .
        "<form action='deleteReferal.php' method='post'>" .
        "<input type='hidden' value='$referal->id' name='id' />".
        "<input type='submit' value='Delete' name='delete' />".
        "</form>" .
        "</li>";
}
?>
				</div>
			</DIV>			
		</div>
	</div>
</div>
<?php include "../footer.php"; ?>
















