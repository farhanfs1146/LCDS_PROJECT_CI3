<style>
    /* Global Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f8f9fa;
        width: 100vw;
        height: 100vh;
        display: flex;
        flex-direction: column;
        /* overflow-x: hidden; ✅ Prevents horizontal scrolling */
    }

    /* Main Container */
    .container-fluid {
        width: 100%;
        height: 100vh;
        /* ✅ Full LCD height */
        padding: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* background-color: rgb(226, 223, 223); */
    }

    /* Header Styling */
    h1 {
        text-align: center;
    /* font-size: 2vw; */
    margin-top: 1rem;
    font-weight: bolder;
    font-size: clamp(16px, 1.5vw, 2vw); /* Adjusts size dynamically */
    }

    /* Flexbox Layout for Boxes */
    .d-flex {
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
        align-items: center;
        font-size: 1.5vw;
        font-size: 1.5vw;
    /* font-size: clamp(24px, 1.5vw, 48px); */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    /* gap:1vw; */
    }

    /* Data Boxes */
    .box {
        background: white;
    border-radius: 10px;
    font-weight: bold;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    flex: 1;
    max-width: 23%;
    min-height: 18vh;
    height:auto;
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.4vw, 1.5vw);

    }

    .box .on-track {
        /* font-size: 1.5rem; */
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
        text-align: center;
    }

    .content-left p,
    .content-right p {
        /* font-size: 1.5vw; */
        font-size: clamp(16px, 1.4vw, 1.5vw);
        color: #4b4949;
    }

    .box h4 {
        /* font-size: 1.5vw; */
        font-size: clamp(16px, 1.4vw, 1.5vw);
        color: #333;
        font-weight: bold;
    }

    /* Vertical Separator Between Content */
    .vertical-separator {
        border: 2px solid rgb(19, 18, 18);
        height: 90px;
        margin: 10px 10px;
    }

    /* ✅ Pie Chart Section */
    .pie-charts-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 20vh;
    }

    .pie-chart-container {
        width: 23%;
        height: 100%;
        /* background: white; */
        border-radius: 10px;
        /* box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* ✅ Scatter Plot Section */
    .scatter-plots-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 42vh;
    }

    .scatter-plot-container {
        width: 46%;
        height: 100%;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.5rem;
    }

    /* Date & Time Display */
    .date-time-container {
        position: fixed;
        top: 1%;
        left: 1%;
        padding: 10px;
        font-family: Arial, sans-serif;
        z-index: 1000;
        display: flex;
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

  
</style>

</head>

<body>

    <div class="date-time-container">
        <div id="current-date"></div>
        <hr>
        <div id="current-time"></div>
    </div>

    <!-- Main Content Container -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1>QUALITY TODAY LINE WISE GRAPH</h1>

        <!-- Two Boxes Section -->
        <div class="d-flex">
            <div class="box">
                <h4>LFB</h4>
                <div class="on-track">
                    <strong>
                        <?php
                        $totalCheckedBalls = 0;
                        $rft = 0;
                        $totalPassed = 0;

                        if (isset($Lfb_Forming) && is_array($Lfb_Forming) && !empty($Lfb_Forming)) {
                            foreach ($Lfb_Forming as $entry) {
                                $totalCheckedBalls += $entry['TotalChecked'] ?? 0;
                                $totalPassed += $entry['TotalPass'] ?? 0;
                            }

                            // Calculate RFT (only if there's data)
                            if ($totalCheckedBalls > 0) {
                                $rft = ($totalPassed / $totalCheckedBalls) * 100;
                                $rft = (int) $rft; // Convert to integer
                            }
                        }

                        echo $totalCheckedBalls;  // This will replace the 500
                        ?>
                    </strong>
                </div>

                <div class="d-flex">
                    <div class="content-left">
                        <p>LIVE RFT</p>
                        <?php if ($totalCheckedBalls > 0): ?>
                            <strong><?php echo $rft; ?>%</strong>
                        <?php else: ?>
                            <p class="no-data">0</p>
                        <?php endif; ?>
                    </div>

                    <div class="vertical-separator"></div>

                    <div class="content-right">
                        <p>RFT TARGET</p>
                        <strong>98%</strong>
                    </div>
                </div>
            </div>


            <div class="box">
                <h4>TMB</h4>
                <div class="on-track">
                    <strong>
                        <?php
                        $totalCheckedBalls = 0;
                        $rft = 0;
                        $totalPassed = 0;

                        if (isset($Competition_Forming) && is_array($Competition_Forming) && !empty($Competition_Forming)) {
                            foreach ($Competition_Forming as $entry) {
                                $totalCheckedBalls += $entry['TotalChecked'] ?? 0;
                                $totalPassed += $entry['TotalPass'] ?? 0;
                            }

                            // Calculate RFT (only if there's data)
                            if ($totalCheckedBalls > 0) {
                                $rft = ($totalPassed / $totalCheckedBalls) * 100;
                                $rft = (int) $rft; // Convert to integer
                            }
                        }

                        echo $totalCheckedBalls;  // This will replace the 500
                        ?>
                    </strong>
                </div>

                <div class="d-flex">
                    <div class="content-left">
                        <p>LIVE RFT</p>
                        <?php if ($totalCheckedBalls > 0): ?>
                            <strong><?php echo $rft; ?>%</strong>
                        <?php else: ?>
                            <p class="no-data">0</p>
                        <?php endif; ?>
                    </div>

                    <div class="vertical-separator"></div>

                    <div class="content-right">
                        <p>RFT TARGET</p>
                        <strong>98%</strong>
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>OMB</h4>
                <div class="on-track">
                    <strong>
                        <?php
                        $totalCheckedBalls = 0;
                        $rft = 0;
                        $totalPassed = 0;

                        if (isset($Urban_Forming) && is_array($Urban_Forming) && !empty($Urban_Forming)) {
                            foreach ($Urban_Forming as $entry) {
                                $totalCheckedBalls += $entry['TotalChecked'] ?? 0;
                                $totalPassed += $entry['TotalPass'] ?? 0;
                            }

                            // Calculate RFT (only if there's data)
                            if ($totalCheckedBalls > 0) {
                                $rft = ($totalPassed / $totalCheckedBalls) * 100;
                                $rft = (int) $rft; // Convert to integer
                            }
                        }

                        echo $totalCheckedBalls;  // This will replace the 500
                        ?>
                    </strong>
                </div>

                <div class="d-flex">
                    <div class="content-left">
                        <p>LIVE RFT</p>
                        <?php if ($totalCheckedBalls > 0): ?>
                            <strong><?php echo $rft; ?>%</strong>
                        <?php else: ?>
                            <p class="no-data">0</p>
                        <?php endif; ?>
                    </div>

                    <div class="vertical-separator"></div>

                    <div class="content-right">
                        <p>RFT TARGET</p>
                        <strong>98%</strong>
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>FIN</h4>
                <div class="on-track">
                    <strong>
                        <?php
                        $totalCheckedBalls = 0;
                        $rft = 0;
                        $totalPassed = 0;

                        if (isset($Finale_Forming) && is_array($Finale_Forming) && !empty($Finale_Forming)) {
                            foreach ($Finale_Forming as $entry) {
                                $totalCheckedBalls += $entry['TotalChecked'] ?? 0;
                                $totalPassed += $entry['TotalPass'] ?? 0;
                            }

                            // Calculate RFT (only if there's data)
                            if ($totalCheckedBalls > 0) {
                                $rft = ($totalPassed / $totalCheckedBalls) * 100;
                                $rft = (int) $rft; // Convert to integer
                            }
                        }

                        echo $totalCheckedBalls;  // This will replace the 500
                        ?>
                    </strong>
                </div>

                <div class="d-flex">
                    <div class="content-left">
                        <p>LIVE RFT</p>
                        <?php if ($totalCheckedBalls > 0): ?>
                            <strong><?php echo $rft; ?>%</strong>
                        <?php else: ?>
                            <p class="no-data">0</p>
                        <?php endif; ?>
                    </div>

                    <div class="vertical-separator"></div>

                    <div class="content-right">
                        <p>RFT TARGET</p>
                        <strong>98%</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Charts Section -->
        <div class="pie-charts-wrapper">
            <div class="pie-chart-container">
                <canvas id="pieChart1"></canvas>
            </div>

            <div class="pie-chart-container">
                <canvas id="pieChart2"></canvas>
            </div>

            <div class="pie-chart-container">
                <canvas id="pieChart3"></canvas>
            </div>

            <div class="pie-chart-container">
                <canvas id="pieChart4"></canvas>
            </div>

        </div>

        <!-- Bar Charts Section -->
        <div class="scatter-plots-wrapper">
            <!-- First Grouped Column Chart -->
            <div class="scatter-plot-container">
                <!-- <h4>LIVE RFT% vs TARGET%</h4> -->
                <canvas id="barChartTotalPassed"></canvas>
            </div>

            <div class="vertical-separator"></div>

            <!-- Second Grouped Column Chart -->
            <div class="scatter-plot-container">
                <!-- <h4>DEFECTS COUNT WITH %</h4> -->
                <canvas id="barChartFailedDefects"></canvas>
            </div>
        </div>

    </div>

    <!-- Bootstrap 5 JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    Chart.register(ChartDataLabels);

    <?php
    $LFB_totalPassed = 0;
    $LFB_totalFailed = 0;

    $TMB_totalPassed = 0;
    $TMB_totalFailed = 0;
    $TMB_TotalCheckedBalls = 0;
    $rft_TMB = 0;
    $decfects_TMB = 0;

    $OMB_totalPassed = 0;
    $OMB_totalFailed = 0;
    $OMB_totalCheckedBalls = 0;
    $rft_OMB = 0;
    $decfects_OMB = 0;

    $FIN_totalPassed = 0;
    $FIN_totalFailed = 0;
    $FIN_TotalCheckedBalls = 0;
    $rft_FIN = 0;
    $decfects_FIN = 0;

    $totalCheckedBalls_LFB_1 = 0;
    $totalFailedBalls_LFB_1 = 0;
    $totalPassedBalls_LFB_1 = 0;
    $rft_LFB_1 = 0;
    $decfects_LFB_1 = 0;

    $totalCheckedBalls_LFB_2 = 0;
    $totalFailedBalls_LFB_2 = 0;
    $totalPassedBalls_LFB_2 = 0;
    $rft_LFB_2 = 0;
    $decfects_LFB_2 = 0;

    $totalCheckedBalls_LFB_3 = 0;
    $totalFailedBalls_LFB_3 = 0;
    $totalPassedBalls_LFB_3 = 0;
    $rft_LFB_3 = 0;
    $decfects_LFB_3 = 0;

    // LFB-1 LFB-2 LFB-3
    if (isset($Lfb_Forming) && !empty($Lfb_Forming)) {
        foreach ($Lfb_Forming as $entry) {
            if ($entry['ProductionLine'] == 'LFB-1') {
                $totalCheckedBalls_LFB_1 += $entry['TotalChecked'];
                $totalPassedBalls_LFB_1 += $entry['TotalPass'];
                $totalFailedBalls_LFB_1 += $entry['Fail'];
            }
            if ($entry['ProductionLine'] == 'LFB-2') {
                $totalCheckedBalls_LFB_2 += $entry['TotalChecked'];
                $totalPassedBalls_LFB_2 += $entry['TotalPass'];
                $totalFailedBalls_LFB_2 += $entry['Fail'];
            }
            if ($entry['ProductionLine'] == 'LFB-3') {
                $totalCheckedBalls_LFB_3 += $entry['TotalChecked'];
                $totalPassedBalls_LFB_3 += $entry['TotalPass'];
                $totalFailedBalls_LFB_3 += $entry['Fail'];
            }
        }

        // Calculating RFT of LFB-1, 2, and 3.
        $rft_LFB_1 = $totalCheckedBalls_LFB_1 > 0 ? ($totalPassedBalls_LFB_1 / $totalCheckedBalls_LFB_1) * 100 : 0;
        $rft_LFB_2 = $totalCheckedBalls_LFB_2 > 0 ? ($totalPassedBalls_LFB_2 / $totalCheckedBalls_LFB_2) * 100 : 0;
        $rft_LFB_3 = $totalCheckedBalls_LFB_3 > 0 ? ($totalPassedBalls_LFB_3 / $totalCheckedBalls_LFB_3) * 100 : 0;

        // After Calculating RFTs, calculating defects from RFTs.
        $rft_LFB_1 = (int) $rft_LFB_1;
        $rft_LFB_2 = (int) $rft_LFB_2;
        $rft_LFB_3 = (int) $rft_LFB_3;

        $decfects_LFB_1 = 100 - $rft_LFB_1;
        $decfects_LFB_2 = 100 - $rft_LFB_2;
        $decfects_LFB_3 = 100 - $rft_LFB_3;
    }

    if (isset($Lfb_Forming) && !empty($Lfb_Forming)) {
        foreach ($Lfb_Forming as $entry) {
            $LFB_totalPassed += $entry['TotalPass'];
            $LFB_totalFailed += $entry['Fail'];
        }
    }

    if (isset($Competition_Forming) && !empty($Competition_Forming)) {
        foreach ($Competition_Forming as $entry) {
            $TMB_totalPassed += $entry['TotalPass'];
            $TMB_totalFailed += $entry['Fail'];
            $TMB_TotalCheckedBalls += $entry['TotalChecked'];
        }

        $rft_TMB = ($TMB_totalPassed / $TMB_TotalCheckedBalls) * 100;
        $rft_TMB = (int) $rft_TMB;
        $decfects_TMB = 100 - $rft_TMB;
    }

    if (isset($Urban_Forming) && !empty($Urban_Forming)) {
        foreach ($Urban_Forming as $entry) {
            $OMB_totalPassed += $entry['TotalPass'];
            $OMB_totalFailed += $entry['Fail'];
            $OMB_totalCheckedBalls += $entry['TotalChecked'];
        }

        $rft_OMB = ($OMB_totalPassed / $OMB_totalCheckedBalls) * 100;
        $rft_OMB = (int) $rft_OMB;
        $decfects_OMB = 100 - $rft_OMB;
    }

    if (isset($Finale_Forming) && !empty($Finale_Forming)) {
        foreach ($Finale_Forming as $entry) {
            $FIN_totalPassed += $entry['TotalPass'];
            $FIN_totalFailed += $entry['Fail'];
            $FIN_TotalCheckedBalls += $entry['TotalChecked'];
        }
    }
    ?>

    function getFontSize() {
        let screenWidth = window.innerWidth;

        if (screenWidth >= 2560) return 36; // 4K Screens
        if (screenWidth > 1920 && screenWidth < 2560) return 24; // Full HD (55-inch screens)
        if (screenWidth >= 1366 && screenWidth < 1920) return 18; // 50-inch screens
        if (screenWidth >= 1024 && screenWidth < 1366) return 14; // 45-inch screens
        return 12; // Default for smaller screens
    }

    function updateAllCharts() {
        let fontSize = getFontSize();

        Chart.helpers.each(Chart.instances, function (chart) {
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
                        size: getFontSize(),
                        weight: "bold"
                    },
                    color: "#333"
                }
            },
            tooltip: {
                titleFont: {
                    size: getFontSize()
                },
                bodyFont: {
                    size: getFontSize()
                },
                callbacks: {
                    label: function (tooltipItem) {
                        let value = tooltipItem.raw;
                        return ` ${tooltipItem.label}: ${value.toLocaleString()}`;
                    }
                }
            },
            datalabels: {
                color: "#fff",
                font: {
                    weight: "bold",
                    size: getFontSize()
                },
                anchor: "center",
                align: "center",
                textStrokeColor: "black",
                textStrokeWidth: 4
            }
        }
    };

    // LFB Pie Chart API
    var ctx1 = document.getElementById('pieChart1').getContext('2d');
    var greenGradient = ctx1.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth

        var redGradient = ctx1.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        redGradient.addColorStop(0, '#ff3838');  // Bright Neon Red
        redGradient.addColorStop(0.25, '#ff1e00'); // Fiery Red
        redGradient.addColorStop(0.5, '#cc0000');  // Deep Crimson
        redGradient.addColorStop(0.75, '#990000'); // Dark Blood Red
        redGradient.addColorStop(1, '#660000');  // Ultra Dark Red

    var pieChart1 = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Total Passed', 'Total Failed'],
            datasets: [{
                data: [<?php echo $LFB_totalPassed ?? 0 ?>, <?php echo $LFB_totalFailed ?? 0 ?>],
                backgroundColor: [greenGradient, redGradient],
                hoverOffset: 4
            }]
        },
        options: pieChartOptions
    });

    // Additional charts follow the same pattern...

    // TMB PIE CHART
