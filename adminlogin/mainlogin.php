
<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin.php");
   exit;
}
 
// Include config file
require_once "adminconfig.php";
 


// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session

                            date_default_timezone_set('Asia/Calcutta');
                            $time=date('H:i:s');
                            $date=date('Y-m-d');
                            $isql="INSERT INTO track_log_user(username,login_date,login_time) VALUES ('$username','$date','$time')";
                            if (mysqli_query($link,$isql)){
                                echo "sucess";
                            }
                            else{
                                echo "error" . $isql . mysqli_error($link);
                            }

                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: server_login.php");
                        } else{
                            // Password is not valid, display a generic error message
                            date_default_timezone_set('Asia/Calcutta');
                            $time=date('H:i:s');
                            $date=date('Y-m-d');
                            $isql="INSERT INTO suspicious_login(username,login_date,login_time) VALUES ('$username','$date','$time')";
                            if (mysqli_query($link,$isql)){
                                echo "sucess";
                            }
                            else{
                                echo "error" . $isql . mysqli_error($link);
                            }
                            $login_err = "Invalid password.";
                            echo "<script type='text/javascript'>",
                            "function f1(){ alert('invalid password');}",
                            "f1();",
                            "</script>";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    date_default_timezone_set('Asia/Calcutta');
                            $time=date('H:i:s');
                            $date=date('Y-m-d');
                            $isql="INSERT INTO suspicious_login(username,login_date,login_time) VALUES ('$username','$date','$time')";
                    
                            if (mysqli_query($link,$isql)){
                                echo "sucess";
                            }
                            else{
                                echo "error" . $isql . mysqli_error($link);
                            }

                            $login_err = "Invalid username.";
                            echo "<script type='text/javascript'>",
                            "function f2(){ alert('invalid username');}",
                            "f2();",
                            "</script>";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="mainstyle.css">
    </head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Infosys SpringBoard</h2>
            </div>
        </div>
        <div class="content">
            <div class="pdiv">
                <h1>Unix <br><span1>Monitoring</span1> <br><span>Handy Tool</span> <br></h1>
                <p class="par">The Unix monitoring tool helps in monitoring the privileges and produce necessary reports
                    on the
                    processes running in the system. It also uses the dynamic programming approach in solving the
                    issues by identifying the problem and resolving it. It takes care of the identification credentials
                    and
                    access management activities.The management activities are done through a front end interface
                    producing the graphical reports.
                    It hence avoids the frequent manual interventions and also the time spent in identifying the
                    problem and solution. It also helps the administrator in correcting the mistyping the commands.
                </p>
            </div>

            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Login Here</h2>
                <input type="text" name="username" placeholder=" Username " required>
                <input type="password" name="password" placeholder=" Password " required>
                <!--<button type="submit" class="btnn"><a href="#">Login</a></button>  -->
                <input type="submit" class="btnn" name="" id="subbtn" value="Login">

            </form>

        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>