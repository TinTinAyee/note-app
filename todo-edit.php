<?php
require('database.php');

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];
    
    $query = sprintf(
        "UPDATE todos SET item ='%s' WHERE id = %d",
        mysqli_real_escape_string($conn, $item),
        mysqli_real_escape_string($conn, $_GET['id']),
    );

    $result = mysqli_query($conn, $query);

    if (!$result) {
        $errors['body'] = "Error occurred.";
    } else {
       header("location:/todo");
        exit();
    }   
}

//data read todo app

$user_id = $_SESSION['user']['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = sprintf(
        "SELECT * FROM todos WHERE id = %d",
        mysqli_real_escape_string($conn, $_GET['id'])
    );

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
}

?>
<?php require('header.view.php'); ?>
<?php require('nav.view.php'); ?>

<?= $message ?? '' ?>

<?php if ($row) : ?>

<div class="container">
    <form action="/todo/edit?id=<?= $id ?>" method="POST">
        <div class="mb-3">
            <label for="item" class="form-label">Item</label>
            <input type="text" name="item" class="form-control" id="item" required value="<?= $row['item'] ?>">
        </div>

        <?php if (!empty($errors)) : ?>

        <div>
            <?= $errors['body'] ?>
        </div>

        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php else : ?>
Not Found
<?php endif; ?>

<?php require('footer.view.php'); ?>