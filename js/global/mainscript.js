function _gel(x){return document.getElementById(x);}
 
function sendDataToScratchpad()
{
	xmlhttpChange= _getXMLHTTP();
	xmlhttpChange.open("POST",'scratchpadUpdate.php',true);
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttpChange.send("notes="+_gel('notes').value);  
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			//alert("Save successful");
			_gel('status').innerHTML="Save successful";			
		}  
		else
		{
			_gel('status').innerHTML="Failed to save notes";
		}
	}
}

//Method used to save meeting notes
function saveMeetingNotes()
{
	//Create fresh xmlhttp object
	xmlhttpChange= _getXMLHTTP();
	
	//Configure the object to make a POST call to the saveMeetingNotes.php
	xmlhttpChange.open("POST",'saveMeetingNotes.php',true);
	
	//Set request header for the POST call
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	//Marshall all parameters
	xmlhttpChange.send("searchableMetadata="+_gel('searchableMetadata').value+
	"&meetingHeader="+_gel('meetingHeader').value+
	"&participantsInOffice="+_gel('participantsInOffice').value+
	"&participantsOverCall="+_gel('participantsOverCall').value+
	"&agenda="+_gel('agenda').value+	
	"&notes="+_gel('notes').value+
	"&urgentActionItems="+_gel('urgentActionItems').value+
	"&taskAllocations="+_gel('taskAllocations').value+
	"&timelineOfDeliverables="+_gel('timelineOfDeliverables').value
	); 
	
	//Wait for call to end and update UI with message
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			_gel('status').innerHTML="Save successful";			
		}  
		else
		{
			_gel('status').innerHTML="Failed to save meeting notes";
		}
	}
}

//Method: Initialise all modal fields to a null string
function initializeModal()
{
	_gel('searchableMetadata').value= "";
	_gel('meetingHeader').value= "";
	_gel('participantsInOffice').value= "";
	_gel('participantsOverCall').value= "";
	_gel('agenda').value= "";
	_gel('notes').innerHTML= "";
	_gel('urgentActionItems').innerHTML= "";
	_gel('taskAllocations').innerHTML= "";
	_gel('timelineOfDeliverables').innerHTML= "";
}

function getMeetingNotesFields(filename)
{
	//Create fresh xmlhttp object
	xmlhttpChange= _getXMLHTTP();
	
	//Configure the object to make a POST call to the saveMeetingNotes.php
	xmlhttpChange.open("POST",'getMeetingNotes.php',true);
	
	//Set request header for the POST call
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	//Marshall all parameters
	xmlhttpChange.send('meetingHeader='+filename);
	
	//Wait for call to end and update UI with message
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			//Parse input JSON
			JSONObject = JSON.parse(xmlhttpChange.responseText);
			
			//return JSON object to calling function
			return JSONObject;
		}  
		else
		{
			//alert("Failed! "+xmlhttpChange.responseText);
		}
	}
}

function getHashTags(filename)
{
	//Return the filename with the matching hashtags
	return getMeetingNotesFields(filename).searchableMetadata;	
}

function searchForFilesWithHashTags()
{
	//Create fresh xmlhttp object
	xmlhttpChange= _getXMLHTTP();
	
	//Configure the object to make a POST call to the saveMeetingNotes.php
	xmlhttpChange.open("POST",'getFileList.php',true);
			
	//Set request header for the POST call
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	//Get all hashtags
	hashtags =_gel('hashtag').value;
	
	//if field is empty then set hashtag filter to all
	if(hashtags=='')	
		hashtags='all';
		
	//Marshall all parameters
	xmlhttpChange.send('hashtags='+hashtags);

	//Wait for call to end and update UI with message
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			//update UI with the list of files that match the search criteria
			_gel('pagework').innerHTML= xmlhttpChange.responseText;
		}
	}
}

function getDataFromMeetingNotes(filename)
{
	//Create fresh xmlhttp object
	xmlhttpChange= _getXMLHTTP();
	
	//Configure the object to make a POST call to the saveMeetingNotes.php
	xmlhttpChange.open("POST",'getMeetingNotes.php',true);
	
	//Set request header for the POST call
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	//Marshall all parameters
	xmlhttpChange.send('meetingHeader='+filename);
	
	//Wait for call to end and update UI with message
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{				
			$('#myModal').modal();
			JSONObject = JSON.parse(xmlhttpChange.responseText);
			
			_gel('searchableMetadata').value= JSONObject.searchableMetadata;
			_gel('meetingHeader').value= JSONObject.meetingHeader;
			_gel('participantsInOffice').value= JSONObject.participantsInOffice;
			_gel('participantsOverCall').value= JSONObject.participantsOverCall;
			_gel('agenda').value= JSONObject.agenda;
			_gel('notes').innerHTML= JSONObject.notes;
			_gel('urgentActionItems').innerHTML= JSONObject.urgentActionItems;
			_gel('taskAllocations').innerHTML= JSONObject.taskAllocations;
			_gel('timelineOfDeliverables').innerHTML= JSONObject.timelineOfDeliverables;
		}  
		else
		{
			//alert("Failed! "+xmlhttpChange.responseText);
		}
	}
}

