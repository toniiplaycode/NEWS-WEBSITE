<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="text/css">
	#div_tong{
		width: 100%;
		height: 900px;
	}
	#div_tren{
		width: 100%;
		height: 15%;
	}
	#div_tren > .trai{
		width: 20%;
		height: 100%;
		float: left;
	}
	#div_tren > .phai{
		width: 80%;
		height: 100%;
		float: left;
	}
	#div_tren > .phai > .tren{
		width: 100%;
		height: 80%;
	}
	#div_tren > .phai > .duoi{
		width: 100%;
		height: 20%;
	}
	#div_duoi{
		margin: auto;
		width: 80%;
		height: 85%;
	}
	#logo{
		width: 200px;
		float: right;
		margin-right: 70px;
		margin-top: -40px;
	}
	#tim_kiem, #them_bai{
		width: 60%;
		height: 40px;
		border-radius: 5px;
		border: 0;
		background: #ccfff3;
		margin-top: 30px;
	}
	body{
		font-family: system-ui;
	}
	#menu{
		width: 87.5%;
		text-align: center;
		font-size: 15px;
		font-weight: 500;
		border: 1px solid #b7c5c7;
		border-radius: 10px;
	}
	#menu tr td a{
		text-decoration: none;
		color: black;	
	}
	#menu tr td a:hover{
		color: red;
	}
	#them_bai{
		font-weight: 550;
	}
	#them_bai:hover{
		background: orange;
	}
	.table_hien_thi{
		text-align: center;
	}
	.php_hien_thi{
		text-decoration: none;
		color: black;
		font-size: 20px;
	}
	.php_hien_thi:hover{
		color: red;
	}
	.sua_xoa{
		border: 0px;
		border-radius: 5px;
		width: 50px;
		height: 30px;
	}
	#sua{
		background: skyblue;
	}
	#xoa{
		background: orange;
	}
	#sua:hover{
		font-weight: bold;
		background: #9999ff;
	}
	#xoa:hover{
		font-weight: bold;
		background: #ff704d;
	}
	#nut_chuyen_trang{
		font-size: 30px;
		text-decoration: none;
		border: 1px solid black;
		border-radius: 5px;
		margin: 5px;
		padding-right: 15px;
		padding-left: 15px;
		color: black;
		background: lightyellow;
	}
	#nut_chuyen_trang:hover{
		background: orange;
		font-weight: bold;
	}

</style>
<body>

	<?php 

		require 'Connect.php';

		$trang = 1;
		if(isset($_GET['trang'])){
			$trang = $_GET['trang'];
		}

		$tim_kiem = '';

		if(isset($_GET['tim_kiem'])){
			$tim_kiem = $_GET['tim_kiem'];
		}

		$sql_so_tin_tuc = "select count(*) from tin_tuc where tieu_de like '%$tim_kiem%' ";
		$mang_so_tin_tuc = mysqli_query($ket_noi, $sql_so_tin_tuc);
		$ket_qua_so_tin_tuc = mysqli_fetch_array($mang_so_tin_tuc);
		$so_tin_tuc = $ket_qua_so_tin_tuc['count(*)'];

		$so_tin_tuc_tren_1_trang = 2;

		$so_trang = ceil($so_tin_tuc / $so_tin_tuc_tren_1_trang); 

		$bo_qua = $so_tin_tuc_tren_1_trang * ($trang - 1);

		$sql = "select * from tin_tuc where tieu_de like '%$tim_kiem%'
		limit $so_tin_tuc_tren_1_trang offset $bo_qua";

		$ket_qua = mysqli_query($ket_noi, $sql);

	 ?>

	<div id="div_tong">
		<div id="div_tren">
			<div class="trai">
				<img src="https://media.istockphoto.com/vectors/breaking-news-vector-illustration-poster-banner-logo-badge-on-white-vector-id891605714?b=1&k=20&m=891605714&s=612x612&w=0&h=HR6jezIN5wQ7B8imsxws65esrjQTEUIu8IAY38f4ZQc=" id="logo">
			</div>
			<div class="phai">
				<div class="tren">
					<table align="center" border="0" width="100%" style="text-align: center;">
						<tr>
							<td>
								<form>
									<font style="font-size: 15px; font-weight: bold;">Tìm kiếm </font>
									<input type="search" name="tim_kiem" id="tim_kiem" value=" <?php echo $tim_kiem ?>">
								</form>
							</td>
							<td>
								<form action="FormInsert.php">
									<input type="submit" id="them_bai" value="THÊM BÀI ĐĂNG" > 
								</form>
							</td>
						</tr>
					</table>
				</div>
				<div class="duoi">
					<table align="left" id="menu">	
						<tr>
							<td>
								<a href="#">
									XÃ HỘI
								</a>
							</td>
							<td>
								<a href="#">
									THẾ GIỚI
								</a>
							</td>
							<td>
								<a href="#">
									KINH DOANH
								</a>
							</td>
							<td>
								<a href="#">
									THỂ THAO
								</a>
							</td>
							<td>
								<a href="#">
									SỨC KHOẺ
								</a>
							</td>
							<td>
								<a href="#">
									GIẢI TRÍ
								</a>
							</td>
						</tr>
					</table>
				</div> 
			</div>
		</div>
		<div id="div_duoi">
			<table border="0" width="100%" class="table_hien_thi">	
					<tr>
						<td>
							<div id="loi_tim_kiem">
								
							</div>
						</td>
					</tr>
				<?php foreach ($ket_qua as $tung_bai_tin_tuc): ?>
					<tr>
						<td width="40%">
							<a href="ShowDetail.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>" class="php_hien_thi">
								<h4><?php echo $tung_bai_tin_tuc['tieu_de'] ?></h4>
							</a>
						</td>
						<td width="50%">
							<img src="<?php echo $tung_bai_tin_tuc['anh'] ?> " width=500px>
						</td>
						<td>
							<table border="0" width="100%" class="table_hien_thi">
								<tr>
									<td>
										<button onclick="window.location.href = 'FormUpdate.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>'; " id="sua", class="sua_xoa">
											Sửa
										</button>
									</td>
								</tr>
								<tr>
									<td>
										<button onclick="window.location.href = 'Delete.php?ma=<?php echo $tung_bai_tin_tuc['ma'] ?>'; " id="xoa", class="sua_xoa">
											Xoá
										</button>
									</td>
								</tr>
							</table>
						</td>
					</tr>	
				<?php endforeach ?>	
			</table>

			<p align="center">
				<?php for ($i=1; $i <= $so_trang ; $i++) { ?> 		
					<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>" id="nut_chuyen_trang">
						<?php echo $i ?>
					</a>
				<?php } ?>
			</p>

		</div>
	</div>
</body>
</html>