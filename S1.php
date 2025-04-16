<style>
 /* Global Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
}

.container-fluid {
    width: 100%;
    height: 100vh;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    /* background-color: rgb(226, 223, 223); */
}

/* Header Styling */
.main-dashboard-heading {
    text-align: center;
    /* font-size: 2vw; */
    margin-top: 1rem;
    font-weight: bolder;
    font-size: clamp(16px, 1.5vw, 2vw); /* Adjusts size dynamically */
}

/* Box Layout for Data Display */
.d-flex {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: stretch;
    /* align-items: center; */
    font-size: 1.5vw;
    /* font-size: clamp(24px, 1.5vw, 48px); */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    /* gap:1vw; */
}

.box {
    background: white;
    border-radius: 10px;
    font-weight: bold;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    flex: 1;
    max-width: 24%;
    min-height: 18vh;
    height:auto;
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    margin-bottom: 1rem;
}

.vertical-separator {
        border: 2px solid rgb(19, 18, 18);
        height: 90px;
        margin: 10px 10px;
    }

    /* Styling for new-box with less height */
    .new-box {
        background: white;
        border-radius: 10px;
        font-weight: bold;
        text-align: center;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        flex: 1;
        /* min-width: 250px; */
        max-width: 24%;
        /* padding: 1.5vw; */
        min-height: 10vh;
        height:auto;
        /* Less height compared to .box */
        /* margin-bottom: 1vw; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 1rem;
    }

    .new-box .rft {
        /* font-size: 1.5rem; */
        color: #007bff;
        margin-bottom: 5px;
    }

    .new-box .rft strong {
        margin-left: 58px;
    }

    .new-box .defects {
        /* font-size: 1.5rem; */
        color: #dc3545;
    }

    .new-box .defects strong {
        margin-left: 4px;
    }

    .box h4 {
        /* font-size: 1.5vw; */
        color: #333;
        font-weight: bold;
        font-size: clamp(16px, 1.4vw, 1.5vw);
    }

.box .on-track {
    color: #28a745;
}

.box .d-flex {
    display: flex;
    justify-content: space-between;
    width: 100%;
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.4vw, 1.5vw);
}

.content-left,
.content-right {
    display: inline-block;
    width: 45%;
    vertical-align: top;
    text-align: center;
}

.content-left p,
.content-right p {
    color: #4b4949;
}

/* Table & Pie Chart Section */
.table-pie-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 24vh;
    gap:2vw;
}

.pie-chart-container {
    width: 41%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    border-radius: 10px;
    background: white;
    box-shadow: 0px 4px 10px rgba (0, 0, 0, 0.1);
}

.table-responsive {
    width: 56%;
    height: 100%;
    background: white;
    padding: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

table {
    width: 100%;
    height: 100%;
    border-collapse: collapse;
    /* font-size: 1vw; */
    font-size: clamp(16px, 0.9vw, 1vw);
    font-weight: bold;
}

th,
td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #e0f7fa;
}

/* Date & Time Display */
.date-time-container {
    position: fixed;
    top: 1%;
    left: 1%;
    padding: 10px;
    font-family: Arial, sans-serif;
    z-index: 1000;
    display: flex !important;
    justify-content: space-between;
    align-items: center;
}

#current-date,
#current-time {
    background-color: rgb(59, 229, 252);
    color: rgb(29, 28, 28);
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    font-weight: bold;
    padding: 10px;
}

/* Bottom Two Bar Graphs */
.two-bar-below {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 29vh;
}

/* Ensuring both graph containers take equal height */
.seasonalProdChart-chart-container,
.seasonalOrderChart-chart-container {
    width: 56%;
    height: 100%;
    border-radius: 10px;
    padding: 10px;
    background: white;
    box-shadow: 0px 4px 10px rgba (0, 0, 0, 0.1);
    
}

.seasonalOrderChart-chart-container {
    width: 41%;
}

.two-bar-below p {
    text-align: center;
    font-weight: bold;
    /* font-size: 1vw; */
    font-size: clamp(16px, 1vw, 1.2vw);
}

</style>
</head>

