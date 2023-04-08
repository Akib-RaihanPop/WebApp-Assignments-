<?php
require("Connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
</head>
<body>

<!-- Default form login -->
<form class="text-center border border-light p-5" method = "POST">

    <p class="h4 mb-4">Log In</p>

    <!-- Email -->
    <input type="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Name" name = "AdminName">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name = "AdminPassword" >

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit" name= "Sigin">Log In</button>
    

</form>
<!-- Default form login -->

<?php
if(isset($_POST['Sigin'])){
    $query = "SELECT * FROM `admin_login` WHERE Admin_Name = '$_POST[AdminName]' AND Admin_Password = '$_POST[AdminPassword]'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) >0){
        session_start();

        $_SESSION['AdminLoginId'] = $_POST['AdminName'];
        header("Location: Admin_Panel.php");
    }
    else{
        echo "Incorrect";
    }
}
?>


<!--Section: Contact v.2-->
    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
</body>
</html>