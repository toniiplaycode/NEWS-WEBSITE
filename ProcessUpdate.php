<?php 
	$ma = $_POST['ma'];
	$tieu_de = $_POST['tieu_de'];
	$noi_dung = $_POST['noi_dung'];
	$anh = $_POST['anh'];

	require 'Connect.php';

	$sql = "update tin_tuc
	set 
	tieu_de = '$tieu_de',
	noi_dung = '$noi_dung',
	anh = '$anh'
	where 
	ma = '$ma' ";

	mysqli_query($ket_noi, $sql);
	