<body>

    <!-- Live Time & Date Display -->
    <div class="date-time-container">
        <div id="current-date"></div>
        <hr>
        <div id="current-time"></div>
    </div>

    <!-- Main Dashboard Content -->
    <div class="container-fluid">

        <!-- Main Dashboard Heading -->
        <h1 class="main-dashboard-heading">MAIN DASHBOARD</h1>
        <!-- Existing Boxes -->
        <div class="d-flex">

            <?php
            $LFB_monthly_data = 0; // to get total Passed.
            $TMB_monthly_data = 0;
            $OMB_monthly_data = 0;
            $FIN_monthly_data = 0;

            $monthly_actual_production = 0;

            $LFB_monthly_data_rft = 0; // to get monthly RFT
            $TMB_monthly_data_rft = 0;
            $OMB_monthly_data_rft = 0;
            $FIN_monthly_data_rft = 0;

            $LFB_monthly_data_total_failed = 0; // to get monthly total failed.
            $TMB_monthly_data_total_failed = 0;
            $OMB_monthly_data_total_failed = 0;
            $FIN_monthly_data_total_failed = 0;

            $LFB_monthly_data_total_checked = 0; // to get total Checked.
            $TMB_monthly_data_total_checked = 0;
            $OMB_monthly_data_total_checked = 0;
            $FIN_monthly_data_total_checked = 0;

            $LFB_monthly_data_defects = 100; // to get total Checked.
            $TMB_monthly_data_defects = 100;
            $OMB_monthly_data_defects = 100;
            $FIN_monthly_data_defects = 100;




            // getting forming of months from 1st date to current dsay of month...
            if (isset($Lfb_Forming_monthly_data) && !empty($Lfb_Forming_monthly_data)) {

                foreach ($Lfb_Forming_monthly_data as $per_day_data) {

                    $LFB_monthly_data += $per_day_data['TotalPass']; // to get monthly Actual Prodcution of LFB.
                    $LFB_monthly_data_total_checked += $per_day_data['TotalChecked'];
                    //rft
                    $LFB_monthly_data_rft = ($LFB_monthly_data / $LFB_monthly_data_total_checked) * 100;
                    $LFB_monthly_data_rft = (int) $LFB_monthly_data_rft;
                    // Calculating Monthly data Defects
                    $LFB_monthly_data_defects = 100 - $LFB_monthly_data_rft;

                }

                // echo $LFB_monthly_data_total_checked;
            }


            if (isset($Competition_Forming_monthly_data) && !empty($Competition_Forming_monthly_data)) {

                foreach ($Competition_Forming_monthly_data as $per_day_data) {

                    $TMB_monthly_data += $per_day_data['TotalPass'];
                    $TMB_monthly_data_total_checked += $per_day_data['TotalChecked'];
                    //rft
                    $TMB_monthly_data_rft = ($TMB_monthly_data / $TMB_monthly_data_total_checked) * 100;
                    $TMB_monthly_data_rft = (int) $TMB_monthly_data_rft;

                    $TMB_monthly_data_defects = 100 - $TMB_monthly_data_rft;
                }

            }

            if (isset($Urban_Forming_monthly_data) && !empty($Urban_Forming_monthly_data)) {

                foreach ($Urban_Forming_monthly_data as $per_day_data) {

                    $OMB_monthly_data += $per_day_data['TotalPass'];
                    $OMB_monthly_data_total_checked += $per_day_data['TotalChecked'];
                    //rft
                    $OMB_monthly_data_rft = ($OMB_monthly_data / $OMB_monthly_data_total_checked) * 100;
                    $OMB_monthly_data_rft = (int) $OMB_monthly_data_rft;

                    $OMB_monthly_data_defects = 100 - $OMB_monthly_data_rft;


                }

            }


            if (isset($Finale_Forming_monthly_data) && !empty($Finale_Forming_monthly_data)) {

                foreach ($Finale_Forming_monthly_data as $per_day_data) {

                    $FIN_monthly_data += $per_day_data['TotalPass'];
                    $FIN_monthly_data_total_checked += $per_day_data['TotalChecked'];
                    //rft
                    $FIN_monthly_data_rft = ($FIN_monthly_data / $FIN_monthly_data_total_checked) * 100;

                    $FIN_monthly_data_rft = (int) $FIN_monthly_data_rft;

                    $FIN_monthly_data_defects = 100 - $FIN_monthly_data_rft;
                }

            }

            $monthly_actual_production = $LFB_monthly_data + $TMB_monthly_data + $OMB_monthly_data + $FIN_monthly_data;


            // Monthly Shipped Volume Working....
            $total_Monthly_Shipped_Volume_LFB = 0;
            $total_Monthly_Shipped_Volume_TMB = 0;
            $total_Monthly_Shipped_Volume_OMB = 0;
            $total_Monthly_Shipped_Volume_FIN = 0;

            if (isset($Monthly_Shipped_Volumes) && !empty($Monthly_Shipped_Volumes)) {

                foreach ($Monthly_Shipped_Volumes as $entry) {

                    if ($entry['FactoryCode'] == 'B34002') { // TMB // Competition
            
                        $total_Monthly_Shipped_Volume_TMB += $entry['Shipped_Volume'];
                    }

                    if ($entry['FactoryCode'] == 'B34003') { // Finale
            
                        $total_Monthly_Shipped_Volume_FIN += $entry['Shipped_Volume'];
                    }

                    if ($entry['FactoryCode'] == 'B34007') { // LFB
            
                        $total_Monthly_Shipped_Volume_LFB += $entry['Shipped_Volume'];
                    }

                    if ($entry['FactoryCode'] == 'B34004') {  // OMB/Urban
            
                        $total_Monthly_Shipped_Volume_OMB += $entry['Shipped_Volume'];
                    }

                }
            }
            ?>

