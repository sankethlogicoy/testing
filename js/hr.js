function _get(x) {
    return document.getElementById(x);
}
/*function readCookie(name) {
    var nameEQ = escape(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return unescape(c.substring(nameEQ.length, c.length));
    }
    return null;
}
window.setInterval(function() {
    if(readCookie('loggedout')==1) {
        window.location.assign('http://www.google.com')
        
    }
     
},3000)*/
var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
var pincode = /^\(?([0-9]{1})\)?[-. ]?([0-9]{1})[-. ]?([0-9]{4})$/;
var email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function addUser() {
    var first_name = _get("first_name").value;
    var last_name = _get("last_name").value;
    var date_of_birth = _get("date_of_birth").value;
    var emp_mob = _get("emp_mob").value;
    var emp_desig = _get("emp_desig").value;
    var emp_personal_mailid = _get("emp_personal_mailid").value;
    var emp_office_mailid = _get("emp_office_mailid").value;
    var emp_office_mailid = _get("emp_office_mailid").value;
    var emp_password = _get("emp_password").value;
    var emp_gender = _get("emp_gender").value;
    var emp_type = _get("emp_type").value;
    var emp_dept = _get("emp_dept").value;
    var emp_access_type = _get("emp_access_type").value;
    var emp_id = _get("emp_id").value;

    var emp_address = _get("emp_address").value;
    var emp_city = _get("emp_city").value;
    var emp_state = _get("emp_state").value;
    var emp_pincode = _get("emp_pincode").value;
    var emp_blood_group = _get("emp_blood_group").value;
    var emp_joining_date = _get("emp_joining_date").value;
    var emp_ranking = _get("emp_ranking").value;

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'first_name=' + first_name + '&last_name=' + last_name + '&date_of_birth=' + date_of_birth +
            '&emp_mob=' + emp_mob + '&emp_desig=' + emp_desig + '&emp_personal_mailid=' + emp_personal_mailid +
            '&emp_office_mailid=' + emp_office_mailid + '&emp_password=' + emp_password +
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
            '&emp_ranking=' + emp_ranking +
            '&emp_joining_date=' + emp_joining_date + '&num=1';

    if (first_name == '') {
        alert("First name is empty");
        _get("first_name").focus();
    } else if (last_name == '') {
        alert("Last name is empty");
        _get("last_name").focus();
    } else if (date_of_birth == '') {
        alert("DOB is empty");
        _get("date_of_birth").focus();
    } /*else if (emp_mob == '') {
        alert("Mobile no is empty");
        _get("emp_mob").focus();
    } else if (!emp_mob.match(phoneno)) {
        alert("Not a valid Phone Number Please enter 10 digit mobile no");
        _get("emp_mob").focus();
    } */else if (emp_personal_mailid == '') {
        alert("Personal email id is empty");
        _get("emp_personal_mailid").focus();
    } else if (!emp_personal_mailid.match(email)) {
        alert("Please enter valid email address");
        _get("emp_personal_mailid").focus();
    } else if (emp_office_mailid == '') {
        alert("Office email id is empty");
        _get("emp_office_mailid").focus();
    } else if (!emp_office_mailid.match(email)) {
        alert("Please enter valid email address");
        _get("emp_office_mailid").focus();
    } else if (emp_desig == '') {
        alert("Designation is empty");
        _get("emp_desig").focus();
    } /*else if (emp_gender == '0') {
        alert("Please select type of the gender");
        _get("emp_gender").focus();
    }*/ else if (emp_type == '0') {
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
    } /*else if (emp_address == '') {
        alert("Employee Address  is empty");
        _get("emp_address").focus();
    } else if (emp_city == '') {
        alert("Employee city is empty");
        _get("emp_city").focus();
    } else if (emp_state == '') {
        alert("Employee state  is empty");
        _get("emp_state").focus();
    } else if (emp_pincode == '') {
        alert("Pin code is empty");
        _get("emp_pincode").focus();
    } else if (!emp_pincode.match(pincode)) {
        alert("Please enter 6 digit pincode no");
        _get("emp_pincode").focus();
    } else if (emp_blood_group == '') {
        alert("Employee Blood group is empty");
        _get("emp_blood_group").focus();
    } else if (emp_joining_date == '') {
        alert("Employee joining date is empty");
        _get("emp_joining_date").focus();
    }*/ else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#adduser").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("adduser").innerHTML = "<b class='success'>New Employee created successfully</b>";
                    _get("addform").reset();
                } else {
                    _get("adduser").innerHTML = "<b class='error'>Employee id or employe mail id already exist</b>";
                }

            }
        });
        //_get("addform").reset();
    }
    return false;

}

