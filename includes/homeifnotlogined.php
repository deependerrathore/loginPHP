
<!DOCTYPE html>
<html ng-app="myApp">
<head>
	<title>My Shopping List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , intial-scale=1.0 , maximum-scale=1.0">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/normalize.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/foundation.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/app-screen.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/app-print.css" media="print">
	<style type="text/css">
		body{
			background: url('images/thelist.jpg') no-repeat center center fixed; 
	   		-webkit-background-size: cover;
	   		-moz-background-size: cover;
	   		-o-background-size: cover;
	  		background-size: cover;
		}
	</style>
</head>
<body ng-controller="shoppingListController">

	<nav class="top-bar" data-topbar role="navigation">
	  <ul class="title-area">
	    <li class="name">
	      <h1><a href="index.php"><i class="fa fa-list">&nbsp</i>List Me</a></h1>
	    </li>
	  </ul>

	  <section class="top-bar-section">
	    <!-- Right Nav Section -->
	    <ul class="right">
	      <li class="active"><a href="login.php">Log In</a></li>
	      <li ><a href="register.php">Register</a></li>
	    </ul/>
	  </section>
	</nav>
</body>
</html>