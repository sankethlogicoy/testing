function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

function getEmpid(empid)
{
	$.ajax({
		 
		 url:"get-admin.php?empid="+empid+ '&num=getempid',
		 type:"GET",
		  success:function(html){
			 $("#adduser").html(html).innerHTML=value;
		 }
	 });
	 
}

function addUser()
	{
 var name = document.getElementById("name").value;
var password = document.getElementById("password").value;
var password2 = document.getElementById("password2").value;
 var em_type = document.getElementById("em_type").value;
var emp_id = document.getElementById("emp_id").value;
var emp_desig = document.getElementById("emp_desig").value;
var errordata = document.getElementById("errordata").value;

 
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name=' + name + '&password=' + password + '&type=' + em_type + '&emp_id=' + emp_id + '&emp_desig=' + emp_desig+ '&num=adduser';
if (name == '') {
alert("Username is empty");
document.getElementById("name").focus();
}
else if(emp_id == '')
{
	alert("Emp id is empty");
	document.getElementById("emp_id").focus();
}
else if(emp_id == errordata)
{
	alert("Employee id already exist in the database try another");
	document.getElementById("emp_id").focus();
}
else if(password == '')
{
	alert("password is empty");
	document.getElementById("password").focus();
}
else if (password.length<6) {
		alert("Please Enter Altlear 6 Character");
		document.getElementById("password").focus();
	}
else if(password2 == '')
{
	alert("password is empty");
	document.getElementById("password2").focus();
}

	else if (password2.length<6) {
		alert("Please Enter Altlear 6 Character");
		document.getElementById("password2").focus();
	}
else if(password != password2)
{
	alert("password does not match");
	document.getElementById("password2").focus();
}
else if (em_type == '0') {
alert("Please select type of the employee");
document.getElementById("em_type").focus();
} 

else if(emp_desig == '')
{
	alert("Designation is empty");
	document.getElementById("emp_desig").focus();
}


 
 else {
// AJAX code to submit form.
$.ajax({
type: "GET",
url: "get-admin.php",
data: dataString,
cache: false,
success: function(html) {
 $("#adduser").html(html).innerHTML=value;

}
});
document.getElementById("addform").reset();
}
return false;
 
}

 function deleteUser(empid,rowid)
  { 
   var strconfirm = confirm("Are you sure you want to Delete?");
	  
    if (strconfirm == true) {
    $.ajax({
     
     url:"../admin/get-admin.php?id="+empid+ '&num=deleteuser'+ '&rowid=' + rowid,
     type:"GET",
     success:function(html){
       $("#updateuser").html(html).innerHTML=value;
	   
     }
   })

  }
  }
  
  function passUpdateValues(name,empid,emp_type,emp_desig,login_id)
  {
	  document.getElementById("name").value=name;
	   document.getElementById("emp_id").value=empid;
	    document.getElementById("emp_type").value=emp_type;
	document.getElementById("emp_desig").value=emp_desig;
	 document.getElementById("login_id").value=login_id;
	 
		  
	   $('#myModal').modal('show');
  }
  function updateEmployee()
	{
  var name = document.getElementById("name").value;
 
 var emp_type = document.getElementById("emp_type").value;
var emp_id = document.getElementById("emp_id").value;
var emp_desig = document.getElementById("emp_desig").value;
var login_id = document.getElementById("login_id").value;
var dataString = 'name=' + name + '&emp_type=' + emp_type + '&login_id=' + login_id + '&emp_id=' + emp_id + '&emp_desig=' + emp_desig+ '&num=updateuser';
if (name == '') {
alert("Username is empty");
document.getElementById("name").focus();
}
 else if(emp_id == '')
{
	alert("Emp id is empty");
	document.getElementById("emp_id").focus();
}
else if (emp_type == '0') {
alert("Please select type of the employee");
document.getElementById("emp_type").focus();
} 
else if(emp_desig == '')
{
	alert("Designation is empty");
	document.getElementById("emp_desig").focus();
}

else {
// AJAX code to submit form.
$.ajax({
type: "GET",
url: "get-admin.php",
data: dataString,
cache: false,
success: function(html) {
 $("#updateuser").html(html).innerHTML=value;

}

});$('#myModal').modal('hide');
document.getElementById("addform").reset();
}

return false;
 
}

function addTask()
	{
 var description = document.getElementById("description").value;
var due_date = document.getElementById("due_date").value;
var status1 = document.getElementById("status").value;
 var completed_date = document.getElementById("completed_date").value;
 var hours_saved = document.getElementById("hours_saved").value;
  var username = document.getElementById("username").value;
   var assigned_by = document.getElementById("assigned_by").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'description=' + description + '&due_date=' + due_date + '&status=' + status1 + '&completed_date=' + completed_date + '&hours_saved=' + hours_saved + '&username=' + username+ '&assigned_by=' + assigned_by+ '&num=addtask';
 
if (description == '') {
alert("Please Fill description");
document.getElementById("description").focus();
} 

else if (due_date == '') {
alert("Please Fill due date");
document.getElementById("due_date").focus();
} 
else if (username == '0') {
alert("Please select names in the list");
document.getElementById("username").focus();
} 
 else {
// AJAX code to submit form.
$.ajax({
type: "GET",
url: "get-admin.php",
data: dataString,
cache: false,
success: function(html) {
 $("#saveuser").html(html).innerHTML=value;
}
});
document.getElementById("addform").reset();
}
return false;
}

function getUser(username){
 $.ajax({
		 
		 url:"get-admin.php?username="+username+ '&num=autofetch',
		 type:"GET",
		  success:function(html){
			 $("#autofetch").html(html).innerHTML=value;
		 }
	 });

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

 