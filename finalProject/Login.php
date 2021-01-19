 <?php  /*session_start();
	 $_SESSION["name_table"];
		*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<title>login</title>
<style>

*{
	padding-left:10px;
	
}

#conteiner{
	display:grid;
	grid-template--column:repeat(12,1fr);
	grid-auto-rows:minmax(10px,auto);
	grid-gap:10px;
	
	max-width:87%;
	height:610px;


	margin-top:21px;
	padding:5px;
	background-color:white;
	position:relative;
	top:-10px;
}


#title{
	
	
	
	grid-column:1/12;
	grid-row:1/2;
	
}


#logIn{
	
	border:3px solid skyblue;
	
	grid-column:11/12;
	grid-row:2/3;
	
	padding-top:15px;
	
}

#about{
	
	border-bottom:3px solid black;
	
	overflow:auto;
	
	grid-column:1/10;
	grid-row:2/3;
	

	
	
}


#createdby{
	
	border-bottom:3px solid skyblue;
	grid-column:1/12;
	grid-row:3/4;
	
}

input{
  border-radius: 7px;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 26px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button2{
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover{
  background-color: #008CBA;
  color: white;
}




@media only screen and (max-width: 250px){

}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>

<body>

<div id="conteiner">


<div id="title">
<h1 style="margin-bottom:0px;font-family: 'Raleway', sans-serif;">New Order</h1>
<p style="margin:0px;font-family: 'Roboto', sans-serif; border-bottom:2px solid black; padding-bottom:5px;">New Order for Your bisness.</p>
</div>


<div id="logIn">

<h3 style="text-decoration:underline; font-family: 'Raleway', sans-serif;">Log In</h3>

<form action="check.php" method="POST">


<p1 style="text-decoration:underline; font-size:21px; color:SlateBlue;">Email</p1>
<br><br>		
   <input type="text" name="email" autofocus style="font-size:19px; color:SeaGreen;">
<br><br>
<p1 style="text-decoration:underline; font-size:19px; color:SlateBlue;">Password</p1>
<br><br>
<input type="password" name="password" style="font-size:19px; color:SeaGreen;">
<br><br>
<input type="submit" value="send"  class="button button2">
<a href="registration.php" style="padding:5px; cursor:pointer;">register</a>

<form>

</div>

<div id="about" style="">

<div id="positionAbout"  style="position:relative;top:-20px;">
<h2 style="text-decoration:underline; font-family: 'Raleway', sans-serif;">About</h2>

<p style="max-width:550px; height:200px; font-size:19px;">
Hello.
some information about the system.
The system is designed to serve suppliers and business owners who sell goods.
The primary goal was to provide medium-sized goods sellers with a convenient interface for ordering goods from suppliers without having to deal with which supplier to buy and still provide filtering tools to create the most affordable and worthwhile order.
If there is such a need for you as a commodity seller you have come to the right place.
<br><br>
If you are a supplier who wants to prove easily and quickly that you are the most lucrative of the suppliers in the market and you want to increase your exposure to a wider circle of buyers you have come to the right place.
You can set the minimum price and filter out small buyers that are not worth messing with.
Start accepting orders automatically without the need for an agent so what are you waiting for you are in the right place.

</p>

</div>
</div>


<div id="createdby">
<p style="position:relative;top:65px;">Created By: Itzhak And Netanel Alkobi.</p>
</div>


</div>



</body>
</html>