<?php
    include_once 'include\dbinc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css\styles.css?a">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

        <title>DashBoard</title>
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    </head>
    <body>

        <div class="container">
            <div class="topbar">
                <div class="logo">
                    <h2>TMC</h2> 
                </div>
                <div class="search">
                    <input type="text" id="search" placeholder="search here">
                    <label for="search"> <i class="fas fa-search"></i> </label>
                </div>
                <i class="fas fa-bell"></i>
                <div class="user">
                    <img src="img/user.png" alt="">
                </div>
            </div>

            <div class="sidebar">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fas fa-th-large"></i>
                            <div>DashBoard</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <div>Admin</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-users"></i>
                            <div>Employees</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-chart-bar"></i>
                            <div>Analytics</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-hand-holding-usd"></i>
                            <div>Market</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-cog"></i>
                            <div>Settings</div>
                        </a>
                    </li>
                    <li>
                        <a href="test.php">
                            <i class="fas fa-question"></i>
                            <div>Help</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="main">
                <div class="cards">
                    <div class="card">
                        <div class="card-content">
                            <div class="number">1217</div>
                            <div class="card-name">Customer</div>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">42</div>
                            <div class="card-name">Unpaid Invoice</div>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-address-book"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">68</div>
                            <div class="card-name">Market</div>
                        </div>
                        <div class="icon-box">
                            <i class="fab fa-shopify"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">&#8377;4500</div>
                            <div class="card-name">Earnings</div>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                    </div>
                </div>

                <div class="charts">
                    <div class="chart">
                        <h2>Earnings<select name="year">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022" selected>2022</option>
                            <option value="2023">2023</option>
                        </select></h2>
                        <canvas id="barChart"></canvas><br>
                        <canvas id="subBarChart"></canvas>
                    </div>
                    <div class="chart" id="doughnut-chart">
                        <h2>Revenue</h2>
                        <canvas id="doughnut"></canvas><br>
                        <h2>Property Units</h2>
                        <canvas id="subdoughnut"></canvas>
                    </div>
                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        <?php
    $sql="SELECT * FROM person;";
    $query= $conn->query($sql);
    foreach($query as $data){
        $name[]=$data['name'];
        $amount[]=$data['paid'];
    }
    ?>
        <script src="javascript\chart1.js"></script>  
        <script src="javascript\chart2.js"></script>
        <script src="javascript\chart3.js"></script>
    </body>
</html>