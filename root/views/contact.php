<!-- HEADER -->
<?php include "header.php"; ?>
<main id="artem_main">
    <div id="a_wrapper">
        <section id="a_contact">
            <div>
                <h2>Contact Us</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Email</p>
                            <p>support@trade.com</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p>Phone</p>
                            <p>+1 (647) 111-2233</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="a_contact_form" class="container">
            <form action="#" method="post" name="contact_form" id="a_form">
                <label for="fname">First Name <span class="red">*</span></label>
                <input type="text" id="fname" name="firstname" placeholder="First name...">

                <label for="lname">Last Name <span class="red">*</span></label>
                <input type="text" id="lname" name="lastname" placeholder="Last name...">

                <label for="phone">Phone <span class="red">*</span></label>
                <input type="text" id="phone" name="phone" placeholder="Phone...">

                <label for="city">City</label>
                <input type="text" id="city" name="city" placeholder="City...">

                <laber>Gender</laber><br><br>
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female
                <input type="radio" name="gender" value="other"> Other<br><br>

                <laber for="category">Category</laber>
                <select id="category">
                    <option value="volvo">Select</option>
                    <option value="saab">Sport</option>
                    <option value="mercedes">Cars</option>
                    <option value="audi">Phones</option>
                    <option value="audi">Other</option>
                </select>

                <label for="message">Message/Question <span class="red">*</span></label>
                <textarea id="message" name="Message" placeholder="Your massage..." style="height:200px"></textarea>

                <input type="submit" value="Send" name="submit" />
                <input type="reset" value="Reset" name="reset" />
            </form>
            <div id="thanks_msg">
                <h2>Thank you <span id="customerName"></span> for contacting us!</h2>
            </div>
        </div>
    </div>
</main>
<!-- FOOTER -->
<?php include "footer.php"; ?>
