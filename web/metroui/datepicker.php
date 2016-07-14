<!DOCTYPE html>
<html>
<?php include_once 'header.php';?>
<body class="metro">
    <header class="bg-dark" data-load="header.html"></header>

    <div class="container">
                <h1>
                    <a href="/"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                    DatePicker<small class="on-right">component</small>
                </h1>


                <p>
                    This component required <code>metro-calendar.js</code> and <code>metro-datepicker.js</code>
                </p>
                <div class="example1">

                    <div class="grid ">
                        <div class="row">
                            <div class="span3">
                                <div class="input-control text" data-role="datepicker" data-week-start="1">
                                    <input type="text">
                                    <button class="btn-date"></button>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="input-control text" data-role="datepicker" data-date="2013-11-13" data-effect="slide" data-other-days="1">
                                    <input type="text">
                                    <button class="btn-date"></button>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="input-control text" data-role="datepicker" data-date="2013-11-14" data-format="dddd, mmmm d, yyyy" data-effect="fade">
                                    <input type="text">
                                    <button class="btn-date"></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
<pre class="prettyprint linenums">
&lt;div class="input-control text"&gt;
    &lt;input type="text"&gt;
    &lt;button class="btn-date"&gt;&lt;/button&gt;
&lt;/div&gt;
</pre>
                <p>
                    Init with data-* API:
                </p>
<pre class="prettyprint linenums">
&lt;div class="input-control text" data-role="datepicker"
    data-date='set the initial date'
    data-format='format output'
    data-effect='slide | fade | none'
    data-locale='en | fr | ua | ru'
    data-week-start='0 | 1'
    data-other-days='0 | 1'&gt;
    &lt;input type="text"&gt;
    &lt;button class="btn-date"&gt;&lt;/button&gt;
&lt;/div&gt;
</pre>
                <p>
                    Init with Javascript:
                </p>
<pre class="prettyprint linenums">
&lt;div class="input-control text" id="datepicker"&gt;
    &lt;input type="text"&gt;
    &lt;button class="btn-date"&gt;&lt;/button&gt;
&lt;/div&gt;

&lt;script&gt;
    $("#datepicker").datepicker();
&lt;/script&gt;
</pre>

                <p>To set params you can use data-* api or javascript:</p>
<pre class="prettyprint linenums">
// Data-* API
&lt;div class="input-control text" data-role="datepicker"
    data-date="2013-01-01"
    data-format="d/m/y"
    data-position="top|bottom"
    data-effect="none|slide|fade"&gt;
    &lt;input type="text"&gt;
    &lt;button class="btn-date"&gt;&lt;/button&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
    $("#datepicker").datepicker({
        date: "2013-01-01", // set init date
        format: "d/m/y", // set output format
        effect: "none", // none, slide, fade
        position: "bottom", // top or bottom,
        locale: ''en, // 'ru' or 'en', default is $.Metro.currentLocale
    });
&lt;/script&gt;
</pre>

    </div>

    <script src="js/hitua.js"></script>

</body>
</html>