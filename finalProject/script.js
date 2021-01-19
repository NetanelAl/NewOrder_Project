////////////////////////////////////////////16.6.20////////////////////////////////////////////////////////////

document.addEventListener('DOMContentLoaded',init);

var x = "";
function init(){
	
	
	document.getElementById("refresh").addEventListener("click",()=>{
		
		
		window.location.reload();
		
		
	});
	
	
	/*	function showsublier(str)
      {

              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    console.log("three");
                      document.getElementById("i").innerHTML = this.responseText;
					  document.getElementById('in').focus();
					  
                      console.log(str);
                  }
              };

              xmlhttp.open("POST", "process.php?q=" + str, true);
              xmlhttp.send();
              console.log("four");

      }
	  

	  
	  
	  showsublier(str);*/
	  
	  //פונקציה אישור הזמנה
	 function orderisset(){
		
		//console.log(x);
		
		 sendTable(x);
		 
	 }
	 
	 
	 // מוצא את כפתור אישור ההזמנה ומוסיף לו ארוע הקלקה
	 document.getElementById('orderok').addEventListener('click',orderisset,false);
	 
	 
	 // פונקציה שמוחקת את נתוני פרטי ההזמנה מדיב פרטי ההזמנה
	 function sendTable(str)
      {

              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    console.log("three");
					// מכניס את הנתונים שהתקבלו מהשרת למשתנה
                      let d = this.responseText;
					 // console.log(d);
					
					// מוחק את כפתור ההזמנה, כל כפתור הוא ספק שממנו העסק (המשתמש) ביצע ממנו הזמנה
					 var k = document.getElementById("me");
					  k.remove();
					  
				
					  //document.getElementById('orderok').style.display = "none";
					  document.getElementById('lBtn').style.display = "none";
					 
					 // k.remove();
								
							    // מוצא את הטבלת ההזמנה ומוחק אותה מהדיב
					  		    var myobj = document.getElementById("newOrder");
								myobj.remove();
								// מוצא את נתוני הספק של ההזמנה הספציפית ומוחק אותם
								var myobj = document.getElementById("bim");
								myobj.remove();
								
								// מוצא את פיסקת סכום ההזמנה ומוחק אותה
								var myobj = document.getElementById("bam");
								myobj.remove();
								// מוצא סכום ההזמנה ומוחק אותה
								var myobj = document.getElementById("bom");
								myobj.remove();
								
								//מסתיר את דיב פרטי ההזמנה
								document.getElementById("show").style.display = "none";
								
					  // מוצא את שדה החיפוש ומוסיף לו פוקוס
					  document.getElementById('txt1').focus();
					  
                      //console.log(str);
                  }
              };
				
			  // שולח את מספר הספק של ההזמנה כדי שהשרת יוכל לשחזר את ההזמנה ולהכניס אותה לטבלת ההזמנות הכללית (לא הזמנית) 
              xmlhttp.open("POST", "process.php?w=" + str, true);
			  console.log("enter");
              xmlhttp.send();
              console.log("four");

      }
	
	
	
	/////////////////////////////////////////
	var msg = '';
	var sh = true;
	var strm = '';
	var strmsaved = function(){return strm};
	/////////////////////////////////////////
	
	
			
	// פונקציה שמוסיפה מוצר לטבלת המוצרים הזמנית
	function deletelist(str)
      {

              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                   
						
					  // מוסיף את כפתור ההזמנה לדיב ההזמנות
                      document.getElementById("suplierorder").innerHTML = this.responseText;
					  // מחזיר פוקוס ל שדה החיפוש
					  document.getElementById('in').focus();
					  
								// מחזיר מערך של כל הכפתורים ששיכים למחלקה
					  			var lis = document.getElementsByClassName('cl');
			
								// עובר על כל כפתור וכפתור ומוסיף לו אירוע
								for(var i = 0; i < lis.length; i++){
									lis[i].addEventListener('click',sendAjax,false);
								}
								
                  }
              };
				
			  // שולח את כל פרטי המוצר או משדה החיפוש או מטבלת המוצרים לעמוד השרת
              xmlhttp.open("POST", "process.php?q=" + str, true);
              xmlhttp.send();
			  msg="";

      }

		
		
