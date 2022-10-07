<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<style type="text/css">
	table{
		width: 50%;
		text-align: center;
		font-family: system-ui;
		font-weight: bold;
		background: #b3ffff;
		border-radius: 5px;
		margin-top: 60px;

	}
	input{
		width: 96%;
		height: 30px;
		border-radius: 5px;
		border: 0;
	}
	textarea{
		width: 96%;
		border-radius: 5px;
		border: 0;
	}
	#tieu_de{
		height: 100px
	}
	#noi_dung{
		height: 400px;
	}
	button{
		width: 60px;
		height: 30px;
		font-family: system-ui;
		font-weight: bold;
		background: #33ffcf;
		border-radius: 5px;
		border: 0;
	}
	button:hover{
		background: orange;
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

	<form method="post" action="ProcessUpdate.php">
		<input type="hidden" name="ma" value="<?php echo $ma ?>">

		<table border="0" align="center">
			<tr>
				<td colspan="2">
					<h2>SỬA BÀI ĐĂNG</h2>
				</td>
			</tr>
			<tr>
				<td>
					Tiêu đề: 
				</td>
				<td>
					<textarea name="tieu_de" id="tieu_de">
						<?php echo $bai_tin_tuc['tieu_de'] ?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td>
					Nội dung:
				</td>
				<td>
					<textarea name="noi_dung" id="noi_dung">
						<?php echo $bai_tin_tuc['noi_dung'] ?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td>
					Link ảnh:
				</td>
				<td>
					<input type="text" name="anh" value="<?php echo $bai_tin_tuc['anh'] ?>">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit">Sửa</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>