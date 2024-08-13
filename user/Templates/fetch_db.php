<?php

$conn=mysqli_connect("localhost","root","","major");
$num=1;

$sql= "SELECT * FROM users WHERE id='1'";
$data =$conn->query($sql);
$result=mysqli_fetch_array($data);
print_r($result);
