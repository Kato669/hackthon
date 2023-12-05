<?php include('../partials/constants.php') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .error {
        color: red;
        padding: 10px 20px;
        font-size: 1.1rem;
        text-transform: capitalize;
        transform: translateY(-200px);
        position: absolute;
        transition: 2s;
    }

    .error.active {
        transform: translateY(0px);
    }
</style>
<span class="error" id="error">Incorrect login</span>
<div class="container mt-5">
    <div class="row">
        <div class="text-center text-capitalize color-primary fw-bold fs-3">login to proceed</div>
    </div>
</div>
<div class="container mt-3">
    <div class="row d-flex justify-content-center align-items-center border py-5 shadow">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Enter Username</label>
                    <input type="text" class="form-control shadow-none" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Enter password</label>
                    <input type="password" class="form-control shadow-none" id="password" name="password" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input shadow-none" type="checkbox" value="" id="show">
                    <label class="form-check-label" for="show">
                        Show password
                    </label>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-outline">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    let show =document.getElementById('show');
    let password =document.getElementById('password');

    show.addEventListener('click',(e)=>{
        if(show.checked){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
    })

</script>



<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $select = "select * from tbl_admin where username = '$username' and password = '$password' ";
    $result = mysqli_query($conn, $select);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        header("Location: dashboard.php");
        $_SESSION['user'] = $username;
    } else {
        echo "
            <script>
                let error = document.getElementById('error');
                error.classList.add('active');
                 setTimeout(()=> error.remove(), 2500);
            </script>";
    }
}
?>