
<!-- HEADER -->
<?php include "header.php"; ?>
	<div class="container-contact100">
	

		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(../img/bg-01.jpg);">
				<span class="contact100-form-title-1">
					Feedback
				</span>

			</div>

			<form class="contact100-form validate-form" method="POST"  id="feedback-form" action="#">
				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Title:</span>
					<input class="input100" type="text" name="Title" placeholder="Enter a title">
					<span class="focus-input100"></span>
				</div>

			

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message:</span>
					<textarea class="input100" name="message" placeholder="Your Feedback"></textarea>
					
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>

	<script src="js/main.js"></script>
<!-- FOOTER -->
<?php include "footer.php"; ?>
