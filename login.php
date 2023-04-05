<?php

require('database.php');

if (isset($_SESSION['user'])) {
    header('location: /');
    exit();
}

$errors = [];
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ((strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL)) && strlen($password) > 0){
        
        $query = sprintf(
            "SELECT * FROM users WHERE email = '%s'",
            mysqli_real_escape_string($conn, $email)
        );

        //dd($query);
        $result = mysqli_query($conn, $query);

        if (!$result) {
            $errors['body'] = "Errors when select the data.";
        }else {
            $row = mysqli_fetch_assoc($result);
            
            if (!empty($row)) {
                if (password_verify($password,$row['password'])) {
                    // todo::to handel later
                    login([
                        'id' => $row['id'],
                        'email' => $email
                    ]);
                    header('location: /');
                    exit();
                } else {
                    $errors['body'] = "Enter valid email and password.!!!!!";
                }
            
            } else {
                $errors['body'] = "Enter valid email and password.";
            }
        }
    } else {
        $errors['body'] = "Enter valid email and password.";
    }
}
?>

<?php require("header.view.php")?>
<?php require("nav.view.php")?>

<div class="container mt-3">
    <form method="POST" action="">
        <div class="mb-3">
            <label for="" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="" aria-describedby="emailHelp"
                placeholder="Eg: example@gmail.com">
            <div id="" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="mt-3">
        <span>If you deson't have account ?</strong>
            <a href="/register" class="text-decoration-none">Sign Up</a>
    </div>

    <?php if(!empty($errors)): ?>
    <div class="text-danger">
        <?= $errors['body'] ?>
    </div>
    <?php endif ?>

</div>

<?php require("footer.view.php")?>