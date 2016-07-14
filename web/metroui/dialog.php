<!DOCTYPE html>
<html>
<?php include_once 'header.php'?>
<body class="metro">
    <header class="bg-dark" data-load="header.html"></header>
    <div class="container">
                <h1>
                    <a href="/"><i class="icon-arrow-left-3 fg-darker smaller"></i></a>
                    Dialog<small class="on-right">plugin</small>
                </h1>

                <p class="description">
                    You can create a dialog box at any time via the Dialog plugin
                </p>
                <div class="example">
                    <button class="button" id="createWindow">Create Window</button>
                    <button class="button" id="createFlatWindow">Create Flat Window</button>
                    <button class="button" id="createWindowYoutube">Youtube Video</button>
                    <button class="button" id="createWindowDraggable">Create Draggable Window</button>
                    <button class="button" id="createSysEventsWindow">SysBtn Events</button>
                </div>
                <script>
                    $(function(){
                        $("#createSysEventsWindow").on('click', function(){
                            $.Dialog({
                                shadow: true,
                                overlay: false,
                                icon: '',
                                title: 'Title',
                                width: 500,
                                padding: 10,
                                content: 'Window content here',
                                draggable: true,
                                sysButtons: {
                                    btnMin: true,
                                    btnMax: true,
                                    btnClose: true
                                },
                                sysBtnCloseClick: function(e){
                                    alert('Close button click');
                                },
                                sysBtnMinClick: function(e){
                                    alert('Min button click');
                                },
                                sysBtnMaxClick: function(e){
                                    alert('Max button click');
                                }
                            });
                        });
                        $("#createWindow").on('click', function(){
                            $.Dialog({
                                shadow: true,
                                overlay: false,
                                icon: '<span class="icon-rocket"></span>',
                                title: 'Title',
                                width: 500,
                                padding: 10,
                                content: 'Window content here'
                            });
                        });
                        $("#createWindowDraggable").on('click', function(){
                            $.Dialog({
                                shadow: true,
                                overlay: false,
                                draggable: true,
                                icon: '<span class="icon-bus"></span>',
                                title: 'Draggable window',
                                width: 500,
                                padding: 10,
                                content: 'This Window is draggable by caption.',
                                onShow: function(){
                                    var content = '<form id="login-form-1">' +
                                            '<label>Login</label>' +
                                            '<div class="input-control text"><input type="text" name="login"><button class="btn-clear"></button></div>' +
                                            '<label>Password</label>'+
                                            '<div class="input-control password"><input type="password" name="password"><button class="btn-reveal"></button></div>' +
                                            '<div class="input-control checkbox"><label><input type="checkbox" name="c1" checked/><span class="check"></span>Check me out</label></div>'+
                                            '<div class="form-actions">' +
                                            '<button class="button primary">Login to...</button>&nbsp;'+
                                            '<button class="button" type="button" onclick="$.Dialog.close()">Cancel</button> '+
                                            '</div>'+
                                            '</form>';

                                    $.Dialog.title("User login");
                                    $.Dialog.content(content);
                                }

                            });
                        });
                        $("#createFlatWindow").on('click', function(){
                            $.Dialog({
                                overlay: true,
                                shadow: true,
                                flat: true,
                                draggable: true,
                                icon: '<img src="images/excel2013icon.png">',
                                title: 'Flat window',
                                content: '',
                                padding: 10,
                                onShow: function(_dialog){
                                    var content = '<form class="user-input">' +
                                            '<label>Login</label>' +
                                            '<div class="input-control text"><input type="text" name="login"><button class="btn-clear"></button></div>' +
                                            '<label>Password</label>'+
                                            '<div class="input-control password"><input type="password" name="password"><button class="btn-reveal"></button></div>' +
                                            '<div class="input-control checkbox"><label><input type="checkbox" name="c1" checked/><span class="check"></span>Check me out</label></div>'+
                                            '<div class="form-actions">' +
                                            '<button class="button primary">Login to...</button>&nbsp;'+
                                            '<button class="button" type="button" onclick="$.Dialog.close()">Cancel</button> '+
                                            '</div>'+
                                            '</form>';

                                    $.Dialog.title("User login");
                                    $.Dialog.content(content);
                                }
                            });
                        });
                        $("#createWindowYoutube").on('click', function(){
                            $.Dialog({
                                overlay: false,
                                shadow: true,
                                flat: false,
                                icon: '<img src="images/excel2013icon.png">',
                                title: 'Window 8.1 Everywhere For Everything!',
                                content: '',
                                onShow: function(_dialog){
                                    var html = [
                                        '<iframe width="640" height="480" src="//www.youtube.com/embed/_24bgSxAD9Q" frameborder="0" allowfullscreen></iframe>'
                                    ].join("");

                                    $.Dialog.content(html);
                                }
                            });
                        });
                    })
                </script>