function passUpdateValues(name, last_name, date_of_birth, emp_personal_mailid,
        emp_office_mailid, emp_type, emp_dept, emp_access_type, empid,emp_desig, emp_ranking, login_id) {

    _get("first_name1").value = name;
    _get("last_name2").value = last_name;
    _get("date_of_birth1").value = date_of_birth;
    
    _get("emp_desig1").value = emp_desig;
    _get("emp_personal_mailid1").value = emp_personal_mailid;
    _get("emp_office_mailid1").value = emp_office_mailid;
    
    _get("emp_type1").value = emp_type;
    _get("emp_dept1").value = emp_dept;
    _get("emp_access_type1").value = emp_access_type;
    _get("emp_id1").value = empid;
    
    _get("emp_ranking1").value = emp_ranking;

    _get("login_id").value = login_id;



    $('#myModal').modal('show');
}

function updateEmployee() {

    var first_name = _get("first_name1").value;
    var last_name = _get("last_name2").value;
    var date_of_birth = _get("date_of_birth1").value;
     
    var emp_desig = _get("emp_desig1").value;
    var emp_personal_mailid = _get("emp_personal_mailid1").value;
    var emp_office_mailid = _get("emp_office_mailid1").value;

    
    var emp_type = _get("emp_type1").value;
    var emp_dept = _get("emp_dept1").value;
    var emp_access_type = _get("emp_access_type1").value;
    var emp_id = _get("emp_id1").value;

    
    var login_id = _get("login_id").value;
    var emp_ranking = _get("emp_ranking1").value;
    var dataString = 'first_name=' + first_name + '&last_name=' + last_name + '&date_of_birth=' + date_of_birth +
             '&emp_desig=' + emp_desig + '&emp_personal_mailid=' + emp_personal_mailid +
            '&emp_office_mailid=' + emp_office_mailid +
             
            '&emp_type=' + emp_type +
            '&emp_dept=' + emp_dept +
            '&emp_access_type=' + emp_access_type +
            '&emp_id=' + emp_id +
             
            '&emp_ranking=' + emp_ranking +
            '&id=' + login_id + '&num=3';
    if (first_name == '') {
        alert("First name is empty");
        _get("first_name1").focus();
    } else if (last_name == '') {
        alert("Last name is empty");
        _get("last_name2").focus();
    } else if (date_of_birth == '') {
        alert("DOB is empty");
        _get("date_of_birth1").focus();
    }  else if (emp_personal_mailid == '') {
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
    } else if (emp_desig == '') {
        alert("Designation is empty");
        _get("emp_desig1").focus();
    } else if (emp_id == '') {
        alert("Emp id is empty");
        _get("emp_id1").focus();
    }   else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
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
                } else {
                    _get("updateuser").innerHTML = "<b class='error'>please check your emp id</b>";
                }

            }
        });
        // _get("update").reset();
    }
    return false;

}

function addRecruitNewTech() {
    var rec_dept = _get("rec_dept").value;
    var rec_newtech = _get("rec_newtech").value;
    var dataString = 'rec_dept=' + rec_dept + '&rec_newtech=' + rec_newtech + '&num=6';
    if (rec_dept == '0') {
        alert("Please select type of department ");
        _get("rec_dept").focus();
    } else if (rec_newtech == '') {
        alert("Please enter you would like to add new tech ");
        _get("rec_newtech").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#addtech").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("addtech").innerHTML = "<b class='success'>New tech added successfully</b>";
                    _get("addnewtech").reset();
                } else {
                    _get("addtech").innerHTML = "<b class='error'>please check your query</b>";
                }

            }
        });
        //_get("addnewtech").reset();
    }
    return false;

}

function requestNewRecruitement() {
    var dept_name = _get("dept_name").value;
    var tech_name = _get("tech_name").value;
    var skill_set = _get("skill_set").value;
    var date_of_posting = _get("date_of_posting").value;
    var requirement_id = _get("requirement_id").value;
    var dataString = 'dept_name=' + dept_name + '&tech_name=' + tech_name +
            '&skill_set=' + skill_set + '&date_of_posting=' + date_of_posting + '&requirement_id=' + requirement_id + '&num=8';
    if (dept_name == '0') {
        alert("Please select type of dept ");
        _get("dept_name").focus();
    } else if (skill_set == '') {
        alert("Please enter skillsets");
        _get("skill_set").focus();
    } else if (date_of_posting == '') {
        alert("Please enter the date");
        _get("date_of_posting").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#sendrecruitmentreq").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("sendrecruitmentreq").innerHTML = "<b class='success'>Recruitement Request Send successfully</b>";
                    _get("additrequestform").reset();
                    getRequiremetid();
                } else {
                    _get("sendrecruitmentreq").innerHTML = "<b class='error'>please check your database</b>";
                }

            }
        });
        //_get("addnewtech").reset();
    }
    return false;

}

