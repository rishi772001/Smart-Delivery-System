<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

?>


<html>
  <head>
    <title>Location</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
  <div class="content">

    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
<div class="container">

</br>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <button style="float:right;margin-right: 10" class="btn btn-outline-danger"> <a href="index.html?logout='1'" style="color: black;text-decoration: none;">logout</a> </button>
      <p>Welcome <strong><?php echo $_SESSION['username']; echo "</br> Your Id:".$_SESSION['idd']; ?></strong></p>
    <?php endif ?>
  </div>
    <!--<a href="https://www.google.com/maps/dir/?api=1&origin=No 82, TH High Road, Jandarayar St Vasantha Nagar, Sathangadu, Chennai, Tamil Nadu 600019&destination=947+Thiruvottiyur High Rd+Chinna Mettupalaiyam+Kaladipet+Tiruvottiyur+Chennai+Tamil Nadu 600019&travelmode=bicycling">click</a>-->

    <div id="map"class="container"></div>
    
    <script>

      var map;
      var markers = [];

      function initMap() {
        var chennai = {lat: 13.067439, lng: 80.237617};

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: chennai,
          mapTypeId: 'terrain'
        });
    
    
        // Adds a marker at the center of the map.


        //code for database retrieval and add into map
        <?php
          $servername = "localhost:33";
          $username = "root";
          $password = "";
          $dbname = "post";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          $r=$_SESSION['idd'];
          $sql = "SELECT * from postt where ID='$r'";
          //$sql = $mysqli->prepare($query);
          //$sql->bind_param($_SESSION['idd']);
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $tsp = TspBranchBound::getInstance();
              while($row = $result->fetch_assoc())
              {
                $address=$row['SERVICE'];

                $apiKey = 'AIzaSyCu7EIfXvO-sESLUJSlHUEW-GPvvdo9bAU';
                $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
                $geo = json_decode($geo, true);
                if (isset($geo['status']) && ($geo['status'] == 'OK')) 
                  $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
                  $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
                  $tsp->addLocation(array('id'=>$address, 'latitude'=>$latitude, 'longitude'=>$longitude));
              
                  ?>var temp = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};

                  addMarker(temp);
                  <?php
                  
              }
              
          }
          ?>





      }

      function addMarker(location) {
        var marker = new google.maps.Marker({
          <?php 
          $la="<script>document.writeln(location['lat']);</script>";
          $lo="<script>document.writeln(location['lng']);</script>";
          $pq=geo($la,$lo); 
          ?>

          position: location,
          map: map,
          title:'<?php echo "$pq" ?>'

        });
        markers.push(marker);
      }

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
      
      
        }
      }

    </script>
    <div class="container">
    </br>
    <h1>Addresses to Deliver:</h1>
    <?php
          
          $ans = $tsp->solve();
      
    ?>
  </div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCu7EIfXvO-sESLUJSlHUEW-GPvvdo9bAU&callback=initMap">
    </script>
  </body>
</html>


<?php
function geo($lat, $long)
{
    
    $geocode = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false&key=AIzaSyCu7EIfXvO-sESLUJSlHUEW-GPvvdo9bAU";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $geocode);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $output = json_decode($response);
    $dataarray = get_object_vars($output);
    if ($dataarray['status'] != 'ZERO_RESULTS' && $dataarray['status'] != 'INVALID_REQUEST') {
        if (isset($dataarray['results'][0]->formatted_address)) {

            $address = $dataarray['results'][0]->formatted_address;

        } else {
            $address = 'Not Found';

        }
    } else {
        $address = 'No';
    }

    return $address;
}

?>








<?php
class TspLocation
{
  public $latitude;
  public $longitude;
  public $id;

  public function __construct($latitude, $longitude, $id = null)
  {
    $this->latitude = $latitude;
    $this->longitude = $longitude;
    $this->id = $id;
  }

  public static function getInstance($location)
  {
    $location = (array) $location;
    if (empty($location['latitude']) || empty($location['longitude']))
    {
      throw new RuntimeException('TspLocation::getInstance could not load location');
    }

    // Instantiate the TspLocation.
    $id = isset($location['id']) ? $location['id'] : null;
    $tspLocation = new TspLocation($location['latitude'], $location['longitude'], $id);

    return $tspLocation;
  }

  public static function distance($lat1, $lon1, $lat2, $lon2, $unit = 'M')
  {
    if ($lat1 == $lat2 && $lon1 == $lon2) return 0;

    $theta = $lon1 - $lon2; 
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
    $dist = acos($dist); 
    $dist = rad2deg($dist); 
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K")
      return ($miles * 1.609344); 
    else if ($unit == "N")
      return ($miles * 0.8684);
    else
      return $miles;
  }
}

class TspNode
{

  public $path = array();
  public $reducedMatrix = array();
  public $cost;
  public $vertex;
  public $level;

