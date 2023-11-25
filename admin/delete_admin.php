<?php include('constants.php') ?>
<?php
    $id = $_GET['id'];
    
    $delete = "delete from tbl_admin where id=$id";
    #execute the querry
    $execute = mysqli_query($conn, $delete);
    if($execute) {
        $_SESSION['delete'] = 'Admin deleted successfully';
        header('Location: admins.php');
    }

?>