/*function consoleout(e){

            if(e.target != e.currentTarget){
              var clickedItem = e.target;
              var str = clickedItem.innerHTML;
			  
			  //*להמשיך מפה
			 str = document.getElementById('fourme').rows[1];
			 str = document.getElementById("fourme").rows[0].cells[0].innerHTML;
			 
			  //let Description = "";
			  //let Price = "";	
			  //let Products name = "";
			  //Suppliers_id = "";
		
			 str = document.getElementById("fourme").rows[0].cells.item(0).innerHTML;
			 str += '  ' +document.getElementById("fourme").rows[0].cells.item(1).innerHTML;
			 str += '  ' +document.getElementById("fourme").rows[0].cells.item(2).innerHTML;
			 str += '  ' +document.getElementById("fourme").rows[0].cells.item(3).innerHTML;
			  
			  
			  document.getElementById('customconfirm').style = "display:block";
			  
	
	//פונקציה של AJAX
              deletelist(str);

            }*/
			// משרשר שורה שלמה מטבלת המוצרים
			
			// מוצא את האוביקט של ה טבלה
			var table = document.getElementById('fourme');
			// עובר בלולאה על כל השורות של הטבלה
			for(var i = 1; i < table.rows.length; i++) {
			// מוסיף אירוע לכל שורה ושורה בטבלה
			table.rows[i].addEventListener('click', function() {

				var d = document.getElementById("in");
				//d.autofocus;
			msg = "";
			// עובר בלולאה על כל התאים של השורה
			// משרשר את כל התאים של השורה למחזורת אחת כאשר כל אינפורמציה ואינפורמציה מופרדת בכוכבית
			for(var j = 0; j < this.cells.length; j++) {
			msg += "*" + this.cells[j].innerText;
			}
			// מציג את חלון בחירת כמות המוצר ואישור הזמנת המוצר
			document.getElementById('customconfirm').style = "display:block";
			// חותך את המחרוזת פחות ההתו הראשון
			msg = msg.slice(1, msg.length);
			console.log(msg);
			//deletelist(msg);
			//alert(msg);
			
		});

         }
		 
		 

		 
		 ///////////////////////////////////////////////////////////////////clickyes
		 // מוסיף אירוע לכפתור אישור הזמנת המוצר(בחלון כמות מוצר) 
		 document.getElementById('clickyes').addEventListener('click',()=>{
		 // מוריד את כל הרווחים שעשויים להיות במחרוזת
		 strm = strm.trim();

		 // מסתיר את כפתור בחירת כמות המוצר ואישור הזמנת המוצר
		 document.getElementById('customconfirm').style = "display:none";
		 //אם המשתמש שולח שדה ריק הערך של המוצר יהיה 1
		 var quantity = document.getElementById('in').value;
		 let num = 0;
		 if(quantity == ""){
			 quantity = 1;
		 }
		 
		 //console.log(quantity);
		 // משרשר את כמות המוצר למחרוזת שמכילה את פרטי המוצר המוזמן
		 msg += '*' + quantity;
		  if(strm !== "results" && strm !== ""){
		  // משרשר את כמות המוצר למחרוזת שמכילה את פרטי המוצר המוזמן
		  // במידה והמוצר נבחר דרך שדה החיפוש
		  strm += '*' + quantity;
		  console.log("strm = "+strm);
			num=0;
			for(let  i = 0; i <strm.length ;i++){
				if(strm[i] === '*')
						{						
								num++;
						}
						
					}
					}
					//console.log(num);
					console.log(num);
					
					if(num == 1){
						// שולח לשרת את פרטי המוצר הנבחר דרך שדה החיפוש
						deletelist(strm);
					}
					else{
						// שולח את פרטי המוצר הנבחר דרך טבלת המוצרים
						deletelist(msg);
					}
		 
		 
		
		 /*
		 console.log(msg);
		 console.log(strm.length);
		 if(strm.length !== 3){
			deletelist(msg);
		 }
		 /*else{
			 /*strm += '*' + quantity;
			 addHint(strm);*/
			// console.log(1);
		// }
		

		 // מאפס את מחרוזות המוצרים
		 msg="";
		 strm="";
		 //
		 // מאפס את שדה בחירת כמות המוצר
		 document.getElementById('in').value = "";
		 });
		 ////////////////////////////////////////////////////////////////////clickyes
		 
		 // מוסיף אירוע לחיצה לכפתור היציאה מחלון בחירת כמות המוצר ואישור הזמנת המוצר
		 document.getElementById('exit').addEventListener('click',()=>{
		 // מאפס את שדה בחירת כמות המוצר
		 document.getElementById('in').value = "";
		 // מאפס את מחרוזות המוצרים
		 msg=" ";
		 strm="";
		 // מסתיר את חלון אישור הזמנת המוצר (חלון כמות מוצר) 
		 document.getElementById('customconfirm').style = "display:none";

		 });
		 
	/*var object = document.querySelector('#fourme');
         object.addEventListener('click',consoleout);*/
		 

		 // מוסיף אירוע לחצית מקלדת לשדה בחירת כמות המוצר
		 document.getElementById('in').addEventListener('keypress', function(e){
			 //הקשה על אנטר
		 if (e.keyCode == 13) {
		
		 // מסתיר את חלון אישור הזמנת המוצר (חלון כמות מוצר)
		 document.getElementById('customconfirm').style = "display:none";
		 

		 
		/*let Description = "";
		let Price = "";	
		let Products name = "";
		let Suppliers_id = "";*/
		
		let quantity = document.getElementById('in').value;
		
		
		if(quantity == ""){
			 quantity = 1;
		 }
		 // משרשר את הכמות למחורזת שמכילה את האינפורמציה של הפריט
		 msg += '*' + quantity;
		 console.log(msg);
		 // שולח את פרטי המוצר ל שרת
		 deletelist(msg);
		 msg="";
		 // מאפס את שדה בחירת כמות המוצר
		 document.getElementById('in').value = "";
		 
		  
		 }
		 });
		 
		 
		 /*document.getElementById('in').addEventListener('change',()=>{
		 var s = document.getElementById('in').value;

		 if (s.charAt(0) === '-') {
		 document.getElementById('in').value = ""; 
		 }
		 });*/
		 
		 /*function deletProduct(msg){
			 
			 
		 }*/
		 
		 // פונקציה שולחת את פרטי המוצר לשרת כדי שהשרת ימחק את המוצר מטבלת ההזמנות של המשתמש
		 function deletProduct(strnew)
      {
			  
			  
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    					
					
					// מקבל את האינפורמציה המעודכת של המוצר ומציג אותה בחלון ההזמנה
					document.getElementById('show').innerHTML = this.responseText;
					document.getElementById('orderok').addEventListener('click',orderisset,false);
					
					//console.log(this.responseText);
					// אם המילה ריק כלולה באינפורמצחה שהתקבלה
					if(this.responseText.includes("empty")){
						console.log("in");
						
					// מוצא את כפתור ההזמנה ומוחק אותו					
					var k = document.getElementById("me");
					k.remove();
	
						
						//מאפס את חלון פרטי ההזמנה
						document.getElementById('show').innerHTML = "";
						// מסתיר את חלון פרטי ההזמנה
						document.getElementById('show').style.display = "none";
					}
					else{
						//מוסיף ארוע כפתור סגירת חלון פרטי ההזמנה
						document.getElementById('closeIt').addEventListener("click",()=>{
						//מסתיר את חלון פרטי ההזמנה
						document.getElementById('show').style.display = "none";
					});
						
					}
					
					
					

					
					/*if(document.getElementById('newOrder').rows.length == 2){
					var k = document.getElementById("me");
					k.remove();
					document.getElementById('lBtn').style.display = "none";
					console.log("delete");
					};*/
					
					
					// מיצר מערך עם כל השורות של טבלת ההזמנות
					var all = document.querySelectorAll('.all');
					// עובר בלולאה על כל השרות ומוסיף להן אירוע
					all.forEach(function(el){
						newmsg = "";
						el.addEventListener('click',run,false);
					});
					
					 
                     var x = this.responseText;
					 //console.log(x);
					  
					  //sendAjax(x);
                      //console.log(str);
                  }
              };
			  
              xmlhttp.open("POST", "process.php?d=" + strnew, true);
              xmlhttp.send();
			  
          
      }
	  
	  
		 
		 
		 
		            var newmsg="";
	// פונקציה ש לוקחת את כל האינפורמציה מהשורה
	function run(){
			 
			// שומר רת הטבלה כאוביקט
			let t = document.getElementById('newOrder');
			
			// עובר על כל שורה
			for(let i = 1; i < t.rows.length; i++) {
	
			newmsg = "";
			// עובר על כל שדה בשורה ומוסיף אותו למחרוזת 
			for(let j = 0; j < this.cells.length; j++) {
			newmsg += "*" + this.cells[j].innerText;
			}
			// מעתיק את המחרוזת לעצמה פחות התו הראשון
			newmsg = newmsg.slice(1, newmsg.length);
			
			//deletProduct(msg);
			//alert(msg);
			}
				
				
				
				console.log('log');
				
				//console.log(newmsg);
				// שולח את הפרטים של המוצר למחיקתו בפונקציה המתאימה
				deletProduct(newmsg);
						
				
		}
		 
	function sendAjax(e)
      {
	//console.log(inv);
	

	
	

	
	//document.getElementById('lBtn').style.display = "block";
	//document.getElementById('orderok').style.display = "block";
	var li = e.currentTarget;	
	var inv = li.innerText;
	
	// מקבל את מספר הספק של הזnנה מהליבל  של כפתור ההזמנה הספציפי
	x =  li.innerText;
	
		
		//מיצר מערך של כל כפתורי ההזמנה
		var element = document.getElementsByClassName('cl');
		
		console.log(element);
		
		// עובר על כל כפתור וכפתור ומסיר את האטרביוט של ה אידי 
		for(var i = 0; i < element.length; i++){
			element[i].removeAttribute("id");
		}
		
		// מוסיף ל אלמנט אידי מי
		e.target.id = "me";

			  // 
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
					 // מחזיר את האינפורמציה של ההזמנה ל חלון פרטי ההזמנה
                     document.getElementById("show").innerHTML = this.responseText;
					 // מציג את חלון פרטי ההזמנה
					 document.getElementById('show').style.display = "inline-block";
					 
					 // מוסיף אירוע לכפתור אישור ההזמנה
					 document.getElementById('orderok').addEventListener('click',orderisset,false);
							  
							  // מוסיף אירוע לכפתור סגירת חלון פרטי ההצבעה
					 		  document.getElementById('closeIt').addEventListener("click",()=>{
							  // מסתיר את החלון פרטי ההזמנה
							  document.getElementById('show').style.display = "none";
							  });
	 
					 
					 
					 
					// מיצר מערך של כל השורות של הטבלה של ההזמנה הספציפית
					var all = document.querySelectorAll('.all');
					
					//  מוסיף אירוע לחיצה לכל שורה ושורה 
					all.forEach(function(el){
						newmsg = "";
						el.addEventListener('click',run,false);
					});
					
					
					 
                  }
              };
			  
			  // שולח את המספר ספק לשרת
              xmlhttp.open("POST", "process.php?p=" + inv, true);
              xmlhttp.send();
			  
			  
              }


		 	//var lis = document.querySelectorAll('.cl');
			// מיצר מערך של כל כפתורי ההזמנות
			var lis = document.getElementsByClassName('cl');
			
			// מוסיף אירוע לכל כפתור הזמנה
			for(var i = 0; i < lis.length; i++){
				lis[i].addEventListener('click',sendAjax,false);
			}
			
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			// פונקציה ששולחת את הרמז משדה החיפוש לשרת 
			function showHint(str){
			
			if(str.length ==0){
				// אם הרמז ריק 
				document.getElementById("txtHint").innerHTML = "";
				return;
			}
			
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
					 
					 // מחזיר את התוצאות לחלון תוצאות החיפוש
                     document.getElementById("txtHint").innerHTML = this.responseText;
					  document.getElementById("txtHint").addEventListener("click", choseHint, true);
					 
					 
					 
			  
                  }
              };

			  // שולח את הרמז לשרת
              xmlhttp.open("POST", "process.php?S=" + str, true);
              xmlhttp.send();
			  
              }

				
			
			  
			
			/*function addHint(str){
				
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {

                     //document.getElementById("txtHint").innerHTML = this.responseText;
					 console.log(this.responseText);
					 strm = this.responseText;
					 
                  }
              };

              xmlhttp.open("POST", "process.php?A=" + strm, true);
              xmlhttp.send();
			  
              }	*/
			 
			 /*
			 // מוצא את שדה תוצאות החיפוש ומוסיף אירוע מסוג הקלקה
			 document.getElementById("txtHint").addEventListener("click", function(){
				 

				  // יוצר מערך עם כל תוצאות החיפוש
				  var txthintfind = document.querySelectorAll('.txthintfind');
				  // עובר על כל תוצאה ותוצאה בשדה החיפוש ומוסיף לה אירוע הקלקה
				  txthintfind.forEach(function(el){
					  
				  el.addEventListener('click',runtxthintfind,false);
			  
			  });
			  
			  
			  // הפונקציה יוצר מחרוזת של תוצאת החיפוש
			  function runtxthintfind(){
					
					console.log("ok");
					// מאפס את משתנה כמות המוצר
				  	var num = 0;
					// יוצר מרוזת של תוצאת החיפוש כאשר כל מילה ומילה מתחילה ברווח
					strm = this.innerText.split(" ");
					console.log(strm);
					// מעתיק את אותו משתנה לעצמו מינוס התוו הראשון שהוא רווח
					strm = strm[strm.length-1];
					console.log(strm);	
					// מציג את חלון בחירת כמות המוצר ואישור הזמנת המוצר
					document.getElementById("customconfirm").style.display = "block";
					
				  
			  }

					
					
			  });*/
			  
			  
			  
			  //
			  
			  document.getElementById("txtHint").addEventListener("click", choseHint, true);
			  
			  function choseHint(){
				  				 

				  // יוצר מערך עם כל תוצאות החיפוש
				  var txthintfind = document.querySelectorAll('.txthintfind');
				  // עובר על כל תוצאה ותוצאה בשדה החיפוש ומוסיף לה אירוע הקלקה
				  txthintfind.forEach(function(el){
					  
				  el.addEventListener('click',runtxthintfind,false);
			  
			  });
			  
			  
			  // הפונקציה יוצר מחרוזת של תוצאת החיפוש
			  function runtxthintfind(){
					
					console.log("ok");
					// מאפס את משתנה כמות המוצר
				  	var num = 0;
					// יוצר מרוזת של תוצאת החיפוש כאשר כל מילה ומילה מתחילה ברווח
					strm = this.innerText.split(" ");
					console.log(strm);
					// מעתיק את אותו משתנה לעצמו מינוס התוו הראשון שהוא רווח
					strm = strm[strm.length-1];
					console.log(strm);	
					// מציג את חלון בחירת כמות המוצר ואישור הזמנת המוצר
					document.getElementById("customconfirm").style.display = "block";
					
				  
			  }
			  }
			  //
			  
			  
			  
			  
			  

					
			
			  
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			
			
	

			
	/*lis.forEach(function(el){
		el.addEventListener('click',sendAjax,false);
	});*/
	
	
/*function myFunction() {
  console.log("Hello world!");
}*/

		

}