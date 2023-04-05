<?php

require("database.php");

if($_SERVER['REQUEST_METHOD'] === "POST"){

    $id = $_POST['id'];
    
    $query = "DELETE FROM notes WHERE id = $id";

    $result = mysqli_query($conn,$query);

    if($result){
        header("location:/notes");
        exit();
    }else{
    echo "error";
    }

}