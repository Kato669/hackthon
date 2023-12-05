<?php include("partials/header.php"); ?>
<link rel="stylesheet" href="toarst/toastr.min.css">

<?php
    $errors = [];
    $successes = [];

    $fullname = '';
    $email = '';
    $country = '';
    $institution = '';
    $image = '';
if (isset($_POST["submit"])) {
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $country = $_POST["country"];
        $institution = $_POST["institution"];
        if (isset($_POST["tech"])) {
            $tech = $_POST["tech"];
        } else {
            $tech = "No Experience";
        }

        $expertise = $_POST["expertise"];

        if (isset($_POST["participate"])) {
            $participate = $_POST["participate"];
        } else {
            $participate = "Prize and Awards";
        }

        // image 
        if (isset($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            if ($image != '') {
                $ext = explode('.', $image);
                $file_ext = end($ext);

                $image = 'challenge' . time() . rand(000, 999) . '.' . $file_ext;
                $image_src = $_FILES['image']['tmp_name'];
                $image_destination = "img/" . $image;

                // upload image
                $upload = move_uploaded_file($image_src, $image_destination);
                if ($upload == false) {
                    $_SESSION['failed'] = 'image failed to upload';
                    exit;
                }
            } else {
                // echo "Image not available";
            }
        } else {
            $image = "No Image";
        }

        // errors to display
        if(!$fullname){
            $errors[] = "Fullname required";
        }
        if(!$email){
            $errors[] = "Email required";
        }
        if(!$country){
            $errors[] = "Country required";
        }
        if(!$image){
            $errors[] = "Image required";
        }

        if(empty($errors)){
            $insert = "Insert into hackthon SET
                fullname = '$fullname',
                institution = '$institution',
                image = '$image',
                email = '$email',
                country = '$country',
                tech_experience = '$tech',
                area_of_expertise = '$expertise',
                reasons = '$participate'

            ";
            $res = mysqli_query($conn, $insert);
            if ($res == true) {
                $successes[] = 'Data Inserted successfully';
            } else {
                echo "data failed to insert";
            }
        } 
    }

}

?>


<link rel="stylesheet" href="css/form.css">


<body>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger" id="danger">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <?php foreach ($successes as $success): ?>
        <div class="alert alert-success" id="danger1">
            <?php echo $success ?>
        </div>
    <?php endforeach ?>


    <div class="container mt-5">
        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-lg-12 mt-5">
                    <div class="mb-3">
                        <label for="groupName" class="form-label">What is your full name?<span>*</span></label>
                        <input type="text" class="custom-input" id="groupName" placeholder="Enter Your Answer Here..........." name="fullname" value="<?php echo $fullname ?>">
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="mb-3">
                        <label for="email" class="form-label">What is your full email? <span>*</span></label>
                        <input type="email" class="custom-input" id="email" placeholder="Enter Your Answer Here..........." name="email" value="<?php echo $email ?>">
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="mb-3">
                        <label for="country" class="form-label">Which country will you be participating from? <span>*</span></label>
                        <input type="text" class="custom-input" id="country" placeholder="Enter Your Answer Here..........." name="country" value="<?php echo $country ?>">
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="mb-3">
                        <label for="institution" class="form-label">Your school/institution</label>
                        <input type="text" class="custom-input" id="institution" placeholder="Enter Your Answer Here..........." name="institution" value="<?php echo $institution ?>">
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="mb-3">
                        <label for="country" class="form-label">How would you describe your general tech experience</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tech" id="option-1" value="Very little experience">
                            <label class="form-check-label" for="option-1">
                                Very little experience
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Intermediate" name="tech" id="option-2">
                            <label class="form-check-label" for="option-2">
                                Intermediate
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tech" value="Expert" id="option-2" >
                            <label class="form-check-label" for="option-2">
                                Expert
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="mb-3">
                        <label for="country" class="form-label">What is your area of expertise*</label>
                        <input type="text" class="custom-input" id="" placeholder="Enter Your Answer Here..........." name="expertise">
                    </div>
                </div>
                <div class="col-lg-12 mt-5">
                    <div class="mb-3">
                        <label for="country" class="form-label">Why would you like to participate</label>
                            <br>
                       <span>select all that apply</span>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="participate" value="Prizes and reward" id="option-3">
                            <label class="form-check-label" for="option-3">
                                Prizes and reward
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="participate" value="Meet new friends and expand my network" id="option-4" >
                            <label class="form-check-label" for="option-4">
                                Meet new friends and expand my network
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="participate" value="Am a climate enthusiast" id="option-5" >
                            <label class="form-check-label" for="option-5">
                                Am a climate enthusiast
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Submit Your File*</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success" name="submit" >Submit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="toarst/toastr.min.js"></script>
<script>
    let danger = document.getElementById('danger');
    setTimeout(()=> danger.remove(), 3000);

    let danger1 = document.getElementById('danger1');
    setTimeout(()=> danger1.remove(), 3000);
</script> 