function getDataFromScratchpad()
{	
	_gel('status').innerHTML="";		
	alert(1);
	_gel('notes').value = doAJAX(_gel('username').innerHTML+'_scratchpad.txt');
}

//Method to initialize edit Task modal
function editTaskModalInit()
{
	_gel('ETTaskName').value= "";
	_gel('ETTaskDescription').value= "";
	_gel('ETManagersComment').value= "";
	_gel('ETAssignedDate').value= "";
	_gel('ETStartDate').value= "";
	_gel('ETDueDate').value= "";
	_gel('ETHoursAllotted').value= "";
	_gel('ETAssociatedManager').value= "";
	_gel('ETLeadEmployee').value= "";
	
	getTaskNames();
}

//Method to get all task UIDs and Names
function getTaskNames()
{
	//Create fresh xmlhttp object
	xmlhttpChange= _getXMLHTTP();
	
	//Configure the object to make a POST call to the saveMeetingNotes.php
	xmlhttpChange.open("POST",'getTaskNames.php',true);
	
	//Set request header for the POST call
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	xmlhttpChange.send(null);
	
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			JSONdata = JSON.parse(xmlhttpChange.responseText);
			var optionString="<option>None</option>";
			for(var i = 0; i<JSONdata.taskArray.length; i++)
			{
				var optionEntry = JSONdata.taskArray[i];
				var taskName = JSONdata.taskArray[i];
				optionString += "<option>"+optionEntry["TaskUID"]+"|"+optionEntry["Task_Name"]+"</option>";				
			}
			_gel('taskSelect').innerHTML=optionString;
		}  
		else
		{
			_gel('taskSelect').innerHTML="<option>load Failed</option>";
		}
	}
}

//method called to load task edit modal with task details
function loadTaskDetails(entry)
{
	console.log(entry.value);
	if(entry.value=="None")
		return;	
	
	//Create fresh xmlhttp object
	xmlhttpChange= _getXMLHTTP();
	
	//Configure the object to make a POST call to the saveMeetingNotes.php
	xmlhttpChange.open("POST",'getTaskDetails.php',true);
	
	//Set request header for the POST call
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	//Extract Task ID
	var taskid = entry.value.split("|")[0];
	
	//Build JSON
	obj = new Object();
	obj.TaskUID = taskid;
	jsonString= JSON.stringify(obj);
	
	//Marshall all parameters
	xmlhttpChange.send('json='+jsonString); 
	
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			console.log(xmlhttpChange.responseText);
			JSONObject = JSON.parse(xmlhttpChange.responseText);
			JSONObject = JSONObject.taskArray;
			
			_gel('ETTaskName').value= JSONObject.Task_Name;
			_gel('ETTaskDescription').value= JSONObject['Task Description'];
			_gel('ETManagersComment').value= JSONObject.Managers_Comments;
			_gel('ETAssignedDate').value= JSONObject.Assigned_Date;
			_gel('ETStartDate').value= JSONObject.Start_Date;
			_gel('ETDueDate').value= JSONObject.Due_Date;
			_gel('ETHoursAllotted').value= JSONObject.Hours_Alloted;
			_gel('ETAssociatedManager').value= JSONObject.Associated_Manager;
			_gel('ETLeadEmployee').value= JSONObject.Lead_Employee;
			_gel('statusSelect').value=JSONObject.Task_Status;
		}  
		else
		{
			console.log("Failed to Load task details");
		}
	}
}

//Method used to edit a pre-existing Task
function updateTask()
{
	if(_gel('taskSelect').value=="None")
		return;	
		
	//Create fresh xmlhttp object
	xmlhttpChange= _getXMLHTTP();
	
	//Configure the object to make a POST call to the saveMeetingNotes.php
	xmlhttpChange.open("POST",'updateTask.php',true);
	
	//Set request header for the POST call
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	//Build JSON
	obj = new Object();
	obj.TaskUID = _gel('taskSelect').value.split("|")[0];
	obj.TaskName = _gel('ETTaskName').value;
	obj.TaskDescription = _gel('ETTaskDescription').value;
	obj.ManagersComment = _gel('ETManagersComment').value;
	obj.AssignedDate = _gel('ETAssignedDate').value;
	obj.StartDate = _gel('ETStartDate').value;
	obj.DueDate = _gel('ETDueDate').value;
	obj.HoursAllotted = _gel('ETHoursAllotted').value;
	obj.AssociatedManager = _gel('ETAssociatedManager').value;
	obj.LeadEmployee = _gel('ETLeadEmployee').value;
	obj.Task_Status = _gel('statusSelect').value;
	jsonString= JSON.stringify(obj);
	
	//Marshall all parameters
	xmlhttpChange.send('json='+jsonString); 
	
	//Wait for call to end and update UI with message
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			_gel('status').innerHTML="Save successful";			
		}  
	}
}

