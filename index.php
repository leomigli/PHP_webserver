<?php
echo "test di commit 2"
   $mysqli = new mysqli('localhost', 'test', 'sa', 'geolog');
   if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      exit();
   }

   if (!($stmt = $mysqli->prepare("INSERT INTO entries(Latitude, Longitude, Device, Annotation, DataInvio, TimeStamp) VALUES (?, ?, ?, ?, ?, ?)"))) {
       echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
   }
   
   $latitude   = $_GET['lt'];
   $longitude  = $_GET['ln'];
   $device     = $_GET['d'];
   $annotation = $_GET['n'];
   $datainvio  = $_GET['tt'];
   $date = date('Y-m-d H:i:s',time());

   if (!$stmt->bind_param("ddssss", $latitude, $longitude, $device, $annotation, $datainvio, $date)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
   }

   if (!$stmt->execute()) {
       echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
   }   

   $stmt->close();
   mysqli_close($mysqli);
?>
<?php
/*
$Date = '2016/11/13';
echo $Date;
$datainvio  = $_GET['tt'];
echo $datainvio; 
   $mysqli = new mysqli('localhost', 'test', 'sa', 'geolog');
   if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      exit();
   }

   if (!($stmt = $mysqli->prepare("INSERT INTO entries(Latitude, Longitude, Device, Annotation, DataInvio) VALUES (?, ?, ?, ?, ?)"))) {
       echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
   }
   
   $latitude   = $_GET['lt'];
   $longitude  = $_GET['ln'];
   $device     = $_GET['d'];
   $annotation = $_GET['n'];
   $datainvio  = $_GET['tt'];
   
   if (!$stmt->bind_param("ddss", $latitude, $longitude, $device, $annotation, $datainvio)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
   }

   if (!$stmt->execute()) {
       echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
   }   

   $stmt->close();
   mysqli_close($mysqli);
*/?>

