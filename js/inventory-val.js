//editing the added inventory item
function _get(x) {
    return document.getElementById(x);
}
function addNewInventoryedit(){

var item_name = document.getElementById("item_name_edit").value;
var edit_id = document.getElementById("edit_id").value;

var item_type = document.getElementById("item_type_edit").value;
var item_qr = document.getElementById("item_qrcode_edit").value;
var item_desc = document.getElementById("item_desc_edit").value;
var item_price = document.getElementById("item_price_edit").value;
var item_purchase = document.getElementById("item_purchase_date_edit").value;
 
var dataString = 'item_name=' + item_name + '&item_type=' + item_type+ '&item_desc=' + item_desc+ '&item_price=' + item_price+
'&item_purchase=' + item_purchase+'&item_qr=' + item_qr+'&edit_id=' + edit_id;
 
if (item_name == '') {
alert("Please enter Item name");
document.getElementById("item_name").focus();
}
 
else if (item_type == '') {
alert("Please enter Item Type");
document.getElementById("item_type").focus();
}
 
else if (item_desc == '') {
alert("Please enter item description");
document.getElementById("item_desc").focus();
}
 
 
else {
// AJAX code to submit form.
$.ajax({
type: "GET",
url: "getqr-code-edit.php",
data: dataString,
cache: false,
/*success: function(html) {
 $("#inventory_edit").html(html).innerHTML=value;
}*/
});
document.getElementById("inventoryeditform").reset();
}
return false;
}

//request allotment

function allotmentRequest(){
var item_name = document.getElementById("item_name_req_allot").value;
var item_type = document.getElementById("item_type_req_allot").value;
var item_desc = document.getElementById("item_descreq_allot").value;
 
var dataString = 'item_name=' + item_name + '&item_type=' + item_type+ '&item_desc=' + item_desc;
 
if (item_name == '') {
alert("Please enter Item name");
document.getElementById("item_name").focus();
}
 
else if (item_type == '') {
alert("Please enter Item Type");
document.getElementById("item_type").focus();
}
 
else if (item_desc == '') {
alert("Please enter item description");
document.getElementById("item_desc").focus();
}
 
 
else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "request-allotment.php",
data: dataString,
cache: false,
success: function(html) {
 $("#addAllotment").html(html).innerHTML=value;
}
});
document.getElementById("req-allotment-form").reset();
}
return false;
}


//checkout request by employee
function checkoutRequest(){
var item_name = document.getElementById("checkout_item_name").value;
var item_type = document.getElementById("checkout_item_type").value;
var item_desc = document.getElementById("checkout_item_desc").value;
var qr_code = document.getElementById("item_qrcode1").value;
var dataString = 'item_name=' + item_name + '&item_type=' + item_type+ '&item_desc=' + item_desc + '&qr_code=' + qr_code;
 
if (item_name == '') {
alert("Please enter Item name");
document.getElementById("checkout_item_name").focus();
}
 
else if (item_type == '') {
alert("Please enter Item Type");
document.getElementById("checkout_item_type").focus();
}
 
else if (item_desc == '') {
alert("Please enter item description");
document.getElementById("checkout_item_desc").focus();
}
 
 
else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "add-checkout.php",
data: dataString,
cache: false,
success: function(html) {
 $("#addcheckout").html(html).innerHTML=value;
}
});
document.getElementById("checkoutform").reset();
}
return false;
}



//equipment request 
function requisitionRequest(){
var item_name = document.getElementById("item_name_equip").value;
var item_type = document.getElementById("item_type_equip").value;
var item_desc = document.getElementById("item_desc_equip").value;
 
var dataString = 'item_name=' + item_name + '&item_type=' + item_type+ '&item_desc=' + item_desc;
 
if (item_name == '') {
alert("Please enter Item name");
document.getElementById("item_name").focus();
}
 
else if (item_type == '') {
alert("Please enter Item Type");
document.getElementById("item_type").focus();
}
 
else if (item_desc == '') {
alert("Please enter item description");
document.getElementById("item_desc").focus();
}
 
 
else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "add-requisition.php",
data: dataString,
cache: false,
success: function(html) {
 $("#addrequisition").html(html).innerHTML=value;
}
});
document.getElementById("requisitionform").reset();
}
return false;
}

