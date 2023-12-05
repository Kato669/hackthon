<?php
   include("constants.php");
   $id = $_GET['id'];
?>
<style>
    .error, .error1{
        color: red;
        font-size: 1rem;
        text-transform: capitalize;
        transition: all 1s;
        transform: translateY(-200px);
    }
    .error.active, .error1.active{
        transform: translateY(0px);
    }
</style>
<div class="container mt-4">
    <div class="row">
        <span class="error" id="error">
            password don't match
        </span>
        <span class="error1" id="error1">
            password don't exist
        </span>
        <form action="" method="post">
           <div class="col-6">
                <div class="mb-3">
                    <label for="Current_password" class="form-label">Current Password:</label>
                    <input type="password" class="form-control shadow-none password" id="Current_password" placeholder="Enter current password" name="current_password" required>
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password:</label>
                    <input type="password" class="form-control shadow-none password" id="new_password" placeholder="Enter new password" name="new_password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">confirm Password:</label>
                    <input type="password" class="form-control shadow-none password" id="confirm_password" placeholder="Confirm password" name="confirm_password" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="showpass">
                    <label class="form-check-label" for="showpass">
                        Show password
                    </label>
                </div>
                <div class="col-auto">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button type="submit" name="submit" class="btn btn-primary shadow-none mb-3">Change Password</button>
                </div>
           </div>
        </form>
    </div>
</div>

<?php
    if(isset($_POST["submit"])){
        $id1 = $_POST["id"];
        $current_password = md5($_POST["current_password"]);
        $new_password = md5($_POST["new_password"]);
        $confirm_password = md5($_POST["confirm_password"]);

        $pass = "select * from tbl_admin where id = $id1 and password = '$current_password'";
        //execute the query
        $sql = mysqli_query($conn, $pass);
        // var_dump($sql);
        // die();
        //count rows
        $row = mysqli_num_rows($sql);
        if($row == 1){
            if($new_password != $confirm_password){
                echo "<script>
                    let error =document.getElementById('error');
                    error.classList.add('active');
                </script>";
            }else{
                $update = "update tbl_admin SET
                    password = '$new_password'
                    where
                    id = '$id'
                ";
                $execute1 =  mysqli_query($conn, $update);
                if($execute1 == true){
                    $_SESSION['password_changed'] = 'password changed successfully';
                    header('Location: admins.php');
                }else{
                   
                }
            }
        }else{
            // echo "hello world";
            echo "
            <script>
                let error1 =document.getElementById('error1');
                error1.classList.add('active');
            </script>
            ";
        }
    }

?>

<script>
    let showpass = document.getElementById('showpass')
    let passwords =document.querySelectorAll('.password');
    passwords.forEach((pass)=>{
        showpass.addEventListener('click',()=>{
            if(showpass.checked){
                pass.type = 'text';
            }else{
                pass.type = 'password';
            }
        })
    })

</script>