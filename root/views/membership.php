<!-- HEADER -->
<?php include "header.php"; ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
					<div class="member-wrapper">
						<h2> Membership benefits</h2>
						<span class="benefits"> Members receive list of new products they are in interested by email.
							When you sign up for membership for gold level you can select 6 categories, for silver level 4 categories and for Bronze 2 categories you are interested
							in and when there are new posts on these categories we will email you the list of the new products & services.
						</span><br><br>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Level</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Gold</td>
									<td>$8 per month</td>
								</tr>
								<tr>
									<td>Silver</td>
									<td>$4 per month</td>
								</tr>
								<tr>
									<td>Bronze</td>
									<td>$2 per month</td>
								</tr>
							</tbody>
						</table>
						<div>
							<h2> Sign up </h2>
							<form action="#" method="POST" id="member-Signup-form">

								<select id="select_membership" name="level">
									<option  value="gold">Gold</option>
									<option  value="silver">Silver</option>
									<option  value="bronze">Bronze</option>

								</select><br><br>

								<input type="button" id="membership_button" value="Continue to payments" onclick="document.location='paypal.php'" />

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- FOOTER -->
<?php include "footer.php"; ?>
    