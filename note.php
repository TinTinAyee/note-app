<?php

require("database.php");
$result = false;
$error =[];
// $id = ($_GET['id']);
$user_id = $_SESSION['user']['id'];

if(isset($_GET['id'])){
    $query = sprintf(
        "SELECT * FROM notes WHERE id= %d",
        mysqli_real_escape_string($conn,($_GET['id']))
    );

    $result = mysqli_query($conn,$query);
    
}

    // if(!$result){
    //     dd($result);
    // }
?>

<?php require ("header.view.php");?>
<?php require ("nav.view.php");?>

<div class="container">
    <div class="row mt-4">

        <?php if(!$result && mysqli_num_rows($result) > 0) :?>
        <h2>404 Not Found.</h2>

        <?php else :?>

        <?php while( $row = mysqli_fetch_assoc($result)): // pd($row); ?>

        <div class="col">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body ">

                    <h5 class="card-title mb-3"><?= $row['title']?></h5>
                    <p class="" card-text><?= htmlentities($row['description']) ?></p>

                    <?php if($_SESSION['user']['id'] === $row['user_id']):?>

                    <div class="d-flex">
                        <a class="text-decoration-none py-3" href="note/edit?id=<?= $row['id']?>">Edit</a>
                        <span class="p-3">|</span>

                        <form action="/note/destroy" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id']?>">
                            <button class="btn btn-link py-3 text-decoration-none text-danger">Delete</button>
                        </form>
                        <span class="p-3">|</span>

                        <a href="/notes" class="text-decoration-none py-3">Back</a>
                    </div>

                    <?php endif?>
                </div>
            </div>
        </div>

        <?php endwhile ;?>
        <?php endif ;?>
    </div>
</div>

<?php require ("footer.view.php");?>