//adding new inventory
function addNewInventoryRequest(){
var item_name = document.getElementById("item_name").value; 
var item_desc = document.getElementById("item_desc").value;
var item_type = document.getElementById("item_type").value;
var item_price = document.getElementById("item_price").value;
 
var item_purchase_date = document.getElementById("item_purchase_date").value;
var item_qrcode = document.getElementById("item_qrcode").value;
var dataString = 'item_name=' + item_name + '&item_type=' + item_type+ '&item_desc=' + item_desc+ '&item_price=' + item_price+'&item_purchase_date=' + item_purchase_date+'&item_qrcode=' + item_qrcode+ '&num=inventory';
if (item_name == '0') {
alert("Please enetr item name");
document.getElementById("item_name").focus();
} 
else if (item_type == '') {
alert("Please enter item type");
document.getElementById("item_type").focus();
}
else if (item_desc == '') {
alert("Please enter item description");
document.getElementById("item_desc").focus();
}
else if (item_price == '') {
alert("Please enter item price");
document.getElementById("item_price").focus();
}

 
else if (item_purchase_date == '') {
alert("Please enter item date of puchase");
document.getElementById("item_purchase_date").focus();
}
else {
// AJAX code to submit form.
$.ajax({
type: "GET",
url: "getqr-code.php",
data: dataString,
cache: false,
success: function(html) {
 $("#addinventory").html(html).innerHTML=value;
}
});
document.getElementById("addinventoryform").reset();
}
return false;

}
//item price set to number
function isNumberKey(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;

   return true;
}

//set approval for chekout item
function setApproval(id,approval)
{
var dataString = 'id=' + id + '&approval=' + approval;
$.ajax({
type: "GET",
url: "set-requisition-request.php",
data: dataString,
cache: false,
success: function(html) {
 $("#requisitionrequest").html(html).innerHTML=value;
}
});	 
}
//approval for allotment item
function setAllotApproval(id,approval)
{
var dataString = 'id=' + id + '&approval=' + approval;
$.ajax({
type: "GET",
url: "set-allotrequisition-request.php",
data: dataString,
cache: false,
success: function(html) {
 $("#updateallotrequest").html(html).innerHTML=value;
}
});	 
}

//get the qr code for new inventory 

function getQRCode(item_name)
{
 
var dataString = 'item_name=' + item_name+ '&num=getqr';
$.ajax({
type: "GET",
url: "getqr-code.php",
data: dataString,
cache: false,
/*success: function(html) {
 $("#addinventory").html(html).innerHTML=value;
}*/
success: function(response) {
            var msg = response;
            if (msg = !"") {
                var splits = response.split('-');
                var numn = splits[1];
                var textdata = splits[0].concat("-");;
                var count = parseInt(numn);
                count++;
                var qrcode = textdata.concat(count);
                _get("item_qrcode").value = qrcode;
            }  

        }
}); 
}
//qr code for request list
function getNames_Qr(item_name)
{
 
var dataString = 'item_name='+ item_name+ '&num=getname';;

$.ajax
({
type: "GET",
url: "getqr-code.php",
data: dataString,
cache: false,
success: function(html)
{
$("#item_qrcode").html(html);
} 
});
}
//get qr-code for allotment request for employee

function getNames_Qrcode(item_name)
{
 
var dataString = 'item_name='+ item_name+ '&num=getname2';

$.ajax
({
type: "GET",
url: "getqr-code.php",
data: dataString,
cache: false,
success: function(html)
{
$("#item_qrcode1").html(html);
} 
});
}

//get the qr code for allotment request
function getNames_Qr2(item_name)
{
 
var dataString = 'item_name='+ item_name+ '&num=getname3';

$.ajax
({
type: "GET",
url: "getqr-code.php",
data: dataString,
cache: false,
success: function(html)
{
$("#item_qrcode2").html(html);
} 
});
}

//inventory allotment request

