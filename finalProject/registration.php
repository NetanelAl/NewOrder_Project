<!DOCTYPE HTML>
<html>
<head>
<title>registration</title>
<style>


#conteiner{
	display:grid;
	grid-template--column:repeat(12,1fr);
	grid-auto-rows:minmax(10px,auto);
	grid-gap:10px;
	//padding:5px;
	max-width:87%;
	height:610px;

	border:3px solid skyblue;
	//border-bottom:3px solid skyblue;
	margin-top:21px;
	padding:5px;
	background-color:white;
	position:relative;
	top:-10px;
}


#signup{
	
	padding:45px;
	border-bottom:3px solid black;
	
	grid-column:1/2;
	grid-row:1/2;
	padding-top:45px;
	
}

#info{
	
	border-bottom:3px solid black;
	
	grid-column:3/12;
	grid-row:1/2;

}


body{background:white; }
fieldset{background:white;
width:270px; height:380px;
  border: 2px solid;
  padding: 10px;
  border-radius: 3px;
}
input{
  border-radius: 3px;
}
#hide{
	display:none;
}
#show{
	display:inherit;
}


@media only screen and (max-width: 250px) {

  }
   
h1{
	border-bottom:3px solid Teal;
	margin-bottom:25px;
	padding-bottom:15px;
}

pre{
	font-size:21px;
	color:RebeccaPurple;
}

input[type=text] {
	font-size:21px;
}

input[type=password] {
	font-size:21px;
}

input[type=email] {
	font-size:21px;
}

input[type=phone] {
	font-size:21px;
}

select,option{
	font-size:21px;
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




</style>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
<body>

<div id="conteiner">




<div id="signup">

<form action="insert registration.php" method="POST">

<h2 style="text-decoration:underline; font-size:27px; color:black; color:SlateBlue;font-family: 'Raleway', sans-serif;">Sign Up</h2>


<pre>Name:      <input type="text" name="username" autofocus></pre>

<pre>password:  <input type="password" name="password"></pre>

<pre>password:  <input type="password" name="password_1"></pre>

<pre>Address:   <input type="text" name="Address" autofocus></pre>

<pre>EMAIL:     <input type="email" name="email"></pre>


<div id="hide" name="me">
<pre>Min order: <input  type="text" name="Min_order" autofocus></pre>
</div>

I am a:
<input id="Busines" type="radio" name="how_I" value="Busines">Busines
<input id="Supplier" type="radio" name="how_I" value="Supplier">Supplier
<br>

<pre>phone <select name=prefixespon>
			<option selected hidden value="050">050</option>
			<option  value="052">052</option>
			<option  value="053">053</option>
			<option  value="054">054</option>
			<option  value="055">055</option>
			<option  value="057">057</option>
			<option  value="058">058</option>
            <input type="phone" name="phone">
</pre>




		 </select>
		 
<input type="submit" value="send" style="font-size:21px; cursor:pointer;" class="button button2">

<a href="login.php" style="font-family: 'Raleway', sans-serif;">sing in</a>


<form>

</div>

<div id="info">

	<h1 style="font-family: 'Raleway', sans-serif; margin-top:58px;">Info</h1>
	
	<p style="margin-top:45px; 	max-width:500px; font-size:19px">
Hello Please read to the end, the text in front of you also contains the terms of use.
You have reached the registration page, we are glad that you have decided to join us, we are sure that you will benefit from the tool we have created for you.
Here you can choose the appropriate status supplier or business owner, it is important that you fill in the details accurately,
 so please note, thank you very much and welcome.
A little about the terms of use
You must be an authorized business in order to use the system,
 the system is free and payment between the business and the supplier will be made after receiving the order on the spot.
We are not responsible for the conduct of the suppliers or business owners who use the system,
 in case we receive complaints about a particular user the user will be temporarily suspended until the end of the inquiry
Be fair and good luck to you and us.
	</p>

</div>

</div>




<script>

	//מוצא את ערך כפתור הרדיו ומסתיר את שדה המינימום מאחר ואינו רלוונתי למשתמש עם סטטוס ביזנס
	document.getElementById('Busines').addEventListener('click',()=>{
	var one = document.getElementById("show");
	if(one.id.toString() == "show")
		one.id = "hide" ;
	else
		one.id = "hide" 
		
	console.log(one);
	}
	);
	//מציג את שדה מינימום הזמנה עבור משתמש ספק 
	document.getElementById('Supplier').addEventListener('click',()=>{
	var one = document.getElementById("hide")
	if(one.id == "show" || one.id == "hide" )
		one.id = "show"
	console.log(one);
	}
	);
	
	
</script>


</body>
</html>