//Method used to save a new Task entry
function saveNewTask()
{
	//Create fresh xmlhttp object
	xmlhttpChange= _getXMLHTTP();
	
	//Configure the object to make a POST call to the saveMeetingNotes.php
	xmlhttpChange.open("POST",'addNewTask.php',true);
	
	//Set request header for the POST call
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	
	//Build JSON
	obj = new Object();
	obj.TaskName = _gel('TaskName').value
	obj.TaskDescription = _gel('TaskDescription').value
	obj.ManagersComment = _gel('ManagersComment').value
	obj.AssignedDate = _gel('AssignedDate').value
	obj.StartDate = _gel('StartDate').value
	obj.DueDate = _gel('DueDate').value
	obj.HoursAllotted = _gel('HoursAllotted').value
	obj.AssociatedManager = _gel('AssociatedManager').value
	obj.LeadEmployee = _gel('LeadEmployee').value
	jsonString= JSON.stringify(obj);
	
	//Marshall all parameters
	xmlhttpChange.send('json='+jsonString); 
	
	//Wait for call to end and update UI with message
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			_gel('status').innerHTML="Save successful";			
		}  
		else
		{
			_gel('status').innerHTML="Failed to save meeting notes";
		}
	}
}

function doAJAX(newPage) 
{
	xmlhttp = (window.XMLHttpRequest)?new XMLHttpRequest():(window.ActiveXObject)?new ActiveXObject("Microsoft.XMLHTTP"):null;
	
	if(xmlhttp == null) 
	{// AJAX not supported
		alert('AJAX not Supported');
		return;
	}
 
	xmlhttp.open("GET", newPage, false);
	xmlhttp.setRequestHeader("Cache-Control", "no-cache");
	xmlhttp.send(null);
	
	return xmlhttp.responseText;
}
 
function _getXMLHTTP()
{
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	return xmlhttp;
}

function sendGETDataToPHPfile(div, filename,parameter)
{
	xmlhttpChange= _getXMLHTTP();

}

function sendPOSTDataToPHPfile(div, filename,parameter)
{	
  //alert(parameter);
	
	xmlhttpChange= _getXMLHTTP();
	xmlhttpChange.open("POST",filename,true);
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttpChange.send(parameter);  
	_gel(div).innerHTML="Loading folder...";
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			_gel(div).innerHTML=xmlhttp.responseText;
		}  
		else
		{
			_gel(div).innerHTML="Failed to load folder";
		}
	}
}

function getBack(div, filename,parameter)
{
	 xmlhttpChange= _getXMLHTTP();
	 var parameter='foldername=Files/Release/Android Remote';
	xmlhttpChange.close("POST",filename,true);
	xmlhttpChange.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttpChange.send(parameter);  
	_gel(div).innerHTML="Loading folder...";
	xmlhttpChange.onreadystatechange= function() 
	{
		if (xmlhttpChange.readyState==4 && xmlhttpChange.status==200)
		{
			_gel(div).innerHTML=xmlhttp.responseText;
		}  
		else
		{
			_gel(div).innerHTML="Failed to load folder";
		}
	}
	 
}


window.onload = function() 
{	
	//buildNavigation();
}

function sendData(task_id,task_status, index,comment)
  { 
   var strconfirm = confirm("Are you sure you want to Update?");
	  
    if (strconfirm == true) {
    $.ajax({
     
     url:"update1.php?task_id="+task_id+"&status="+task_status+"&row_index="+index+"&comment="+comment,
     type:"GET",
     success:function(html){
       $("#username1").html(html).innerHTML=value;
     }
   })

  }
  }
  
  function deleteFile(filename,celldel,path)
	{
	  var strconfirm = confirm("Are you sure you want to delete?");
	  
    if (strconfirm == true) {
     
	 
		$.ajax({
		 
		 url:"delete_file.php?filename="+filename+"&path="+path,
		 type:"GET",
		 success:function(html){
			 $("#username").html(html).innerHTML=value;
		 }
	 })
	 document.getElementById(celldel).style.display="none";
	  //document.getElementById('myid'.concat(celldel)).value=celldel;
	 }
	 

	}
	
	
 