<?php 

// Initialize the required variables
$total_Monthly_Volume = 0; // PLANNED VOLUME
$total_Monthly_Planned_Volume_LFB = 0;
$total_Monthly_Planned_Volume_TMB = 0;
$total_Monthly_Planned_Volume_OMB = 0;
$total_Monthly_Planned_Volume_FIN = 0;

// Check if the array is set and not empty
if (isset($Monthly_Volumes) && !empty($Monthly_Volumes)) {

    foreach ($Monthly_Volumes as $entry) {

        // Ensure 'FactoryCode' exists before comparing
        if (!isset($entry['FactoryCode'])) {
            echo "FactoryCode key is missing in entry!<br>";
            continue; // Skip this iteration
        }

        // Trim any spaces for comparison // for better matching and filtering... sometimes spaces issue occurs...
        $factoryCode = trim($entry['FactoryCode']);

        if ($factoryCode == 'B34002') { // TMB // Competition
            $total_Monthly_Volume += (int) $entry['PlanQty'];
            $total_Monthly_Planned_Volume_TMB += (int) $entry['PlanQty'];
            
        }

        if ($factoryCode == 'B34003') { // Finale
            $total_Monthly_Volume += (int) $entry['PlanQty'];
            $total_Monthly_Planned_Volume_FIN += (int) $entry['PlanQty'];
            
        }

        if ($factoryCode == 'B34004') { // OMB // Urban
            $total_Monthly_Volume += (int) $entry['PlanQty'];
            $total_Monthly_Planned_Volume_OMB += (int) $entry['PlanQty'];
            
        }

        if ($factoryCode == 'B34007') { // LFB 
            $total_Monthly_Volume += (int) $entry['PlanQty'];
            $total_Monthly_Planned_Volume_LFB += (int) $entry['PlanQty'];
        }
    }
} 
//     else {
//          echo "Monthly_Volumes is empty or not set!";
// }

