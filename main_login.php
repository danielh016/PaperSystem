<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/962035AB-A312-FC4C-A469-EAA8B2C1E89B/main.js" charset="UTF-8"></script>
  <meta charset="utf-8">
  <title>論文投稿系統</title><!--投稿者登入-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>--> <a class="navbar-brand" href="./main_login.php">首頁</a>
				</div>
				
				
				
			</nav>
			<nav class="navbar navbar-default navbar-default navbar-fixed-bottom" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="./admin_login.php">Admin</a>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-2 column">
		</div>
		<div class="col-md-8 column" align="center">
			<form class="form-horizontal" role="form" method="post">
				<p style="color:white">_<br>_<br>_<br>_<br>_<br>_<br>_<br>_<br>_<br>_<br>_</p>
				<div class="form-group">
					 <label for="inputEmail3" class="col-sm-4 control-label">電子信箱</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="inputEmail3" name="Email">
					</div>
				</div>
				<div class="form-group">
					 <label for="inputPassword3" class="col-sm-4 control-label">密碼</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="inputPassword3" name="Password">
					</div>
				</div>
				<a href="./sub_regi.php" class="btn btn-link btn-default" type="button">投稿者註冊</a> 
					<?php
  						$conn = mysql_connect("localhost", "dan3388d", "dan3388d@ic@sql");
						mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
						mysql_query(" set names 'utf8' ");
						mysql_query(" SET CHARACTER SET  'UTF8 '; ");
						mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
						mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
						if (isset($_POST['login'])){
							$Email = "$_POST[Email]";
							$_SESSION['Email'] = $Email;
							$Password = "$_POST[Password]";
							$sql = "SELECT * FROM USER_INFO WHERE Email = '$Email'";
							$result = mysql_query($sql);
							$row = @mysql_fetch_row($result);
							if($Email != null && $Password != null && $row[0] == $Email && $row[5] == $Password){
								$_SESSION['Email'] = $Email;
								if($row[6] == 'Submitter')
									echo '<meta http-equiv=REFRESH CONTENT=0;url=sub_main.php>';
								else if($row[6] == 'Reviewer')
									echo '<meta http-equiv=REFRESH CONTENT=0;url=review_main.php>';
							}
							else
								echo '<p style="color:red">電子郵件或密碼有誤</p>';
  							}
 					?>
				<div class="form-group">
					<div class="col-sm-offset-0 col-sm-18">
						 <button type="submit" class="btn btn-success" name="login">登入</button>
					</div>
				</div>
			</form> 
		</div>
		<div class="col-md-2 column">
			
		</div>
	</div>
</div>
</body>
</html>