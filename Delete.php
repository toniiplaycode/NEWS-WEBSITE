<?php 
	$ma = $_GET['ma'];

	require 'Connect.php';

	$sql = "delete from tin_tuc where ma = $ma";

	mysqli_query($ket_noi, $sql);
