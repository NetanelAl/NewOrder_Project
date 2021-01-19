<?php
session_start();
include 'sql.php';

/* Login בודק עם השדות ריקות במידה וכן חוזר לעמוד */
if(empty($_POST['email']and($_POST['password'])))
{
			header("location: Login.php");
		exit();
}
/* בודק אם השדות לא ריקות */
if(!empty($_POST['email']and($_POST['password'])))
	{
		$email=mysqli_real_escape_string($con, $_POST['email']);
		$Password=mysqli_real_escape_string($con, $_POST['password']);
				/*mysqli_real_escape_string($con,..מצליח לחסום פריצה של
		' OR 1=1 LIMIT 1; #*/
		
		
		
		
												
									
		
		
		/* get the id of Suppliers_id*/
		$sql = "SELECT Suppliers_id from suppliers WHERE Email='$email'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
		$_SESSION["Supp_id"]=$row['Suppliers_id'];
		
		if(!empty($_SESSION["Supp_id"])){
		
		
		
		
		
		/* בודק אם המשתמש הוא משתמש חוקי של ספק אם לא הוא מועבר לעמוד כניסה */
		$sql = "SELECT * from suppliers WHERE Email='$email' AND Password='$Password'";
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res)==1)
		{
			
		header("location: suppliers.php");
		exit();
		}
		
		else
		{
		header("location: Login.php");
		exit();
			
		}
			
		}
		
		if(empty($_SESSION["Supp_id"]))
		{
					/* get the id of business_id*/
		$sql = "SELECT Business_id from business WHERE email='$email'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
		$_SESSION["business_id"]=$row['Business_id'];
		
		
		
		
		
		
		/*בודק מבין כל משתמשי העסקים אם קיים משתמש שהאימיל שלו והסיסמא נכונים */
		$sql = "SELECT * from business WHERE email='$email' AND Password='$Password'";
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res)==1)
		{
			/*business מעביר לעמוד המשתמש */
		header("location: business.php");
		exit();
		}
		}
		
			if(empty($_SESSION["Supp_id"])and ($_SESSION["business_id"]))
			{
			/* Login עם המשתמש מנסה להכנס לעמוד זה המשתמש יעבור לעמוד */
			header("location: Login.php");
     		exit();
			}
				


	}
	else
	echo "not";
	
	/* במידה והשדות לא נכונים Login חזרה לעמוד */
	header("location: Login.php");


			mysqli_close($con);
			


?>

