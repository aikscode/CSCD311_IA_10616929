<?php
    session_start();
    try{
        if(!empty($_SESSION['username'])){
            require 'data.php';
            $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);

            $query = "SELECT * FROM tbl_student_data";
            $table = $conn->prepare($query);
            $table->execute();

            $results = $table->fetchAll();
        }else{
            echo "<div class='red display-2'>YOU'RE NOT ALLOWED TO VIEW THIS PAGE</div>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Students</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>        
        <div class="col-lg-10 right">
            <div class="display-3 center">Student Database</div><br/>
            <div class="container">
                <?php if($results && $table->rowCount()>0){ ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Profile Picture</th>
                            <th scope="col">ID</th>
                            <th scope="col">Surname</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Other Names</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Email</th>
                            <th scope="col">Campus</th>
                            <th scope="col">Programme</th>
                            <th scope="col">Residence</th>
                            <th scope="col">Date of Entry</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($results as $row){ ?>
                            <th scope="col"><?php echo escape($row["image"]); ?></th>
                            <th scope="col"><?php echo escape($row["id"]); ?></th>
                            <th scope="col"><?php echo escape($row["surname"]); ?></th>
                            <th scope="col"><?php echo escape($row["first_name"]); ?></th>
                            <th scope="col"><?php echo escape($row["othername"]); ?></th>
                            <th scope="col"><?php echo escape($row["gender"]); ?></th>
                            <th scope="col"><?php echo escape($row["phone_number"]); ?></th>
                            <th scope="col"><?php echo escape($row["dob"]); ?></th>
                            <th scope="col"><?php echo escape($row["email"]); ?></th>
                            <th scope="col"><?php echo escape($row["guardian_first_name"]); ?></th>
                            <th scope="col"><?php echo escape($row["course"]); ?></th>
                            <th scope="col"><?php echo escape($row["name_of_hostel"]); ?></th>
                            <th scope="col"><?php echo escape($row["date_of_entrance"]); ?></th>
                        <?php } ?>
                    </tbody>
                </table>        
                <?php }else { ?>
                    <div class="display-4">THERE ARE NO RESULTS TO BE DISPLAYED!</div>
                <?php } ?>
            </div>
        </div>
        <?php include 'sidebar.php'; ?>
    </body>
</html>