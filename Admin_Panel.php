<?php
session_start();
if(!isset($_SESSION['AdminLoginId'])){
    header("Location: Admin_Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        h1{
            text-align:center;
            font-family: poppins;
        }

        table{
            border-collapse: collapse;
            width: 100%;
            color: #d96459;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
            
        }

        th{
            background-color: #d96459;
            color: white;
            padding: 0% 2%;
        }

        td{
            padding: 0% 2%;
        }

        tr:nth-child(even){background-color: f2f2f2}
        body{
            margin: 0;
        }
        .header{
            font-family: poppins;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1% 4%;
            background-color: #204969;
        }
        .header button{
            background-color: #f0f0f0;
            font-size: 16px;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
    <h1>Welcome To Admin Panel - <?php echo $_SESSION['AdminLoginId']?> </h1>
    <form method="Post">
    <button name = "Logout">Log Out</button>
    </form>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>

        <?php
        $con = mysqli_connect("localhost", "root", "", "my_dummy_db");
        if($con -> connect_error){
            die("Connection Failed: ". $con-> connect_error);
        }
        $squery = "SELECT id, name,email, subject,msg from contact";

        $result = $con-> query($squery);

        if($result-> num_rows>0){
            while($row = $result-> fetch_assoc()){
                echo "<tr><td>" .$row["id"]. "</td><td>".$row["name"]."</td><td>" .$row["email"]."</td><td>".$row["subject"]."</td><td>" .$row["msg"]."</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "0 result";
        }

        $con-> close();
        ?>

    </table>

    <?php
    if(isset($_POST['Logout'])){
        session_destroy();
        header("Location: Admin_Login.php");
    }
    ?>
</body>
</html>