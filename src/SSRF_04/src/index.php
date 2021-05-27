<?php
    function curl($url){  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $url = $_POST['url'];
        die(nl2br(curl($url)));
    }
?>

<html>

<head>
    <title>SSRF 04</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2"><br />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">URL Viewer</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" id="url" name="url" placeholder="url">
                        </div>
                        <button onclick="javascript:submitUrl()" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2" id="msg" style="visibility: hidden">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Result</h3>
                    </div>
                    <div class="panel-body">
                        <samp id="msg_result"></samp>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script type='text/javascript'>
    function submitUrl() {
        var url = $("#url").val();
        if (url == "") {
            alert("URL can not be empty!");
            return;
        }
        $.ajax({
            type: "POST",
            url: "/",
            data: {
                'url': url
            },
            async: false,
            success: function (result) {
                msg.style.visibility = 'visible';
                document.getElementById("msg_result").innerHTML = result;
            },
            error: function () {
                alert("Something going wrong, please contact admin.");
            }
        });
    }
</script>

</html>