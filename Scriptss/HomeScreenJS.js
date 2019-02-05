// function to create recent items
//(function()
function createrecent()
{"use strict";
	 console.log("inside onload");
	
	
		
		var form = new FormData();
			var xh = new XMLHttpRequest(),
			x;
			console.log("loadFiles");
			
			
			xh.onload = function()
			{
				var data = JSON.parse(xh.responseText);
				console.log("data: ", data);
				populaterecents(data);
				//createrequireddiv(data,maindivelem,maintar);
			};
			xh.open('post','homerecent.php');
			xh.send(form);
		
}
//}());

// function to populate recent items

function populaterecents(files)
{"use strict";
	console.log(files[0][0]);
 	var i;
 	var topelem = document.getElementById("oc-clients");
 	var outdiv1 = document.createElement("div");
		

 	var activerow1 = document.getElementById("activerecent");
 	var passiverow1 = document.getElementById("passiverecent");
		
 	for (i = 0; i < files.length; i++)
	{
		console.log("i val: ",i);
		
		var itemdiv1 = document.createElement("div");
		itemdiv1.className = "col-md-3 col-sm-3 col-xs-12";
		
		var divelem1 = document.createElement("div");
		divelem1.className = "slider-item";
		
		var picdivelem1 = document.createElement("div");
		picdivelem1.className = "slider-image";
		
		var picelem1 = document.createElement("img");
		picelem1.src = files[i].itempic;
		picelem1.className = "img-responsive";
		picelem1.alt = "a";
		
		picdivelem1.appendChild(picelem1);
		divelem1.appendChild(picdivelem1);
		
		
		var slidermaindiv1 = document.createElement("div");
		slidermaindiv1.className = "slider-main-detail";
		
		var sliderdiv1 = document.createElement("div");
		sliderdiv1.className = "slider-detail";
		
		var proddiv1 = document.createElement("div");
		proddiv1.className = "product-detail";
		
		var itemnameh = document.createElement("h5");
		itemnameh.innerHTML = files[i].itemname;
		
		var itemppriceh = document.createElement("h5");
		itemppriceh.innerHTML = files[i].itemprice;
		itemppriceh.className = "detail-price";
		
		proddiv1.appendChild(itemnameh);
		proddiv1.appendChild(itemppriceh);
		sliderdiv1.appendChild(proddiv1);
		slidermaindiv1.appendChild(sliderdiv1);
		
		var buttondiv = document.createElement("div");
		buttondiv.className = "cart-section";
		
		var buttoninnerdiv = document.createElement("div");
		buttoninnerdiv.className = "col-md-6 col-sm-12 col-xs-6";
		
		var forbutton = document.createElement("button");
		forbutton.id = "item" + files[i].itemid;
		forbutton.className = "button button--pipaluk button--inverted  button--round-s button--text-thick";
		forbutton.innerHTML = files[i].itemtype;
		forbutton.width = "80px";
		var iforbutton = document.createElement("i");
		iforbutton.className = "fa fa-shopping-cart";
		iforbutton.setAttribute = ("aria-hidden","true");
		//forbutton.appendChild(iforbutton);
		
		buttoninnerdiv.appendChild(forbutton);
		buttondiv.appendChild(buttoninnerdiv);
		
		sliderdiv1.appendChild(buttondiv);
		slidermaindiv1.appendChild(sliderdiv1);
		divelem1.appendChild(slidermaindiv1);
		itemdiv1.appendChild(divelem1);
		
		if(i<5)
			{
				activerow1.appendChild(itemdiv1);
			}
		else
			{
				passiverow1.appendChild(itemdiv1);
			}
	}
}


// function to create top bid items
function createtopbid()
{"use strict";
	 console.log("inside onload topbid");
			var form = new FormData();
			var xh = new XMLHttpRequest(),
			x;
			console.log("loadFiles");
			
			xh.onload = function()
			{
				var data = JSON.parse(xh.responseText);
				console.log("data: ", data);
				populatetopbids(data);
				//createrequireddiv(data,maindivelem,maintar);
			};
			xh.open('post','Scriptss/HomeScreentb.php');
			xh.send(form);
		
}
//}());


// function to populate recent items
function populatetopbids(files)
{"use strict";
	console.log("topbiddddd");
 	var i;

 	var activerow2 = document.getElementById("activetopbid");
 	var passiverow2 = document.getElementById("passivetopbid");
 	console.log(activerow2);
		
 	for (i = 0; i < files.length; i++)
	{
		console.log("i val: ",i);
		
		var itemdiv2 = document.createElement("div");
		itemdiv2.className = "col-md-3 col-sm-3 col-xs-12";
		
		var divelem2 = document.createElement("div");
		divelem2.className = "slider-item";
		
		var picdivelem2 = document.createElement("div");
		picdivelem2.className = "slider-image";
		
		var picelem2 = document.createElement("img");
		picelem2.src = files[i].itempic;
		picelem2.className = "img-responsive";
		picelem2.alt = "a";
		
		picdivelem2.appendChild(picelem2);
		divelem2.appendChild(picdivelem2);
		
		
		var slidermaindiv2 = document.createElement("div");
		slidermaindiv2.className = "slider-main-detail";
		
		var sliderdiv2 = document.createElement("div");
		sliderdiv2.className = "slider-detail";
		
		var proddiv2 = document.createElement("div");
		proddiv2.className = "product-detail";
		
		var itemnameh2 = document.createElement("h5");
		itemnameh2.innerHTML = files[i].itemname;
		
		var itemppriceh2 = document.createElement("h5");
		itemppriceh2.innerHTML = files[i].itemprice;
		itemppriceh2.className = "detail-price";
		
		proddiv2.appendChild(itemnameh2);
		proddiv2.appendChild(itemppriceh2);
		sliderdiv2.appendChild(proddiv2);
		slidermaindiv2.appendChild(sliderdiv2);
		
		var buttondiv2 = document.createElement("div");
		buttondiv2.className = "cart-section";
		
		var buttoninnerdiv2 = document.createElement("div");
		buttoninnerdiv2.className = "col-md-6 col-sm-12 col-xs-6";
		
		var forbutton2 = document.createElement("button");
		forbutton2.id = "item"+files[i].itemid;
		console.log("id: ", forbutton2.id);
		forbutton2.className = "button button--pipaluk button--inverted  button--round-s button--text-thick";
		forbutton2.innerHTML = files[i].itemtype;
		forbutton2.width = "80px";
		var iforbutton2 = document.createElement("i");
		iforbutton2.className = "fa fa-shopping-cart";
		iforbutton2.setAttribute = ("aria-hidden","true");
		//forbutton2.appendChild(iforbutton2);
		
		buttoninnerdiv2.appendChild(forbutton2);
		buttondiv2.appendChild(buttoninnerdiv2);

		sliderdiv2.appendChild(buttondiv2);
		slidermaindiv2.appendChild(sliderdiv2);
		divelem2.appendChild(slidermaindiv2);
		itemdiv2.appendChild(divelem2);
		
		if(i<5)
			{
				activerow2.appendChild(itemdiv2);
			}
		else
			{
				passiverow2.appendChild(itemdiv2);
			}
	}
}

