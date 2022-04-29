<?php 
        
  //PHP Error Handling 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

 DEFINE('DS', DIRECTORY_SEPARATOR);
 
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
    <title>Admin Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="adminstyles.css">
    <link rel="stylesheet" href="../charts/sb-admin-2.css">
    
    <style type="text/css">

         
        .pieBox {

            position: absolute;
            width: 530px;
            height: 530px;
            top: 1530px;
            left: 350px;
            
        }

        .lineBox {

            position: absolute;
            width: 780px;
            height: 680px;
            top: 1600px;
            left: 1200px;
            
        }

        .donutBox {

            position: absolute;
            width: 600px;
            height: 600px;
            left: 320px;
            top: 700px;

        }

        .table1 {
            position: absolute;
            left: 1130px;
            top: 430px;
            font-size: 21px;

        }

        .table2 {
            position: absolute;
            left:240px;
            top: 2110px;
            font-size: 21px;

        }

        .table3 {
            position: absolute;
            left: 1250px;
            top: 2110px;
            font-size: 21px;

        }

        .card1 {

                position: absolute;
                width: 400px;
                height: 600px;
                top: 180px;
                left: 150px;

}
.card2 {

position: absolute;
width: 400px;
height: 600px;
top: 180px;
left: 600px;

}

.card3 {

position: absolute;
width: 400px;
height: 600px;
top: 180px;
left: 1050px;

}

.card4 {

position: absolute;
width: 500px;
height: 600px;
top: 180px;
left: 1500px;

}



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
  padding: 35px 41px;
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

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-style: solid;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container12 {
  padding: 50px 16px;
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
        <a href="#" class="active">
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

        

        
    <div class="box pieBox">
    <canvas id="myChart1"></canvas>
    </div>

    <div class="box lineBox">
    <canvas id="myChart2"></canvas>
    </div>    

    <div class="box donutBox">
    <canvas id="myChart3"></canvas>
    </div>   


    <?php  

//PHP Error Handling 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 


$uptimeh = $ssh->exec("uptime -p | awk '{print $2}'");
$uptimem = $ssh->exec("uptime -p | awk '{print $4}'");

$day = $ssh->exec("date | awk '{print $1}'");
$date = $ssh->exec("date | awk '{print $2}'");
$mon = $ssh->exec("date | awk '{print $3}'");
$yr = $ssh->exec("date | awk '{print $4}'");
$time = $ssh->exec("date | awk '{print $5}'");
$apm = $ssh->exec("date | awk '{print $6}'");

$sysuseer = $ssh->exec("uptime | awk '{print $4}'");

$username = $ssh->exec("id -u -n");
$ipaddr = $ssh->exec("hostname -I | awk '{print $1}'");

$kerv = $ssh->exec("uname -v");
$kerr = $ssh->exec("uname -r");


?>

    <div class="card1">
    <div class="card">
        <div class="container12">
        <h3><b>Server Uptime:</b></h3>
        <p><?= $uptimeh ?>hours, <?= $uptimem ?>minutes</p>
        <h3><b>Logged User:</b></h3>
        <p><?= $sysuseer ?>User</p>
        </div>
        </div>
        </div>

        <div class="card2">
    <div class="card">
        <div class="container12">
        <h3><b>Current Date:</b></h3>
        <p><?= $date ?><?= $mon ?><?= $yr ?><?= $day ?></p>
        <h3><b>Current Time:</b></h3>
        <p><?= $time ?><?= $apm ?></p>
        </div>
        </div>
        </div>

        <div class="card3">
        <div class="card">
        <div class="container12">
        <h3><b>User Name:</b></h3>
        <p><?= $username ?></p>
        <h3><b>Host Address:</b></h3>
        <p><?= $ipaddr ?></p>
        </div>
        </div>
        </div>


        <div class="card4">
        <div class="card">
        <div class="container12">
        <h3><b>Kernel-Version:</b></h3>
        <p><?= $kerv ?></p>
        <h3><b>kernel release:</b></h3>
        <p><?= $kerr ?></p>
        </div>
        </div>
        </div>




    
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>

<?php  

//PHP Error Handling 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 



$used = $ssh->exec("free -m | grep Mem | awk '{print $3}'");

 $free = $ssh->exec("free -m | grep Mem | awk '{print $4}'");
 $shared = $ssh->exec("free -m | grep Mem | awk '{print $5}'");
 $buff = $ssh->exec("free -m | grep Mem | awk '{print $6}'");
 $avail = $ssh->exec("free -m | grep Mem | awk '{print $7}'");

?>


const ctx1 = document.getElementById('myChart1').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'pie',

    data: {

        labels: ['Used', 'Free','Shared','Buff/Cache','Available'],

        datasets: [{
            label: '# of Votes',
            data: [<?= $used ?>, <?= $free ?>, <?= $shared ?>, <?= $buff ?>, <?= $avail ?>],
           
            backgroundColor: [

                'rgba(23, 219, 36, 0.8)',
                'rgba(255, 208, 42, 0.8)',
                'rgba(255, 42, 44, 0.8)',
                'rgba(36, 49, 168, 0.8)',
                'rgba(42, 106, 255, 0.8)'   
            ],
           
            borderColor: [
                'rgba(199, 222, 235, 1)',
                'rgba(54, 152, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(153, 102, 255, 1)'
                
            ],
            borderWidth: 1,
            
        }]
    },

   
    options: { 
      plugins: {


            title: {
                display: true,
                text: 'System Memory Usage',
                font: {
                        size: 20
                    }
            }

          }
      }
});