// echo $total_Monthly_Planned_Volume_OMB . "<br>";
// echo $total_Monthly_Planned_Volume_TMB . "<br>";
// echo $total_Monthly_Planned_Volume_LFB . "<br>";
// echo $total_Monthly_Planned_Volume_FIN . "<br>";
// die;
?>



            <div class="box">
                <h4>LFB</h4>
                <div class="on-track">
                    <i class="fas fa-check-circle"></i> ON TRACK
                </div>
                <div class="d-flex">
                    <div class="content-left">
                        <p>PROD</p>
                        <strong><?php echo $LFB_monthly_data ?> </strong>
                    </div>

                    <div class="vertical-separator"></div>

                    <div class="content-right">
                        <p>TARGET</p>
                        <!-- Check for FactoryCode Of LFB B34007 -->
                        <!-- Target is Monthly Planned Volume -->
                        <strong><?php echo $total_Monthly_Planned_Volume_LFB; ?></strong> <!-- Display PlanQty -->
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>TMB</h4>
                <div class="on-track">
                    <i class="fas fa-check-circle"></i> ON TRACK
                </div>
                <div class="d-flex">
                    <div class="content-left">
                        <p>PROD</p>
                        <strong><?php echo $TMB_monthly_data ?> </strong>
                    </div>

                    <div class="vertical-separator"></div>

                    <div class="content-right">
                        <p>TARGET</p>
                       <!-- Target is Monthly Planned Volume -->
                       <strong><?php echo $total_Monthly_Planned_Volume_TMB ; ?></strong> <!-- Display PlanQty -->
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>OMB</h4>
                <div class="on-track">
                    <i class="fas fa-check-circle"></i> ON TRACK
                </div>
                <div class="d-flex">
                    <div class="content-left">
                        <p>PROD</p>
                        <strong><?php echo $OMB_monthly_data ?> </strong>
                    </div>

                    <div class="vertical-separator"></div>

                    <div class="content-right">
                        <p>TARGET</p>
                       <!-- Target is Monthly Planned Volume -->
                       <strong><?php echo $total_Monthly_Planned_Volume_OMB ; ?></strong> <!-- Display PlanQty -->
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>FIN</h4>
                <div class="on-track">
                    <i class="fas fa-check-circle"></i> ON TRACK
                </div>
                <div class="d-flex">
                    <div class="content-left">
                        <p>PROD</p>
                        <strong><?php echo $FIN_monthly_data ?> </strong>
                    </div>
                    <div class="vertical-separator"></div>

                    <div class="content-right">
                        <p>TARGET</p>
                        <!-- Target is Monthly Planned Volume -->
                        <strong><?php echo $total_Monthly_Planned_Volume_FIN ; ?></strong> <!-- Display PlanQty -->
                    </div>
                </div>
            </div>
        </div>
        <!-- New Boxes Below -->
        <div class="d-flex">

            <!-- HTML Code to Display the Results -->
            <div class="new-box">
                <div class="rft">RFT <strong><?php echo $LFB_monthly_data_rft; ?>%</strong></div>
                <div class="defects">DEFECTS <strong><?php echo $LFB_monthly_data_defects; ?>%</strong></div>
            </div>

            <div class="new-box">
                <div class="rft">RFT <strong><?php echo $TMB_monthly_data_rft; ?>%</strong></div>
                <div class="defects">DEFECTS <strong><?php echo $TMB_monthly_data_defects; ?>%</strong></div>
            </div>

            <div class="new-box">
                <div class="rft">RFT <strong><?php echo $OMB_monthly_data_rft; ?>%</strong></div>
                <div class="defects">DEFECTS <strong><?php echo $OMB_monthly_data_defects; ?>%</strong></div>
            </div>

            <div class="new-box">
                <div class="rft">RFT <strong><?php echo $FIN_monthly_data_rft; ?>%</strong></div>
                <div class="defects">DEFECTS <strong><?php echo $FIN_monthly_data_defects; ?>%</strong></div>
            </div>
        </div>

        <!-- Table and Pie Chart Wrapper -->
        <div class="table-pie-wrapper">

            <div class="table-responsive">
                <table id="data-table">
                    <thead>
                        <tr>
                            <th>Factory</th>
                            <!-- <th># of Lines</th> -->
                            <th>Working Days of Month</th>
                            <th>Monthly Planed Volume</th>
                            <th>Monthly Actual Production</th>
                            <th>Live Production</th>
                        </tr>
                    </thead>
                    <tbody>

    
                        <tr>
                            <td>LFB</td>
                            <td id="current-day-month-1"></td> <!-- Current date Displaying -->
                            <td><?php echo $total_Monthly_Planned_Volume_LFB ; ?></td> <!-- Now we will calculate Monthly Planed Volume Dynamically For LFB -->
                            
                            <?php
                            $LFB_totalCheckedBalls = 0;
                            $LFB_totalPassed = 0;
                            if (isset($Lfb_Forming) && !empty($Lfb_Forming)): ?>
                                <?php foreach ($Lfb_Forming as $entry):
                                    $LFB_totalCheckedBalls += $entry['TotalChecked']; ?>
                                <?php endforeach; ?>
                                <td><?php echo $LFB_monthly_data ?></td>
                                <td><?php echo $LFB_totalCheckedBalls ?></td>
                            <?php else: ?>
                                <td><?php echo $LFB_monthly_data ?? 0 ?></td>
                                <td><?php echo $LFB_totalCheckedBalls ?? 0 ?></td>
                            <?php endif; ?>
                        </tr>

                        <tr>
                            <td>TMB</td>
                            <td id="current-day-month-2"></td>
                            <td><?php echo $total_Monthly_Planned_Volume_TMB ; ?></td> <!-- Now we will calculate Monthly Planed Volume Dynamically For TMB -->
                            <?php
                            $TMB_totalCheckedBalls = 0;
                            $TMB_totalPassed = 0;
                            if (isset($Competition_Forming) && !empty($Competition_Forming)): ?>
                                <?php foreach ($Competition_Forming as $entry):
                                    $TMB_totalCheckedBalls += $entry['TotalChecked']; ?>
                                <?php endforeach; ?>
                                <td><?php echo $TMB_monthly_data ?></td>
                                <td><?php echo $TMB_totalCheckedBalls ?></td>
                            <?php else: ?>
                                <td><?php echo $TMB_monthly_data ?></td>
                                <td><?php echo $TMB_totalCheckedBalls ?></td>
                            <?php endif; ?>
                        </tr>

                        <tr>
                            <td>OMB</td>
                            <td id="current-day-month-3"></td>
                            <td><?php echo $total_Monthly_Planned_Volume_OMB ; ?></td> <!-- Now we will calculate Monthly Planed Volume Dynamically For OMB -->
                            <?php
                            $OMB_totalCheckedBalls = 0;
                            $OMB_totalPassed = 0;
                            if (isset($Urban_Forming) && !empty($Urban_Forming)): ?>
                                <?php foreach ($Urban_Forming as $entry):
                                    $OMB_totalCheckedBalls += $entry['TotalChecked']; ?>
                                <?php endforeach; ?>
                                <td><?php echo $OMB_monthly_data ?></td>
                                <td><?php echo $OMB_totalCheckedBalls ?></td>
                            <?php else: ?>
                                <td><?php echo $OMB_monthly_data ?></td>
                                <td><?php echo $OMB_totalCheckedBalls ?></td>
                            <?php endif; ?>
                        </tr>

                        <tr>
                            <td>Finale</td>
                            <td id="current-day-month-4"></td>
                            <td><?php echo $total_Monthly_Planned_Volume_FIN ; ?></td> <!-- Now we will calculate Monthly Planed Volume Dynamically For FIN -->
                            <?php
                            $FIN_totalCheckedBalls = 0;
                            $FIN_totalPassed = 0;
                            if (isset($Finale_Forming) && !empty($Finale_Forming)): ?>
                                <?php foreach ($Finale_Forming as $entry):
                                    $FIN_totalCheckedBalls += $entry['TotalChecked']; ?>
                                <?php endforeach; ?>
                                <td><?php echo $FIN_monthly_data ?></td>
                                <td><?php echo $FIN_totalCheckedBalls ?></td>
                            <?php else: ?>
                                <td><?php echo $FIN_monthly_data ?></td>
                                <td><?php echo $FIN_totalCheckedBalls ?></td>
                            <?php endif; ?>
                        </tr>


                    </tbody>
                </table>
            </div>

            <div class="pie-chart-container">
                <canvas id="barChart3"></canvas>
            </div>
        </div>

        <div class="two-bar-below">
            <div class="seasonalProdChart-chart-container">
                <!-- <div class="text">Bar Graph Seasonal Prod</div> -->
                <canvas id="seasonalProdChart"></canvas>
                <!-- <p>Seasonal Prod Chart</p> -->
            </div>

            <!-- <div class="vertical-separator"></div> -->
            <div class="seasonalOrderChart-chart-container">
                <!-- <div class="text">Seasonal Shipped Volume</div> -->
                <canvas id="seasonalOrderChart"></canvas>
                <!-- <p>Seasonal Order Chart</p> -->
            </div>

        </div>

    </div>