document.onclick = function(event)
{
	"use strict";
	var tarid = event.target.id;
	console.log("tarid", tarid);
	var clickbutton = document.getElementById(tarid);
	console.log("clickbutton.innerHTML :", clickbutton.innerHTML);
	if(tarid.indexOf("item") != -1)
	{
		var targethtm = "";
		var taritemid = tarid.substring(4,tarid.length);
		console.log("taritemid", taritemid);
		//var clickbutton = document.getElementById(tarid);
		if(clickbutton.innerHTML.indexOf("sell") != -1)
		{
			console.log("yes it is sell");
			targethtm = "payment.php";
		
		}
		if(clickbutton.innerHTML.indexOf("rent") != -1)
		{
			console.log("yes it is rent");
			targethtm = "renting_page.php";
		
		}
		else
		{
			targethtm = "bidding_page.php";
		}

		 var form = document.createElement("form");
		var element1 = document.createElement("input"); 
		var element2 = document.createElement("input");  

		form.method = "POST";
		form.action = "item.php";   

		element1.value=taritemid;
		element1.name="id";
		
		form.appendChild(element1);  
		
		
		element2.value=targethtm;
		element2.name="target";
		form.appendChild(element2);

		document.body.appendChild(form);

		form.submit();
	}
};
//extra
function populaterecentsthere(files)
{
	console.log(files[0][0]);
 	var i;
 	var topelem = $("#oc-clients1");
 	var outdiv1 = document.createElement("div");
		
 	outdiv1.className= 'owl-stage-outer';
	var indiv1 = document.createElement("div");
	indiv1.className= 'owl-stage';
	indiv1.setAttribute("style","transform: translate3d(0px, 0px, 0px); transition: 0.25s; width: 2953px;");

 	for (i = 0; i < files.length; i++)
	{
		console.log("i val: ",i);
 	
		var ul1 = document.createElement("ul");
		var li1 = document.createElement("li");
		var img1 = document.createElement("img");
		var h41 = document.createElement("h4");
		var p1 = document.createElement("p");
		var button1 = document.createElement("button");
		var clonediv1 = document.createElement("div");
		clonediv1.className = "owl-item cloned";
		clonediv1.setAttribute("style","width: 188.373px; margin-right: 80px;");
		//indiv1.style = ('transform', 'translate3d(-1073px, 0px, 0px)'); 
		//indiv1.style = ('transition', '0.25s'); 
		//indiv1.width = '2953px';

		ul1.id = 'baraja-el';
		ul1.className = 'baraja-container';


		img1.src = files[i].itempic;
		img1.alt = 'img1';
		h41.innerHTML = files[i].itemname;
		p1.innerHTML = files[i].itemdesc;
		button1.className = 'button button--pipaluk button--inverted button--round-s button--text-thick';
		button1.innerHTML = files[i].itemtype;
		li1.appendChild(img1);
		li1.appendChild(h41);
		li1.appendChild(p1);
		li1.appendChild(button1);
		ul1.appendChild(li1);
		clonediv1.appendChild(ul1);
		indiv1.appendChild(clonediv1);
		
		
	}
 	outdiv1.appendChild(indiv1);
 	topelem.appendChild(outdiv1);
 	//divclass for buttons
 	var bdiv1 = document.createElement('div');
 	bdiv1.className = 'owl-nav disabled';
 	var bbutton1 = document.createElement('button');
 	bbutton1.setAttribute('role','presentation');
 	bbutton1.className = 'owl-prev';
 	var bi = document.createElement("i");
 	bi.className = "icon-angle-left";
 	var bbutton2 = document.createElement('button');
 	bbutton2.setAttribute('role','presentation');
 	bbutton2.className = 'owl-next';
 	var bi2 = document.createElement("i");
 	bi2.className = "icon-angle-right";
 	var bdisablediv = document.createElement("div");
 	bdisablediv.className = "owl-dots disabled";
 	bbutton1.appendChild(bi);
 	bbutton2.appendChild(bi2);
 	bdiv1.appendChild(bbutton1);
 	bdiv1.appendChild(bbutton2);
 	topelem.appendChild(bdiv1);
 	topelem.appendChild(bdisablediv);
}


