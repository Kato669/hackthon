<?php 
    $id = $_GET['id'];
    include'constants.php';
?>

<style>
    span{
        text-transform: capitalize;
        /* font-weight: 100; */
        padding: 2%;
        font-size: 2rem;
        margin-bottom: 1%;
    }
</style>


<?php
    $select = "select * from hackthon where Id = $id";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($result);
    $image = $row["image"];

    // var_dump($row);
    // exit();
?>


<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6">
            <span>fullname: </span>
        </div>
        <div class="col-lg-6">
           <span><?php echo $row['fullname'] ?></span>
        </div>
        <hr>
        <div class="col-lg-6">
            <span>email: </span>
        </div>
        <div class="col-lg-6">
           <span><?php echo $row['email'] ?></span>
        </div>
        <hr>
        <div class="col-lg-6">
            <span>country: </span>
        </div>
        <div class="col-lg-6">
           <span><?php echo $row['country'] ?></span>
        </div>
        <hr>
        <div class="col-lg-6">
            <span>Participant's experience in tech:</span>
        </div>
        <div class="col-lg-6">
           <span><?php echo $row['tech_experience'] ?></span>
        </div>
        <hr>
        <div class="col-lg-6">
            <span>Participant's area of expertise:</span>
        </div>
        <div class="col-lg-6">
           <span><?php echo $row['area_of_expertise'] ?></span>
        </div>
        <hr>
        <div class="col-lg-6">
            <span>Participant's reason for participation:</span>
        </div>
        <div class="col-lg-6">
           <span><?php echo $row['reasons'] ?></span>
        </div>
        <hr>
        <div class="col-lg-6">
            <span>Image submitted:</span>
        </div>
        <div class="col-lg-6">
           <span>
                <?php 
                    if($image !=''){
                        ?>
                            <img src="<?php echo '../img/' . $image ?>" class="img-fluid" alt="image not found">
                        <?php
                    } else {
                    echo '<span>Image not found</span>';
                } 
                ?>
            </span>
        </div>
        <hr>
    </div>
</div>