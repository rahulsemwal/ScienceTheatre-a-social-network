// JavaScript Document
/*var comm;
function giveid(comment){
	alert(comment);
	comm=comment;	
	}*/
	
	var comm=getElementById("hide");
	document.writeln(comm);
$(document).ready(function()
{ $("#" + comm ).hide();
  
  $("#hide").click(function()
  {  alert(comm);
    $("#" + comm).show();
	
	
  });
  $("#close").click(function()
  {
    $("#" + comm).hide();
  });
});