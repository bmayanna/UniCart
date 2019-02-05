
//(function()

		//<meta name="description" content="Javascript for addding recent items and top bidding items on home" />
		//<meta name="keywords" content="recent items, top bidding items" />
        //<meta name="author" content="Avi Singhal">
        //<meta name="author" content="Vishnu Prasad Vishwanathan">

function durationselect()
{"use strict";
	 console.log("duration select");
 	
 	var durationlist = document.getElementById("durationlistitem");
	console.log("ouutside typec");
	if(document.getElementById("typeb").checked){
		console.log("inside sell");
			durationlist.style.visibility = 'hidden';
			document.getElementById("duration").innerHTML = 0;
		}
		else
		{var ol1 = document.getElementById("durable1");
	
			/*if(document.getElementById("typec").checked){
				ol1.innerHTML = "Bid Duration";
			}
			else
			{
				ol1.innerHTML = "Rent Duration"
				}*/
		}
}
		