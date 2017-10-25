function _get(x) {
    return document.getElementById(x);
}
function getTodayTask() {
	var dataString='num=1';
    $.ajax({

        url: "get-task.php",
        type: "POST",
        data:dataString,
        /*success: function(html) {
         $("#tech_name").html(html).innerHTML = value;
         }*/
        success: function (response) {
            _get("get-today-data").innerHTML = response;
        }
    });
     $('#get-today').modal('show');
}
function getCompletedTask() {
	var dataString='num=2';
    $.ajax({

        url: "get-task.php",
        type: "POST",
        data:dataString,
        /*success: function(html) {
         $("#tech_name").html(html).innerHTML = value;
         }*/
        success: function (response) {
            _get("get-compl-data").innerHTML = response;
        }
    });
     $('#get-compl').modal('show');
}