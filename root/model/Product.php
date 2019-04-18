<?php

class Product
{
    public function getAllProducts($id, $dbcon){
        $sql = "SELECT * FROM products WHERE user_id = :id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();

        $product = $pst->fetchAll(PDO::FETCH_OBJ);
        return $product;
    }

    public function addProduct($db, $name, $description, $category_id, $img, $user_id)
    {
        $sql = "INSERT INTO products (name,description, category_id, user_id) 
                VALUES (:name, :description, :category_id, :user_id) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':description', $description);
        $pst->bindParam(':category_id', $category_id);
        $pst->bindParam(':user_id', $user_id);
        $count = $pst->execute();
        $pid = $db->lastInsertId();

        $sql = "INSERT INTO images (img_path, client_id, product_id) 
                VALUES (:img_path, :client_id, :pid) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':img_path', $img);
        $pst->bindParam(':client_id', $user_id);
        $pst->bindParam(':pid', $pid);
        $count = $pst->execute();

        return $count;
    }
    public function getCategories($db){
        $query = "SELECT DISTINCT id, title FROM categories";
        $pdostm = $db->prepare($query);
        $pdostm->execute();

        //fetch all result
        $results = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    public function deleteProduct($id, $db){
        // Artem
        $sql = "DELETE  FROM favorites WHERE product_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        $sql = "DELETE  FROM daily_deals WHERE product_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        $sql = "DELETE FROM images WHERE product_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

        $sql = "DELETE FROM products WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();

         //add here
        return $count;
    }

      public function getProductById($id, $db){
        $sql = "SELECT p.id, p.name, p.description,p.category_id, p.user_id, c.title, i.img_path, u.fname, u.lname  FROM products AS p 
            JOIN categories AS c ON p.category_id = c.id 
            JOIN images AS i ON p.id = i.product_id
            JOIN users AS u ON p.user_id = u.id
            WHERE p.id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();

        $product =  $pst->fetch(PDO::FETCH_OBJ);

        return $product;
    }

    public function updateProduct($id, $name, $description, $category_id, $img, $user_id, $db){
        $sql = "UPDATE products
                SET name = :name,
                description = :description,
                category_id = :category_id,
                user_id = :user_id
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':description', $description);
        $pst->bindParam(':category_id', $category_id);
        $pst->bindParam(':user_id', $user_id);

        $count = $pst->execute();
        //image update-------------------------------
        $sql = "UPDATE images
                SET img_path = :img
                WHERE product_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':img', $img);
        $pst->bindParam(':id', $id);
        
        
        $count = $pst->execute();
        //-------------------------------------------
        

        return $count;
    }
    
// ===================== Favorites; Artem ========================
    // Add to Favorites
    public function FavoritesAdd ($user_id, $product_id, $db) {
        $sql = "INSERT INTO favorites (user_id, product_id)
                VALUES (:user_id, :product_id)";
        $pcat = $db->prepare($sql); // prepare
        //$pcat->bindParam(':id', $id);
        $pcat->bindParam(':user_id', $user_id);
        $pcat->bindParam(':product_id', $product_id);
        $result = $pcat->execute(); // execute
        echo "Item added!";
        return $result;
    }
    // Delete
    public function FavoritesDelete ($id, $db) {
        $sql = "DELETE FROM favorites WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $result = $pst->execute();
        return $result;
    }
    // List
    function FavoritesList ($user_id, $db) {
        $sql = "SELECT f.id as fid, name, description FROM favorites f
                         JOIN products p
                         ON f.product_id = p.id
                         WHERE f.user_id = :user_id";
        $pcat = $db->prepare($sql);
        $pcat->bindParam(':user_id', $user_id);
        $result = $pcat->execute();
        $result = $pcat->fetchAll();
        return $result;
    }
// ===================== Rating; Artem ========================
    // List
    function RatingList ($product_id, $dbcon) {
        $sql = "SELECT round(avg(rating),1) as avg_rating FROM ratings WHERE product_id = :product_id";
        $pcat = $dbcon->prepare($sql);

        $pcat->bindParam(':product_id', $product_id);

        $result = $pcat->execute();
        $result = $pcat->fetch();
        return $result;
    }
    // Add
    function RatingAdd ($user_id, $product_id, $rating, $db) {
        $sql = "INSERT INTO ratings (user_id, product_id, rating) VALUES (:user_id, :product_id, :rating)";
        $pcat = $db->prepare($sql); // prepare

        $pcat->bindParam(':user_id', $user_id);
        $pcat->bindParam(':product_id', $product_id);
        $pcat->bindParam(':rating', $rating);

        $result = $pcat->execute(); // execute
        echo "Rating added!";
        return $result;
    }
    // Update
    public function RatingUpdate($id, $rating, $product_id, $user_id, $db){
        $sql = "UPDATE ratings
                SET rating = :rating,
                    product_id = :product_id,
                    user_id = :user_id
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':rating', $rating);
        $pst->bindParam(':product_id', $image_id);
        $pst->bindParam(':user_id', $user_id);

        $result = $pst->execute();
        return $result;
    }
		// related products
	 public function getRandomProducts($dbcon){


        $sql = "SELECT * FROM products ORDER BY RAND()
LIMIT 3";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $product = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $product;
    }
    
    
}