  /**
   * Constructor
   *
   * @param   array    $parentMatrix   The parentMatrix of the costMatrix.
   * @param   array    $path           An array of integers for the path.
   * @param   integer  $level          The level of the node.
   * @param   integer  $i, $j          They are corresponds to visiting city j from city i
   *
   */
  public function __construct($parentMatrix, $path, $level, $i, $j)
  {
    // stores ancestors edges of state space tree
    $this->path = $path;

    // skip for root node
    if ($level != 0)
      // add current edge to path
      $this->path[] = array($i, $j);

    // copy data from parent node to current node
    $this->reducedMatrix = $parentMatrix;

    // Change all entries of row i and column j to infinity
    // skip for root node
    for ($k = 0; $level != 0 && $k < count($parentMatrix); $k++)
    {
      // set outgoing edges for city i to infinity
      $this->reducedMatrix[$i][$k] = INF;
      // set incoming edges to city j to infinity
      $this->reducedMatrix[$k][$j] = INF;
    }

    // Set (j, 0) to infinity 
    // here start node is 0
    $this->reducedMatrix[$j][0] = INF;

    $this->level = $level;
    $this->vertex = $j;
  }
}

class PqTsp extends SplPriorityQueue
{
  public function compare($lhs, $rhs) {
    if ($lhs === $rhs) return 0;
    return ($lhs < $rhs) ? 1 : -1;
  }
}

class TspBranchBound
{
  protected $n = 0;
  protected $locations = array();
  protected $costMatrix = array();

  /**
   * @var    array  TspBranchBound instances container.
   */
  protected static $instances = array();

  /**
   * Constructor
   */
  public function __construct($costMatrix = array())
  {
    if ($costMatrix) {
      $this->costMatrix = $costMatrix;
      $this->n = count($this->costMatrix);
    }
  }

  /**
   * Method to get an instance of a TspBranchBound.
   *
   * @param   string  $name     The name of the TspBranchBound.
   * @param   array   $locations  An array of locations.
   *
   * @return  object  TspBranchBound instance.
   *
   * @throws  Exception if an error occurs.
   */
  public static function getInstance($name = 'TspBranchBound', $locations = null)
  {
    // Reference to array with instances
    $instances = &self::$instances;

    // Only instantiate if it does not already exist.
    if (!isset($instances[$name]))
    {
      // Instantiate the TspBranchBound.
      $instances[$name] = new TspBranchBound();
    }

    $instances[$name]->locations = array();
    $instances[$name]->costMatrix = array();

    // Load the data.
    if ($locations)
    {
      if ($instances[$name]->load($locations) == false)
      {
        throw new RuntimeException('TspBranchBound::getInstance could not load locations');
      }
    }

    return $instances[$name];
  }

  public function load($locations)
  {
    if (empty($locations))
      return false;

    foreach ($locations as $location)
    {
      if (empty($location))
        return false;

      if ($this->addLocation($location) == false)
        return false;
    }

    return $this->loadMatrix();
  }

  public function loadMatrix()
  {
    if (empty($this->locations))
      return false;

    $this->costMatrix = array();
    $n_locations = count($this->locations);
    for ($i = 0; $i < $n_locations; $i++)
    {
      $address=$this->locations[$i]->id;
      $add=str_replace(' ', '!',$address);
      echo $i+1 . ". " . $address;echo "<form method='POST'><pre><input type='hidden' value=".$add." name='inp'><button type='submit' value='Delivered' class='btn btn-success' name='del'>Delivered</button><br></pre></form>";
      for ($j = 0; $j < $n_locations; $j++)
      {
        $distance = INF;
        if ($i!=$j)
        {
          $loc1 = $this->locations[$i];
          $loc2 = $this->locations[$j];
          $distance = TspLocation::distance($loc1->latitude, $loc1->longitude, $loc2->latitude, $loc2->longitude);
        }
        $this->costMatrix[$i][$j] = $distance;
      }
    }

    $this->n = count($this->costMatrix);

    return true;
  }

  public function addLocation($location)
  {
    try
    {
      $location = TspLocation::getInstance($location);
    }
    catch (Exception $e)
    {
      return false;
    }

    $this->locations[] = $location;

    return true;
  }

  protected function rowReduction(&$reducedMatrix, &$row)
  {
    // initialize row array to INF 
    $row = array_fill(0, $this->n, INF);

    // row[i] contains minimum in row i
    for ($i = 0; $i < $this->n; $i++)
      for ($j = 0; $j < $this->n; $j++)
        if ($reducedMatrix[$i][$j] < $row[$i])
          $row[$i] = $reducedMatrix[$i][$j];

    // reduce the minimum value from each element in each row.
    for ($i = 0; $i < $this->n; $i++)
      for ($j = 0; $j < $this->n; $j++)
        if ($reducedMatrix[$i][$j] !== INF && $row[$i] !== INF)
          $reducedMatrix[$i][$j] -= $row[$i];
  }

