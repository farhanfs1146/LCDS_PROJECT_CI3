
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
    overflow-x: hidden; /* ✅ Prevents horizontal scrolling */
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
.main-heading {
    text-align: center;
    /* font-size: 2vw; */
    font-size: clamp(16px, 1.5vw, 2vw);
    font-weight: bold;
    margin: 1vw 0;
}

/* Content Layout */
.content-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 35vh; /* ✅ Adjusted height */
}

/* Left-Side Boxes */
.left-side {
    display: flex;
    flex-direction: column;
    gap: 1.4vw;
    width: 40%;
    margin-bottom:1.3vw;
}

/* Box Styling */
.box, .new-box {
    background: white;
    border-radius: 10px;
    font-weight: bold;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    padding: 1.5vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: clamp(16px, 1.4vw, 1.5vw);
}

/* Box Size Adjustments */
.box {
    min-height: 18vh;
    height:auto;
}

.new-box {
    min-height: 12vh; /* ✅ Smaller than .box */
    height:auto;
}

/* Box Titles */
.box h4 {
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    color: #333;
    font-weight: bold;
}

/* Flexbox for Box Content */
.box .d-flex {
    display: flex;
    justify-content: space-between;
    width: 100%;
}

/* Box Content Sections */
.content-left, .content-right {
    display: inline-block;
    width: 45%;
    text-align: center;
    
}

/* Text Inside Boxes */
.content-left p, .content-right p {
    /* font-size: 1.5vw; */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    color: #4b4949;
}

/* Style for <p> inside .box and .new-box */
.box p, .new-box p {
    /* font-size: 1.5vw; 
    Increase size dynamically based on screen width */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    font-weight: bold;
    color: #333; /* Darker color for better readability */
    margin: 5px 0;
}

/* Style for <strong> inside .box and .new-box */
.box strong, .new-box strong {
    /* font-size: 1.8vw; Larger font size for emphasis */
    font-size: clamp(16px, 1.4vw, 1.5vw);
    color: #000; /* Make it stand out */
}


/* ✅ Vertical Separator */
.vertical-separator {
        border: 2px solid rgb(19, 18, 18);
        height: 90px;
        margin: 10px 10px;
    }

/* ✅ Pie Chart Section */
.pie-chart-container {
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    /* background-color: white; ✅ Adds white background */
}