function addTestEntry() {
    var candidate_name = _get("candidate_name1").value;
    var total_marks = _get("total_marks").value;
    var obtained_marks = _get("obtained_marks").value;
    var candidate_id = _get("candidate_id1").value;
    var dataString = 'candidate_name=' + candidate_name + '&total_marks=' + total_marks +
            '&obtained_marks=' + obtained_marks +
            '&candidate_id=' + candidate_id + '&num=10';
    if (candidate_name == '0') {
        alert("Please select candidate name ");
        _get("candidate_name1").focus();
    } else if (total_marks == '') {
        alert("Please enter total marks");
        _get("total_marks").focus();
    } else if (obtained_marks == '') {
        alert("Please enter obtained marks");
        _get("obtained_marks").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#testentry").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("testentry").innerHTML = "<b class='success'>Test result submit successfully</b>";
                    _get("testentryform").reset();
                    getTestUpdateFun();
                } else {
                    _get("testentry").innerHTML = "<b class='error'>please check your database</b>";
                }
                if (msg == "update") {
                    _get("testentry").innerHTML = "<b class='success'>Your marks has been updated successfully</b>";
                    _get("testentryform").reset();
                    getTestUpdateFun();
                }
                if (msg == "updated") {
                    _get("testentry").innerHTML = "<b class='success'>Your marks already had submitted.</b>";
                    _get("testentryform").reset();
                    getTestUpdateFun();
                }


            }
        });
        //_get("addnewtech").reset();
    }
    return false;

}

function addRating() {
    var candidate_id = _get("candidate_id2").value;
    var candidate_name = _get("candidate_name2").value;
    var candidate_ranking = _get("candidate_ranking").value;

    var dataString = 'candidate_id=' + candidate_id + '&candidate_name=' + candidate_name +
            '&candidate_ranking=' + candidate_ranking + '&num=14';
    if (candidate_id == '0') {
        alert("Please select candidate id ");
        _get("candidate_id2").focus();
    } else if (candidate_ranking == '0') {
        alert("Please select candidate ranking ");
        _get("candidate_ranking").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#canranking").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("canranking").innerHTML = "<b class='success'>Test result submit successfully</b>";
                    _get("canrankingform").reset();
                    getRatingFun();
                } else {
                    _get("canranking").innerHTML = "<b class='error'>please check your database</b>";
                }
                if (msg == "update") {
                    _get("canranking").innerHTML = "<b class='success'>Your vote has been updated successfully</b>";
                    _get("canrankingform").reset();
                    getRatingFun();
                }
                if (msg == "updated") {
                    _get("canranking").innerHTML = "<b class='success'>Your vote already had submitted</b>";
                    _get("canrankingform").reset();
                    getRatingFun();
                }


            }

        });
        //_get("addnewtech").reset();
    }
    return false;

}

function getCandidateId() {
    $.ajax({

        url: "get-hr.php?num=11",
        type: "GET",
        /*success: function(html) {
         $("#candidate_id").html(html).innerHTML = value;
         }*/
        success: function (response) {
            var msg = response;
            if (msg = !"") {
                var splits = response.split('-');
                var numn = splits[1];
                var textdata = splits[0].concat("-");
                ;
                var count = parseInt(numn);
                count++;
                var qrcode = textdata.concat(count);
                _get("candidate_id").value = qrcode;
            } else {
                _get("candidate_id").value = "candidate-1";
            }

        }
    });
}
function getRequiremetid() {
    $.ajax({

        url: "get-hr.php?num=26",
        type: "GET",
        /*success: function(html) {
         $("#candidate_id").html(html).innerHTML = value;
         }*/
        success: function (response) {
            var msg = response;
            if (msg = !"") {
                var splits = response.split('-');
                var numn = splits[1];
                var textdata = splits[0].concat("-");
                ;
                var count = parseInt(numn);
                count++;
                var qrcode = textdata.concat(count);
                _get("requirement_id").value = qrcode;
            }


        }
    });
}


