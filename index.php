<?php
/**
 * Author: sfleming
 * upload.php
 * Date: 11/28/12
 */

 ?>
<!doctype html>
<head>
    <title>Upload Example</title>
    <style>
        body { padding: 30px }
        #container{
            width: 600px;
        }
        form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px }[/left][/font][/color]
        .progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
        .percent {display:inline-block; position: relative; text-align: center; display:none;}
    </style>
</head>
<body>
<h1>Scott's Ajax File Example</h1>
<div id="container">
<form id="FormID" action="file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile"><br>
    <input type="submit" value="Upload File to Server">
</form>

<div class="progress">
    <div class="bar">
            <div class="percent">0%</div >
    </div >
</div>


<div id="status"></div>
</div>

<script src="/js/jquery.js"></script>
<script src="/js/jquery.form.js"></script>
<script>
    (function() {


        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
                percent.fadeIn();
                bar.fadeIn();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal)
                percent.html(percentVal);
//console.log(percentVal, position, total);
            },
            complete: function(xhr) {
                status.fadeIn();
                status.html(xhr.responseText);
                percent.fadeOut("slow");
                bar.fadeOut("slow");
                $("#FormID").reset();
            }
        });


    })();

    jQuery.fn.reset = function () {
        $(this).each (function() { this.reset(); });
    }
</script>