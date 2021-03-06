<!DOCTYPE html>
<html>
<?php include_once 'header.php';?>
<body class="metro">
    <header class="bg-dark" data-load="header.html"></header>

    <div class="container">
        <h1>
            <a href="/"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
            Stepper<small class="on-right">component</small>
        </h1>

        <div class="example">
            <h2>Default</h2>
            <div class="stepper" data-role="stepper" data-steps="5" data-start="3"></div>
            <h2>Rounded</h2>
            <div class="stepper rounded" data-role="stepper" data-steps="5" data-start="3"></div>
            <h2>Diamond</h2>
            <div class="stepper diamond" data-role="stepper" data-steps="5" data-start="3"></div>
        </div>
        <h3>Markup</h3>
<pre class="prettyprint linenums">
&lt;div class="stepper" data-steps="5" data-role="stepper" data-start="3"&gt;&lt;/div&gt;
&lt;div class="stepper rounded" data-steps="5" data-role="stepper" data-start="3"&gt;&lt;/div&gt;
</pre>

        <div class="example">
            <h2>Methods</h2>
            <div class="stepper" data-role="stepper" data-steps="5" id="demo_stepper_methods"></div>

            <div class="actions">
                <button class="button" onclick="$('#demo_stepper_methods').stepper('next')">Next</button>
                <button class="button" onclick="$('#demo_stepper_methods').stepper('prior')">Prior</button>
                <button class="button" onclick="$('#demo_stepper_methods').stepper('first')">First</button>
                <button class="button" onclick="$('#demo_stepper_methods').stepper('last')">Last</button>
            </div>
        </div>
<pre class="prettyprint linenums">
&lt;button class="button" onclick="$('#stepper').stepper('next')"&gt;Next&lt;/button&gt;
&lt;button class="button" onclick="$('#stepper').stepper('prior')"&gt;Prior&lt;/button&gt;
&lt;button class="button" onclick="$('#stepper').stepper('first')"&gt;First&lt;/button&gt;
&lt;button class="button" onclick="$('#stepper').stepper('last')"&gt;Last&lt;/button&gt;
</pre>

    </div>

    <script src="js/hitua.js"></script>

</body>
</html>