function getPersonlDetails() {
    $.ajax({

        url: "get-hr.php?num=15",
        type: "GET",
        dataType: 'json',
        /*success: function(html) {
         $("#selfappraisel").html(html).innerHTML = value;
         }*/
        success: function (response) {

            _get("self_emp_name").value = response[0]['name'];
            _get("self_emp_desig").value = response[0]['emp_desig'];
            _get("self_emp_dept").value = response[0]['emp_dept'];




        }
    });
}
function getmangerDetails() {
    $.ajax({

        url: "get-hr.php?num=33",
        type: "GET",

        success: function (response) {
            _get("ma_emp_id").innerHTML = response;
        }
    });
}


function selfRatingAppraisel() {
    var self_emp_name = _get("self_emp_name").value;
    var self_emp_desig = _get("self_emp_desig").value;
    var self_emp_dept = _get("self_emp_dept").value;
    var self_emp_total = _get("self_emp_total").value;
    var self_emp_rating = _get("self_emp_rating").value;
    var self_date_of_posting = _get("self_date_of_posting").value;

    var dataString = 'self_emp_name=' + self_emp_name + '&self_emp_desig=' + self_emp_desig +
            '&self_emp_dept=' + self_emp_dept +
            '&self_emp_total=' + self_emp_total +
            '&self_emp_rating=' + self_emp_rating +
            '&self_date_of_posting=' + self_date_of_posting + '&num=16';
    if (self_emp_rating == '') {
        alert("Please enter your rating");
        _get("self_emp_rating").focus();
    } else if (self_emp_rating > 100) {
        alert("Rating digit should not exceed 100");
        _get("self_emp_rating").focus();
    } else if (self_date_of_posting == '') {
        alert("Please enter posting date ");
        _get("self_date_of_posting").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#selfappraisel").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("selfappraisel").innerHTML = "<b class='success'>Your vote has been submitted successfully</b>";

                } else {
                    _get("selfappraisel").innerHTML = "<b class='error'>please check your database</b>";
                }
                if (msg == "update") {
                    _get("selfappraisel").innerHTML = "<b class='success'>Your vote has been updated successfully</b>";

                }
                if (msg == "updated") {
                    _get("selfappraisel").innerHTML = "<b class='success'>Your vote already had submitted</b>";

                }


            }
        });
        //_get("addnewtech").reset();
    }
    return false;

}

function ManagerRatingAppraisel() {
    var ma_emp_name = _get("ma_emp_name").value;
    var ma_emp_dept = _get("ma_emp_dept").value;
    var ma_emp_total = _get("ma_emp_total").value;
    var ma_emp_rating = _get("ma_emp_rating").value;
    var ma_date_of_posting = _get("ma_date_of_posting").value;
    var ma_emp_id = _get("ma_emp_id").value;


    var dataString = 'ma_emp_name=' + ma_emp_name + '&ma_emp_dept=' + ma_emp_dept +
            '&ma_emp_total=' + ma_emp_total +
            '&ma_emp_rating=' + ma_emp_rating +
            '&ma_date_of_posting=' + ma_date_of_posting +
            '&ma_emp_id=' + ma_emp_id +
            '&num=18';
    if (ma_emp_id == '0') {
        alert("Please select employee id");
        _get("ma_emp_id").focus();
    } else if (ma_emp_rating == '') {
        alert("Please enter your rating");
        _get("ma_emp_rating").focus();
    } else if (ma_emp_rating > 100) {
        alert("Rating digit should not exceed 100");
        _get("ma_emp_rating").focus();
    } else if (ma_date_of_posting == '') {
        alert("Please enter posting date ");
        _get("ma_date_of_posting").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#managerappraisel").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("managerappraisel").innerHTML = "<b class='success'>Your vote has been submitted successfully</b>";

                } else {
                    _get("managerappraisel").innerHTML = "<b class='error'>please check your database</b>";
                }
                if (msg == "update") {
                    _get("managerappraisel").innerHTML = "<b class='success'>Your vote has been updated successfully</b>";

                }
                if (msg == "updated") {
                    _get("managerappraisel").innerHTML = "<b class='success'>Your vote already had submitted</b>";

                }


            }
        });
        //_get("addnewtech").reset();
    }
    return false;

}

