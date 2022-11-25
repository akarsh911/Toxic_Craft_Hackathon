<!DOCTYPE HTML>
<html>

<head>
    <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Complaints Ratio"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [{
                        y: 30,
                        label: "Started"
                    },
                    {
                        y: 20,
                        label: "InProgress"
                    },
                    {
                        y: 30,
                        label: "Unresolved"
                    },
                    {
                        y: 20,
                        label: "Resolved"
                    }
                ]
            }]
        });
        chart.render();

    }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>