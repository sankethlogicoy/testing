function _get(x) {
    return document.getElementById(x);
}
function getOldpassword(oldpassword)
{
    var dataString = 'password=' + oldpassword + '&num=2';
    $.ajax({
            type: "POST",
            url: "getPassword.php",
            data: dataString,
            cache: false,
        success: function (response) {

            _get("oldpass").value = response;
           

        }
    });

}
function changePassword() {
    var oldpassword = document.getElementById("oldpassword").value;
    var oldpass = document.getElementById("oldpass").value;
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;
    var dataString = 'password=' + password + '&num=1';

    if (oldpassword == '') {
        alert("Please enter old passwwrd");
        document.getElementById("oldpassword").focus();
    } else if (oldpass != oldpassword) {
        alert("Old password is incorrect please enter correct password");
        document.getElementById("oldpassword").focus();
    } else if (password == '') {
        alert("Please enter your new password");
        document.getElementById("password").focus();
    } else if (password.length < 6) {
        alert("Please Enter Altlear 6 Character");
        document.getElementById("password").focus();
    } else if (password == oldpassword) {
        alert("u have entering old password again please change with new password");
        document.getElementById("password").focus();
    } else if (password2 == '') {
        alert("Please re-enter your new password");
        document.getElementById("password2").focus();
    } else if (password2.length < 6) {
        alert("Please Enter Altlear 6 Character");
        document.getElementById("password2").focus();
    } else if (password != password2) {
        alert("password does not match");
        document.getElementById("password2").focus();
    } else {
// AJAX code to submit form.
        $.ajax({
           type: "POST",
            url: "getPassword.php",
            data: dataString,
            cache: false,
            success: function (html) {
                $("#passwordfetch").html(html).innerHTML = value;
            }
        });
        document.getElementById("changepasssform").reset();
    }
    return false;
}

