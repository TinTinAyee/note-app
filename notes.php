<?php 
    // require('functions.php');
    require('database.php');
    
    $result = mysqli_query($conn,"SELECT * FROM notes");

    if(!$result){
        die("error");
    }

?>

<?php require("nav.view.php")?>
<?php require("header.view.php")?>

<?php while( $row = mysqli_fetch_assoc($result)): // pd($row); ?>

<div class="container">
    <div class="row mt-4">
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <a class="text-decoration-none" href="note?id=<?= $row['id']?>"><?= $row['title'] ?> </a>
                    </h5>
                    <p class="card-text">
                        <?= substr(htmlentities($row['description']), 0, 200).'...' ?>
                        <a class="text-decoration-none d-block py-1" href="note?id=<?= $row['id']?>">More >>></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endwhile; ?>

<?php require ("footer.view.php");?>