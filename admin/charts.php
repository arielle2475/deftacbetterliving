<?php 


require_once 'Reports.php';

$current_day = date('d');
$current_month = date('F');
$current_year = date('Y');

$yearly_sales = Reports::get_yearly_sales();
$yearly_title = "$current_month " . ($current_year - 1) .  "-$current_year";

$monthly_sales = Reports::get_monthly_sales();
$monthly_title = $monthly_sales[0]['SalesMonth'] . " " . $monthly_sales[0]['SalesDay'] . " - " . end($monthly_sales)['SalesMonth'] . " " . end($monthly_sales)['SalesDay'];

$weekly_sales = Reports::get_weekly_sales();
$week_title =  $weekly_sales[0]['SalesDate'] . " - " . end($weekly_sales)['SalesDate'];


 
      ?>

<br>
<br>
<br>

<div class="container">

<div id="week">
    <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
        <canvas id="weeklyChart"></canvas>

    </div>
    </div>


<div id="month">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
                <canvas id="monthlyChart"></canvas>
            </div>

</div>


            <div id="year">
                <div class="row">

                    <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
                        <canvas id="yearlyChart"></canvas>
                    </div>
                </div>

            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script>
            var yearly_chart = document.getElementById('yearlyChart').getContext('2d');
            var chart = new Chart(yearly_chart, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels: [
                        <?php foreach($yearly_sales as $key => $item){echo '"' . $item['SalesMonth'] . ' ('. $item['SalesYear'] . ')",';} ?>
                    ],

                    datasets: [{
                        label: "Sales",
                        borderColor: 'green',
                        backgroundColor: 'blue',
                        data: [
                            <?php foreach($yearly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>
                        ],
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'Deftac Membership Yearly Sales Report (<?php echo $yearly_title ?>)',
                        fontSize: 18,
                        fontString: 'sans-serif',
                        fontColor: 'blue'

                    },
                    layout: {
                        padding: {
                            left: 150,
                            right: 150,
                            top: 150,
                            bottom: 150
                        }
                    }
                }
            });



            var monthly_chart = document.getElementById('monthlyChart').getContext('2d');
            var chart = new Chart(monthly_chart, {
                // The type of chart we want to create
                type: 'line',
                // The data for our dataset
                data: {
                    labels: [
                        <?php foreach($monthly_sales as $key => $item){echo '"' . $item['SalesMonth'] . ' '. $item['SalesDay'] . '",';} ?>
                    ],

                    datasets: [{
                        label: "Sales",
                        borderColor: 'blue',
                        backgroundColor: 'green',
                        data: [
                            <?php foreach($monthly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>
                        ],
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'Deftac Membership Monthly Sales Report (<?php echo $monthly_title ?>)',
                        fontSize: 18,
                        fontString: 'sans-serif',
                        fontColor: 'green'
                    },
                    layout: {
                        padding: {
                            left: 150,
                            right: 150,
                            top: 150,
                            bottom: 150
                        }
                    }
                }
            });


            var weekly_chart = document.getElementById('weeklyChart').getContext('2d');
            var chart = new Chart(weekly_chart, {
                // The type of chart we want to create
                type: 'horizontalBar',
                // The data for our dataset
                data: {
                    labels: [
                        <?php foreach($weekly_sales as $key => $item){echo '"' . $item['SalesDay'] . ' '. $item['SalesDate'] . '",';} ?>
                    ],

                    datasets: [{
                        label: "Sales",
                        borderColor: 'yellow',
                        backgroundColor: 'orange',
                        data: [
                            <?php foreach($weekly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>
                        ],
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'Deftac Membership Weekly Sales Report (<?php echo $week_title ?>)',
                        fontSize: 18,
                        fontString: 'sans-serif',
                        fontColor: 'orange',

                    },
                    layout: {
                        padding: {
                            left: 150,
                            right: 150,
                            top: 150,
                            bottom: 150
                        }
                    }
                }
            });
        </script>
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/inspinia.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/login.js"></script>