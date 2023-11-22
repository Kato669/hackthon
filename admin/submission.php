<?php include('constants.php') ?>
<!-- dtablesata -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- dtablesata -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<div class="container-fluid my-3">
    <h3 class="text-capitalize">Participants Submissions</h3>
</div>

<style>
    span{
        color: red;
        text-transform: capitalize;
    }
</style>

<table id="example" class="display" style="width:100%">
 <thead>
    <tr>
        <th>Sn</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>country</th>
        <th>Tech experience</th>
        <th>Area of expertise</th>
        <th>Reason for participation</th>
        <th>Images</th>
        <th>Actions</th>
    </tr>
</thead>
<div class="container">
    <div class="row">
        <div class="col-lg-12"> 
    <tbody>


        <?php
        $select = "select * from hackthon";
        $execute = mysqli_query($conn, $select);
        if($execute == true){
            $count = mysqli_num_rows($execute);
            $sn = 1;
            if($count > 0){
                while($row = mysqli_fetch_array($execute)){
                    $id = $row["Id"];
                    $fullname = $row['fullname'];
                    $email = $row['email'];
                    $country = $row['country'];
                    $tech = $row['tech_experience'];
                    $expertise = $row['area_of_expertise'];
                    $reason = $row['reasons'];
                    $image = $row['image'];
                    ?>
                        <tr>
                            <td><?php echo $sn++ ?></td>
                            <td><?php echo $fullname ?></td>
                            <td><?php echo $email?></td>
                            <td><?php echo $country?></td>
                            <td><?php echo $tech?></td>
                            <td><?php echo $expertise?></td>
                            <td><?php echo $reason?></td>
                            <td>
                                <?php 
                                    if($row['image'] !=""){
                                        ?>
                                            <img src="<?php echo '../img/'.$image ?>" class="img-fluid" alt="image not found" style="height:80px">
                                        <?php
                                    }else{
                                        echo '<span>Image not found</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="view.php?id=<?php echo $id ?>"><i class="bi bi-eye color-primary fs-3"></i></a>
                            </td>
                        </tr>
                    <?php
                }
            }
        }
        ?>
    </tbody>
      </div>
    </div>
</div>
</table>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>