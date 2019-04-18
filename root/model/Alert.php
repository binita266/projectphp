<?php 
class Alert
{
   public function addAlert($db, $title, $content)
    {
        $sql = "INSERT INTO alerts (title,content) 
                VALUES (:title, :content) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':title', $title);
        $pst->bindParam(':content', $content);

        $alert = $pst->execute();

        return $alert;
    }
}
 ?>


  