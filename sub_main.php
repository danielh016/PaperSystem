<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/0EBEC49B-DE2E-6840-A4E0-82352377F2C6/main.js" charset="UTF-8"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>投稿者主頁</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 
					<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>--> <a class="navbar-brand" href="./sub_main.php">主頁</a>
					<?php
						if ($_SESSION['Email'] != NULL){
						 	$Email = $_SESSION['Email'];
						 	$conn = mysql_connect("localhost", "dan3388d", "dan3388d@ic@sql");
							mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
							mysql_query(" set names 'utf8' ");
							mysql_query(" SET CHARACTER SET  'UTF8 '; ");
							mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
							mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
							$GetName = mysql_query("SELECT * FROM USER_INFO WHERE Email = '$Email'");
							$ls = mysql_fetch_row($GetName);
							$Role = $ls[6];
							/*if($Role == 'Reviewer'){
								echo '<a class="navbar-brand" href="./review_main.php">回審查者主頁</a>';
						 	}*/
						 }
					?>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a>
								<?php
								if ($_SESSION['Email'] != NULL){
						 			echo "<font color=\"WHITE\">您好，</font>";
						 			echo "<font color=\"WHITE\">".$ls[1]."</font>";
						 		}
						 		else{
						 			echo '<meta http-equiv="refresh" content="0 ; url=./main_login.php">';
						 		}
						 		?>
							</a>
						</li>
						<li>
							<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
							<button type="submit" name="logout" class="btn btn-link">
								登出
							</button>
							</form>
							<?php
								if(isset($_POST['logout'])){
									unset($_SESSION['Email']);
									echo '<meta http-equiv="refresh" content="0 ; url=./main_login.php">';
								} 
							?>
						</li>
					</ul>
				</div>
				
			</nav>
			<!--<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
				<div class="navbar-header">
				
				</div>
				
			</nav>-->
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<p style="color:white">_<br>_<br>_<br>_<br>_<br>_</p>
			<h1 class="text-center">
				投稿者主頁
			</h1> 
			
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>
							論文編號
						</th>
						<th>
							論文名稱
						</th>
						<th>
							論文作者
						</th>
						<th>
							狀態
						</th>
						<th>
							操作
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$data = mysql_query("SELECT * FROM SUBMIT WHERE Email = '$Email'");
						$CountNo = mysql_num_rows($data);

						for($i=0; $i<($CountNo);$i++){
							$rs = mysql_fetch_row($data);
							$FileName = $rs[3];
							$FileURL = $rs[4];
							echo '<tr class="default">';
							echo '<td>' . $rs[1] . '</td>';
							echo '<td>' . $rs[2] . '</td>';
							echo '<td>' . $rs[5] . '<p style="display:inline"> , </p>' . $rs[6] . '<p style="display:inline"> , </p>' . $rs[7] . '<p style="display:inline"> , </p>' . $rs[8] . '<p style="display:inline"> , </p>' . $rs[9] .  '<p style="display:inline"> , </p>' . $rs[10] . '</td>';
							if($rs[11]=='1'||$rs[11]=='5')
								echo '<td class="active">上傳成功</td>';
							else if($rs[11]=='2')
								echo '<td class="success">通過</td>';
							else if($rs[11]=='3')
								echo '<td class="warning">需修改</td>';
							else if($rs[11]=='4')
								echo '<td class="danger">拒絕</td>';
							echo '<td>
								<a type="button" class="btn btn-default" href="./full_result.php?PaperNo='.$rs[1].'">意見</a>
								<a type="button" class="btn btn-default" href="./sub_modify.php?PaperNo='.$rs[1].'">更新論文</a>
								<a type="button" class="btn btn-default" href="http://140.120.54.230/dan3388d/sys/'.$FileURL.'">下載論文</a>
								檔名：'.$FileName.'</td>';
							echo '</tr>';

						}
					?>
					<!--active,success,warning,danger-->
				</tbody>
			</table>
			<a href="./sub_add.php" class="btn btn-link btn-default" type="button">新增投稿</a>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>