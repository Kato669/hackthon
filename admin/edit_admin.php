<?php
    include("constants.php");
    $id = $_GET['id'];

    $select = "select * from tbl_admin where id = $id";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['fullname'];
    $username = $row['username'];
    
?>
<div class="container mt-4">
    <div class="row">
        <div class="col-5">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Enter Fullname</label>
                    <input type="text" class="form-control shadow-none" id="fullname" name="fullname" value="<?php echo $fullname ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Enter Username</label>
                    <input type="text" class="form-control shadow-none" id="username" name="username" value="<?php echo $username ?>">
                </div>
                <div class="mb-3">
                    
                    <input type="hidden" class="form-control shadow-none" value="<?php echo $id ?>" name="id">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary btn-outline">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
 if (isset($_POST['submit'])) {
    $id1 = $_POST['id'];
    $name = $_POST['fullname'];
    $user = $_POST['username'];

    $insert = "Update tbl_admin SET
        fullname = '$name',
        username = '$user'
        WHERE
        id = '$id1'
    ";
    $execute = mysqli_query($conn, $insert);
    if($execute == true) {
        header("LOCATION: admins.php");
    }
 }

?>