function hrRatingAppraisel() {

    var hr_emp_name = _get("hr_emp_name").value;
    var hr_emp_desig = _get("hr_emp_desig").value;
    var hr_emp_dept = _get("hr_emp_dept").value;
    var hr_emp_total = _get("hr_emp_total").value;
    var hr_emp_rating = _get("hr_emp_rating").value;
    var hr_date_of_posting = _get("hr_date_of_posting").value;
    var hr_emp_id = _get("hr_emp_id").value;

    var dataString = 'hr_emp_name=' + hr_emp_name + '&hr_emp_desig=' + hr_emp_desig +
            '&hr_emp_dept=' + hr_emp_dept +
            '&hr_emp_total=' + hr_emp_total +
            '&hr_emp_rating=' + hr_emp_rating +
            '&hr_date_of_posting=' + hr_date_of_posting +
            '&hr_emp_id=' + hr_emp_id +
            '&num=20';
    if (hr_emp_id == '0') {
        alert("Please select employee id");
        _get("hr_emp_id").focus();
    } else if (hr_emp_rating == '') {
        alert("Please enter your rating");
        _get("hr_emp_rating").focus();
    } else if (hr_emp_rating > 100) {
        alert("Rating digit should not exceed 100");
        _get("hr_emp_rating").focus();
    } else if (hr_date_of_posting == '') {
        alert("Please enter posting date ");
        _get("hr_date_of_posting").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-hr.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#hrppraisel").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("hrppraisel").innerHTML = "<b class='success'>Your vote has been submitted successfully</b>";

                } else {
                    _get("hrppraisel").innerHTML = "<b class='error'>please check your database</b>";
                }
                if (msg == "update") {
                    _get("hrppraisel").innerHTML = "<b class='success'>Your vote has been updated successfully</b>";

                }
                if (msg == "updated") {
                    _get("hrppraisel").innerHTML = "<b class='success'>Your vote already had submitted</b>";

                }


            }
        });
        //_get("addnewtech").reset();
    }
    return false;

}

function getDeptList(dept) {
    $.ajax({

        url: "get-hr.php?dept_name=" + dept + '&num=7',
        type: "GET",
        /*success: function(html) {
         $("#tech_name").html(html).innerHTML = value;
         }*/
        success: function (response) {
            _get("tech_name").innerHTML = response;
        }
    });
}
function get360Details() {
    $.ajax({

        url: "get-hr.php?num=34",
        type: "GET",
        /*success: function(html) {
         $("#tech_name").html(html).innerHTML = value;
         }*/
        success: function (response) {
            _get("hr_emp_id").innerHTML = response;
        }
    });
}


function getEmployeeName(emp_id) {
    $.ajax({

        url: "get-hr.php?emp_id=" + emp_id + '&num=17',
        type: "GET",
        dataType: 'json',
        /*success: function (response) {
            _get("ma_emp_name").value = response;
        }*/
        success: function (response) {

            _get("ma_emp_name").value = response[0]['ma_emp_name'];
            _get("ma_emp_dept").value = response[0]['ma_emp_dept'];
            




        }
    });
}

function getEmpData(emp_id) {
    $.ajax({

        url: "get-hr.php?emp_id=" + emp_id + '&num=19',
        type: "GET",
        /*success: function(html) {
         $("#hrppraisel").html(html).innerHTML = value;
         }*/
        dataType: 'json',
        /*success: function(html) {
         $("#selfappraisel").html(html).innerHTML = value;
         }*/
        success: function (response) {

            _get("hr_emp_name").value = response[0]['name'];
            _get("hr_emp_desig").value = response[0]['emp_desig'];
            _get("hr_emp_dept").value = response[0]['emp_dept'];




        }
    });
}

function getCandidateName(candidate_id) {
    $.ajax({

        url: "get-hr.php?candidate_id=" + candidate_id + '&num=12',
        type: "GET",
        /*success: function(html) {
         $("#candidate_name1").html(html).innerHTML = value;
         }*/
        success: function (response) {
            var msg = response;
            if (msg != "") {
                _get("candidate_name1").value = msg;


            }


        }
    });
}

function getCandidateNamerating(candidate_id) {
    $.ajax({

        url: "get-hr.php?candidate_id=" + candidate_id + '&num=12',
        type: "GET",
        success: function (response) {
            var msg = response;
            if (msg != "") {

                _get("candidate_name2").value = msg;

            }


        }
    });
}