<!-- Bootstrap 5 JS and Popper.js CDN -->
<script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

    Chart.register(ChartDataLabels);
    
    // Outer Loop: Loop through each forming array
    <?php
    // Sum total checked balls from all forming arrays
    $formingArrays = [$Lfb_Forming, $Competition_Forming, $Finale_Forming, $Urban_Forming];
    $totalCheckedSum = 0;

    foreach ($formingArrays as $forming) {
        if (!empty($forming)) {
            foreach ($forming as $entry) {
                $totalCheckedSum += $entry['TotalChecked'] ?? 0;
            }
        }
    }
    
    ?>

   

    // Apply the updated settings to the Pie Chart

// Steps to Fix the Font Size Issue in Chart.js
// Adjust font sizes dynamically using window.innerWidth
// Modify options in Chart.js to set font sizes based on screen width
// Ensure it scales properly on different LCD sizes

function getFontSize() {
    let screenWidth = window.innerWidth;

    if (screenWidth >= 2560) return 36;  // 4K Screens
    if (screenWidth >= 1920 && screenWidth < 2560) return 24;  // Full HD (55-inch screens)
    if (screenWidth >= 1366 && screenWidth < 1920) return 18;  // 50-inch screens
    if (screenWidth >= 1024 && screenWidth < 1366) return 14;  // 45-inch screens
    return 12;  // Default for smaller screens
}

