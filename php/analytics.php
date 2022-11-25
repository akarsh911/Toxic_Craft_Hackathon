<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard</title>
    <link rel="stylesheet" href="../css/dasboard_style.css" />
    <script src="../js/load_dashboard.js"></script>
</head>

<body>
    <!--#include virtual="../html/dasboard_header.html" -->
    <?php include("../html/dasboard_header.html"); ?>
    <div class="no_head">
        <div class="navigation_container " id="navigation_container">
            <div class="navigation_bar">
                <?php
                require_once("../php/user_dashboard_data.php");
                $user_mail = get_log_in($_COOKIE["key"]);
                $ds = get_dashboard_type($user_mail);
                if ($ds == 0)
                    include("../html/user_nav.html");
                else if ($ds == 1)
                    include("../html/admin_nav.html");
                else if ($ds == 2)
                    include("../html/emp_nav.html"); ?>

            </div>
        </div>
        <script src="../js/dashboard.js"></script>
        <div class="data_html" id="data_html">
            <?php
            require_once("../php/user_dashboard_data.php");
            $user_mail = get_log_in($_COOKIE["key"]);
            $ds = get_dashboard_type($user_mail);
            if ($ds == 0) {
                // require_once("../php/complaint_register.php");

                //include("../html/user_complaints.html");
            } else if ($ds == 1) {
                // require_once("../php/complaint_register.php");
                // $ret = complaints_admin(); 
                // include("../html/admin_complaints.html");
            } else if ($ds == 2) {
                require_once("../php/complaint_register.php");
                $ret1 = count_pending($user_mail);
                $ret2 = count_resolved($user_mail);
                $ret3 = count_unresolved($user_mail);
            ?>
            <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                        text: "Desktop Search Engine Market Share - 2016"
                    },
                    data: [{
                        type: "pie",
                        startAngle: 240,
                        yValueFormatString: "##0.00\"%\"",
                        indexLabel: "{label} {y}",
                        dataPoints: [{
                                y: <?php echo $ret1; ?>,
                                label: "Pending"
                            },
                            {
                                y: <?php echo $ret2; ?>,
                                label: "resolved"
                            },
                            {
                                y: <?php echo $ret1; ?>,
                                label: "unresolved"
                            },

                        ]
                    }]
                });
                chart.render();

            }
            </script>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

            <?php
            }
            ?>
        </div>

</body>

</html>