var ctx2 = document.getElementById('pieChart2').getContext('2d');
var greenGradient = ctx2.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth

        var redGradient = ctx2.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        redGradient.addColorStop(0, '#ff3838');  // Bright Neon Red
        redGradient.addColorStop(0.25, '#ff1e00'); // Fiery Red
        redGradient.addColorStop(0.5, '#cc0000');  // Deep Crimson
        redGradient.addColorStop(0.75, '#990000'); // Dark Blood Red
        redGradient.addColorStop(1, '#660000');  // Ultra Dark Red
var pieChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Total Passed', 'Total Failed'],
        datasets: [{
            data: [<?php echo $TMB_totalPassed ?? 0 ?>, <?php echo $TMB_totalFailed ?? 0 ?>],
            backgroundColor: [greenGradient, redGradient],
            hoverOffset: 4
        }]
    },
    options: pieChartOptions
});

// OMB PIE CHART
var ctx3 = document.getElementById('pieChart3').getContext('2d');
var greenGradient = ctx3.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth

        var redGradient = ctx3.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        redGradient.addColorStop(0, '#ff3838');  // Bright Neon Red
        redGradient.addColorStop(0.25, '#ff1e00'); // Fiery Red
        redGradient.addColorStop(0.5, '#cc0000');  // Deep Crimson
        redGradient.addColorStop(0.75, '#990000'); // Dark Blood Red
        redGradient.addColorStop(1, '#660000');  // Ultra Dark Red
