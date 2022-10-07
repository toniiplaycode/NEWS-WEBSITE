<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>

<style type="text/css">
	table{
		width: 50%;
		text-align: center;
		font-family: system-ui;
		font-weight: bold;
		background: #ffd1b3;
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
	div{
		color: red;
	}
</style>

<body>
	<form method="post" action="ProcessInsert.php">
		<table border="0" align="center">
			<tr>
				<td colspan="2">
					<h2>THÊM BÀI ĐĂNG</h2>
				</td>
			</tr>
			<tr>
				<td>
					Tiêu đề: 
				</td>
				<td>
					<textarea name="tieu_de" id="tieu_de"></textarea>
					<div id="loi_tieu_de">
						
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Nội dung:
				</td>
				<td>
					<textarea name="noi_dung" id="noi_dung"></textarea>
					<div id="loi_noi_dung">
						
					</div>
				</td>
			</tr>
			<tr>
				<td>
					Link ảnh:
				</td>
				<td>
					<input type="text" name="anh" id="anh">
					<div id="loi_anh">
						
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button type="submit" onclick="return kiem_tra()">THÊM</button>
				</td>
			</tr>
		</table>
	</form>
</body>

<script type="text/javascript">
	
	function kiem_tra() {
		let kiem_tra_loi = false;
	//tieu de
		let title = document.getElementById('tieu_de').value;
			if(title.length === 0){
				document.getElementById('loi_tieu_de').innerHTML = 'Tiêu đề không được để trống !';
				kiem_tra_loi = true;
			}else{
				document.getElementById('loi_tieu_de').innerHTML = '';	
			}

	//noi dung		
		let content = document.getElementById('noi_dung').value;
			if(content.length === 0){
				document.getElementById('loi_noi_dung').innerHTML = 'Nội dung không được để trống !';
				kiem_tra_loi = true;
			}else{
				document.getElementById('loi_noi_dung').innerHTML = '';
			}

	//anh
		let image = document.getElementById('anh').value;
			if(image.length === 0){
				document.getElementById('loi_anh').innerHTML = 'Link ảnh không được để trống !';
				kiem_tra_loi = true;
			}else{
				let regex_image = /^https?:\/\/.*\/.*\.(png|gif|webp|jpeg|jpg)\??.*$/gmi;
				if(regex_image.test(image) == false){
					document.getElementById('loi_anh').innerHTML = "Link ảnh không hợp lệ !";
					kiem_tra_loi = true;
				}else{
					document.getElementById('loi_anh').innerHTML = '';
				}
			}


		if(kiem_tra_loi == true){
			return false;
		}	
	}

</script>

</html>