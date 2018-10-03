<?php
    session_start();
    $id = $surname = $first_name = $othername = $gender = $phone_number = $dob = $email = $guardian_first_name = $image = $course = $name_of_hostel = $date_of_entrance = $guardian_surname_name = $guardian_phonenumber = $Level = '';

    $idrequired = $snrequired = $fnrequired = $onrequired = $grequired = $pnrequired = $dobrequired = $erequired = $crequired = $prequired = $prrequired = $rrequired = $endrequired = $exdrequired = $hrequired = $wrequired = '';

    try{
        require 'data.php';
        $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(empty($_POST["id"])){
            $idrequired = "This field is required";
        }else{
            $id = test_input($_POST["id"]);
        }

        if(empty($_POST["surname"])){
            $snrequired = "This field is required";
        }else{
            $surname = test_input($_POST["surname"]);
        }

        if(empty($_POST["first_name"])){
            $fnrequired = "This field is required";
        }else{
            $first_name = test_input($_POST["first_name"]);
        }

        if(empty($_POST["othername"])){
            $onrequired = "";
            $othername = "";
        }else{
            $othername = test_input($_POST["othername"]);
        }

        if(empty($_POST["gender"])){
            $grequired = "This field is required";
        }else{
            $gender = test_input($_POST["gender"]);
        }

        if(empty($_POST["phone_number"])){
            $pnrequired = "This field is required";
        }else{
            $phone_number = test_input($_POST["phone_number"]);
        }

        if(empty($_POST["dob"])){
            $dobrequired = "This field is required";
        }else{
            $dob = test_input($_POST["dob"]);
        }

        if(empty($_POST["email"])){
            $erequired = "This field is required";
        }else{
            $email = test_input($_POST["email"]);
        }

        if(empty($_POST["guardian_first_name"])){
            $crequired = "";
            $guardian_first_name = "";
        }else{
            $guardian_first_name = test_input($_POST["guardian_first_name"]);
        }

        if(empty($_POST["image"])){
            $prequired = "";
            $image = "";
        }else{
            $image = test_input($_POST["image"]);
        }

        if(empty($_POST["course"])){
            $prrequired = "This field is required";
        }else{
            $course = test_input($_POST["course"]);
        }

        if(empty($_POST["name_of_hostel"])){
            $rrequired = "This field is required";
        }else{
            $name_of_hostel = test_input($_POST["name_of_hostel"]);
        }

        if(empty($_POST["date_of_entrance"])){
            $endrequired = "This field is required";
        }else{
            $date_of_entrance = test_input($_POST["date_of_entrance"]);
        }

        if(empty($_POST["guardian_surname_name"])){
            $exdrequired = "This field is required";
        }else{
            $guardian_surname_name = test_input($_POST["guardian_surname_name"]);
        }

        if(empty($_POST["guardian_phonenumber"])){
            $hrequired = "";
            $guardian_phonenumber = "";
        }else{
            $guardian_phonenumber = test_input($_POST["guardian_phonenumber"]);
        }

        if(empty($_POST["Level"])){
            $wrequired = "";
            $Level = "";
        }else{
            $Level = test_input($_POST["Level"]);
        }
        
        if(isset($_POST['submit'])){
            if($idrequired || $snrequired || $fnrequired || $grequired || $pnrequired || $dobrequired || $erequired || $prrequired || $rrequired || $endrequired || $exdrequired){
                $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
            }else{
                $sql = "INSERT INTO tbl_student_data(id, surname, first_name, othername, gender, phone_number, dob, email, guardian_first_name, image, course, name_of_hostel, date_of_entrance, guardian_surname_name, guardian_phonenumber, Level) VALUES ('$id', '$surname', '$first_name', '$othername', '$gender', '$phone_number', '$dob', '$email', '$guardian_first_name', '$image', '$course', '$name_of_hostel', '$date_of_entrance', '$guardian_surname_name', '$guardian_phonenumber', '$Level')";
                $conn->exec($sql);
                $reply = '<div class="alert alert-success" role="alert">NEW STUDENT SUCCESSFULLY ADDED!</div>';
            }
        }            
    }catch(PDOException $e){
        echo $sql . "<br/>" . $e->getMessage();
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">

        <style>
            .red{
                color: red;

            }
        </style>
    </head>
    <body>        
        <div class="col-lg-9 right wksp">
            <h3 class="center">Fill The Form To Add Student Data.</h3>
            <?php
                if(isset($reply)){
                    echo $reply;
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="id"><b>ID:&nbsp;</b><span class="red">*<?php echo $idrequired;?></span></label>
                        <input value="<?php echo $id; ?>" type="text" name="id" class="col-lg-3 form-control" maxlength="10">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="surname"><b>Surname:&nbsp;</b><span class="red">*<?php echo $snrequired;?></span></label>
                        <input value="<?php echo $surname;?>" type="text" name="surname" class="form-control">
                    </div>
                    <div class="col">
                        <label for="first_name"><b>First Name:&nbsp;</b><span class="red">*<?php echo $fnrequired;?></span></label>
                        <input value="<?php echo $first_name; ?>" type="text" name="first_name" class="form-control">
                    </div>
                    <div class="col">
                        <label for="othernames"><b>Othernames:&nbsp;</b><span class="red"><?php echo $onrequired;?></span></label>
                        <input value="<?php echo $othername; ?>" type="text" name="othername" class="form-control">
                    </div>
                </div><br/>                
                
                <div class="form-row">
                    <div class="col">
                        <label for="gender"><b>Gender:&nbsp;</b><span class="red">*<?php echo $grequired;?></span></label>
                        <input value="<?php echo $gender; ?>" type="text" name="gender" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="phone_number"><b>Phone Number:&nbsp;</b><span class="red">*<?php echo $pnrequired;?></span></label>
                        <input value="<?php echo $phone_number; ?>" type="text"  name="phone_number" class="form-control">
                    </div>
                        
                    <div class="col">
                        <label for="dob"><b>Date of Birth:&nbsp;</b><span class="red">*<?php echo $dobrequired;?></span></label>
                        <input value="<?php echo $dob; ?>" type="date" name="dob" class="form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="email"><b>Email:&nbsp;</b><span class="red">*<?php echo $erequired;?></span></label>
                        <input value="<?php echo $email; ?>" type="email" name="email" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="guardian_first_name"><b>Guardian First Name:&nbsp;</b><span class="red"><?php echo $crequired;?></span></label>
                        <input value="<?php echo $guardian_first_name; ?>" type="text" name="guardian_first_name" class="form-control">
                    </div>
                    
                    <div class="col custom-file">
                        <label for="image"><b>Profile image:&nbsp;</b><span class="red"><?php echo $prequired;?></span></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="course"><b>Course:&nbsp;</b><span class="red">*<?php echo $prrequired;?></span></label>
                        <input value="<?php echo $course; ?>" type="text" name="course" class="form-control">
                    </div>

                    <div class="col">
                        <label for="name_of_hostel"><b>Name of Hostel:&nbsp;</b><span class="red">*<?php echo $rrequired;?></span></label>
                        <input value="<?php echo $name_of_hostel; ?>" type="text" name="name_of_hostel" class="form-control">
                    </div>

                    <div class="col">
                        <label for="date_of_entrance"><b>Date of Entry:&nbsp;</b><span class="red">*<?php echo $endrequired;?></span></label>
                        <input type="date" name="date_of_entrance" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="guardian_surname_name"><b>Guardian Surname:&nbsp;</b><span class="red">*<?php echo $exdrequired;?></span></label>
                        <input type="text" name="guardian_surname_name" class="form-control">
                    </div>

                    <div class="col">
                        <label for="guardian_phonenumber"><b>Guardian Phone Number:&nbsp;</b><span class="red"><?php echo $hrequired;?></span></label>
                        <input value="<?php echo $guardian_phonenumber; ?>" type="text" name="guardian_phonenumber" class="form-control">
                    </div>

                    <div class="col">
                        <label for="Level"><b>Level:&nbsp;</b><span class="red"><?php echo $wrequired;?></span></label>
                        <input value="<?php echo $Level; ?>" type="text" name="Level" class="form-control">
                    </div>
                </div><br/>

                <input type="submit" name="submit" value="Add To Database" class="btn btn-primary right">
            </form>        
        </div>
        <?php
            include 'sidebar.php';
        ?>
        
    </body>
</html>