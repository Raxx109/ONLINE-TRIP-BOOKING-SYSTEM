<?php
session_start();  
$dbc = require_once "config.php";

 try  
 {  
     
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $msg= '<label>ENTER USERNAME AND PASSWORD</label>';  
           }  
           else  
           {  
                $user = $_POST["username"];
                $sqlcmd = "SELECT * FROM login_info WHERE Username = :username AND Password = :password";  
                $stmt = $dbc->prepare($sqlcmd);  
                $stmt->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $stmt->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location:home.php");  
                }  
                else  
                {  
                     $msg= '<label>INVALID USERNAME OR PASSWORD</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $msg= $error->getMessage();  
 }  
 $sqlcmd = null;
 $dbc = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>MACTO ADMIN</title>
    <meta charset = "UTF-8">
    <meta name = "description" content = "ADMIN LOGIN">
    <meta name = "keywords" content = "Booking, Online, Cagbalete">
    <meta name = "author" content = "SLSU CIT 3RD YEAR CAPSTONE">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admindesign.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="card bg-light border-light mt-5 rounded" style="width:20rem;">
                <div class="card-header bg-light border-light text-center mt-3">
                    <h1>MACTO</h1>
                    <label style="color: red;"><?php if(empty($msg)){} else {echo $msg;} ?></label>
                </div>
                <div class="card-body">
                    <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                <div class="row">
                        <div class="form-floating col mb-3">
                            <input type="text" class="form-control" name = "username" id = "user" placeholder="user123" required />
                            <label for="user">&nbsp; Username</label>
                        </div>
                </div>
                <div class="row">
                    <div class="form-floating col mb-3">
                        <input type="password" class="form-control" name = "password" id = "pass" placeholder="pass123" required />
                        <label for="pass">&nbsp; Password</label>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col text-center">
                    <button class= "btn-success" type="submit" name="login" value = "login" style="width: 100%; height:3rem">Log-In</button>
                    </div>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/validation.js"></script>
</body>
</html>