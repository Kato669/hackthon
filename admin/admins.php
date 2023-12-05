<?php include('constants.php') ?>
<style>
    .password_change{
        position: absolute;
        color: green;
        text-transform: capitalize;
        font-size: 1.2rem;
        text-align: center;
        left: 50%;
        transition: all 1s;
        transform: translateY(-2000%);
    }
    .password_change.active{
        transform: translateY(0%);
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

<!-- <link rel="stylesheet" href="../toarst/toastr.min.css"> -->


<div class="container py-4">
    <h2 class="text-center text-capitalize fs-2 color-primary">List of admins</h2>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary text-capitalize" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  add admin
</button>
    
</div>


<h4 class="password_change " id="password_change">
    <?php
        if(isset($_SESSION['password_changed'])){
            echo $_SESSION['password_changed'];
            unset($_SESSION['password_changed']);
        }
    ?>
</h4>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Admin Below</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">Enter Fullname</label>
                <input type="text" class="form-control shadow-none" id="fullname" name="fullname">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Enter Username</label>
                <input type="text" class="form-control shadow-none" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Enter password</label>
                <input type="password" class="form-control shadow-none" id="password" name="password">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary btn-outline">Submit</button>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>











<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">

   
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sn.</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
                $fetch = "select * from tbl_admin";
                #execute the query
                $execute = mysqli_query($conn, $fetch);
                if($execute){
                    $sn = 1;
                    $row = mysqli_num_rows($execute);
                    if($row > 0){
                        while ($data = mysqli_fetch_assoc($execute)) {
                            $id = $data["id"];
                            $name = $data["fullname"];
                            $user = $data["username"];
                            ?>
                                <tr>
                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $user ?></td>
                                    <td>
                                        <a href="edit_admin.php?id=<?php echo $id ?>" class="btn btn-primary btn-small">Edit</a>
                                        <a href="delete_admin.php?id=<?php echo $id ?>" class="btn btn-danger btn-small">Delete</a>
                                        <a href="change_password.php?id=<?php echo $id ?>" class="btn btn-info btn-small">Change Password</a>
                                    </td>

                                </tr>
                            <?php
                        }
                    }
                }

            ?>
        </tbody>
    </table>
     </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


<?php

if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "insert into tbl_admin SET
        fullname = '$fullname',
        username = '$username',
        password = '$password'
    ";
    #execute the query
    $result = mysqli_query($conn, $sql);
    if($result == true) {
        echo '<script>
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-left",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                Command: toastr["success"]("Data Submitted successfully ");
            </script>';
    }else{
        echo "data failed";
    }
};

?>

<script>
    let password_changed =document.getElementById('password_changed');
    window.addEventListener('load',()=>{
        password_changed.classList.toggle('active');
    })
</script>
<!-- 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../toarst/toastr.min.js"></script>
     -->