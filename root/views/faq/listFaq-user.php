<?php
$page_title = "FAQ";
include "../../views/header.php"; 
require_once '../../model/Database.php';
require_once '../../model/Faq.php';


$dbcon = Database::getDb();
$t = new Faq();
$myfaq =  $t->getAllFaq(Database::getDb());
?>
<h1 id='headTitle'>Frequently Asked Questions</h1>
<div class='container'>
<?php foreach($myfaq as $faqs){?>
	
	<div id="mainContain"><!--MAIN CONTENT CONTAINER-->

	<div class="panelContainer"><!-- 1ST PANEL-->
    <?php echo "<h2>"  . $faqs->faq_question  .  "</h2> ". "<p class='list-group-item'>".$faqs->faq_answer . "</p>";
}
?>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready( function() {
	$('.list-group-item').hide();
	$('h2').click(function(){
		//$(this).previous('p').fadeToggle(2000);
		$('p').hide(3000);
		$(this).next('p').slideToggle(3000);
	});
	$('p').hover( 
		function(){$(this).css({'background':'white','color':'black'});},
		function(){$(this).css({'background':'black','color':'white'});}
		);

});
</script>