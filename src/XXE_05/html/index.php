<html>

<head>
    <title>XXE 05</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"><br />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">XXE 05</h3>
                    </div>
                    <div class="panel-body">
                        Give me your name.
                        <br />
                        <hr>
                        <div class="form-group">
                            <input class="form-control" id="username" name="username" placeholder="name">
                        </div>
                        <button onclick="javascript:submitName()" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-info" role="alert" id="msg" style="visibility: hidden"></div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
<script type='text/javascript'>
    function submitName() {
        var username = $("#username").val();
        if (username == "") {
            alert("Username can not be empty!");
            return;
        }
        $.ajax({
            type: "POST",
            url: "/auth.php",
            contentType: "application/xml;charset=utf-8",
            data: "<username>" + username + "</username>",
            async: false,
            success: function (result) {
                msg.style.visibility = 'visible';
                document.getElementById("msg").innerHTML = result;
            },
            error: function () {
                alert("Something going wrong, please contact admin.");
            }
        });
    }
</script>

</html>