function forgetPassword() {
    var username = document.getElementById("username").value;
    var dataString = 'username=' + username;
    if (username == '') {
        alert("Please enter your username");
        document.getElementById("username").focus();
    } else {
// AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "getmail.php",
            data: dataString,
            cache: false,
            success: function (html) {
                $("#forgetpass").html(html).innerHTML = value;
            }
        });
        document.getElementById("addmoneyform").reset();
    }
    return false;
}
function sendMessage() {
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    var dataString = 'subject=' + subject+ '&message='+message+ '&num=3';
    if (subject == '') {
        alert("Please enter subject");
        document.getElementById("subject").focus();
    }
    else if (message == '') {
        alert("Please enter message");
        document.getElementById("message").focus();
    }
    else {
// AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "getPassword.php",
            data: dataString,
            cache: false,
           success: function (response) {
 if(response=="success")
 {
     _get("messageid").innerHTML = "<b class='success'>Your message has send  successfully</b>";
     _get("messageform").reset();
 }
 else
 {
     _get("messageid").innerHTML = "<b class='error'>could not send message plz try again later</b>";
 }
        }
        });
       
    }
    return false;
}
 function  uploadPic()
 {
    var resume = document.getElementById("resume").value;  
    if (resume == '') {
        alert("Please select image");
        document.getElementById("resume").focus();
        return false;
    }
 }
 function profileInit()
{
   getProfileData();
   
     
}
function getProfileData()
{
    var dataString = 'num=5';
    $.ajax({
 
            type: "POST",
            url: "getPassword.php",
            data: dataString,
            cache: false,
            dataType: 'json',
        success: function (response) {

            
           
            _get("emp_id").innerHTML = response[0]['emp_id'];
            _get("emp_desig").innerHTML = response[0]['emp_desig'];
             _get("emp_name").innerHTML = response[0]['emp_name'];
              _get("emp_ranking").innerHTML = response[0]['emp_ranking'];
                _get("emp_mob").innerHTML = response[0]['emp_mob'];
                 _get("date_of_birth").innerHTML = response[0]['date_of_birth'];
                  _get("emp_personal_mailid").innerHTML = response[0]['emp_personal_mailid'];
                   _get("emp_dept").innerHTML = response[0]['emp_dept'];
              
               
  $('#pfc_img').attr('src', response[0]['path']);
  $('#src1').attr('src', response[0]['path']);



        }
    });
}
function fetchYourData()
{
     var dataString = 'num=6';
     $.ajax({
            type: "POST",
            url: "getPassword.php",
            data: dataString,
            cache: false,
            dataType: 'json',

        /*success: function(response) {
         //_get("errordata").value = response;
         // alert(response);
         }*/
        success: function (response) {
             
       _get("first_name1").value = response[0]['first_name'];
        _get("last_name2").value = response[0]['last_name'];
        _get("date_of_birth1").value =response[0]['date_of_birth'];
        _get("emp_gender1").value = response[0]['emp_gender'];
        _get("emp_mob1").value = response[0]['emp_mob'];
         _get("emp_desig1").value = response[0]['emp_desig'];
       _get("emp_personal_mailid1").value =  response[0]['emp_personal_mailid'];
        _get("emp_office_mailid1").value = response[0]['emp_username'];
       _get("emp_gender1").value = response[0]['emp_gender'];
        _get("emp_type1").value = response[0]['emp_type'];
        _get("emp_dept1").value = response[0]['emp_dept'];
      _get("emp_access_type1").value = response[0]['emp_access_type'];
         _get("emp_id1").value = response[0]['emp_id'];
          _get("emp_ranking1").value =response[0]['emp_ranking'];
         _get("emp_address1").value =response[0]['emp_address'];
       _get("emp_city1").value = response[0]['emp_city'];
        _get("emp_state1").value = response[0]['emp_state'];
        _get("emp_pincode1").value = response[0]['emp_pincode'];
        _get("emp_blood_group1").value =response[0]['emp_blood_group'];
        _get("emp_joining_date1").value =response[0]['emp_joining_date'];
       


        }
    });
      $('#fetchModel').modal('show');
}
var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
var pincode = /^\(?([0-9]{1})\)?[-. ]?([0-9]{1})[-. ]?([0-9]{4})$/;
var email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function updateEmployee() {

    var first_name = _get("first_name1").value;
    var last_name = _get("last_name2").value;
    var date_of_birth = _get("date_of_birth1").value;
     var emp_mob = _get("emp_mob1").value;
    var emp_desig = _get("emp_desig1").value;
    var emp_personal_mailid = _get("emp_personal_mailid1").value;
    var emp_office_mailid = _get("emp_office_mailid1").value;
    var emp_ranking = _get("emp_ranking1").value;
    var emp_gender = _get("emp_gender1").value;
    var emp_type = _get("emp_type1").value;
    var emp_dept = _get("emp_dept1").value;
    var emp_access_type = _get("emp_access_type1").value;
    var emp_id = _get("emp_id1").value;
    var emp_address = _get("emp_address1").value;
    var emp_city = _get("emp_city1").value;
    var emp_state = _get("emp_state1").value;
    var emp_pincode = _get("emp_pincode1").value;
    var emp_blood_group = _get("emp_blood_group1").value;
    var emp_joining_date = _get("emp_joining_date1").value;
   var dataString = 'first_name=' + first_name + '&last_name=' + last_name + '&date_of_birth=' + date_of_birth +
            '&emp_mob=' + emp_mob + '&emp_desig=' + emp_desig + '&emp_personal_mailid=' + emp_personal_mailid +
            '&emp_office_mailid=' + emp_office_mailid +
            '&emp_gender=' + emp_gender +
            '&emp_type=' + emp_type +
            '&emp_dept=' + emp_dept +
            '&emp_access_type=' + emp_access_type +
            '&emp_id=' + emp_id +
            '&emp_address=' + emp_address +
            '&emp_city=' + emp_city +
            '&emp_state=' + emp_state +
            '&emp_pincode=' + emp_pincode +
            '&emp_blood_group=' + emp_blood_group +
            '&emp_joining_date=' + emp_joining_date +
            '&emp_ranking=' + emp_ranking +
             '&num=7';
    if (first_name == '') {
        alert("First name is empty");
        _get("first_name1").focus();
    } else if (last_name == '') {
        alert("Last name is empty");
        _get("last_name2").focus();
    } else if (date_of_birth == '') {
        alert("DOB is empty");
        _get("date_of_birth1").focus();
    } 
    else if (emp_mob == '') {
        alert("Mobile no is empty");
        _get("emp_mob1").focus();
    } else if (!emp_mob.match(phoneno)) {
        alert("Not a valid Phone Number Please enter 10 digit mobile no");
        _get("emp_mob1").focus();
    } else if (emp_personal_mailid == '') {
        alert("Personal email id is empty");
        _get("emp_personal_mailid1").focus();
    } else if (!emp_personal_mailid.match(email)) {
        alert("Please enter valid email address");
        _get("emp_personal_mailid1").focus();
    } else if (emp_office_mailid == '') {
        alert("Office email id is empty");
        _get("emp_office_mailid1").focus();
    } else if (!emp_office_mailid.match(email)) {
        alert("Please enter valid email address");
        _get("emp_office_mailid1").focus();
    }
    else if (emp_desig == '') {
        alert("Designation is empty");
        _get("emp_desig1").focus();
    }
    else if (emp_gender == '0') {
        alert("Please select type of the gender");
        _get("emp_gender").focus();
    } else if (emp_type == '0') {
        alert("Please select type of the employee");
        _get("emp_type").focus();
    } else if (emp_dept == '0') {
        alert("Please select type of the department");
        _get("emp_dept").focus();
    } else if (emp_access_type == '0') {
        alert("Please select access type of an employee");
        _get("emp_access_type").focus();
    } else if (emp_id == '') {
        alert("Emp id is empty");
        _get("emp_id").focus();
    } 
    else if (emp_address == '') {
        alert("Employee Address  is empty");
        _get("emp_address1").focus();
    } else if (emp_city == '') {
        alert("Employee city is empty");
        _get("emp_city1").focus();
    } else if (emp_state == '') {
        alert("Employee state  is empty");
        _get("emp_state1").focus();
    } else if (emp_pincode == '') {
        alert("Pin code is empty");
        _get("emp_pincode1").focus();
    } else if (!emp_pincode.match(pincode)) {
        alert("Please enter 6 digit pincode no");
        _get("emp_pincode1").focus();
    }
    else if (emp_blood_group == '0') {
        alert("Employee Blood group is empty");
        _get("emp_blood_group1").focus();
    } else if (emp_joining_date == '') {
        alert("Employee joining date is empty");
        _get("emp_joining_date1").focus();
    }

      else {
        // AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "getPassword.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#updateuser").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("updateuser").innerHTML = "<b class='success'>Employee update successfully</b>";
                    _get("update").reset();
                    getProfileData();
                } else {
                    _get("updateuser").innerHTML = "<b class='error'>please check your emp id</b>";
                }

            }
        });
        // _get("update").reset();
    }
    return false;

}

$(document).ready(function () {
    var date_input = $('input[type="date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
});