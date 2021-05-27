<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $url = $_POST['url'];

        // block command injection
        $blacklists = array("|", "&", ";", "$", "(", ")", "\n", "`");
        foreach($blacklists as $blacklist){
            if(strpos($url, $blacklist) !== false){
                die("Hey! No Hack!");
            }
        }

        $result = "";

        $sandbox = "./upload/".uniqid();
        $result .= "$ cd ".$sandbox."<br/>";
        mkdir($sandbox, 0777, true);
        chdir($sandbox);
        $result .= "$ wget ". $url. "<br/>";
        $result .= shell_exec("wget ".$url." 2>&1")."<br/><br/>";
        $result .= "$ bash -c 'rm ".$sandbox."/*.{php,pht,phtml,php3,php4,php5,php7}'<br/>";
        chdir('/var/www/html');
        shell_exec("bash -c 'rm ".$sandbox."/*.{php,pht,phtml,php3,php4,php5,php7}'");
        die($result);
    }
?>

<html>

<head>
    <title>SSRF 00</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2"><br />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">URL Downloader</h3>
                    </div>
                    <div class="panel-body">
                        <p>URL:</p>
                        <div class="form-group">
                            <input class="form-control" id="url" name="url" placeholder="url">
                        </div>
                        <button onclick="javascript:submitUrl()" class="btn btn-default">Download</button>
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