</script>


    <script>

<?php  

//PHP Error Handling 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 



 $user = $ssh->exec("iostat| awk '{print $1}'| awk 'FNR == 4 {print}'");
 $nice = $ssh->exec("iostat| awk '{print $2}'| awk 'FNR == 4 {print}'");
 $system = $ssh->exec("iostat| awk '{print $3}'| awk 'FNR == 4 {print}'");
 $iowait = $ssh->exec("iostat| awk '{print $4}'| awk 'FNR == 4 {print}'");
 $idle = $ssh->exec("iostat| awk '{print $6}'| awk 'FNR == 4 {print}'");
 

?>
        
    const labels = [
    'User',
    'System',
    'Idle',
    'Iowait',
  ];

  const data2 = {

    labels: labels,
     datasets: [{
      label: 'CUP Utilization',
      backgroundColor: 'rgb(255, 42, 44)',
      borderColor: 'rgb(255, 99, 132)',
      data: [<?= $user ?>, <?= $system ?>, <?= $idle ?>, <?= $iowait ?>],
    }]
  };

  const config2 = {
    type: 'line',
    data: data2,
    options: {  
       plugins: {
            title: {
                display: true,
                text: 'System CPU Usage',
                font: {
                        size: 20
                    }
            }
        }}
  };

         const myChart2 = new Chart(
         document.getElementById('myChart2'),
         config2
  );
</script>


<script>

    <?php

     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);
     
            $puse = $ssh->exec("bash ./myscript/chart/diskinfo.sh");
            $pfree = 100 - $puse;
            ?>

            <?php 

                $len = $ssh->exec('bash myscript/chart/diskinfolist.sh');
                for ($i=0; $i <= $len; $i++) {
    
                  $fs[$i] = $ssh->exec('./myscript/chart/filesystem.sh '.$i);
                  $si[$i] = $ssh->exec('./myscript/chart/Size.sh '.$i);
                  $us[$i] = $ssh->exec('./myscript/chart/Used.sh '.$i);
                  $av[$i] = $ssh->exec('./myscript/chart/Avail.sh '.$i);
                  $usp[$i] = $ssh->exec('./myscript/chart/Use%.sh '.$i);
                  $mo[$i] = $ssh->exec('./myscript/chart/Mounted_On.sh '.$i);
                }
          ?>

const data3 = {
  labels: [
    '% Used',
    '% Free',
  ],

  datasets: [{
    label: 'MemoryDisk Usages',
    data: [<?= $puse ?>,<?= $pfree ?>],
    backgroundColor: [
      'rgb(255, 42, 44, 0.8)',
      'rgb(23, 219, 36, 0.8)'
    ],
    hoverOffset: 4
  }]
};

const config3 = {
  type: 'doughnut',
  data: data3,
  options: { 
      plugins: {
            title: {
                display: true,
                text: 'System Disk Usage',
                font: {
                        size: 20
                    }
            }
        }
      }
};

const myChart3 = new Chart(
         document.getElementById('myChart3'),
         config3
  );

</script>
<?php

              echo "<div class='table1'>";
              echo "<table class='content-table'>";
    
              echo "<thead>";
    
              echo "<tr>";
              echo "<th>Filesystem</th>";
              echo "<th>Size</th>";
              echo "<th>Used</th>";
              echo "<th>Avail</th>";
              echo "<th>Use%</th>";
              echo "<th>Mounted On</th>";
              echo "</tr>";
    
              echo "</thead>";
    
              echo "<tbody>";
              
              for ($i = 1; $i <= $len; $i++) {
    
              echo "<tr>";
              echo "<td>$fs[$i]</td>";
              echo "<td>$si[$i]</td>";
              echo "<td>$us[$i]</td>";
              echo "<td>$av[$i]</td>";
              echo "<td>$usp[$i]</td>";
              echo "<td>$mo[$i]</td>";
              echo "</tr>";
              }
    
            echo "</tbody>";
    
            echo "</table>";
            echo "</div>";
        ?>

<div class="table2">
<table class="content-table">
  <thead>
    <tr>
      <th>Used</th>
      <th>Free</th>
      <th>Shared</th>
      <th>Buff/Cache</th>
      <th>Available</th>
    </tr>
  </thead>
  <tbody>
    <tr class="active-row">
      <td><?= $used ?>MB</td>
      <td><?= $free ?>MB</td>
      <td><?= $shared ?>MB</td>
      <td><?= $buff ?>MB</td>
      <td><?= $avail ?>MB</td>
    </tr>
  </tbody>
</table>

</div>

<div class="table3">
<table class="content-table">
  <thead>
    <tr>
      <th>%User</th>
      <th>%Nice</th>
      <th>%System</th>
      <th>%IOwait</th>
      <th>%Idle</th>
    </tr>
  </thead>
  <tbody>
  
    <tr class="active-row">
      <td><?= $user ?>%</td>
      <td><?= $nice ?>%</td>
      <td><?= $system ?>%</td>
      <td><?= $iowait ?>%</td>
      <td><?= $idle ?>%</td>
    </tr>
    
  </tbody>
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