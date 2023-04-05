<?php

require("database.php");                               

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
}

                            
if(isset($_POST['addBtn'])){
    $items = $_POST['items'];

if(strlen($items)>0){
    $query = "INSERT INTO todos (item) VALUES ('$items')";

    $result = mysqli_query($conn,$query);
    
    if($result){
    }else{
        echo "Insert faile...";
    }
}else{
    echo "<small class='text-danger'>add item require....</small>";
}
}

//show items

$result = mysqli_query($conn,"SELECT *FROM todos"); 

    if(!$result){
        die("error");
    }

?>
<?php require("header.view.php"); ?>
<?php require("nav.view.php"); ?>

<div class="container mt-5">
    <h4 class="text-center mb-3">To Do App</h4>

    <form method="POST" class="row mb-4 pb-2 d-flex">
        <div class="col-9 form-group">
            <input type="text" class="form-control" name="items" placeholder="Enter your task..." />
        </div>
        <div class="col-3 form-group">
            <button type="submit" class="btn btn-primary" name="addBtn">+ Add</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="bg-light">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Items</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                while( $row=mysqli_fetch_assoc($result)): ?>
            <tr>
                <td class="text-center"><?= $row['id'] ?></td>
                <td class="text-center"><?= $row['item'] ?></td>
                <td class="text-center">
                    <a href="todo/edit?id=<?= $row['id'] ?>" name="item" class=" btn btn-success">Edit</a>

                    <a href="todo/delete?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile ;?>
        </tbody>
    </table>
</div>

<?php require("footer.view.php"); ?>