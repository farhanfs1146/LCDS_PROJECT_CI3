<style>
    /* Global Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

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
        /* Ensures full LCD height coverage */
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
        align-items: center;
        gap: 0.4vw;
        /* font-size: 1.5vw; */
        font-size: clamp(16px, 1.4vw, 1.5vw);
    }

    .box {
        background: white;
        border-radius: 10px;
        font-weight: bold;
        text-align: center;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        flex: 1;
        max-width: 24%;
        min-height: 25vh;
        height:auto;
        /* padding: 1vw; */
        padding-left: 0;
        padding-right: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* font-size: 1vw; */
        font-size: clamp(16px, 1.4vw, 1.5vw);

    }

    .box h4 {
        /* font-size: 1.5vw; */
        font-size: clamp(16px, 1.4vw, 1.5vw);
        color: #333;
        font-weight: bold;
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
        color: #4b4949;
    }

    .vertical-separator {
        border: 2px solid rgb(19, 18, 18);
        height: 90px;
        margin: 10px 10px;
    }

    .last-vertical-separator {
        width: 2px;
        /* ✅ Defines width so it's visible */
        height: 100%; /* It will cover the height accroding to parent contrsiner element tag. */
        /* ✅ Ensures full height between charts */
        background-color: rgb(19, 18, 18);
        /* ✅ Dark line */
        margin: 0 1vw;
    }

    /* Bar Chart Section */
    .bar-charts-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 53vh;

    }

    .bar-chart-container1,
    .bar-chart-container2 {
        width: 50%;
        height: 100%;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba (0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0.5rem;
    }

    .bar-chart-container1 h4,
    .bar-chart-container2 h4 {

        text-align: center;
        font-weight: bold;
        /* font-size: 1.2vw; */
        font-size: clamp(16px, 1.4vw, 1.5vw);
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

    /* Responsive Fixes */
   
</style>

</head>

<body>

    <!-- Live Time & Date Display -->
    <div class="date-time-container">
        <div id="current-date"></div>
        <hr>
        <div id="current-time"></div>
    </div>

    <!-- Main Content Container -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- Main Dashboard Heading -->
        <h1 class="main-dashboard-heading">PROD TODAY LINE WISE GRAPH</h1>
        <!-- Three Boxes Section -->
        <div class="d-flex justify-content-between gap-3">
            <div class="box">
                <h4>LFB</h4>
                <div class="d-flex">
                    <div class="content-left">
                        <?php
                        // Initialize the required variables
                        $totalCheckedBalls = 0;
                        // Check if $Lfb_Forming is set and not empty
                        if (isset($Lfb_Forming) && !empty($Lfb_Forming)):
                            // Loop through each entry in $Lfb_Forming
                            foreach ($Lfb_Forming as $entry):
                                // Accumulate values for totalCheckedBalls and totalPassed
                                $totalCheckedBalls += $entry['TotalChecked'];
                            endforeach;
                        else:
                            // Handle the case where $Lfb_Forming is not set or empty (optional)
                            $totalCheckedBalls = 0; //
                        endif;
                        ?>
                        <p>LIVE PROD</p>
                        <strong><?php echo $totalCheckedBalls ?></strong>
                    </div> <!--The scope of  this PHP Script is before this div tag... -->

                    <div class="vertical-separator"></div>
                    <div class="content-right">
                        <p>DAILY TARGET</p>
                        <strong>2600</strong>
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>TMB</h4>
                <div class="d-flex">
                    <div class="content-left">
                        <?php
                        // Initialize the required variables
                        $totalCheckedBalls = 0;
                        // Check if $Lfb_Forming is set and not empty
                        if (isset($Competition_Forming) && !empty($Competition_Forming)):
                            // Loop through each entry in $Lfb_Forming
                            foreach ($Competition_Forming as $entry):
                                // Accumulate values for totalCheckedBalls and totalPassed
                                $totalCheckedBalls += $entry['TotalChecked'];
                            endforeach;
                        else:
                            // Handle the case where $Lfb_Forming is not set or empty (optional)
                            $totalCheckedBalls = 0; //
                        endif;
                        ?>
                        <p>LIVE PROD</p>
                        <strong><?php echo $totalCheckedBalls ?></strong>
                    </div> <!--The scope of  this PHP Script is before this div tag... -->

                    <div class="vertical-separator"></div>
                    <div class="content-right">
                        <p>DAILY TARGET</p>
                        <strong>300</strong>
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>OMB</h4>
                <div class="d-flex">
                    <div class="content-left">
                        <?php
                        // Initialize the required variables
                        $totalCheckedBalls = 0;
                        // Check if $Lfb_Forming is set and not empty
                        if (isset($Urban_Forming) && !empty($Urban_Forming)):
                            // Loop through each entry in $Lfb_Forming
                            foreach ($Urban_Forming as $entry):
                                // Accumulate values for totalCheckedBalls and totalPassed
                                $totalCheckedBalls += $entry['TotalChecked'];
                            endforeach;
                        else:
                            // Handle the case where $Lfb_Forming is not set or empty (optional)
                            $totalCheckedBalls = 0; //
                        endif;
                        ?>
                        <p>LIVE PROD</p>
                        <strong><?php echo $totalCheckedBalls ?></strong>
                    </div> <!--The scope of  this PHP Script is before this div tag... -->
                    <div class="vertical-separator"></div>
                    <div class="content-right">
                        <p>DAILY TARGET</p>
                        <strong>1100</strong>
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>FIN</h4>
                <div class="d-flex">
                    <div class="content-left">
                        <?php
                        // Initialize the required variables
                        $totalCheckedBalls = 0;
                        // Check if $Lfb_Forming is set and not empty
                        if (isset($Finale_Forming) && !empty($Finale_Forming)):
                            // Loop through each entry in $Lfb_Forming
                            foreach ($Finale_Forming as $entry):
                                // Accumulate values for totalCheckedBalls and totalPassed
                                $totalCheckedBalls += $entry['TotalChecked'];
                            endforeach;
                        else:
                            // Handle the case where $Lfb_Forming is not set or empty (optional)
                            $totalCheckedBalls = 0; //
                        endif;
                        ?>
                        <p>LIVE PROD</p>
                        <strong><?php echo $totalCheckedBalls ?></strong>
                    </div> <!--The scope of  this PHP Script is before this div tag... -->
                    <div class="vertical-separator"></div>
                    <div class="content-right">
                        <p>DAILY TARGET</p>
                        <strong>900</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Charts Section -->
        <div class="bar-charts-wrapper">
            <div class="bar-chart-container1">
                <canvas id="barChart1"></canvas>
                <!-- <h4>LIVE PROD COUNT</h4> -->
            </div>

            <div class="vertical-separator"></div>
            <div class="bar-chart-container2">
                <canvas id="barChart2"></canvas>
                <!-- <h4>DAILY PROD TARGET</h4> -->
            </div>
        </div>

        <!-- Bootstrap 5 JS and Popper.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>

    // Register the plugin
    Chart.register(ChartDataLabels);
    function getFontSize() {
    let screenWidth = window.innerWidth;

    if (screenWidth >= 2560) return 36;  // 4K Screens
    if (screenWidth > 1920 && screenWidth < 2560) return 24;  // Full HD (55-inch screens)
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

            // Bar Chart Example 1 Daily PROD Count...
            var ctx1 = document.getElementById('barChart1').getContext('2d');
            var greenGradient = ctx1.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth
            // Bar Chart 1: LIVE PROD COUNT
            var barChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['LFB-1', 'LFB-2', 'LFB-3', 'TMB', 'OMB'],
                    datasets: [{
                        label: 'LIVE PROD COUNT',
                        data: [
                            <?php
                            $totalCheckedBalls_LFB_1 = 0;
                            $totalCheckedBalls_LFB_2 = 0;
                            $totalCheckedBalls_LFB_3 = 0;
                            $TMB_totalCheckedBalls = 0;
                            $OMB_totalCheckedBalls = 0;

                            // LFB-1, LFB-2, LFB-3
                            if (isset($Lfb_Forming) && !empty($Lfb_Forming)) {
                                foreach ($Lfb_Forming as $entry) {
                                    if ($entry['ProductionLine'] == 'LFB-1') {
                                        $totalCheckedBalls_LFB_1 += $entry['TotalChecked'];
                                    }
                                    if ($entry['ProductionLine'] == 'LFB-2') {
                                        $totalCheckedBalls_LFB_2 += $entry['TotalChecked'];
                                    }
                                    if ($entry['ProductionLine'] == 'LFB-3') {
                                        $totalCheckedBalls_LFB_3 += $entry['TotalChecked'];
                                    }
                                }
                            }

                            // TMB
                            if (isset($Competition_Forming) && !empty($Competition_Forming)) {
                                foreach ($Competition_Forming as $entry) {
                                    $TMB_totalCheckedBalls += $entry['TotalChecked'];
                                }
                            }

                            // OMB
                            if (isset($Urban_Forming) && !empty($Urban_Forming)) {
                                foreach ($Urban_Forming as $entry) {
                                    $OMB_totalCheckedBalls += $entry['TotalChecked'];
                                }
                            }

                            echo "$totalCheckedBalls_LFB_1, $totalCheckedBalls_LFB_2, $totalCheckedBalls_LFB_3, $TMB_totalCheckedBalls, $OMB_totalCheckedBalls";
                            ?>
                        ],
                        backgroundColor: greenGradient,
                    }]
                },
                options: chartOptions
            });

            var ctx2 = document.getElementById('barChart2').getContext('2d');
            var ultraNeonOrangeGradient = ctx2.createLinearGradient(0, 0, 0, 400);
            ultraNeonOrangeGradient.addColorStop(0, '#ff7300');  // 🍊 Neon Orange
            ultraNeonOrangeGradient.addColorStop(0.3, '#ff8c00');  // 🔥 Bright Amber
            ultraNeonOrangeGradient.addColorStop(0.6, '#ffae42');  // 🌅 Sunset Gold
            ultraNeonOrangeGradient.addColorStop(1, '#ff4500');  // 🔴 Reddish-Orange Glow


    // ✅ Overriding your chartOptions
    const chartOptions2 = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    font: { size: getFontSize() }  // ✅ Keeps your legend settings
                }
            },
            tooltip: {
                titleFont: { size: getFontSize() },
                bodyFont: { size: getFontSize() },
                // callbacks: {
                //     label: function (tooltipItem) {
                //         return tooltipItem.raw + "%"; // ✅ Show percentage in tooltip
                //     }
                // }
            },
            datalabels: {
                anchor: "end",
                align: "top",
                color: "#000",
                font: { weight: "bold", size: getFontSize() },
                clip: false,
                // formatter: (value) => value + "%" // ✅ Show percentage on bars
            }
        },
        scales: {
            x: { ticks: { font: { size: getFontSize() } } },
            y: { beginAtZero: true, grace: "20%", ticks: { font: { size: getFontSize() } } }
        }
    };

    // ✅ Create the Chart
    var barChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['LFB-1', 'LFB-2', 'LFB-3', 'TMB', 'OMB'],
            datasets: [{
                label: 'DAILY PROD TARGET',
                data: [2600, 2600, 2600, 480, 1100],
                backgroundColor: ultraNeonOrangeGradient // ✅ Initial gradient
            }]
        },
        options: chartOptions2  // ✅ Using your overridden settings
    });



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

            setTimeout(function() {
                window.location = "<?php echo base_url('DD/S3'); ?>";
            }, 30000); // 30 seconds


        </script>

</body>

</html>