// Function to update all charts dynamically
function updateAllCharts() {
    let fontSize = getFontSize();

    Chart.helpers.each(Chart.instances, function(chart) {
        if (chart.options) {
            chart.options.plugins.legend.labels.font.size = fontSize;
            chart.options.plugins.tooltip.titleFont.size = fontSize;
            chart.options.plugins.tooltip.bodyFont.size = fontSize;
            chart.options.plugins.datalabels.font.size = fontSize;

            chart.update();
        }
    });
}

console.log(getFontSize());

const pieChartOptions = {
    responsive: true,
    maintainAspectRatio: false, 
    plugins: {
        legend: {
            position: "top",
            labels: {
                font: {
                    size: getFontSize(), // ✅ Increase legend font size
                    weight: "bold"
                },
                color: "#333"
            }
        },
        tooltip: {
            titleFont: {
                size: getFontSize() // ✅ Increase tooltip title font size
            },
            bodyFont: {
                size: getFontSize() // ✅ Increase tooltip content size
            },
            callbacks: {
                label: function (tooltipItem) {
                    let value = tooltipItem.raw;
                    return ` ${tooltipItem.label}: ${value.toLocaleString()}`;
                }
            }
        },
        datalabels: {
            color: "#fff", // ✅ White text for better contrast
            font: {
                weight: "bold",
                size: getFontSize() // ✅ Increase font size for numbers inside the chart
            },
            anchor: "center", // ✅ Perfectly center the text
            align: "center",
            textStrokeColor: "black", // ✅ Black stroke around text for visibility
            textStrokeWidth: 4 // ✅ Ensures text stands out
        }
    }
};

const ctx3 = document.getElementById('barChart3').getContext('2d');
    var greenGradient = ctx3.createLinearGradient(0, 0, 0, 400); // Vertical gradient
    greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
    greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
    greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
    greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
    greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
    greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth

    var blueGradient = ctx3.createLinearGradient(0, 0, 0, 400); // Vertical gradient
    blueGradient.addColorStop(0, '#00c3ff');  // Neon Sky Blue
    blueGradient.addColorStop(0.25, '#0088ff'); // Bright Blue
    blueGradient.addColorStop(0.5, '#0051ff');  // Deep Electric Blue
    blueGradient.addColorStop(0.75, '#0026ff'); // Darker Royal Blue
    blueGradient.addColorStop(1, '#00008b');  // Ultra Deep Blue

// Apply the updated settings to the Pie Chart
const pieChart = new Chart(ctx3, {
    type: "pie",
    data: {
        labels: ["Monthly Planned Volume", "Monthly Actual Production"],
        datasets: [{
            label: "Production Comparison",
            data: [<?php echo $total_Monthly_Volume ?>, <?php echo $monthly_actual_production ?>],
            backgroundColor: [greenGradient, blueGradient],
            borderColor: "#fff",
            borderWidth: 2
        }]
    },
    options: pieChartOptions
});



const chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            labels: {
                font: {
                    size: getFontSize() // ✅ Increases legend font size for readability
                }
            }
        },
        tooltip: {
            titleFont: {
                size: getFontSize() // ✅ Makes tooltip titles larger
            },
            bodyFont: {
                size: getFontSize() // ✅ Makes tooltip text easier to read
            }
        },
        datalabels: {
            anchor: "end",
            align: "top",
            color: "#000",
            font: {
                weight: "bold",
                size: getFontSize() // ✅ Increases bar labels size (shipped volume)
            },
            clip: false // ✅ Ensures labels are fully visible
        }
    },
    scales: {
        x: {
            ticks: {
                font: {
                    size: getFontSize() // ✅ Makes x-axis labels bigger
                }
            }
        },
        y: {
            beginAtZero: true,
            grace: "20%", // ✅ Reduces empty space at the top
            ticks: {
                font: {
                    size: getFontSize() // ✅ Increases y-axis labels for better readability
                }
            }
        }
    }
};


    // Bar Graph 1 - Seasonal Production
    var ctxProd = document.getElementById('seasonalProdChart').getContext('2d');
    var greenGradient = ctxProd.createLinearGradient(0, 0, 0, 400); // Vertical gradient
    greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
    greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
    greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
    greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
    greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
    greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth
    