var pieChart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
        labels: ['Total Passed', 'Total Failed'],
        datasets: [{
            data: [<?php echo $OMB_totalPassed ?? 0 ?>, <?php echo $OMB_totalFailed ?? 0 ?>],
            backgroundColor: [greenGradient, redGradient],
            hoverOffset: 4
        }]
    },
    options: pieChartOptions
});

// FIN PIE CHART
var ctx4 = document.getElementById('pieChart4').getContext('2d');
var greenGradient = ctx4.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth

        var redGradient = ctx4.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        redGradient.addColorStop(0, '#ff3838');  // Bright Neon Red
        redGradient.addColorStop(0.25, '#ff1e00'); // Fiery Red
        redGradient.addColorStop(0.5, '#cc0000');  // Deep Crimson
        redGradient.addColorStop(0.75, '#990000'); // Dark Blood Red
        redGradient.addColorStop(1, '#660000');  // Ultra Dark Red
var pieChart4 = new Chart(ctx4, {
    type: 'pie',
    data: {
        labels: ['Total Passed', 'Total Failed'],
        datasets: [{
            data: [<?php echo $FIN_totalPassed ?? 0 ?>, <?php echo $FIN_totalFailed ?? 0 ?>],
            backgroundColor: [greenGradient, redGradient],
            hoverOffset: 4
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


var ctxPassed = document.getElementById('barChartTotalPassed').getContext('2d');
var greenGradient = ctxPassed.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth

var barChartPassed = new Chart(ctxPassed, {
    type: 'bar',
    data: {
        labels: ['LFB-1', 'LFB-2', 'LFB-3', 'TMB', 'OMB', 'FIN'],
        datasets: [{
            label: 'Total Passed',
            data: [
                <?php echo $totalPassedBalls_LFB_1 ?? 0 ?>,
                <?php echo $totalPassedBalls_LFB_2 ?? 0 ?>,
                <?php echo $totalPassedBalls_LFB_3 ?? 0 ?>,
                <?php echo $TMB_totalPassed ?? 0 ?>,
                <?php echo $OMB_totalPassed ?? 0 ?>,
            ],
            backgroundColor: greenGradient,
            borderWidth: 1
        }]
    },
    options: chartOptions
});


var ctxFailedDefects = document.getElementById('barChartFailedDefects').getContext('2d');
var redGradient = ctxFailedDefects.createLinearGradient(0, 0, 0, 400); // Vertical gradient
    redGradient.addColorStop(0, '#ff3838');  // Bright Neon Red
    redGradient.addColorStop(0.25, '#ff1e00'); // Fiery Red
    redGradient.addColorStop(0.5, '#cc0000');  // Deep Crimson
    redGradient.addColorStop(0.75, '#990000'); // Dark Blood Red
    redGradient.addColorStop(1, '#660000');  // Ultra Dark Red

    var defectsGradient = ctxFailedDefects.createLinearGradient(0, 0, 0, 400);
defectsGradient.addColorStop(0, '#ff6b00');    // Vivid Orange
defectsGradient.addColorStop(0.2, '#ff0033');  // Neon Reddish-Pink
defectsGradient.addColorStop(0.5, '#ff0055');  // Hot Magenta
defectsGradient.addColorStop(0.75, '#cc0044'); // Rich Crimson
defectsGradient.addColorStop(1, '#80001a');    // Dark Ruby Red

    var barChartFailedDefects = new Chart(ctxFailedDefects, {
    type: 'bar',
    data: {
        labels: ['LFB-1', 'LFB-2', 'LFB-3', 'TMB', 'OMB', 'FIN'],
        datasets: [
            {
                label: 'Total Failed',
                data: [
                    <?php echo $totalFailedBalls_LFB_1 ?? 0 ?>,
                    <?php echo $totalFailedBalls_LFB_2 ?? 0 ?>,
                    <?php echo $totalFailedBalls_LFB_3 ?? 0 ?>,
                    <?php echo $TMB_totalFailed ?? 0 ?>,
                    <?php echo $OMB_totalFailed ?? 0 ?>,
                    <?php echo $FIN_totalFailed ?? 0 ?>
                ],
                backgroundColor: redGradient
            },
            {
                label: 'Defects',
                data: [
                    <?php echo $Defects_LFB_1 ?? 0 ?>,
                    <?php echo $Defects_LFB_2 ?? 0 ?>,
                    <?php echo $Defects_LFB_3 ?? 0 ?>,
                    <?php echo $decfects_TMB ?? 0 ?>,
                    <?php echo $decfects_OMB ?? 0 ?>,
                ],
                backgroundColor: defectsGradient
            }
        ]
    },
    options: chartOptions
});

// Function to update date and time
function updateDateTime() {
            const dateElement = document.getElementById('current-date');
            const timeElement = document.getElementById('current-time');

            const now = new Date();

            // Format date as YYYY-MM-DD
            const dateStr = now.toLocaleDateString('en-CA');  // Example: 2025-03-03

            // Format time as HH:MM:SS
            const timeStr = now.toLocaleTimeString();

            dateElement.textContent = dateStr;
            timeElement.textContent = timeStr;
        }

        // Update date and time every second
        setInterval(updateDateTime, 1000);

        // Initial call to show immediately
        updateDateTime();

setTimeout(() => {

    window.location = "<?php echo base_url('DD/S4'); ?>";
}, 30000); // 30 seconds

</script>

</body>
</html>