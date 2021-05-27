<html>

<head>
  <title>Search System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3"><br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Member Info</h3>
          </div>
          <div class="panel-body">
            <p>Select a name to check their account.</p>
            <form method="POST">
              <select class="form-control" name="member">
                <option value="123">Emily Rogers</option>
                <option value="124">Virginia Jackson</option>
                <option value="125">Eugene Wright</option>
                <option value="126">Roy Perry</option>
                <option value="127">Martha Davis</option>
                <option value="128">Paul Thomas</option>
                <option value="129">Brenda Murphy</option>
                <option value="130">Christine Patterson</option>
                <option value="131">Sara Griffin</option>
                <option value="132">Walter Edwards</option>
                <option value="133">Arthur Anderson</option>
                <option value="134">Billy Hall</option>
                <option value="135">Heather Adams</option>
                <option value="136">Doris Walker</option>
                <option value="137">Peter Diaz</option>
                <option value="138">Andrea Taylor</option>
                <option value="139">Margaret Jenkins</option>
                <option value="141">Timothy Mitchell</option>
                <option value="142">Joseph Lee</option>
                <option value="143">Ernest Flores</option>
                <option value="267">Lisa Allen</option>
                <option value="268">Keith Smith</option>
                <option value="269">Jeremy Butler</option>
                <option value="270">Fred Moore</option>
                <option value="271">Robert Bell</option>
                <option value="272">Shawn Coleman</option>
                <option value="273">Nicholas James</option>
                <option value="274">Christina Wilson</option>
                <option value="275">Evelyn Thompson</option>
                <option value="276">Nancy Ward</option>
              </select>
              <br />
              <button type="submit" class="btn btn-default">Search</button>
            </form>
            <?php
              $FLAG = "NISRA{hey!H0w_c4n_y0u_f1nd_4dmin!!}";
              if(isset($_POST["member"])){
                $id = (int)$_POST["member"];
                echo "<hr>";
                try{
                  $db = new PDO("sqlite:y3nui7YycwvuWsyla5jD.db");
                  $sql = $db->prepare("SELECT * FROM `member` WHERE id = :id");
                  $sql->bindParam(":id", $id);

                  $sql->execute();
                  $result = $sql->fetch();

                  if (!empty($result)) {
                    $name = $result["name"];
                    $password = $result["password"];

                    echo "<h4>Member ID: ".$id."</h4><h4>Name: ".$name."</h4><h5>Password: ".$password."</h5>";
                    if($name === "Admin")
                      echo "<br />Hi admin, here's the flag: <code>". $FLAG ."</code>";
                  } else {
                    echo "<h4>No data!</h4>";
                  }
                  
                } catch (PDOException $e){
                  echo "Something wrong! Please contact the admin!";
                  die();
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>