// Apply the updated settings to the Seasonal Production Chart
var seasonalProdChart = new Chart(ctxProd, {
    type: "bar",
    data: {
        labels: [
            <?php
            if (isset($Monthly_Volumes) && !empty($Monthly_Volumes)) {
                foreach ($Monthly_Volumes as $entry) {
                    echo "'Factory " . $entry['FactoryCode'] . "', ";
                }
            }
            ?>
        ],
        datasets: [{
            label: "Seasonal Production",
            data: [
                <?php
                if (isset($Monthly_Volumes) && !empty($Monthly_Volumes)) {
                    foreach ($Monthly_Volumes as $entry) {
                        echo $entry['PlanQty'] . ", ";
                    }
                }
                ?>
            ],
            backgroundColor: greenGradient,
            borderColor: greenGradient,
            borderWidth: 1
        }]
    },
    options: chartOptions
});
    // Bar Graph 2 - Seasonal Order Volume (Shipped)
    var ctxOrder = document.getElementById('seasonalOrderChart').getContext('2d');
    var greenGradient = ctxOrder.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth


// Apply the settings to the chart
var seasonalOrderChart = new Chart(ctxOrder, {
    type: "bar",
    data: {
        labels: [
            <?php
            if (isset($Monthly_Shipped_Volumes) && !empty($Monthly_Shipped_Volumes)) {
                foreach ($Monthly_Shipped_Volumes as $entry) {
                    echo "'Factory " . $entry['FactoryCode'] . "', ";
                }
            }
            ?>
        ],
        datasets: [{
            label: "Seasonal Order Volume (Shipped)",
            data: [
                <?php
                if (isset($Monthly_Shipped_Volumes) && !empty($Monthly_Shipped_Volumes)) {
                    foreach ($Monthly_Shipped_Volumes as $entry) {
                        echo $entry['Shipped_Volume'] . ", ";
                    }
                }
                ?>
            ],
            backgroundColor: greenGradient,
            borderColor: greenGradient,
            borderWidth: 1
        }]
    },
    options: chartOptions
});

    function updateDateTime() {
        const dateElement = document.getElementById('current-date');
        const timeElement = document.getElementById('current-time');

        const now = new Date();

        // Extract day, month, and year
        const day = String(now.getDate()).padStart(2, '0'); // Ensure 2-digit format
        const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-based
        const year = now.getFullYear();

        // Format date as DD:MM:YYYY
        const dateStr = `${day}:${month}:${year}`;

        // Format time as HH:MM:SS
        const timeStr = now.toLocaleTimeString();

        dateElement.textContent = dateStr;
        timeElement.textContent = timeStr;
    }

    // Update date and time every second
    setInterval(updateDateTime, 1000);

    // Initial call to show immediately
    updateDateTime();


    // Function to get the current day and total days in the current month and display them
    function displayCurrentDayAndTotalDays() {
        // Create a new Date object to get the current date
        const today = new Date();

        // Get the current day of the month (1-31)
        const dayNumber = today.getDate();

        // Get the current month and year
        const month = today.getMonth();
        const year = today.getFullYear();

        // Create a date for the first day of the next month
        const nextMonth = new Date(year, month + 1, 0);

        // Get the total number of days in the current month
        const totalDaysInMonth = nextMonth.getDate();

        // Format the result as 'day/totalDaysInMonth'
        const formattedDate = `${dayNumber}/${totalDaysInMonth}`;

        // Display the formatted date in both elements with ids 'element1' and 'element2'
        document.getElementById("current-day-month-1").textContent = formattedDate;
        document.getElementById("current-day-month-2").textContent = formattedDate;
        document.getElementById("current-day-month-3").textContent = formattedDate;
        document.getElementById("current-day-month-4").textContent = formattedDate;
    }

    // Run the displayCurrentDayAndTotalDays function when the page loads
    window.onload = displayCurrentDayAndTotalDays;

    // ✅ Initialize All Charts
updateAllCharts();

// ✅ Update Charts on Screen Resize
window.addEventListener("resize", updateAllCharts);


    setTimeout(function() {
        window.location = "<?php echo base_url('DD/S2'); ?>";
    }, 30000); // 30 seconds


</script>

</body>

</html>