<!-- 
Author:    Artem Nahornyi; n01261269;
Feature:   Search by Category
-->
<?php 

class Category
{
    public function getCategoryById($id, $db){
        $sql = "SELECT * FROM categories WHERE id = :id ";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $result =  $pst->fetch(PDO::FETCH_OBJ);
        return $result;
    } // end getCategoryById
    
    public function getAllCategories($dbcon){
        $sql = "SELECT * FROM categories";
        $pdostm = $dbcon->prepare($sql); // prepare
        $pdostm->execute(); // execute
        $result = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } // end getAllCategories function
    
    public function addCategory($title, $description, $img_path, $db){
        $sql = "INSERT INTO categories (title, description, img_path)
                VALUES (:title, :description, :img_path)";
        $pcat = $db->prepare($sql); // prepare
        $pcat->bindParam(':title', $title);
        $pcat->bindParam(':description', $description);
        $pcat->bindParam(':img_path', $img_path);
        $result = $pcat->execute(); // execute
        return $result;
    } // end addNewCategory function
    
    public function updateCategory($id, $title, $description, $db){
        $sql = "UPDATE categories
                SET title = :title,
                description = :description
                WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':title', $title);
        $pst->bindParam(':description', $description);
        $result = $pst->execute();
        return $result;
    } // end updateCAtegory
    
    public function deleteCategory($id, $db){
        $sql = "DELETE FROM categories WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $result = $pst->execute();
        return $result;
    }
    // JOIN images ON products.id = images.product_id
    public function getResults($id, $dbcon){
        $sql = "SELECT p.id AS id, p.name AS name, p.description AS description, p.category_id AS category_id, p.user_id AS user_id, i.img_path AS img_path, i.product_id AS product_id
            FROM products AS p 
            JOIN images AS i 
            ON p.id = i.product_id 
            WHERE p.category_id = :id";
        $pdostm = $dbcon->prepare($sql); // prepare
        $pdostm->bindParam(':id', $id);
        $pdostm->execute(); // execute
        $result = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }


    
    
} // end Category class