function getOldpassword(oldpassword)
{
	$.ajax({
		 
		 url:"getpassword.php?password="+oldpassword,
		 type:"GET",
		  success:function(html){
			 $("#passwordfetch").html(html).innerHTML=value;
		 }
	 });
	 
}


function getUser(username){
 $.ajax({
		 
		 url:"autofetch_user.php?username="+username,
		 type:"GET",
		  success:function(html){
			 $("#autofetch").html(html).innerHTML=value;
		 }
	 });

}

function getHistory(username){
 $.ajax({
		 
		 url:"getwallet_history.php?username="+username,
		 type:"GET",
		  success:function(html){
			 $("#gethistory").html(html).innerHTML=value;
		 }
	 });

}

function setupdate(id,approval)
{
var dataString = 'id=' + id + '&approval=' + approval +'&num=1';
$.ajax({
type: "GET",
url: "update_task.php",
data: dataString,
cache: false,
success: function(html) {
 $("#updateTask").html(html).innerHTML=value;
}
});	 
}
 
function add_emp_update(id,approval)
{
var item_name = document.getElementById("add_associated_emp").value;
if (item_name == '') {
alert("Please enter Item name");

}
else{
var dataString = 'id=' + id + '&approval=' + approval  +'&num=2';
$.ajax({
type: "GET",
url: "update_task.php",
data: dataString,
cache: false,
success: function(html) {
 $("#updateEmp").html(html).innerHTML=value;
}
});	 
} 
} 

function delete_emp(approval)
{
var dataString ='&approval=' + approval +'&num=3';
$.ajax({
type: "GET",
url: "update_task.php",
data: dataString,
cache: false,
success: function(html) {
 $("#deleteEmp").html(html).innerHTML=value;
}
});	 
}

function delete_maintask(approval)
{
	var strconfirm = confirm("Are you sure you want to make confirm?");

        if (strconfirm == true) {
var dataString ='&approval=' + approval +'&num=4';

$.ajax({
type: "GET",
url: "update_task.php",
data: dataString,
cache: false,
success: function(html) {
 $("#delete_task").html(html).innerHTML=value;
}
});	 
}
}

function indi_task(approval)
{
 $('#mymodal_indivi').modal('show');	
var dataString ='&approval=' + approval;
$.ajax({
type: "GET",
url: "individualTask.php",
data: dataString,
cache: false,
success: function(html) {
 $("#fetched-data").html(html).innerHTML=value;
}
});	 

}

$(document).ready(function(){
   $('.close').click(function() {
  location.reload();
});
});

$(document).ready(function(){
   $('.foot_close').click(function() {
  location.reload();
});
});

 
function changePassword(){
var oldpassword = document.getElementById("oldpassword").value;
var oldpass = document.getElementById("oldpass").value;
var password = document.getElementById("password").value;
var password2 = document.getElementById("password2").value;
var dataString = 'password=' + password;
   
if (oldpassword == '') {
alert("Please enter old passwwrd");
document.getElementById("oldpassword").focus();
}
else if (oldpass != oldpassword) {
alert("Old password is incorrect please enter correct password");
document.getElementById("oldpassword").focus();
} 
else if (password == '') {
alert("Please enter your new password");
document.getElementById("password").focus();
}
else if (password.length<6) {
		alert("Please Enter Altlear 6 Character");
		document.getElementById("password").focus();
	} 
else if (password == oldpassword) {
alert("u have entering old password again please change with new password");
document.getElementById("password").focus();
}  
else if (password2 == '') {
alert("Please re-enter your new password");
document.getElementById("password2").focus();
} 
else if (password2.length<6) {
		alert("Please Enter Altlear 6 Character");
		document.getElementById("password2").focus();
	} 
else if (password != password2) {
alert("password does not match");
document.getElementById("password2").focus();
}  
else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "changepassword.php",
data: dataString,
cache: false,
success: function(html) {
 $("#passwordfetch").html(html).innerHTML=value;
}
});
document.getElementById("changepasssform").reset();
}
return false;
}

function forgetPassword(){
  var username = document.getElementById("username").value;
 var dataString = 'username=' + username;
 if (username == '') {
alert("Please enter your username");
document.getElementById("username").focus();
} 
else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "getmail.php",
data: dataString,
cache: false,
success: function(html) {
 $("#forgetpass").html(html).innerHTML=value;
}
});
document.getElementById("addmoneyform").reset();
}
return false;
}
function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}
function formReset() {
    document.getElementById("myForm").reset();
}