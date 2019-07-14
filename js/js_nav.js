// JavaScript Document

function myfunction()
{	
  	var y = document.getElementById("mytopnav-right");
  	var x = document.getElementById("mytopnav");
  	if (x.className === "topnav") 
	{
    	y.className += "responsive";
    	x.className += " responsive";
  	} 
	else 	
	{
		y.className = "topnav-right";
		x.className = "topnav";
	}
}

function confirmdelete()
{
	return confirm('Are you sure?');
}

function showform()
{
	var x = document.getElementById("changename");
	if(x.className === "changename")
	{
		x.className += "show";
	}
	else
	{
		x.className = "changename";
	}
}
