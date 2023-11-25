 <?php include('../partials/constants.php') ?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

 <!-- dtablesata -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
 
 <script src="https://kit.fontawesome.com/78e0d6a352.js" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg shadow bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php"><i class="fa-solid fa-user"></i> | Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active"  href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active"  href="admins.php">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="submission.php">Submissions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Frontend</a>
                </li>
        </div>
    </div>
</nav>

<!-- datatable -->


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
