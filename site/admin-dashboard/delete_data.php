<?php 

$conn= new mysqli('localhost','root','','final')or die("Could not connect to mysql".mysqli_error($con));

$delete= $Conn->query("DELETE from demand as d where d.aadhar=aadhar ");
