<?php
include "./partials/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include "partials/db_conn.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneno=$_POST['phoneno'];
    $university=$_POST['university'];
    $cgpa=$_POST['cgpa'];
    $skills=$_POST['skills'];


    $target_dir = "uploads/";
 $target_file = $target_dir . rand(1, 800000) . basename($_FILES["pfimg"]["name"]);
    $imagefiletype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["pfimg"]["tmp_name"]);

if(empty($name)||empty($email)||empty($phoneno)||empty($university)||empty($cpga)||empty($skills)||empty($_FILES["pfimg"]["tmp_name"]))
{
    echo "Please fill all the fields";
}
else{
    if ($_FILES["image_1"]["size"] > 3000000) {
               echo "larger size of image";
    }
    else
    {
            if($imagefiletype != "jpg" && $imagefiletype != "png" &&
            $imagefiletype != "jpeg" && $imagefiletype != "gif" )
            {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
            else
            {
                if (move_uploaded_file($_FILES["pfimg"]["tmp_name"], $target_file))
                {
                    $sql = "INSERT INTO `personalinfo`(`name`, `email`, `phoneno`,
                    `university`, `cgpa`, `skills`, `pfimg`) VALUES ('$name','$email',
                    '$phoneno','$university','$cgpa','$skills','$target_file')";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        echo "Data inserted successfully";
                        }
                        else
                        {
                            echo "Data insertion failed";
                            }
                            
                            $conn->close();
                        }
                            }


                        }
}


}
?>