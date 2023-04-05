<?php 

require("database.php");

$id = $_GET['id'];
$query = "DELETE FROM todos WHERE id = $id";

if(mysqli_query($conn,$query)){
    header('location:/todo');
}else{
    echo "delete fail !!!";
}

?>