

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
    font-size: clamp(16px, 1.5vw, 2vw); /* Adjusts size dynamically */
    font-weight: bold;
    margin: 1rem 0;
}

/* Flexbox Layout for Boxes */
.d-flex {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.5vw, 2vw); /* Adjusts size dynamically */
    /* gap: 1vw; ✅ Ensures proper spacing */
}

/* Data Boxes */
.box {
    background: white;
    border-radius: 10px;
    font-weight: bold;
    text-align: center;
    flex: 1;
    max-width: 45%;
    min-height: 18vh;
    height:auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: clamp(16px, 1.4vw, 1.5vw);
}

/* Box Title */
.box h4 {
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    color: #333;
    font-weight: bold;
}

/* Box Content Layout */
.box .d-flex {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

/* Box Content Sections */
.content-left, .content-middle, .content-right {
    display: inline-block;
    width: 30%;
    text-align: center;
}

/* Text Inside Boxes */
.content-left p, .content-middle p, .content-right p {
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    color: #4b4949;
}

/* Vertical Separators */
.vertical-separator {
    border: 2px solid rgb(19, 18, 18);
    height: 90px;
    margin: 10px;
}

/* ✅ Pie Chart Section */
.pie-charts-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 22vh;
}

.pie-chart-container {
    width: 45%;
    height: 100%;
    border-radius: 10px;
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
    height: 40vh;
}

/* Individual Chart Container */
.scatter-plot-container {
    width: 45%;
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

#current-date, #current-time {
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

    <!-- Live Time & Date Display -->
    <div class="date-time-container">
        <div id="current-date"></div>
        <hr>
        <div id="current-time"></div>
    </div>
    <!-- Main Content Container -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1>TMB / OMB LINE WISE GRAPH</h1>

        <!-- Two Boxes Section -->
        <div class="d-flex">
            <div class="box">
                <h4>TMB</h4>
                <div class="d-flex">
                    <div class="content-left">
                        <?php
                        // Initialize the required variables
                        $totalCheckedBalls_TMB = 0;
                        $TMB_RFT = 0;
                        $TMB_totalPassed = 0;
                        // Check if $Lfb_Forming is set and not empty
                        if (isset($Competition_Forming) && !empty($Competition_Forming)):
                            // Loop through each entry in $Lfb_Forming
                            foreach ($Competition_Forming as $entry):
                                $totalCheckedBalls_TMB += $entry['TotalChecked'];
                                $TMB_totalPassed += $entry['TotalPass'];
                                // Calculating RFT-2
                                $TMB_RFT = ($TMB_totalPassed / $totalCheckedBalls_TMB) * 100;
                                $TMB_RFT = (int) $TMB_RFT;
                            endforeach;
                        else:
                            // Handle the case where $Lfb_Forming is not set or empty (optional)
                            $totalCheckedBalls_TMB = 0; //
                            $TMB_RFT = 0; // 
                        endif;
                        ?>
                        <p>LIVE PROD</p>
                        <strong><?php echo $totalCheckedBalls_TMB ?></strong>
                    </div> <!--The scope of  this PHP Script is before this div tag... -->
                    <div class="vertical-separator"></div>
                    <div class="content-middle">
                        <p>LINE TARGET</p>
                        <strong>300</strong>
                    </div>
                    <div class="vertical-separator"></div>
                    <div class="content-right">
                        <p>LINE RFT%</p>
                        <strong><?php echo $TMB_RFT ?>%</strong>
                    </div>
                </div>
            </div>

            <div class="box">
                <h4>OMB</h4>
                <div class="d-flex">
                    <div class="content-left">
                        <?php
                        // Initialize the required variables
                        $totalCheckedBalls_OMB = 0;
                        $OMB_RFT = 0;
                        $OMB_totalPassed = 0;
                        // Check if $Lfb_Forming is set and not empty
                        if (isset($Urban_Forming) && !empty($Urban_Forming)):
                            // Loop through each entry in $Lfb_Forming
                            foreach ($Urban_Forming as $entry):
                                if ($entry['ProductionLine'] == 'OMB') {
                                    $totalCheckedBalls_OMB += $entry['TotalChecked'];
                                    $OMB_totalPassed += $entry['TotalPass'];
                                    // Calculating RFT-2
                                    $OMB_RFT = ($OMB_totalPassed / $totalCheckedBalls_OMB) * 100;
                                    $OMB_RFT = (int) $OMB_RFT;
                                }
                            endforeach;
                        else:
                            // Handle the case where $Lfb_Forming is not set or empty (optional)
                            $totalCheckedBalls_OMB = 0; //
                            $OMB_RFT = 0;
                        endif;
                        ?>
                        <p>LIVE PROD</p>
                        <strong><?php echo $totalCheckedBalls_OMB ?></strong>
                    </div> <!--The scope of  this PHP Script is before this div tag... -->
                    <div class="vertical-separator"></div>
                    <div class="content-middle">
                        <p>LINE TARGET</p>
                        <strong>1100</strong>
                    </div>
                    <div class="vertical-separator"></div>
                    <div class="content-right">
                        <p>LINE RFT%</p>
                        <strong><?php echo $OMB_RFT ?>%</strong>
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

        </div>

        <!-- Bar Charts Section -->
        <div class="scatter-plots-wrapper">
            <!-- First Grouped Column Chart -->
            <div class="scatter-plot-container">
                <!-- <h4>TMB WEEKLY PROD GRAPH</h4> -->
                <canvas id="groupedBarChart1"></canvas>
            </div>

            <div class="vertical-separator"></div>

            <!-- Second Grouped Column Chart -->
            <div class="scatter-plot-container">
                <!-- <h4>OMB WEEKLY PROD GRAPH</h4> -->
                <canvas id="groupedBarChart2"></canvas>
            </div>

        </div>

    </div>

    <!-- Bootstrap 5 JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>

        Chart.register(ChartDataLabels);

        <?php

        $TMB_totalPassed = 0;
        $TMB_totalFailed = 0;
        $OMB_totalPassed = 0;
        $OMB_totalFailed = 0;

        if (isset($Competition_Forming) && !empty($Competition_Forming)) {
            foreach ($Competition_Forming as $entry) {
                $TMB_totalPassed += $entry['TotalPass'];
                $TMB_totalFailed += $entry['Fail'];
            }
        }

        // else {
        
        //     $TMB_totalPassed = 1;
        //     $TMB_totalFailed = 1;
        // }
        
        if (isset($Urban_Forming) && !empty($Urban_Forming)) {
            foreach ($Urban_Forming as $entry) {
                $OMB_totalPassed += $entry['TotalPass'];
                $OMB_totalFailed += $entry['Fail'];
            }
        }

        // else {
        
        //     $OMB_totalPassed = 1;
        //     $OMB_totalFailed = 1;
        // }
        
        ?>


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

        // Pie Chart 1
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
                    data: [<?php echo $TMB_totalPassed ?>, <?php echo $TMB_totalFailed ?>],
                    backgroundColor: [greenGradient, redGradient],
                    hoverOffset: 4
                }]
            },

            options: pieChartOptions
        });

        // Pie Chart 2
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
                    data: [<?php echo $OMB_totalPassed ?>, <?php echo $OMB_totalFailed ?>],
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



