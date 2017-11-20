<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>康复医院</title>

    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<style>


#triangle{
  width:0;
  border-top:12x solid transparent;
  border-right:12px solid transparent;
  border-bottom:12px solid #3399cc;
  border-left:12px solid transparent;
  margin:0 auto;
}

#login h1{
  background:#CCFFCC;
  padding:20px 0;
  font-size:140%;
  font-weight:300;
  text-align:center;
  color:black;
}
	input[type="submit"]{
  		width:100%;
  		background:#CCFFCC;
  		border:0;
  		padding:4%;
 		 font-family:'Open Sans',sans-serif;
  		font-size:100%;
  		color:black;
  		cursor:pointer;
 		 transition:background .3s;
  		-webkit-transition:background .3s;
	}

	input[type="submit"]:hover{
  		background:#2288bb;
	}

	input[type="button"]{
  		width:100%;
  		background:#66FFFF;
 		 border:0;
  		padding:4%;
  		font-family:'Open Sans',sans-serif;
  		font-size:100%;
 		 color:black;
  		cursor:pointer;
  		transition:background .3s;
  		-webkit-transition:background .3s;
	}
	input[type="button"]:hover{
  		background:#2288bb;
	}
	.logo3{
		position:relative;
		left:70px;
	}
	.title{
		position:relative;
		top:-15px;
		left:50px;
		
	}
	#main{
		background: #CCCCCC;
		width:100%;
		height:350px;
		margin-top:150px;
		border-top:solid 3px;
		border-bottom:solid 3px;
	}
	#login{
		float:left;
  		width:400px;
  		margin:0 auto;
  		margin-top:8px;
  		margin-bottom:2%;
  		transition:opacity 1s;
  		-webkit-transition:opacity 1s;
		position:relative;
		background: #CCCCCC;
		position:relative;
		left:300px;
	}
	#left{
		float:left;
		width:410px;
		height:350px;
		position:relative;
		left:300px;
		background: #CCCCCC;
		
	}
	.logo4{
		position:relative;
		top:100px;
		left:70px;
	}
	div h2{
		position:relative;
		top:100px;
		left:55px;
	}
	body{
		background:#A0C69C;
	}
</style>
<body>
<div id="main">
	<div id="left">
	<img class="logo4" src="./images/logo1.png">
	<h2>康复医院信息管理系统</h2 >
	</div>
	<div id="login">
  		<h1><strong >康复医院</strong></h1>
  		<form method="post" action="post.php">
    		<input type="text" placeholder="User" name="user" />
    		<input type="password" placeholder="Password" name="password"/>
    		<input type="submit" value="Log in" />
  		</form>
  	<script src='jquery.js'></script>
	</div>
</div>
</body>

</html>