  protected function columnReduction(&$reducedMatrix, &$col)
  {
    // initialize row array to INF 
    $col = array_fill(0, $this->n, INF);

    // col[i] contains minimum in row i
    for ($i = 0; $i < $this->n; $i++)
      for ($j = 0; $j < $this->n; $j++)
        if ($reducedMatrix[$i][$j] < $col[$j])
          $col[$j] = $reducedMatrix[$i][$j];

    // reduce the minimum value from each element in each row.
    for ($i = 0; $i < $this->n; $i++)
      for ($j = 0; $j < $this->n; $j++)
        if ($reducedMatrix[$i][$j] !== INF && $col[$j] !== INF)
          $reducedMatrix[$i][$j] -= $col[$j];
  }

  protected function calculateCost(&$reducedMatrix)
  {
    // initialize cost to 0
    $cost = 0;

    // Row Reduction
    $row = array();
    $this->rowReduction($reducedMatrix, $row);

    // Column Reduction
    $col = array();
    $this->columnReduction($reducedMatrix, $col);

    // the total expected cost 
    // is the sum of all reductions
    for ($i = 0; $i < $this->n; $i++) {
      $cost += ($row[$i] !== INF) ? $row[$i] : 0;
      $cost += ($col[$i] !== INF) ? $col[$i] : 0;
    }

    return $cost;
  }

public function printPath($list)
  {
    echo "<h2>  \n Shortest Path: <br> </h2>";
    for ($i = 0; $i < count($list); $i++) {
      $start = $list[$i][0] + 1;
      $end = $list[$i][1] + 1;
      //echo $start . " -> " . $end . "\n";
      echo $this->locations[$start-1]->id ."    --->>    " ;
      echo $this->locations[$end-1]->id;
      $o=$this->locations[$start-1]->id;
      $d=$this->locations[$end-1]->id;
      echo "\t<button class='btn btn-primary btn-sm'><a style='text-decoration:none;color:white' href='https://www.google.com/maps/dir/?api=1&origin=$o&destination=$d&travelmode=driving'>Directions</a></button>";
      echo "<br> <br>";
    }
  }

  public function solve()
  {
    if (empty($this->costMatrix))
    {
      if (!$this->loadMatrix())
        return false;
    }

    $costMatrix = $this->costMatrix;
    // Create a priority queue to store live nodes of
    // search tree;
    $pq = new PqTsp();

    // create a root node and calculate its cost
    // The TSP starts from first city i.e. node 0
    $root = new TspNode($costMatrix, null, 0, -1, 0);
    // get the lower bound of the path starting at node 0
    $root->cost = $this->calculateCost($root->reducedMatrix);

    // Add root to list of live nodes;
    $pq->insert($root, $root->cost);

    // Finds a live node with least cost,
    // add its children to list of live nodes and
    // finally deletes it from the list.
    while($pq->valid())
    {
      // Find a live node with least estimated cost
      $min = $pq->extract();

      // Clear the max estimated nodes
      $pq = new PqTsp();

      // i stores current city number
      $i = $min->vertex;

      // if all cities are visited
      if ($min->level == $this->n - 1)
      {
        // return to starting city
        $min->path[] = array($i, 0);
        // print list of cities visited;
        $this->printPath($min->path);

        // return optimal cost & etc.
        return array ('cost' => $min->cost, 'path' => $min->path, 'locations' => $this->locations);
      }

      // do for each child of min
      // (i, j) forms an edge in space tree
      for ($j = 0; $j < $this->n; $j++)
      {
        if ($min->reducedMatrix[$i][$j] !== INF)
        {
          // create a child node and calculate its cost
          $child = new TspNode($min->reducedMatrix, $min->path, $min->level+1, $i, $j);

          /* Cost of the child = 
            cost of parent node + 
            cost of the edge(i, j) +
            lower bound of the path starting at node j
          */
          $child->cost = $min->cost + $min->reducedMatrix[$i][$j] + $this->calculateCost($child->reducedMatrix);

          // Add child to list of live nodes
          $pq->insert($child, $child->cost);
        }
      }

      // free node as we have already stored edges (i, j) in vector
      // So no need for parent node while printing solution.
      $min = null;
    }
  }
}
echo "<br> <br>";

if(isset($_POST['del']))
{

  $ad=$_POST['inp'];
  $ad=str_replace('!', ' ', $ad);
  
  //echo $ad;
  $q = "delete from letter where addr= '$ad'";
  $h = "delete from postt where SERVICE= '$ad'";
   if($conn->query($q)  && $conn->query($h))
      echo"<script type='text/javascript'>window.alert('Thank you for your delivery!');window.location='map.php';</script>";
  else
    echo $conn -> error;
}

//http string not found so no google request, only graphical



?>