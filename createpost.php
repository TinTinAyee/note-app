<?php require("database.php")?>

<?php 

    $titleError = '';
    $descError = '';
    
    if(isset($_POST['create-post'])){
        $title = $_POST['title'];
        $desc =  $_POST['description'];
        $user_id = $_SESSION['user']['id'];
        
        if(empty($title)){
            $titleError = "The title field is required";
        }
        
        if(empty($desc)){
            $descError = "The description field is required";
        }

        if(strlen($title)>0 && strlen($desc)>0){
            
            $query = sprintf(
                "INSERT INTO notes (title,description,user_id) VALUES ('%s','%s','%s')",
                mysqli_real_escape_string($conn, $title),
                mysqli_real_escape_string($conn, $desc),
                mysqli_real_escape_string($conn, $user_id),

            );
            
            $result = mysqli_query($conn, $query);
            
            if(!$result){
                echo "Create error found!";
            }else{
                header("location:/notes");
                exit();
            }
        }else{
            // echo "Need to fill....";
        }
    }
?>

<?php require("header.view.php")?>
<?php require("nav.view.php")?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Post Create</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="/notes" class="btn btn-secondary float-end">
                                << BACK</a>
                        </div>
                    </div>
                </div>

                <form action="" method="POST">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text"
                                class="form-control <?php if(!empty($titleError)):?> is-invalid<?php endif ;?>"
                                name="title" value="<?php $title ; ?>" placeholder="Enter post title">
                            <span class="text-danger">
                                <?php echo $titleError ?>
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" value="<?php $desc?>" id="" cols="30" rows="10"
                                class="form-control <?php if(!empty($titleError)):?> is-invalid<?php endif ;?>"
                                placeholder="Description...."></textarea>
                            <span class="text-danger">
                                <?php echo $descError ?>
                            </span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="create-post" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require("footer.view.php")?>