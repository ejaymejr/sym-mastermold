<!DOCTYPE html>
<html>
<?php include_once 'header.php';?>
<body class="metro">
    <header class="bg-dark" data-load="header.html"></header>
    <div class="container">
                <h1>
                    <a href="/"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                    Window<small class="on-right">component</small>
                </h1>

                <div class="example">
                    <div class="grid fluid">
                        <div class="row no-margin">
                            <div class="span4">
                                <h3>Active window</h3>
                                <div class="window">
                                    <div class="caption">
                                        <span class="icon icon-windows"></span>
                                        <div class="title">Window caption</div>
                                        <button class="btn-min"></button>
                                        <button class="btn-max"></button>
                                        <button class="btn-close"></button>
                                    </div>
                                    <div class="content">
                                        Window content
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <h3>Window with shadow</h3>
                                <div class="window shadow">
                                    <div class="caption">
                                        <span class="icon icon-windows"></span>
                                        <div class="title">Window caption</div>
                                        <button class="btn-min"></button>
                                        <button class="btn-max"></button>
                                        <button class="btn-close"></button>
                                    </div>
                                    <div class="content">
                                        Window content
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <h3>Inactive window</h3>
                                <div class="window inactive">
                                    <div class="caption">
                                        <span class="icon icon-windows"></span>
                                        <div class="title">Window caption</div>
                                        <button class="btn-min"></button>
                                        <button class="btn-max"></button>
                                        <button class="btn-close"></button>
                                    </div>
                                    <div class="content">
                                        Window content
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Window definition</h2>
                <p>To manual creating window use next <code>html</code> structure:</p>
<pre class="prettyprint linenums">
&lt;div class="window"&gt;
    &lt;div class="caption"&gt;
        &lt;span class="icon icon-windows"&gt;&lt;/span&gt; //window icon, also you can use img tag
        &lt;div class="title"&gt;Window caption&lt;/div&gt; // window title
        &lt;button class="btn-min"&gt;&lt;/button&gt; // minimize button
        &lt;button class="btn-max"&gt;&lt;/button&gt; // maximize button
        &lt;button class="btn-close"&gt;&lt;/button&gt; // close button
    &lt;/div&gt;
    &lt;div class="content"&gt;
        Window content
    &lt;/div&gt;
&lt;/div&gt;
</pre>
                <p>To set inactive mode, you can add subclass <code>inactive</code> to <code>div</code> with class <code>window</code></p>
<pre class="prettyprint linenums">
&lt;div class="window inactive"&gt;
...
&lt;/div&gt;
</pre>
                <p>To set shadow for window, you can add subclass <code>shadow</code> to <code>div</code> with class <code>window</code></p>
<pre class="prettyprint linenums">
&lt;div class="window shadow"&gt;
...
&lt;/div&gt;
</pre>

                <h2>Flat Window</h2>
                <div class="example">
                    <div class="grid fluid">
                        <div class="row">
                            <div class="span6">
                                <div class="window flat">
                                    <div class="caption">
                                        <span class="icon icon-windows"></span>
                                        <div class="title">Window caption</div>
                                        <button class="btn-min"></button>
                                        <button class="btn-max"></button>
                                        <button class="btn-close"></button>
                                    </div>
                                    <div class="content">
                                        Window content
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="window flat shadow">
                                    <div class="caption">
                                        <span class="icon icon-windows"></span>
                                        <div class="title">Window caption</div>
                                        <button class="btn-min"></button>
                                        <button class="btn-max"></button>
                                        <button class="btn-close"></button>
                                    </div>
                                    <div class="content">
                                        Window content
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<pre class="prettyprint linenums">
&lt;div class="window flat"&gt;
...
&lt;/div&gt;

&lt;div class="window flat shadow"&gt;
...
&lt;/div&gt;
</pre>

                <div class="example">
                    <button class="button" id="createWindow">Create Window</button>
                    <script>
                        $(function(){
                            $("#createWindow").on('click', function(){
                                $.Dialog({
                                    flat: false,
                                    shadow: true,
                                    title: 'Test window',
                                    content: 'Test window content',
                                    height: 200
                                });
                            });
                        });
                    </script>
                </div>

    </div>

    <script src="js/hitua.js"></script>

</body>
</html>