<pre class="prettyprint linenums">
$("#createWindow").on('click', function(){
    $.Dialog({
        shadow: true,
        overlay: false,
        icon: '&lt;span class="icon-rocket"&gt;&lt;/span&gt;',
        title: 'Title',
        width: 500,
        padding: 10,
        content: 'Window content here'
    });
});
$("#createFlatWindow").on('click', function(){
    $.Dialog({
        overlay: true,
        shadow: true,
        flat: true,
        icon: '&lt;img src="images/excel2013icon.png"&gt;',
        title: 'Flat window',
        content: '',
        onShow: function(_dialog){
            var content = _dialog.children('.content');
            content.html('Set content from event onShow');
        }
    });
});
$("#createWindowYoutube").on('click', function(){
    $.Dialog({
        overlay: false,
        shadow: true,
        flat: false,
        icon: '&lt;img src="images/excel2013icon.png"&gt;',
        title: 'Window 8.1 Everywhere For Everything!',
        content: '',
        onShow: function(_dialog){
            var html = [
                '&lt;iframe width="640" height="480"
                        src="//www.youtube.com/embed/_24bgSxAD9Q"
                        frameborder="0"&gt;&lt;/iframe&gt;'
            ].join("");

            $.Dialog.content(html);
        }
    });
});
</pre>
                <h3>Parameters:</h3>
                <div>
                    <table class="table striped border">
                        <tr>
                            <td>icon</td>
                            <td>false</td>
                            <td>false or html tag (span with class <code>icon-*</code> or <code>img</code>)</td>
                        </tr>
                        <tr>
                            <td>title</td>
                            <td>string</td>
                            <td>string (plain text or html) for dialog title</td>
                        </tr>
                        <tr>
                            <td>content</td>
                            <td>string</td>
                            <td>string (plain text or html) for dialog content</td>
                        </tr>
                        <tr>
                            <td>flat</td>
                            <td>boolean</td>
                            <td>default false, create flat style dialog</td>
                        </tr>
                        <tr>
                            <td>shadow</td>
                            <td>boolean</td>
                            <td>default false, create shadow for dialog</td>
                        </tr>
                        <tr>
                            <td>overlay</td>
                            <td>boolean</td>
                            <td>default false, show overlay for dialog</td>
                        </tr>
                        <tr>
                            <td>draggable</td>
                            <td>boolean</td>
                            <td>default false, set dialog draggable</td>
                        </tr>
                        <tr>
                            <td>width</td>
                            <td>int or string (percent)</td>
                            <td>default 'auto', if value != auto min-width sets</td>
                        </tr>
                        <tr>
                            <td>height</td>
                            <td>int or string (percent)</td>
                            <td>default 'auto', if value != auto min-height sets</td>
                        </tr>
                        <tr>
                            <td>padding</td>
                            <td>int</td>
                            <td>default 0, set content padding</td>
                        </tr>
                        <tr>
                            <td>position</td>
                            <td>'default' or object {offsetX, offsetY}</td>
                            <td>default 'default', dialog position</td>
                        </tr>
                        <tr>
                            <td>sysButtons</td>
                            <td>false or object {btnClose, btnMax, btnMin}</td>
                            <td>default {btnClose: true}, dialog system buttons</td>
                        </tr>
                    </table>
                </div>

                <h3>Events</h3>
                <p class="description">Dialog plugin now support event <code>onShow</code>. You can set content for dialog from the event, after dialog is showing.</p>
<pre class="prettyprint linenums">
$("#createWindow").on('click', function(){
    $.Dialog({
        shadow: true,
        overlay: true,
        icon: '&lt;span class="icon-rocket"&gt;&lt;/span&gt;',
        title: 'Title',
        content: 'Window content here',
        onShow: function(_dialog){
            console.log(_dialog);
        }
    });
});
</pre>
                <h4>Any components in dialog</h4>
                <p>
                    If you a used any Metro UI CSS components in dialog and this components required init from javascript you must re init components with <code>$.Metro.init*</code> functions.
                </p>
<pre class="prettyprint linenums">
$("#createFlatWindow").on('click', function(){
    $.Dialog({
        overlay: true,
        shadow: true,
        flat: true,
        icon: '&lt;img src="images/excel2013icon.png">',
        title: 'Flat window',
        content: '',
        padding: 10,
        onShow: function(_dialog){
            var content = '&lt;form&gt;' +
                '&lt;label&gt;Login&lt;/label&gt;' +
                '&lt;div class="input-control text"&gt;&lt;input type="text" name="login"&gt;
                &lt;button class="btn-clear"&gt;&lt;/button&gt;&lt;/div&gt; ' +
                '&lt;label&gt;Password&lt;/label&gt;' +
                '&lt;div class="input-control password"&gt;
                &lt;input type="password" name="password"&gt;
                &lt;button class="btn-reveal"&gt;&lt;/button&gt;&lt;/div&gt; ' +
                '&lt;div class="input-control checkbox"&gt;
                &lt;label&gt;&lt;input type="checkbox" name="c1" checked/&gt;
                &lt;span class="check"&gt;&lt;/span&gt;Check me out&lt;/label&gt;&lt;/div&gt;'+
                '&lt;div class="form-actions"&gt;' +
                '&lt;button class="button primary"&gt;Login to...&lt;/button&gt;&nbsp;'+
                '&lt;button class="button" type="button" onclick="$.Dialog.close()"&gt;Cancel&lt;/button&gt; '+
                '&lt;/div&gt;'+
                '&lt;/form&gt;';

            $.Dialog.title("User login");
            $.Dialog.content(content);
            $.Metro.initInputs();
        }
    });
});
</pre>

    </div>

    <script src="js/hitua.js"></script>

</body>
</html>