//function resumevalidate() {
//    var candidate_name = _get("candidate_name").value;
//    var resume = _get("resume").value;
//    var reffered_by = _get("reffered_by").value;
//    var requirement_id1 = _get("requirement_id1").value;
//
//    if (candidate_name == '') {
//        alert("Please enter candidate name");
//        _get("candidate_name").focus();
//        return false;
//    }
//    if (requirement_id1 == '0') {
//        alert("please select requirement id");
//        _get("requirement_id1").focus();
//        return false;
//    }
//    if (reffered_by == '0') {
//        alert("please select refferel name");
//        _get("reffered_by").focus();
//        return false;
//    }
//    if (resume == '') {
//        alert("Please upload resume");
//        _get("resume").focus();
//        return false;
//    }
//    
//
//}

function resumevalidate() {
    var candidate_name = _get("candidate_name").value;
    var resume = _get("resume").value;
    var reffered_by = _get("reffered_by").value;
    var requirement_id1 = _get("requirement_id1").value;
    var candidate_id = _get("candidate_id").value;
    var dataString = 'candidate_name=' + candidate_name + '&resume=' + resume +
            '&reffered_by=' + reffered_by + '&requirement_id=' + requirement_id1 + '&candidate_id=' + candidate_id;
    if (candidate_name == '') {
        alert("Please enter candidate name");
        _get("candidate_name").focus();
        return false;
    } else if (requirement_id1 == '0') {
        alert("please select requirement id");
        _get("requirement_id1").focus();
        return false;
    } else if (reffered_by == '0') {
        alert("please select refferel name");
        _get("reffered_by").focus();
        return false;
    } else if (resume == '') {
        alert("Please copy paste googgle drive path resume");
        _get("resume").focus();
        return false;
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "upload_resume.php",
            data: dataString,
            cache: false,
            /*success: function(html) {
             $("#hrppraisel").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;


                _get("res").innerHTML = response;
                _get("resumeform").reset();
                getResumedetails();




            }
        });
        //_get("addnewtech").reset();
    }
    return false;

}


function getPassword(password) {
    _get("emp_password").value = password;
}

function getEmpid(empid) {
    $.ajax({

        url: "get-hr.php?empid=" + empid + '&num=2',
        type: "GET",

        success: function (response) {
            _get("errordata").value = response;
        }
    });

}
function getResumedetails() {
    getResumedetailsCandidateid();
    getResumedetailsReferelNames();
    getCandidateId();

}
function getTestUpdateFun() {
    getTestUpdateCandidateid();

}
function getRatingFun() {
    getRatingtUpdateCandidateid();

}
function getRatingtUpdateCandidateid() {
    $.ajax({

        url: "get-hr.php?num=31",
        type: "GET",

        success: function (response) {
            _get("candidate_id2").innerHTML = response;
        }
    });

}



function getTestUpdateCandidateid() {
    $.ajax({

        url: "get-hr.php?num=31",
        type: "GET",

        success: function (response) {
            _get("candidate_id1").innerHTML = response;
        }
    });

}

function getResumedetailsCandidateid() {
    $.ajax({

        url: "get-hr.php?num=29",
        type: "GET",

        success: function (response) {
            _get("requirement_id1").innerHTML = response;
        }
    });

}
function getResumedetailsReferelNames() {
    $.ajax({

        url: "get-hr.php?num=30",
        type: "GET",

        success: function (response) {
            _get("reffered_by").innerHTML = response;
        }
    });

}
function getEmpRecord() {
    $.ajax({

        url: "get-hr.php?num=22",
        type: "GET",

        /*success: function(response) {
         //_get("errordata").value = response;
         // alert(response);
         }*/
        success: function (response) {
            var msg = response;
            if (msg = !"") {
                var splits = response.split('-');
                var numn = splits[1];
                var textdata = splits[0].concat("-");
                ;
                var count = parseInt(numn);
                count++;
                var qrcode = "";
                if (count < 10)
                {
                    textdata = textdata.concat("00");
                    qrcode = textdata.concat(count);
                }
                if (count >= 10 && count < 100)
                {
                    textdata = textdata.concat("0");
                    qrcode = textdata.concat(count);
                } else
                {
                    qrcode = textdata.concat(count);
                }

                _get("emp_id").value = qrcode;
            } else {
                _get("emp_id").value = "E-001";
            }
            if (msg == "error")
            {
                _get("emp_id").value = "E-001";
            }

        }
    });

}

