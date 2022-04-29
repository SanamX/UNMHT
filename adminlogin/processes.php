
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
    <title>Processes</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="adminstyles.css">
    <!--<link rel="stylesheet" href="../charts/sb-admin-2.css">-->
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
  width: 340px;
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
            left: 840px;
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
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAALBJREFUSEtjZKAxYKSx+Qz0s+Dt27d8LN++if9lYOCkxFcszMy/frOzPxMWFv4EMgfug0/Pnmn8+fuXjRLDYXqZGRi+88vK3kax4N3jx3rUMBxmhpCs7CWyLYBphjkKnQ8yeHBbQExQYviAmpH899evH6LKyrdQ4gCUTP99+CDBzMbGQYwLcanBmUwpMRSf3tGcjDV0RnMyvBigWVFBTJIezcnEhBJYDf1yMtFOIlEhAP7jjhkHgr5PAAAAAElFTkSuQmCC"            style="padding:0 20px"/>    
              <span class="links_name">server Log</span>
            </a>
          </li>
          <li>
            <a href="#" class="active">
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

       <div class="files">
       
      <?php

      //PHP Error Handling 
      // ini_set('display_errors', 1);
      // ini_set('display_startup_errors', 1);
      // error_reporting(E_ALL);
      
        echo '<pre>';

        // $len =  $ssh->exec("./myscript/process/process.sh");
        $len = 20;

        for ($i=1; $i < $len; $i++) {

        $value1[$i] = $ssh->exec('./myscript/process/userid.sh '.$i);
        $value2[$i] = $ssh->exec('./myscript/process/procid.sh '.$i);
        $value3[$i] = $ssh->exec('./myscript/process/cmd.sh '.$i);
        $value4[$i] = $ssh->exec('./myscript/process/runtime.sh '.$i);

        }

        echo '</pre>';

        echo "<table class='content-table'>";

        echo "<thead>";

        echo "<tr>";
        echo "<th>User ID</th>";
        echo "<th>Process ID</th>";
        echo "<th>CMD</th>";
        echo "<th>Process Running Time</th>";
        echo "</tr>";

        echo "</thead>";

        echo "<tbody>";
        
        for ($i = 1; $i < $len; $i++) {

        echo "<tr>";
        echo "<td>$value1[$i]</td>";
        echo "<td>$value2[$i]</td>";
        echo "<td>$value3[$i]</td>";
        echo "<td>$value4[$i]</td>";
        echo "</tr>";
        }

      echo "</tbody>";

      echo "</table>";

       ?>
</div>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="input-box">

  <input type="text" name="terminate" style="font-size:24px" placeholder="Enter Process ID to Kill...">
  <input type="submit">
      
</form>

<?php

$pid = htmlspecialchars($_REQUEST['terminate']);

$res = $ssh->exec("./myscript/process/killp.sh $pid");


if ($res == "2") {
  echo " ";
}
elseif ($res == "0") {
  
  echo '<div style="font-size:1.15em;color:green;padding: 10px">Process Killed Sucessfully</div>';
}
else {
  echo '<div style="font-size:1.15em;color:red;padding: 10px">Process Kill Failed</div>';
}

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
      <script src="search.js"></script>
      <script>
        function terminate(){
          <?php
          shell_exec("plink -ssh padmini@192.168.240.149 -pw @krishna9 -m E:\\xampp\\htdocs\\webdev\\scripts\\terminate.sh");
          ?>
        }
      </script>
</body>
</html>