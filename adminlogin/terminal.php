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
    <title>Terminal</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="adminstyles.css">
    <!--<link rel="stylesheet" href="../charts/sb-admin-2.css">-->

    <style type="text/css">

.terminal {
position: absolute;
top: 330px;
left: 550px;
font-size: 21px;
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
  width: 460px;
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
            left: 820px;
            top: 160px;       
            
}



pre{

  display: inline-block;
  height:800px;
  width:1200px;
  border:1px solid #4e4e4e;
  font:30px Arial, Serif;
  overflow:auto;
  padding: 31px;
  background-color:black;
  color:white;

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
            <a href="processes.php" >
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
          <a href="#" class="active">
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

     



<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="input-box">
<input type="text" name="command" style="font-size:24px" placeholder="Enter the command to execute..." list="commandlist">
<datalist id="commandlist">

<option>adduser</option>
<option>addgroup</option>
<option>agetty</option>
<option>alias</option>
<option>anacron</option>
<option>apropos</option>
<option>apt</option>
<option>apt-get</option>
<option>aptitude</option>
<option>arch</option>
<option>arp</option>
<option>at</option>
<option>atq</option>
<option>atrm</option>
<option>awk</option>
<option>batch</option>
<option>basename</option>
<option>bc</option>
<option>bg</option>
<option>bzip</option>
<option>cal</option>
<option>cat</option>
<option>chgrp</option>
<option>chmod</option>
<option>chown</option>
<option>cksum</option>
<option>clear</option>
<option>cmp</option>
<option>comm</option>
<option>cp</option>
<option>date</option>
<option>dd</option>
<option>df</option>
<option>diff</option>
<option>dir</option>
<option>dmidecode</option>
<option>du</option>
<option>echo</option>
<option>eject</option>
<option>env</option>
<option>exit</option>
<option>expr</option>
<option>factor</option>
<option>find</option>
<option>free</option>
<option>grep</option>
<option>groups</option>
<option>gzip</option>
<option>gunzip</option>
<option>head</option>
<option>history</option>
<option>hostname</option>
<option>hostnamectl</option>
<option>hwclock</option>
<option>hwinfo</option>
<option>id</option>
<option>ifconfig</option>
<option>ionice</option>
<option>iostat</option>
<option>ip</option>
<option>iptables</option>
<option>iw</option>
<option>iwlist</option>
<option>kill</option>
<option>killall</option>
<option>kmod</option>
<option>last</option>
<option>ln</option>
<option>locate</option>
<option>login</option>
<option>ls</option>
<option>lshw</option>
<option>lscpu</option>
<option>lsof</option>
<option>lsusb</option>
<option>man</option>
<option>mdsum</option>
<option>mkdir</option>
<option>more</option>
<option>mv</option>
<option>nano</option>
<option>nc/netcat</option>
<option>netstat</option>
<option>nice</option>
<option>nmap</option>
<option>nproc</option>
<option>openssl</option>
<option>passwd</option>
<option>pidof</option>
<option>ping</option>
<option>ps</option>
<option>pstree</option>
<option>pwd</option>
<option>rdiff-backup</option>
<option>reboot</option>
<option>rename</option>
<option>rm</option>
<option>rmdir</option>
<option>scp</option>
<option>shutdown</option>
<option>sleep</option>
<option>sort</option>
<option>split</option>
<option>ssh</option>
<option>stat</option>
<option>su</option>
<option>sudo</option>
<option>sum</option>
<option>tac</option>
<option>tail</option>
<option>talk</option>
<option>tar</option>
<option>tee</option>
<option>tree</option>
<option>time</option>
<option>top</option>
<option>touch</option>
<option>tr</option>
<option>uname</option>
<option>uniq</option>
<option>uptime</option>
<option>users</option>
<option>vim/vi</option>
<option>w</option>
<option>wall</option>
<option>watch</option>
<option>wc</option>
<option>wget</option>
<option>whatis</option>
<option>which</option>
<option>who</option>
<option>whereis</option>
<option>xargs</option>
<option>yes</option>
<option>youtube-dl</option>
<option>zcmp</option>
<option>zdiff</option>
<option>zip</option>
<option>zz</option>
</datalist>

<input type="submit">
</div>
</form>

<div class="terminal">

<?php
$command = htmlspecialchars($_REQUEST['command']);
$ecom = $ssh->exec(''.$command);
echo"<pre>";
echo $ecom;
echo"</pre>";

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