function inventotyAllotment(){
var item_name = document.getElementById("item_name_allot").value;  
  var item_checked_date = document.getElementById("item_checked_date1").value;
  var item_qrcode = document.getElementById("item_qrcode2").value;  
 var dataString = 'item_name=' + item_name +  '&item_qrcode=' + item_qrcode+ '&item_checked_date=' + item_checked_date+ '&num=allot';
if (item_name == '0') {
alert("Please enetr item name");
document.getElementById("item_name").focus();
} 

else if (item_checked_date == "") {
alert("Please enter the date");
document.getElementById("item_checked_date").focus();
}
 
else {
// AJAX code to submit form.
$.ajax({
type: "GET",
url: "getinventory-allotment.php",
data: dataString,
cache: false,
success: function(html) {
 $("#inventoryallot1").html(html).innerHTML=value;
}
});
document.getElementById("inventoryallotform").reset();
}
return false;

}
//get allotment list 
function getAllocationName(username){
 $.ajax({
		 
		 url:"getinventory-allotment.php?username="+username+ '&num=userfetch',
		 type:"GET",
		  success:function(html){
			 $("#allot_table").html(html).innerHTML=value;
		 }
	 });

}
//set approval for chekout item
 function setApproval1(id,approval)
{
var dataString = 'id=' + id + '&approval=' + approval;
$.ajax({
type: "GET",
url: "set-checkout-request.php",
data: dataString,
cache: false,
success: function(html) {
 $("#checkoutrequest1").html(html).innerHTML=value;
}
});	 
}
//set status for inventory item while returned by employee
 function setStatus(id,approval)
{

var dataString = 'id=' + id + '&approval=' + approval;
$.ajax({
type: "GET",
url: "set-checkin-status.php",
data: dataString,
cache: false,
success: function(html) {
 $("#checkinrequest").html(html).innerHTML=value;
}
});	 
}
//history on search
 function gethistory(username){
 $.ajax({
		 
		 url:"search.php?username="+username+ '&num=5',
		 type:"GET",
		  success:function(html){
			 $("#history_table").html(html).innerHTML=value;
		 }
	 });
}
//request list on search
function get_request_list(username){
 $.ajax({
		 
		 url:"request_search.php?username="+username+ '&num=6',
		 type:"GET",
		  success:function(html){
			 $("#request_table").html(html).innerHTML=value;
		 }
	 });
}
//delete btn in request allotment list
function delete_list(username){
 $.ajax({
		 
		 url:"delete-item.php?username="+username,
		 type:"GET",
		  success:function(html){
			 $("#delete_request_inv").html(html).innerHTML=value;
		 }
	 });
}
//delete btn in inventory history
function delete_list1(username){
	var strconfirm = confirm("Are you sure you want to make confirm?");

        if (strconfirm == true) {
 $.ajax({
		 
		 url:"delete-item1.php?username="+username,
		 type:"GET",
		  success:function(html){
			 $("#delete_request1").html(html).innerHTML=value;
		 }
	 });
}
}

function delete_list_req(username){
	var strconfirm = confirm("Are you sure you want to make confirm?");

        if (strconfirm == true) {
 $.ajax({
		 
		 url:"delete.php?username="+username,
		 type:"GET",
		  success:function(html){
			 $("#request_delete").html(html).innerHTML=value;
		 }
	 });
}
}


function getchr(){
 $.ajax({
		 
		 url:"getchart.php",
		 type:"GET",
		  success:function(html){
			 $("#chartid").html(html).innerHTML=value;
		 }
	 });
}

function checkin_pagi(st,end){
 $.ajax({
		 
		url: "get-checkin.php?end=" + end + '&st=' + st+'&num=25',
        type: "GET",
        success: function(html) {
            $("#recruitefetch").html(html).innerHTML = value;
		 }
	 });
}

function  checkout_pagi(st,end){
 $.ajax({
		 
		url: "get-checkin.php?end=" + end + '&st=' + st+'&num=26',
        type: "GET",
        success: function(html) {
            $("#checkout_pagi").html(html).innerHTML = value;
		 }
	 });
}


//edit inventory item
function edit_list(item_name,item_type,itme_qr,item_desc,item_price,purchase_date,edit_id){

 document.getElementById("item_name_edit").value=item_name;
  document.getElementById("item_type_edit").value=item_type;
   document.getElementById("item_qrcode_edit").value=itme_qr;
    document.getElementById("item_desc_edit").value=item_desc;
     document.getElementById("item_price_edit").value=item_price;
      document.getElementById("item_purchase_date_edit").value=purchase_date;
       document.getElementById("edit_id").value=edit_id;
  

  $('#mymodal_edit').modal('show');
}
//modal close refresh
$(document).ready(function(){
   $('.close').click(function() {
  location.reload();
});
});

function getalert(argument) {
	alert('sdf');
}
function genGraph(username)
{
	$.ajax({
		 
		url: "genGraph.php?username=" + username,
        type: "GET",
        success: function(html) {
            $("#gen-graph").html(html).innerHTML = value;
             $('#myModal').modal('show');
		 }
	 }); 
}
 function init() {
    getAllocationName('');
    dash('');
    dash1('');
    getchr();
    checkin_pagi(0,5);
    checkout_pagi(0,5);
	}
    window.onload = init;
