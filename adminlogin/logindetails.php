<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Details</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="adminstyles.css">
    <!--<link rel="stylesheet" href="../charts/sb-admin-2.css">-->

    <style type="text/css">
      

 .content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 500px;
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
  border-style: solid;
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


.badlog {

position: absolute;
width: 500px;
height: 600px;
top: 230px;
left: 1240px;
font-size: 21px;

}

.login {

position: absolute;
width: 500px;
height: 600px;
top: 230px;
left: 230px;
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
            <a href="files.php">
              <i class='bx bx-list-ul' ></i>
              <span class="links_name">Files</span>
            </a>
          </li>
          <li>
            <a href="#" class="active">
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


<div class='login'>

<?php
include('adminconfig.php');
$query = "SELECT id, username, login_date, login_time, logout_timestamp FROM track_log_user";
$result = mysqli_query($link, $query);
?>

<table class='content-table'>
<caption style="font-weight:Bold;font-size:larger;padding:8px;color: #0fa611;" >User Login to Dashboard</caption>

      <tr>
      <th>ID</th>
      <th>UserName</th>
      <th>Login_Date</th>
      <th>Logout_Time</th>
      <th>Login_Time</th>
      </tr>

<?php

if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['username']; ?> </td>
   <td><?php echo $data['login_date']; ?> </td>
   <td><?php echo $data['login_time']; ?> </td>
   <td><?php echo $data['logout_timestamp']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="6">No data found</td>
    </tr>

 <?php } ?>
</table>

  </div>


        <div class='badlog'>

        <?php
              include('adminconfig.php');
              $query = "SELECT id, username, login_date, login_time, logout_timestamp FROM suspicious_login";
              $result = mysqli_query($link, $query);
        ?>

  <table class='content-table'>
  <caption style="font-weight:Bold;font-size:larger;padding:8px;color: #c20e0e;" >Suspicious Login to Dashboard</caption>
  <tr>
      <th>ID</th>
      <th>UserName</th>
      <th>Login_Date</th>
      <th>Login_Time</th>
                        </tr>
<?php


if (mysqli_num_rows($result) > 0) {

  $sn=1;

  while($data = mysqli_fetch_assoc($result)) {

 ?>

 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['username']; ?> </td>
   <td><?php echo $data['login_date']; ?> </td>
   <td><?php echo $data['login_time']; ?> </td>
 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="6">No data found</td>
    </tr>

 <?php } ?>
</table>

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