<?php include("header.php")?>

        <script src="../js/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../js/amcharts/serial.js" type="text/javascript"></script>
        <script type="text/javascript">

            // since v3, chart can accept data in JSON format
            // if your category axis parses dates, you should only
            // set date format of your data (dataDateFormat property of AmSerialChart)
            var chartData = [
                {
                    "lineColor": "#ffc321",
                    "date": "2012-01-01",
                    "duration": 408
                },
                {
                    "date": "2012-01-02",
                    "duration": 482
                },
                {
                    "date": "2012-01-03",
                    "duration": 562
                },
                {
                    "date": "2012-01-04",
                    "duration": 379
                },
                {
                    "lineColor": "#fd813c",
                    "date": "2012-01-05",
                    "duration": 501
                },
                {
                    "date": "2012-01-06",
                    "duration": 443
                },
                {
                    "date": "2012-01-07",
                    "duration": 405
                },
                {
                    "date": "2012-01-08",
                    "duration": 309,
                    "lineColor": "#CC0000"
                },
                {
                    "date": "2012-01-09",
                    "duration": 287
                },
                {
                    "date": "2012-01-10",
                    "duration": 485
                },
                {
                    "date": "2012-01-11",
                    "duration": 890
                },
                {
                    "date": "2012-01-12",
                    "duration": 810
                }
            ];
            var chart;

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.pathToImages = "../js/amcharts/images/";
                chart.categoryField = "date";
                chart.dataDateFormat = "YYYY-MM-DD";

                var balloon = chart.balloon;
                balloon.cornerRadius = 6;
                balloon.adjustBorderColor = false;
                balloon.horizontalPadding = 10;
                balloon.verticalPadding = 10;

                // AXES
                // category axis
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
                categoryAxis.autoGridCount = false;
                categoryAxis.gridCount = 50;
                categoryAxis.gridAlpha = 0;
                categoryAxis.gridColor = "#000000";
                categoryAxis.axisColor = "#555555";
                // we want custom date formatting, so we change it in next line
                categoryAxis.dateFormats = [{
                    period: 'DD',
                    format: 'DD'
                }, {
                    period: 'WW',
                    format: 'MMM DD'
                }, {
                    period: 'MM',
                    format: 'MMM'
                }, {
                    period: 'YYYY',
                    format: 'YYYY'
                }];

                // as we have data of different units, we create two different value axes
                // Duration value axis
                var durationAxis = new AmCharts.ValueAxis();
                durationAxis.gridAlpha = 0.05;
                durationAxis.axisAlpha = 0;
                // the following line makes this value axis to convert values to duration
                // it tells the axis what duration unit it should use. mm - minute, hh - hour...
                durationAxis.duration = "mm";
                durationAxis.durationUnits = {
                    DD: "d. ",
                    hh: "h ",
                    mm: "min",
                    ss: ""
                };
                chart.addValueAxis(durationAxis);


                // GRAPHS
                // duration graph
                var durationGraph = new AmCharts.AmGraph();
                durationGraph.title = "duration";
                durationGraph.valueField = "duration";
                durationGraph.type = "line";
                durationGraph.valueAxis = durationAxis; // indicate which axis should be used
                durationGraph.lineColorField = "lineColor";
                durationGraph.fillColorsField = "lineColor";
                durationGraph.fillAlphas = 0.3;
                durationGraph.balloonText = "[[value]]";
                durationGraph.lineThickness = 1;
                durationGraph.legendValueText = "[[value]]";
                durationGraph.bullet = "square";
                durationGraph.bulletBorderThickness = 1;
                durationGraph.bulletBorderAlpha = 1;
                chart.addGraph(durationGraph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonDateFormat = "YYYY MMM DD";
                chartCursor.cursorAlpha = 0;
                chart.addChartCursor(chartCursor);


                var chartScrollbar = new AmCharts.ChartScrollbar();
                chart.addChartScrollbar(chartScrollbar);


                var trendLine = new AmCharts.TrendLine();
                trendLine.initialDate = new Date(2012, 0, 0, 24); // 12 is hour - to start trend line in the middle of the day
                trendLine.finalDate = new Date(2012, 0, 12, 24);
                trendLine.initialValue = 500;
                trendLine.finalValue = 500;
                trendLine.lineColor = "#CC0000";
                chart.addTrendLine(trendLine);
                
                // WRITE
                chart.write("chartdiv");
            });
        </script>
    </head>

        <div id="chartdiv" style="width:100%; height:400px;"> here </div>

    
    <div class="page secondary">
        <div class="page-header">
            <div class="page-header-content">
                <h1>AM Charts<small>demo</small></h1>
                <a href="/" class="back-button big page-back"></a>
            </div>
        </div>

        <div class="page-region">
            <div class="page-region-content">
                <div class="grid">
                    <div class="row">
                        <div class="span10">

                        
