<?php

$uname = htmlspecialchars($_REQUEST['username']);
$hostadd = htmlspecialchars($_REQUEST['hostaddress']);
$passwd = htmlspecialchars($_REQUEST['password']);

session_start();
$_SESSION['uname'] = $uname;
$_SESSION['hostadd'] = $hostadd;
$_SESSION['passwd'] = $passwd;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Login</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="adminstyles.css">
    <style type="text/css">


.login-block {
    width: 820px;
    height: 420px;
    padding: 50px;
    background: #fff;
    border-radius: 8px;
    border-top: 8px solid #ff656c;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 25px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 55px;
    box-sizing: border-box;
    border-radius: 8px;
    border: 3px solid #ccc;
    margin-bottom: 20px;
    font-size: 20px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input:active, .login-block input:focus {
    border: 3px solid #ff656c;
}

.login-block button {
    width: 100%;
    height: 50px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 20px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #ff7b81;
}

.form1{

position: absolute;
width: 500px;
height: 600px;
top: 330px;
left: 670px;
font-size: 21px;

}

</style>

</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-user'></i>
        <span class="logo_name">Unix Handy Monitoring Tool</span>
    </div>
    <ul class="nav-links">
        <li>
          <a href="admin.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
            <a href="files.php" >
              <i class='bx bx-list-ul' ></i>
              <span class="links_name">Files</span>
            </a>
          </li>
          <li>
            <a href="logindetails.php" >
              <i class='bx bx-user' ></i>
              <span class="links_name">User Login Details</span>
            </a>
          </li>
          <li>
            <a href="serverlog.php">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJ5JREFUSEvtlTsOwkAMRN80KDS0cAQq7n8OSug5AE0QzURJFIpVgqxsFlHsdpbsGXv8WVH4qTA+vyOwfQCOwD6zqjfwkPTscT4V2D4Du0zwKbyVdE8JLhuBDzCSrqsJpmDbQ1Kp/f8EESnnJNqyyS9Jt7QH/ZiegCaS4Ref+THNBF0Mr5u8JE3d5PHOFDsVkZGumxxRafwXwp4rHYsTdKQIbBkEgOOuAAAAAElFTkSuQmCC"
            style="padding:0 20px;color:white"/> 
              <span class="links_name">server Log</span>
            </a>
          </li>
          <li>
            <a href="processes.php">
              <i class='bx bx-pie-chart-alt-2' ></i>
              <span class="links_name">Processes</span>
            </a>
          </li>
          <li>
            <a href="backup.php">
              <i class='bx bx-coin-stack' ></i>
              <span class="links_name">BackUp</span>
            </a>
          </li>
         
          <li>
          <a href="terminal.php">
          <img id="terimg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAO5JREFUSEvdldERgjAQRPcagKGA6FCB2oF0YAmWoBVICXZgC5ZgCdgBhgaA75g4YRQVlcwkxA/yf/vu9m42BM+PPOtjRICa85Ui2gGYO9lGlJOU22AyOWqd1qKqKHIAUyfxZ3EWMrboAtRA4o1MyFjT/OsEfwVUAPYA9E6sXu8EEkgixk4152tFdLAhmCzKpBBJFMelLcQE0E07QYwAAs5XIZa2U/QCXMWNZ9q35Edn3xZfFUV76iaLyvuZpl2hoQA2l/lWY5rAC2CwsNNHEjDWpHKbRTquQZQqYObY/oWU2nzEtaPoz/IRfZm+LLoB4OKOGZrg0zwAAAAASUVORK5CYII="
          style="padding:0 20px"/>
            <span class="links_name">Terminal</span>
          </a>
        </li>
        <li>
            <a href="#" class="active">
            <img id="chimg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAFtJREFUSEtjZKAxYKSx+QyjFoBD+OPjx/9BNL+sLEaIUCWIKLYAnwFU8QHdLUC3kOpBNGoBRromFCQkxwGpBo5aQHKcIFcBWMui0TggGETUrEapUh/gc9DQtwAATiLIGb47Vy8AAAAASUVORK5CYII="
            style="padding:0 20px"/>               <span class="links_name">Server Login</span>
            </a>
          </li>
          <li class="log_out">
            <a href="adminlogout.php">
              <i class='bx bx-log-out'></i>
              <span class="links_name">Log out</span>
            </a>
          </li>
        </ul>
    </div>

    <section class="home-section">
        <nav>
          <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Welcome Admin</span>
          </div>
        
          <div class="profile-details">
          
            <span class="admin_name">Admin</span>
            <i class='bx bx-chevron-down' ></i>
          </div>
        </nav>

       
        <div class="form1">

        
        <div class="login-block">
        <h1>SSH Remote Login</h1>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

        <input type="text" value="" placeholder="Username" name="username" />
        <input type="text" minlength="7" maxlength="15" size="15" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$" placeholder="HostAddress" name="hostaddress">
        <input type="password" value="" placeholder="Password" name="password" />
        <button>LogIn</button>
        </form>
        </div>

        
        </div>

    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
     let sidebarBtn = document.querySelector(".sidebarBtn");
     sidebarBtn.onclick = function() {
       sidebar.classList.toggle("active");
       if(sidebar.classList.contains("active")){
       sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
     }else
       sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
     }
      </script>
</body>
</html>