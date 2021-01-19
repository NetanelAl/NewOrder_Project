document.addEventListener('DOMContentLoaded',init);


function init(){
	
	// מוסיף אירוע הקלקה לכפתור הריפרש
	document.getElementById("refresh").addEventListener("click",()=>{
		// מרפרש את החלון כדי לראות האם הגיעו הזמנות חדשות
		window.location.reload();
		
	});
	
	function sendAjax(e)
    {
	//console.log(inv);
	var inv;
	// במידה ו הכפתור הנילחץ מכיל ערך
	if (typeof(e.target) != 'undefined' && e.target != null)
	{		
			// מוצא את הכפתור הנילחץ
			var li = e.currentTarget;	
			// מוצא את הליבל של הכפתור הנילחץ
			inv = li.innerText;
	}
	else{
		inv = e;
	}
			  
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
					  
					 // מכניס את האינפורמציה לחלון אישור או דחיית ההזמנה
					 document.getElementById("above").innerHTML = this.responseText;
							
							// מוצא את כפתור אישור ההזמנה
							var btn = document.getElementById("accepted");

							// מוסיף אירוע הקלקה לכפתור אישור ההזמנה
							if (typeof(btn) != 'undefined' && btn != null)
							{
								// מאשר אז ההזמנה עם הפונקציה המתאימה
							   btn.addEventListener('click',acceptedAjax,false);
							}
								
								// מוסיף אירוע לכפתור דחיית ההזמנה
								document.getElementById('Declinepurchase').addEventListener("click",()=>{
								console.log("console");
								// דוחה את ההזמנה עם הפונקציה המתאימה
								Declinepurchase();
								});
								
										// מוצא את הטבלה של ההזמנה הספציפית
										var table = document.getElementById('torder');
										if (typeof(table) != 'undefined' && table != null)
										{
										// עובר בלולאה על כל שורה ומוסיף לה אירוע
										for(var i = 1; i < table.rows.length; i++) {
										table.rows[i].addEventListener('click', function() {

										
										// מנקה את המשתנה שמכיל את פרטי המוצר שנדחה 
										msg = "";
										// עובר בלולאה על כל מילה בשורה ומוסיף אותה למחרוזת
										for(var j = 0; j < this.cells.length; j++) {
										// במחרוזת כל מילה ומילה מופרדת בכוכבית
										msg += "*" + this.cells[j].innerText;
										
										}
										// חותך את התוו הראשון מהמחרוזת
										msg = msg.slice(1, msg.length);
										//console.log(msg);
										//deletelist(msg);
										//alert(msg);
										// יוצר מהמחרוזת מערך של המילים 
										var bis = msg.split("*"); 
										// מוצא את המילה הראשונה במערך
										var biso = bis[0];
										console.log(bis[0]);
										//sendAjax(bis[0]);
										// שולח את הסטטוס ואת פרטי המוצר לשרת
										RejectedAjax(msg,biso);
														
										});

										}
										}
					
                  }
              };

              xmlhttp.open("POST", "clientOrderProces.php?q=" + inv, true);
              xmlhttp.send();
              
      }
	  
	
	// יצר מערך של כל כפתורי ההזמנות
	var lis = document.querySelectorAll('.cl');
	// עובר בלולאה על כל כפתור וכפתור ומוסיף לו אירוע
	lis.forEach(function(el){
		el.addEventListener('click',sendAjax,true);

	});
	
	//////////////////////////////////////////////////////////////////////////
	
	// פונקציה ששולחת את הפרטים של ההזמנה לשרת לאישור
	function acceptedAjax(e)
      {
		
		var inv = "clicked";
		//console.log(e.target.innerText);
	
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
					
					 
					 
					 //שינינו לראות שהכל בסדר
					 //document.getElementById("above").innerHTML = this.responseText;
					 
					 // מוצא את טבלת ההזמנה
					 var table = document.getElementById('torder');
						if (typeof(table) != 'undefined' && table != null)
							{
								var msg = "";
								// מוצא את מס העסק שהזמין את ההזמנה
								msg = table.rows[1].cells[0].innerText;
								console.log(msg);
								// שולח את מספר העסק לשרת
								sendAjax(msg);
								
							}
					 
					 
                  }
              };

              xmlhttp.open("POST", "clientOrderProces.php?w=" + inv, true);
              xmlhttp.send();
              
      }
	  
	  
	  ///////////////////////////////////////////////////////////////////////////
	  
			
			// הפונקציה מקבלת פרטי המוצר ואת הסטטוס שלו
	  		function RejectedAjax(msg,biso){
		
			  var inv = "Rejectproduct";
	
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
					 //console.log(this.responseText);
					 //document.getElementById("above").innerHTML = this.responseText;
					 console.log(biso);
					 // שולח את הסטטוס של המוצר
					 sendAjax(biso);
                  }
              };
			  // שולח את פרטי המוצר ל שרת
              xmlhttp.open("POST", "clientOrderProces.php?RP=" + msg, true);
              xmlhttp.send();       
		}
			
			
			/*var lis = document.getElementsByClassName('clrow');
			
			for(var i = 0; i < lis.length; i++){
				lis[i].addEventListener('click',sendAjax,false);
			}*/
			

	
	// הפונקיה דוחה את ההזמנה כולה
	function Declinepurchase(e)
      {
		
		var inv = "clicked";
		//console.log(e.target.innerText);
	
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
					
					 
					 //שינינו לראות שהכל בסדר
					 //document.getElementById("above").innerHTML = this.responseText;
						
						// מוצא את הטבלה
						var table = document.getElementById('torder');
						if (typeof(table) != 'undefined' && table != null)
							{
								var msg = "";
								// מחלץ את מספר העסק שהזמין
								msg = table.rows[1].cells[0].innerText;
								console.log(msg);
								
								// שולח לחידוש האירוע
								sendAjax(msg);
								
							}
					 
                  }
              };
			  // שהתבצעה הקלקה לביטול לדחית ההזמנה
              xmlhttp.open("POST", "clientOrderProces.php?Declinepurchase=" + inv, true);
              xmlhttp.send();
              
      }
			

}