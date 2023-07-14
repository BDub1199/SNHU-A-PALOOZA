<?php

//Create connection
$con = mysql_connect(':mysql','test2','123');

//check connection
if(!$con) {
      die("Connection failed: " . mysql_error());
}
echo "Connected successfully.";

//select database
mysql_select_db("CIT647StudentsConcertsProfiles", $con);

//Create Random Unique ID for RowNum field in Database Table
$pattern = "1234567890";
$RowID = $pattern{rand(0,10)};
for($i = 1; $i < 10; $i++)
{
  $RowID .= $pattern{rand(0,10)};
}

// sql to create test table
$sql = "INSERT INTO CIT647StudentsConcertProfilesTable (RowNum, FirstName, LastName, PhoneNum) VALUES ('$RowID','$_POST[FirstName]', '$_POST[LastName]', '$_POST[PhoneNum]')";
//$sql = "INSERT INTO CIT647Table2 (firstName) Values ('$_POST[FirstName]')";

//Store form names in variables
  $First = $_POST['FirstName'];
  $Last = $_POST['LastName'];
  $Phone = $_POST['PhoneNum'];
  

if (mysql_query($sql, $con)){
  echo "Records added successfully. ";
} else {
  echo "Error: Not able to execute $sql. " . mysql_error($con);
}

//Close the connection
mysql_close($con);

?>

<br><center><h1>We've received your information.</h1></center>
<br><br>
<center>
Thank you for submitting your information for the concert.<br>
Make sure to print a copy of the following information for your recoreds.<br>
including the following confirmation ID which will be used to print<br>
a ticket for you when you arrive at the ticket booth.<br>
<br>
Your ticket confirmation nmber is as follows:<br>
<br>
  
<?php
  echo "Confirmation Number: " . $RowID . "<br>";
  echo "First Name: " . $First . "<br>";
  echo "Last Name: " . $Last . "<br>";
  echo "Phone Number: " . $Phone . "<br>";
  
  
?>
    <br>
    <input type="button"
    onClick="window.print()"
    value="Print This Page"/>
  <br><br> <a href=index.html>Return to the homepage</a>
