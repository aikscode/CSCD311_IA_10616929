<?php
    session_start();

    if(!empty($_SESSION['username'])){
        header('location: base.php');
    }
    require 'data.php';
    $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);

    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        
        if(empty($user) || empty($pass)){
            $message = '<div class="alert alert-danger center" role="alert">All fields are required!</div>';
        }else{
            $query = $conn->prepare("SELECT username, password FROM tbl_student_login WHERE username=? AND password=? ");
            $query->execute(array($user,$pass));
            $row = $query->fetch(PDO::FETCH_BOTH);
            
            if($query->rowCount() > 0){
                $_SESSION['username'] = $user;
                header('location: base.php');
            }else{
                $message = '<div class="alert alert-danger" role="alert">Incorrect username/password! Please check and try again.</div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="home.css">
    </head>
    <body>
        
        <section class="col-lg-4 right wksp">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>            
            <div class="center space display-4" class="Mallamaiks">Student World</div><br/>
            <div class="col-lg-9 formspace" class="Mallamaiks" >
                <form action="#" method="post">
                    <label for="username"><b>Username:&nbsp;</b></label>
                    <input placeholder="Username" type="text"  name="username" class="form-control"><br/>
                    <label for="password"><b>Password:&nbsp;&nbsp;</b></label>
                    <input type="password" name="password" class="form-control"><br/>
                    <input type="submit" name="login" value="Login" class="btn btn-primary right">
                </form>
                <p>Don't have an account? <a href="signup.php" class="logout">Sign Up Here.</a></p>
            </div>
        </section>
        <div class="col-lg-8 bkg"></div>
    </body>
</html>