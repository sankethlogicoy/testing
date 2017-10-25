function _get(x) {
    return document.getElementById(x);
}

function addMoney() {
    var username = _get("username").value;
    var amount = _get("amount").value;
    var wallet_receipt = _get("wallet_receipt").value;

    if (username == '0') {
        alert("Please select names in the list");
        _get("username").focus();
        return false;
    }
    if (amount == '') {
        alert("Please enter how money do want add");
        _get("amount").focus();
        return false;
    }
    if (amount == '0' || amount == '-0') {
        alert("should not accept zero or minus sign");
        _get("amount").focus();
        return false;
    }
    if (amount.charAt(0) == "0") {
        alert("should not accept zero or minus sign");
        _get("amount").focus();
        return false;
    }


}



function getWalletHistory(username) {
    $.ajax({

        url: "getmoney.php?username=" + username + '&num=2',
        type: "GET",
        success: function(html) {
            $("#autofetch").html(html).innerHTML = value;
        }
    });

}


function updateMoney() {
    var username = _get("username1").value;
    var amount = _get("amount1").value;
    var wallet_receipt = _get("wallet_receipt1").value;
    var user_amount = _get("user_amount").value;
    var dataString = 'username=' + username + '&money=' + -amount + '&wallet_receipt=' + wallet_receipt;
    if (username == '0') {
        alert("Please select names in the list");
        _get("username1").focus();
        return false;
    } else if (amount == '') {
        alert("Please enter how money do want deduct");
        _get("amount1").focus();
        return false;
    }
    if (amount == '0' || amount == '-0') {
        alert("should not accept zero or minus sign");
        _get("amount1").focus();
        return false;
    }
    if (amount.charAt(0) == "0") {
        alert("should not accept zero or minus sign");
        _get("amount1").focus();
        return false;
    } else if (amount >= user_amount) {
        alert("Please Recharge your accpunt we can't process");
        _get("amount1").focus();
        return false;
    } else if (wallet_receipt == '') {
        alert("Please select file to be uploaded ");
        _get("wallet_receipt1").focus();
        return false;
    }
    else if(wallet_receipt1=="")
    {
        alert("please upload the second receipt");
        _get("wallet_receipt1").focus();
    }

}

function dynamicImage(image) {
    $('#myModal').modal('show');
    $('#src1').attr('src', image);


}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function getMoney(username) {
    $.ajax({

        url: "getmoney.php?username=" + username + '&num=1',
        type: "GET",
        success: function(response) {
            var tot = response.replace(/ /g, '')
            if (tot == 0) {
                $("#update_but").prop('disabled', true);
            } else {
                $("#update_but").removeAttr("disabled");
            }
            _get("user_amount").value = tot;
        }
    });

}
function getChart() {
    $.ajax({

        url: "getmoney.php?num=3",
        type: "GET",
         dataType: 'json',
         success: function(response) {
         	 var len = response.length;
              for(var i=0;i<len;i++)
              {
              	alert(response[i]['username']);
              }
             
        }
    });

}
function init() {
	getWalletHistory('');
     //$("#getchart").load("getchart.php");
     //getChart();
    }
    window.onload = init;


/*$(document).ready(function(){

    $("#username1").change(function(){
        var username = $(this).val();
         
        $.ajax({
 type: 'post',
 url: 'getmoney1.php',
 data: {
  username:username
 },
 success: function (response) {
  _get("user_amount").value=response; 
 }
 });
    });

});*/