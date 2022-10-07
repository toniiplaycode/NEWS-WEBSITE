<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
	<style type="text/css">
		body{
			font-family: system-ui;
		}
		#div_tong{
			width: 100%;
			height: 1500px;
		}
		#div_tren{
			width: 100%;
			height: 5%;
		}
		#div_duoi{
			width: 80%;
			height: 95%;
			margin: auto;
		}
		#logo{
			width: 150px;
			margin-top: -20px;
		}
	</style>
<body>
<?php 
	$ma = $_GET['ma'];

	require 'Connect.php';

	$sql = "select * from tin_tuc where ma = $ma";

	$ket_qua = mysqli_query($ket_noi, $sql);

	$bai_tin_tuc = mysqli_fetch_array($ket_qua);
?>

<div id="div_tong">
	<div id="div_tren">
		<img src="https://media.istockphoto.com/vectors/breaking-news-vector-illustration-poster-banner-logo-badge-on-white-vector-id891605714?b=1&k=20&m=891605714&s=612x612&w=0&h=HR6jezIN5wQ7B8imsxws65esrjQTEUIu8IAY38f4ZQc=" id="logo">
	</div>
	<div id="div_duoi">
		<h2 align="center"><?php echo $bai_tin_tuc['tieu_de']?></h2>
		<p align="center">
			<img src="<?php echo $bai_tin_tuc['anh'] ?>">
		</p>
		<p>
			<?php echo nl2br($bai_tin_tuc['noi_dung']) ?>
		</p>
	</div>
</div>
</body>
</html>	