function autoChart(name, rank, marks, sum_tot) {

    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var two = rank;
        var one;
        if (two == 10) {
            one = 0;
        } else {
            one = 10 - two;
        }



        var data = google.visualization.arrayToDataTable([
            ['Rating', 'Out of 10'],
            ['Lost Rating', one * 10],
            [name, two * 10]


        ]);

        var options = {
            title: 'Candidate Rating',
            pieHole: 0.4,
            slices: {
                0: {
                    color: '#C71585'
                },
                1: {
                    color: '#006EFF'
                }
            }
        };


        var chart = new google.visualization.PieChart(_get('piechart'));

        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart1);

    function drawChart1() {
        var marks2 = marks;
        var marks1;

        if (marks2 == 100) {
            marks1 = 0;
        } else {
            marks1 = 100 - marks2;
        }



        var data = google.visualization.arrayToDataTable([
            ['Rating', 'Out of 10'],
            ['Lost Marks', marks1 / 10 * 10],
            [name, marks2 / 10 * 10]


        ]);

        var options = {
            title: 'Candidate Marks',
            pieHole: 0.4,
            slices: {
                0: {
                    color: '#008080'
                },
                1: {
                    color: '#9ACD32'
                }
            }
        };

        var chart = new google.visualization.PieChart(_get('piechart1'));

        chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawChart2);

    function drawChart2() {
        var final1 = sum_tot;
        var final2;
        var tot = (final1 * 100) / 110;
        if (tot == 100) {
            final2 = 0;
        } else {
            final2 = 100 - tot;
        }



        var data = google.visualization.arrayToDataTable([
            ['Result', 'Out of 100'],
            ['Lost Marks', final2],
            [name, tot],
        ]);

        var options = {
            title: 'Candidate Result',
            pieHole: 0.4,
            slices: {
                0: {
                    color: '#778899'
                },
                1: {
                    color: '#D2B48C'
                }
            }
        };

        var chart = new google.visualization.PieChart(_get('piechart2'));

        chart.draw(data, options);
    }
    $('#chart_modal').modal('show');
}

function appraiselChart(name, self_rt, man_rt, hr_rt) {

    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var two = self_rt;
        var one;
        if (two == 100) {
            one = 0;
        } else {
            one = 100 - two;
        }



        var data = google.visualization.arrayToDataTable([
            ['Rating', 'Out of 10'],
            ['Lost Rating', one * 10],
            [name, two * 10]


        ]);

        var options = {
            title: 'Self Rating',
            pieHole: 0.4,
            slices: {
                0: {
                    color: '#C71585'
                },
                1: {
                    color: '#006EFF'
                }
            }
        };


        var chart = new google.visualization.PieChart(_get('piechart'));

        chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart1);

    function drawChart1() {
        var marks2 = man_rt;
        var marks1;

        if (marks2 == 100) {
            marks1 = 0;
        } else {
            marks1 = 100 - marks2;
        }



        var data = google.visualization.arrayToDataTable([
            ['Rating', 'Out of 10'],
            ['Lost Marks', marks1 / 10 * 10],
            [name, marks2 / 10 * 10]


        ]);

        var options = {
            title: 'Manager Rating',
            pieHole: 0.4,
            slices: {
                0: {
                    color: '#008080'
                },
                1: {
                    color: '#9ACD32'
                }
            }
        };

        var chart = new google.visualization.PieChart(_get('piechart1'));

        chart.draw(data, options);
    }

    google.charts.setOnLoadCallback(drawChart2);

    function drawChart2() {

        var marks2 = hr_rt;
        var marks1;

        if (marks2 == 100) {
            marks1 = 0;
        } else {
            marks1 = 100 - marks2;
        }



        var data = google.visualization.arrayToDataTable([
            ['Rating', 'Out of 10'],
            ['Lost Rating', marks1 / 10 * 10],
            [name, marks2 / 10 * 10]


        ]);
        var options = {
            title: '360 Degree Rating',
            pieHole: 0.4,
            slices: {
                0: {
                    color: '#778899'
                },
                1: {
                    color: '#D2B48C'
                }
            }
        };

        var chart = new google.visualization.PieChart(_get('piechart2'));

        chart.draw(data, options);
    }
    $('#chart_modal').modal('show');
}

function getRecruitementHistory(name, st, end) {
    $.ajax({

        url: "get-hr.php?username=" + name + '&st=' + st + '&end=' + end + '&num=9',
        type: "GET",
        success: function (html) {
            $("#autofetch").html(html).innerHTML = value;
        }
    });
}
function getRecruitementList(st, end) {
    $.ajax({

        url: "get-hr.php?end=" + end + '&st=' + st + '&num=25',
        type: "GET",
        success: function (html) {
            $("#recruitefetch").html(html).innerHTML = value;
        }
    });
}
function getResumetList(st, end) {
    $.ajax({

        url: "get-hr.php?end=" + end + '&st=' + st + '&num=32',
        type: "GET",
        success: function (html) {
            $("#resumefetch").html(html).innerHTML = value;
        }
    });
}