<h2>Javascript Include</h2>
<div class="progress-bar">
<div class="bar" style="width: 100%;"></div>
</div>
<pre class="prettyprint linenums">
    &lt;script src="../amcharts/amcharts.js" type="text/javascript"&gt;&lt;/script&gt;
    &lt;script src="../amcharts/serial.js" type="text/javascript"&gt;&lt;/script&gt;
    
            &lt;script type="text/javascript"&gt;

            // since v3, chart can accept data in JSON format
            // if your category axis parses dates, you should only
            // set date format of your data (dataDateFormat property of AmSerialChart)
            var chartData = [
                {
                    "lineColor": "#ffc321",
                    "date": "2012-01-01",
                    "duration": 408
                },
                {
                    "date": "2012-01-02",
                    "duration": 482
                },
                {
                    "date": "2012-01-03",
                    "duration": 562
                },
                {
                    "date": "2012-01-04",
                    "duration": 379
                },
                {
                    "lineColor": "#fd813c",
                    "date": "2012-01-05",
                    "duration": 501
                },
                {
                    "date": "2012-01-06",
                    "duration": 443
                },
                {
                    "date": "2012-01-07",
                    "duration": 405
                },
                {
                    "date": "2012-01-08",
                    "duration": 309,
                    "lineColor": "#CC0000"
                },
                {
                    "date": "2012-01-09",
                    "duration": 287
                },
                {
                    "date": "2012-01-10",
                    "duration": 485
                },
                {
                    "date": "2012-01-11",
                    "duration": 890
                },
                {
                    "date": "2012-01-12",
                    "duration": 810
                }
            ];
            var chart;

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.pathToImages = "../amcharts/images/";
                chart.categoryField = "date";
                chart.dataDateFormat = "YYYY-MM-DD";

                var balloon = chart.balloon;
                balloon.cornerRadius = 6;
                balloon.adjustBorderColor = false;
                balloon.horizontalPadding = 10;
                balloon.verticalPadding = 10;

                // AXES
                // category axis
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
                categoryAxis.autoGridCount = false;
                categoryAxis.gridCount = 50;
                categoryAxis.gridAlpha = 0;
                categoryAxis.gridColor = "#000000";
                categoryAxis.axisColor = "#555555";
                // we want custom date formatting, so we change it in next line
                categoryAxis.dateFormats = [{
                    period: 'DD',
                    format: 'DD'
                }, {
                    period: 'WW',
                    format: 'MMM DD'
                }, {
                    period: 'MM',
                    format: 'MMM'
                }, {
                    period: 'YYYY',
                    format: 'YYYY'
                }];

                // as we have data of different units, we create two different value axes
                // Duration value axis
                var durationAxis = new AmCharts.ValueAxis();
                durationAxis.gridAlpha = 0.05;
                durationAxis.axisAlpha = 0;
                // the following line makes this value axis to convert values to duration
                // it tells the axis what duration unit it should use. mm - minute, hh - hour...
                durationAxis.duration = "mm";
                durationAxis.durationUnits = {
                    DD: "d. ",
                    hh: "h ",
                    mm: "min",
                    ss: ""
                };
                chart.addValueAxis(durationAxis);


                // GRAPHS
                // duration graph
                var durationGraph = new AmCharts.AmGraph();
                durationGraph.title = "duration";
                durationGraph.valueField = "duration";
                durationGraph.type = "line";
                durationGraph.valueAxis = durationAxis; // indicate which axis should be used
                durationGraph.lineColorField = "lineColor";
                durationGraph.fillColorsField = "lineColor";
                durationGraph.fillAlphas = 0.3;
                durationGraph.balloonText = "[[value]]";
                durationGraph.lineThickness = 1;
                durationGraph.legendValueText = "[[value]]";
                durationGraph.bullet = "square";
                durationGraph.bulletBorderThickness = 1;
                durationGraph.bulletBorderAlpha = 1;
                chart.addGraph(durationGraph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.zoomable = false;
                chartCursor.categoryBalloonDateFormat = "YYYY MMM DD";
                chartCursor.cursorAlpha = 0;
                chart.addChartCursor(chartCursor);


                var chartScrollbar = new AmCharts.ChartScrollbar();
                chart.addChartScrollbar(chartScrollbar);

                var trendLine = new AmCharts.TrendLine();
                trendLine.initialDate = new Date(2012, 0, 2, 12); // 12 is hour - to start trend line in the middle of the day
                trendLine.finalDate = new Date(2012, 0, 11, 12);
                trendLine.initialValue = 500;
                trendLine.finalValue = 500;
                trendLine.lineColor = "#CC0000";
                chart.addTrendLine(trendLine);
                // WRITE
                chart.write("chartdiv");
            });
        &lt;/script&gt;
        
        &lt;div id="chartdiv" style="width:100%; height:400px;"&gt; &lt;/div&gt;
        
</pre>
<a href="chart/samples/index.php">more Example</a>
</div></div></div></div></div></div>
        

<?php include("footer.php")?>
