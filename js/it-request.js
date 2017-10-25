function _get(x) {
    return document.getElementById(x);
}

function itrequisitionRequest() {

    var item_name = _get("it_item_type").value;

    var dataString = 'item_name=' + item_name + '&num=ittype';;

    if (item_name == '') {
        alert("Please enter Item name");
        _get("it_item_type").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-it.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#addrequisition1").html(html).innerHTML = value;
            }
        });
        _get("requisitionform1").reset();
    }
    return false;
}




function addItRequest() {
    var req_type = _get("req_type").value;
    var req_desc = _get("req_desc").value;
    var req_priority = _get("req_priority").value;

    var dataString = 'req_type=' + req_type + '&req_desc=' + req_desc + '&req_priority=' + req_priority + '&num=itreq';
    if (req_type == '0') {
        alert("Please select type of the request do you want to send");
        _get("req_type").focus();
    } else if (req_desc == "") {
        alert("Please enetr description about the request");
        _get("req_desc").focus();
    } else if (req_priority == '0') {
        alert("Please select type of the priority of request do you want to send");
        _get("req_priority").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({
            type: "GET",
            url: "get-it.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#addit").html(html).innerHTML = value;
            }
        });
        _get("additrequestform").reset();
    }
    return false;

}

function setItRequestStatus(id, status_msg, priority, admin_comment) {
    var dataString = 'id=' + id + '&status=' + status_msg + '&priority=' + priority + '&admin_comment=' + admin_comment + '&num=status';

    // AJAX code to submit form.
    if (status_msg == '0') {
        alert("Please select type of the request do you want to send");
        _get("status_msg").focus();
    } else {
        $.ajax({
            type: "GET",
            url: "get-it.php",
            data: dataString,
            cache: false,
            success: function(html) {
                $("#itrequest").html(html).innerHTML = value;
            }
        });

    }
    return false;
}

function setICommentStatus(id, comment_msg, priority) {
    var dataString = 'id=' + id + '&comment_msg=' + comment_msg + '&priority=' + priority + '&num=comment';

    // AJAX code to submit form.
    $.ajax({
        type: "GET",
        url: "get-it.php",
        data: dataString,
        cache: false,
        success: function(html) {
            $("#itrequest").html(html).innerHTML = value;
        }
    });

}

function setEscalation(req_type, send_by) {
    _get("req_typein").value = req_type;
    _get("send_byin").value = send_by;
    _get("req_typeex").value = req_type;
    _get("send_byex").value = send_by;
    $('#escalation_modal').modal('show');
}

function escalationRequest() {
    var req_type = _get("req_typein").value;
    var send_by = _get("send_byin").value;
    var escalation_commentin = _get("escalation_commentin").value;
    var send_toin = _get("send_toin").value;

    if (escalation_commentin == '') {
        alert("Please fill the box");
        _get("escalation_commentin").focus();
    } else if (send_toin == '0') {
        alert("Please select mails in the list");
        _get("send_toin").focus();
        return false;
    } else {
        // AJAX code to submit form.
        $.ajax({

            url: 'get-it.php?req_type=' + req_type + '&send_by=' + send_by + '&escalation_commentin=' + escalation_commentin +
                '&send_toin=' + send_toin + '&num=escalation',
            type: "GET",
            success: function(html) {
                $("#escalation_req").html(html).innerHTML = value;
            }
        });
    }
    return false;

}

function escalationRequest1() {
    var req_type = _get("req_typeex").value;
    var send_by = _get("send_byex").value;
    var escalation_commentin = _get("escalation_commentex").value;
    var send_toin = _get("send_toex").value;
    var email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (escalation_commentin == '') {
        alert("Please fill the box");
        _get("escalation_commentex").focus();
    } else if (send_toin == '') {
        alert("Please enter the mail id");
        _get("send_toex").focus();
        return false;
    } else if (!send_toin.match(email)) {
        alert("Please enter valid email address");
        _get("send_toex").focus();
    } else {
        // AJAX code to submit form.
        $.ajax({

            url: 'get-it.php?req_type=' + req_type + '&send_by=' + send_by + '&escalation_commentin=' + escalation_commentin +
                '&send_toin=' + send_toin + '&num=escalation',
            type: "GET",
            success: function(html) {
                $("#escalation_req").html(html).innerHTML = value;
            }
        });
    }
    return false;

}

function getItData(username,st,end) {
    $.ajax({

        url: "get-it.php?username=" + username +'&st=' + st +'&end=' + end + '&num=2',
        type: "GET",
        success: function(html) {
            $("#autofetch").html(html).innerHTML = value;
        }
    });

}
$(document).ready(function() {
    $('.close').click(function() {
        location.reload();
    });
});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}