function getAppraiselHistory(name, st, end) {
    $.ajax({

        url: "get-hr.php?name=" + name + '&st=' + st + '&end=' + end + '&num=21',
        type: "GET",
        success: function (html) {
            $("#autofetch").html(html).innerHTML = value;
        }
    });
}

function deleteUser(empid, rowidd) {
    var strconfirm = confirm("Are you sure you want to Delete?");

    if (strconfirm == true) {
        $.ajax({

            url: "get-hr.php?id=" + empid + '&num=4' + '&rowid=' + rowidd,
            type: "GET",
            /*success: function(html) {
             $("#deleteuser").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("deleteuser").innerHTML = "<b class='success'>Deleted successfully</b>";
                    $('#rowid' + rowidd).hide();
                } else {
                    _get("deleteuser").innerHTML = "<b class='error'>Could'nt delete try agin later </b>";
                }

            }
        })

    }
}

function activeUser(empid, flag) {
	var strconfirm;
	if(flag==0)
	{
     strconfirm= confirm("Are you sure you want to make active?");
}
else
{
strconfirm = confirm("Are you sure you want to make deactive?");	
}
    if (strconfirm == true) {
        $.ajax({

            url: "get-hr.php?id=" + empid + '&num=24' + '&flag=' + flag,
            type: "GET",
            /*success: function(html) {
             $("#deleteuser").html(html).innerHTML = value;
             
             }*/
            success: function (response) {
                var msg = response;
                if (msg == "success") {
                    _get("active-user").innerHTML = "<b class='success'>Employee Activated successfully</b>";
                    getEmployees('', 0, 5);

                } else {
                    _get("active-user").innerHTML = "<b class='error'>Could'nt active try agin later </b>";
                }

            }
        })

    }
}
function init()
{
    getRecruitementHistory('', 0, 5);

}
function appraiselInit()
{
    getAppraiselHistory('', 0, 5);
     
}



function getEmployees(username, st_point, end_point) {
    $.ajax({

        url: "get-hr.php?username=" + username + '&num=5' + '&st_point=' + st_point + '&end_point=' + end_point,
        type: "GET",
        success: function (html) {
            $("#autofetch").html(html).innerHTML = value;
        }
    });
}
function setHireStatus(status_msg, candidate_id, st, endpt) {
    //var dataString = 'candidate_id=' + candidate_id + '&status=' + status_msg,
    if (status_msg == '0') {
        alert("Please select type of the option do you want to update");

    } else {
        var strconfirm = confirm("Are you sure you want to make confirm?");

        if (strconfirm == true) {
            $.ajax({
                type: "GET",
                url: "get-hr.php?candidate_id=" + candidate_id + '&num=27' + '&status_msg=' + status_msg,

                /*success: function(html) {
                 $("#stsusupdate").html(html).innerHTML = value;
                 getRecruitementHistory('',0,5);
                 }*/
                success: function (response) {
                    var msg = response;
                    if (msg == "success") {
                        _get("stsusupdate").innerHTML = "<b class='success'>Candidate status updated successfully</b>";
                        getRecruitementHistory('', st, endpt);

                    } else {
                        _get("stsusupdate").innerHTML = "<b class='error'>Could'nt update try agin later </b>";
                    }

                }
            });

        }
    }
    return false;

}
function getEmpHistory(st_point, end_point) {
    $.ajax({

        url: "get-hr.php?end_point=" + end_point + '&num=23' + '&st_point=' + st_point,
        type: "GET",
        success: function (html) {
            $("#empHistory").html(html).innerHTML = value;
        }
    });
}


function getEmployeesByName(username) {

    alert(username);
}

function getEmployeesBylimit(username, st_point, end_point) {

    $.ajax({

        url: "get-hr.php?username=" + username + '&num=5' + '&st_point=' + st_point + '&end_point=' + end_point,
        type: "GET",
        success: function (html) {
            $("#autofetch").html(html).innerHTML = value;
        }
    });
}
$(document).ready(function () {
    var date_input = $('input[name="emp_joining_date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
});
$(document).ready(function () {
    var date_input = $('input[name="emp_joining_date1"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
});
$(document).ready(function () {
    var date_input = $('input[name="date_of_birth"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
});
$(document).ready(function () {
    var date_input = $('input[name="date_of_birth1"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
});

$(document).ready(function () {
    $('.close').click(function () {
        location.reload();
    });
});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}