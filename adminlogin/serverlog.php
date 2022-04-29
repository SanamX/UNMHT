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
    <title>Server Log</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="adminstyles.css">
    <link rel="stylesheet" href="../charts/sb-admin-2.css">
    
    <style type="text/css">

      .radiobutton {
            position: absolute;
            left: 60px;
            top: 205px;
            
      }

.table {
            position: absolute;
            left: 470px;
            top: 180px;
            font-size: 21px;

        }


.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 1500px;
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
  padding: 12px 15px;
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
            left: 120px;

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
              <a href="admin.php">
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
            <a href="#" class="active">
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
         
          <div class="profile-details">
            
            <span class="admin_name">Admin</span>
            <i class='bx bx-chevron-down' ></i>
          </div>
        </nav>

        


    <div class="radiobutton">

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="logform">

    <div class="radio">
    <input id="radio-1" name="radio" type="radio" value="auth.log">
    <label for="radio-1" class="radio-label" style="font-size: 31px;">auth.log</label><br>
  </div>

  <div class="radio">
    <input id="radio-2" name="radio" type="radio" value="dpkg.log">
    <label  for="radio-2" class="radio-label" style="font-size: 31px;">dpkg.log</label><br>
  </div>

  <div class="radio">
    <input id="radio-3" name="radio" type="radio" value="dmesg">
    <label for="radio-3" class="radio-label" style="font-size: 31px;">dmesg</label><br>
  </div>

  <div class="radio">
    <input id="radio-4" name="radio" type="radio" value="syslog">
    <label for="radio-4" class="radio-label" style="font-size: 31px;">syslog</label><br>
  </div>

  <div class="radio">
    <input id="radio-5" name="radio" type="radio" value="syslog">
    <label for="radio-5" class="radio-label" style="font-size: 31px;">minsystem.log</label><br>
  </div>

<div class="button">
<!-- <button type="submit" value="View Log"> -->
<button type="submit" form="logform" value="View Log" class="button-18">Submit</button>
</div>

</form>
</div>
        <?php

            $log = htmlspecialchars($_REQUEST['radio']);
            $len = 10;
            $con = $ssh->exec("./myscript/log/loglist.sh $log");

            for ($i=1; $i <= $len; $i++) {

                $logv[$i] = $ssh->exec("./myscript/log/log.sh $i");
             
                }

            ?>

<div class="table">
     <?php
           echo '</pre>';


          echo "<table class='content-table'>";

          echo "<thead>";

          echo "<tr>";
          echo "<th>System Log</th>";
          echo "</tr>";

          echo "</thead>";

          echo "<tbody>";
          
          for ($i = 1; $i <= $len; $i++) {

          echo "<tr>";
          echo "<td>$logv[$i]</td>";
          echo "</tr>";
          }

        echo "</tbody>";

        echo "</table>";
            
      ?>
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




