<!DOCTYPE html>
<html lang="en">
<head>


    <!-- <style>
      th{
        background-color:#42C2FF;
        padding:7px;
      }
      tr:nth-child(odd){
        background-color:#FFE6AB;
      }
      td{
        font-size:large;
        padding:7px;
        
      }
      table{
        font-family:Gadugi;
        
      }
    </style> -->

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


.login {

position: absolute;
width: 500px;
height: 600px;
top: 230px;
left: 10px;
font-size: 21px;

}
    </style>
</head>

<body>
<div class='login'>
<?php
include('adminconfig.php');
$query = "SELECT id, username, login_date, login_time, logout_timestamp FROM track_log_user";
$result = mysqli_query($link, $query);
?>
<table class='content-table'>
                                  <tr>
                                  <th>ID</th>
                                  <th>File Size</th>
                                  <th>UserName</th>
                                  <th>File User</th>
                                  <th>Login_Date</th>
                                  <th>Logout_Time</th>
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
</body>
</html>