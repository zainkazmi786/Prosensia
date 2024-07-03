



<?php

include "./partials/headers.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    include "partials/db_conn.php";
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `theinternacc` WHERE  `username`=?";
$stmt=$conn->prepare( $sql );
$stmt->bind_param('s',$username);
$stmt->execute();
$result=$stmt->get_result();


$num=mysqli_num_rows($result);

    if ($num == 1) {
        while ($row=$result->fetch_assoc()) {
            $user_id = $row["user_id"];
            if ( password_verify($password,$row['password'])){
               session_start();
        $_SESSION["loggedin"]=true;
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user_id;
                header("location:dashboard.php");
            }
            else
            {
               echo "<script>alert('Wrong Password or username')</script>";
            }
        }
      
    } else {
        
    }
} ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />

           
          </form>

          <!-- <form action="" class="sign-up-form">
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Firstname" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Lastname" />
            </div>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Re Password" />
            </div>
            <input type="submit" value="Sign Up" class="btn solid" />

             <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div> 
          </form> -->
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <!-- <div class="content">
            <h3>New here?</h3>
            <p>
              Welcome! Create an account to join us.
            </p>
            <button class="btn transparent" id="sign-up-btn">Sign Up</button>
          </div> -->
          <img src="./img/log.svg" class="image" alt="" />
        </div>

        <div class="panel right-panel">
          <!-- <div class="content">
            <h3>One of us?</h3>
            <p>
              Welcome back! Log in to access your account.
            </p>
            <button class="btn transparent" id="sign-in-btn">Sign In</button>
          </div>
          <img src="./img/register.svg" class="image" alt="" /> -->
        </div>


      </div>
    </div>

    <script src="./app.js"></script>
  </body>
</html>
