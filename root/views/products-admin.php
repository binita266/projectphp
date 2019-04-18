<!-- HEADER -->
<?php include "header.php"; ?>
<div class="content">
    <div class="container">
        <h2 class="title-page">Add new product</h2>
        <div class="row">
            <div class="col-12">
                <form action="products-admin.php" method="post" id="nProduct">
                    <label for="pName">Product name: </label>
                    <br>
                    <input type="text" id="pName" name="pName">
                    <br>
                    <label for="category">Category: </label>
                    <br>
                    <select name="category" id="category">
                        <option value="baking">Baking</option>
                        <option value="shoes">Shoes</option>
                        <option value="clothing">Clothing</option>
                        <option value="jewelry">Jewelry</option>
                    </select>
                    <br>
                    <label for="pImage">Image: </label>
                    <br>
                    <input type="file">
                    <br>
                    <label for="pDescr">Description</label>
                    <br>
                    <textarea name="pDescr" id="pDescr" cols="30" rows="10"></textarea>
                    <br>
                    <button type="submit" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include "footer.php"; ?>