/* ✅ Column Chart Section */
.column-chart-container {
    width: 100%;
    height: 45vh;
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

    <div class="date-time-container">
        <div id="current-date"></div>
        <hr>
        <div id="current-time"></div>
    </div>

    <div class="container-fluid">

        <div class="main-heading">LFB LIVE LINE WISE GRAPH</div>

        <div class="content-wrapper">
            <div class="left-side">

                <div class="box">
                    <h4>LFB</h4>
                    <div class="d-flex">
                        <div class="content-left">
                            <p>LIVE PROD</p>
                            <strong>
                                <?php
                                $totalCheckedBalls = 0;
                                if (isset($Lfb_Forming) && !empty($Lfb_Forming)) {
                                    foreach ($Lfb_Forming as $entry) {
                                        $totalCheckedBalls += $entry['TotalChecked'];
                                    }
                                }
                                echo $totalCheckedBalls;
                                ?>
                            </strong>
                        </div>

                        <div class="vertical-separator"></div>
                        <div class="content-right">
                            <p>DAILY TARGET</p>
                            <strong>2600</strong>
                        </div>
                    </div>
                </div>

                <div class="new-box">
                    <?php
                    $rft = 0;
                    $defects = 0;
                    $totalPassed = 0;
                    if (isset($Lfb_Forming) && !empty($Lfb_Forming)) {
                        foreach ($Lfb_Forming as $entry) {
                            $totalPassed += $entry['TotalPass'];
                        }
                        if ($totalCheckedBalls > 0) {
                            $rft = ($totalPassed / $totalCheckedBalls) * 100;
                            $rft = (int) $rft;
                            $defects = 100 - $rft;
                        }
                    }
                    ?>
                    <p>RFT <strong><?php echo $rft; ?>%</strong></p>
                    <p>DEFECTS <strong><?php echo $defects; ?>%</strong></p>
                </div>
            </div>

            <div class="pie-chart-container">
                <canvas id="pieChart1"></canvas>
            </div>
        </div>

        <div class="column-chart-container">
            <canvas id="columnChart"></canvas>
        </div>
        
    </div>

    <script>

        Chart.register(ChartDataLabels);

        // PHP-based data for pie chart
        const pieData = [<?php echo $totalPassed; ?>, <?php echo ($totalCheckedBalls - $totalPassed); ?>];


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
                size: getFontSize()// ✅ Increase tooltip content size
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

        const ctx1 = document.getElementById('pieChart1').getContext('2d');
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

       const pieChart = new Chart(ctx1, {
        type: 'pie', // Change chart type to 'pie'
        data: {
            labels: ['Total Passed', 'Total Failed'],
            datasets: [{
                label: 'Production Comparison',
                data: pieData,
                backgroundColor: [greenGradient, redGradient],
                borderColor: '#fff', // White border for better contrast
                borderWidth: 2
            }]
        },
       options: pieChartOptions
    });

        // Column Chart Data from PHP
        const labels = [
            <?php
            if (isset($Lfb_Forming_Hourly) && !empty($Lfb_Forming_Hourly)) {
                foreach ($Lfb_Forming_Hourly as $entry) {
                    echo '"' . $entry['HourName'] . '",';
                }
            }
            ?>
        ];
        const data = [
            <?php
            if (isset($Lfb_Forming_Hourly) && !empty($Lfb_Forming_Hourly)) {
                foreach ($Lfb_Forming_Hourly as $entry) {
                    echo $entry['TotalChecked'] . ',';
                }
            }
            ?>
        ];

        // console.log(data);


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
                    size: 30 // ✅ Makes x-axis labels bigger
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


    
const columnCtx = document.getElementById('columnChart').getContext('2d');
var ultraNeonOrangeGradient = columnCtx.createLinearGradient(0, 0, 0, 400);
ultraNeonOrangeGradient.addColorStop(0, '#ff7300');  // 🍊 Neon Orange
ultraNeonOrangeGradient.addColorStop(0.3, '#ff8c00');  // 🔥 Bright Amber
ultraNeonOrangeGradient.addColorStop(0.6, '#ffae42');  // 🌅 Sunset Gold
ultraNeonOrangeGradient.addColorStop(1, '#ff4500');  // 🔴 Reddish-Orange Glow

var ultraNeonSkyGradient = columnCtx.createLinearGradient(0, 0, 0, 400);
ultraNeonSkyGradient.addColorStop(0, '#00c6ff');  // 🌊 Neon Sky Blue
ultraNeonSkyGradient.addColorStop(0.3, '#0072ff');  // 🔷 Electric Deep Blue
ultraNeonSkyGradient.addColorStop(0.6, '#00eaff');  // 💎 Bright Cyan Glow
ultraNeonSkyGradient.addColorStop(1, '#0033cc');  // 🌌 Midnight Sky

var ultraNeonGreenGradient = columnCtx.createLinearGradient(0, 0, 0, 400);
ultraNeonGreenGradient.addColorStop(0, '#00ff00');  // 🌿 Pure Neon Green
ultraNeonGreenGradient.addColorStop(0.3, '#32ff32');  // 🍏 Bright Lime
ultraNeonGreenGradient.addColorStop(0.6, '#00ff99');  // 🍃 Aqua Green Glow
ultraNeonGreenGradient.addColorStop(1, '#006400');  // 🌲 Deep Forest Green

var ultraNeonRGBGradient = columnCtx.createLinearGradient(0, 0, 0, 400);
ultraNeonRGBGradient.addColorStop(0, '#ff0000');  // 🔴 Neon Red
ultraNeonRGBGradient.addColorStop(0.3, '#00ff00');  // 🟢 Neon Green
ultraNeonRGBGradient.addColorStop(0.6, '#0000ff');  // 🔵 Electric Blue
ultraNeonRGBGradient.addColorStop(1, '#ff00ff');  // 🌈 Magenta Glow

var greenGradient = columnCtx.createLinearGradient(0, 0, 0, 400); // Vertical gradient
        greenGradient.addColorStop(0, '#00ff99');  // Bright Mint Green
        greenGradient.addColorStop(0.2, '#33ff66'); // Soft Green Glow
        greenGradient.addColorStop(0.4, '#00cc44'); // Neon Emerald
        greenGradient.addColorStop(0.6, '#008f11'); // Deep Matrix Green
        greenGradient.addColorStop(0.8, '#006400'); // Dark Forest Green
        greenGradient.addColorStop(1, '#003300');  // Almost Black Green for depth

        new Chart(columnCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Hourly Production',
                    data: data,
                    backgroundColor: [greenGradient,ultraNeonSkyGradient,ultraNeonOrangeGradient, ultraNeonGreenGradient, ultraNeonRGBGradient, greenGradient],

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
            window.location = "<?php echo base_url('DD/S7'); ?>";
        }, 30000); // 30 seconds

    </script>

</body>

</html>