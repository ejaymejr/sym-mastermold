<?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>
        <script type="text/javascript">
            var chartPie;

            var chartPieData = [
                {
                    "country": "Lithuania",
                    "value": 260
                },
                {
                    "country": "Ireland",
                    "value": 201
                },
                {
                    "country": "Germany",
                    "value": 65
                },
                {
                    "country": "Australia",
                    "value": 39
                },
                {
                    "country": "UK",
                    "value": 19
                },
                {
                    "country": "Latvia",
                    "value": 10
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chartPie = new AmCharts.AmPieChart();
                chartPie.dataProvider = chartPieData;
                chartPie.titleField = "country";
                chartPie.valueField = "value";
                chartPie.outlineColor = "#FFFFFF";
                chartPie.outlineAlpha = 0.8;
                chartPie.outlineThickness = 2;
                chartPie.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chartPie.depth3D = 10;
                chartPie.angle = 40;

                // WRITE
                chartPie.write("chartpie");
            });
        </script>