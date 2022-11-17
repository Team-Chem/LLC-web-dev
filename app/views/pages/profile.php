<?php
    $title = 'Profile';
    include "header.php";
?>


<?php
if(!isset($_SESSION)) {
    session_start();
}

// Redirected if not signed in
if (!isset($_SESSION['user_id_num'])) {
    header("location: sign_in.php");
}


if (isset($_SESSION['user_id_num'])) {
    $conn = require __DIR__ . "/../../../db/connection.php";

    $sql = "SELECT * FROM user WHERE user_id = {$_SESSION["user_id_num"]}";

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../assets/stylesheets/sign_in_out.css"> -->
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> -->



</head>

<body>

<?php if (isset($user)): ?>
    
    <h2 style="text-align: center; color: white;"><p>Welcome, <?= htmlspecialchars($user["first_name"]) ?></p></h2>
    
    <?php else: ?>

        <p><a href="sign_in.php"></a></p>
        <p><a href="sign_up.php"></a></p>

        <?php endif; ?>


<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" 
            img src="../../assets/images/unknown.png">
            <span class="font-weight-bold">User name</span>
            <span class="text-black-50">user@univerisity.edu</span><span> </span></div>
            <div class="mt-1 text-center"><button class="btn btn-primary profile-button" type="button">Manage Data</button></div>
            <!-- <div class="mt-1 text-center"><button class="btn btn-primary profile-button" type="button">Manage Post</button></div> -->
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"><label class='labels'>Profile Settings</label></h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="john" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="doe"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="johndoe@outlook.com" value=""></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="Bachelor in Chemistry" value=""></div>
                </div>
                <!-- <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div> -->
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span class='labels'>About me</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i><label class='labels'>&nbsp;Experience</span></div><br></label>
                <div class="col-md-12"><label class="labels">Experience in Chemistry</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

</body>

</html>