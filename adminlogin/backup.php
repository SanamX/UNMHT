<?php 
        
  //PHP Error Handling 
//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);
 
 include '/opt/lampp/htdocs/phpseclib/vendor/autoload.php';

 session_start();

 $un= $_SESSION['uname'];
 $ho= $_SESSION['hostadd'];
 $pa= $_SESSION['passwd'];  


    $ssh = new \phpseclib3\Net\SSH2($ho);
 
    if (!$ssh->login($un, $pa)) {
          exit('Login Failed');
   }

   ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="adminstyles.css">

  
  <style type="text/css">

  .content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 15px 35px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}


input {
  position: relative;
  display: inline-block;
  font-size: 20px;
  box-sizing: border-box;
  transition: .5s;
}

input[type="text"]
{
  background: #fff;
  width: 440px;
  height: 50px;
  border: none;
  outline: none;
  padding: 0 25px;
  border-radius: 25px 0 0 25px;
}

input[type="submit"]
{
  position: relative;
  left: -5px;
  border-radius: 0 25px 25px 0;
  width: 150px;
  height: 50px;
  border: none;
  cursor: pointer;
  background: #009879;
  color: #fff;
  font-size: 20px;

}

input[type="submit"]:hover
{
   background: #ff5722;
}

.input-box {

            position: absolute;
            left: 940px;
            top: 160px;       
            
}

.files {

position: absolute;
width: 500px;
height: 600px;
top: 130px;
left: 240px;
font-size: 21px;

}

input[type="radio"]{
  display: none;
}
label {
  position: relative;
  color: #009879;
  font-family: 'Poppins',sans-serif;
  font-size: 30px;
  border: 2px solid #009879;
  border-radius: 5px;
  padding: 10px 50px;
  display: flex;
  align-items: center;
  cursor: pointer;
}

label:before { 

  content: "";
  height: 30px;
  width: 30px;
  border: 3px solid #009879;
  border-radius: 50%;
  margin-right: 20px;
}

input[type="radio"]:checked + label{
  background-color: #009879;
  color: white;
}
input[type="radio"]:checked + label:before{
  height: 16px;
  width: 16px;
  border 10px solid white;
  background-color: #009879;
}

.button-18 {
  align-items: center;
  background-color: #009879;
  border: 0;
  border-radius: 100px;
  box-sizing: border-box;
  color: #ffffff;
  cursor: pointer;
  display: inline-flex;
  font-family: -apple-system, system-ui, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
  font-size: 26px;
  font-weight: 600;
  justify-content: center;
  line-height: 20px;
  max-width: 980px;
  min-height: 50px;
  min-width: 0px;
  overflow: hidden;
  padding: 0px;
  padding-left: 20px;
  padding-right: 20px;
  text-align: center;
  touch-action: manipulation;
  transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s, color 0.167s cubic-bezier(0.4, 0, 0.2, 1) 0s;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
}

.button-18:hover,
.button-18:focus { 
  background-color: #009879;
  color: #ffffff;
}

.button-18:active {
  background: #009879;
  color: rgb(255, 255, 255, .7);
}

.button-18:disabled { 
  cursor: not-allowed;
  background: rgba(0, 0, 0, .08);
  color: rgba(0, 0, 0, .3);
}

.button {
  position: absolute;
            left: 50px;

}

.radiobutton {
            position: absolute;
            left: 1000px;
            top: 305px;
            
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
            <a href="files.php">
              <i class='bx bx-list-ul' ></i>
              <span class="links_name">Files</span>
            </a>
          </li>
          <li>
            <a href="logindetails.php">
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
            <a href="#" class="active">
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
            <a href="server_login.php">
            <img id="chimg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAFtJREFUSEtjZKAxYKSx+QyjFoBD+OPjx/9BNL+sLEaIUCWIKLYAnwFU8QHdLUC3kOpBNGoBRromFCQkxwGpBo5aQHKcIFcBWMui0TggGETUrEapUh/gc9DQtwAATiLIGb47Vy8AAAAASUVORK5CYII="
            style="padding:0 20px"/>               
            <span class="links_name">Server Login</span>
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
          <!--<div class="search-box" >
            <input type="text" placeholder="Search..." id="searchbox">
            <i class='bx bx-search' ></i>
          </div>-->
          <div class="profile-details">
            <!--<img src="images/profile.jpg" alt="">-->
            <span class="admin_name">Admin</span>
            <i class='bx bx-chevron-down' ></i>
          </div>
        </nav>


<div class="radiobutton">

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="logform">
<h3 style="padding: 20px;">Please Select the Format for Backup:</h3>

<div class="radio">
<input id="radio-1" name="radio" type="radio" value="tar.gz">
<label for="radio-1" class="radio-label" style="font-size: 31px;">tar.gz</label><br>
</div>

<div class="radio">
<input id="radio-2" name="radio" type="radio" value="zip">
<label  for="radio-2" class="radio-label" style="font-size: 31px;">zip</label><br>
</div>
</div>
       
        <div class="input-box">

        <input type="text" name="backup" style="font-size:24px" placeholder="Enter the file name to backup...">
        <input type="submit">

        </div>
        </form> 

        <div class="files">

     <?php

        $backupf = htmlspecialchars($_REQUEST['backup']);
        $format = htmlspecialchars($_REQUEST['radio']);

        $bkp = $ssh->exec("./myscript/backup/backup.sh $backupf $format");

        if ($bkp == "0") {

          
          echo '<div style="font-size:1.15em;color:green">Done!!! Backup Initiated Sucessfully. </div>';
 
        }

        elseif ($bkp == "1")
        {
          echo " ";
        }
        else {
          echo '<div style="font-size:1.15em;color:red">The backup did not complete sucessfully. </div>';
        }

            $len = $ssh->exec("wc -l ./myscript/backup/backupfile | awk '{print $1}'");

            for ($i=1; $i <= $len; $i++) {

              $value[$i] = $ssh->exec('./myscript/backup/backupfile.sh '.$i);

            }
                ?>

            <?php

              echo "<table class='content-table'>";

              echo "<thead>";

              echo "<tr>";
              echo "<th>File Name</th>";
              echo "</tr>";

              echo "</thead>";

              echo "<tbody>";
              
              for ($i = 1; $i <= $len; $i++) {

              echo "<tr>";
              echo "<td>$value[$i]</td>";
              echo "</tr>";
              }

            echo "</tbody>";

            echo "</table>";

            ?>
    
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