// Getting TMB Forming Day By Day Weekly Data
// Data from PHP

var weeklyData_TMB_Forming = <?php echo json_encode($weeklyData_TMB); ?>;

// Extracting labels and data
var labels_TMB_Forming = weeklyData_TMB_Forming.map(item => item.DayWithMonth);
var totalPassData_TMB_Forming = weeklyData_TMB_Forming.map(item => item.TotalPass);

        // Create a dynamic bar chart using Chart.js for Competition Forming Weekly data
        var ctx = document.getElementById('groupedBarChart1').getContext('2d');
        var greenGradient = ctx.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth
        var groupedBarChart1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels_TMB_Forming,  // Dynamic production days labels
                datasets: [{
                    label: 'TMB Total Passed',
                    data: totalPassData_TMB_Forming,
                    backgroundColor: greenGradient,
                    borderColor: greenGradient,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,  // Starts the y-axis at zero
                        grace: '10%' // Adds extra space at the top for better visibility
                    }
                },
                barThickness: 50  // Makes the bars wider
            },

            options: chartOptions
        });



// Getting OMB Forming Day By Day Weekly Data
// Data from PHP

var weeklyData_OMB_Forming = <?php echo json_encode($weeklyData_OMB); ?>;

// Extracting labels and data
var labels_OMB_Forming = weeklyData_OMB_Forming.map(item => item.DayWithMonth);
var totalPassData_OMB_Forming = weeklyData_OMB_Forming.map(item => item.TotalPass);
        // Create a dynamic bar chart using Chart.js for Urban Forming Weekly data
        var groupedBarChart2 = document.getElementById('groupedBarChart2').getContext('2d');
        var greenGradient = groupedBarChart2.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth
        var groupedBarChart2 = new Chart(groupedBarChart2, {
            type: 'bar',
            data: {
                labels: labels_OMB_Forming,  // Corrected x-axis labels (Wed, not Web)
                datasets: [{
                    label: 'OMB Total Passed',
                    data:totalPassData_OMB_Forming,  // TotalPassed values
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
            window.location = "<?php echo base_url('DD/S6'); ?>";
        }, 30000); // 30 seconds

        


    </script>
</body>

</html>