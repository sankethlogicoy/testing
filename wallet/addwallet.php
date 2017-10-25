<?php

include('../session.php');
include('../logger.php');
include('../database.php');

$module_name = "wallet module";
$username = $_POST['username'];
$money = $_POST['amount'];
$sign = $_POST['sign'];
$money = $money * $sign;
$credit = $money;
$debit2 = $money * -1;
$debit = 0;
$total = $credit;
$file_name = $_FILES['file1']['name'];
$file_size = $_FILES['file1']['size'];
$file_tmp = $_FILES['file1']['tmp_name'];
$file_type = $_FILES['file1']['type'];


$expensions = array(
    "jpeg",
    "jpg",
    "png"
);
$today = date("Y-m-d");
$today_time = date("h:i:sa");
$file_namee = $username . "-" . $today . "-" . $file_name;


if ($file_size > 2097152) {
    $errors[] = 'File size must be excately 2 MB';
}

if (empty($errors) == true) {

    move_uploaded_file($file_tmp, "../images/wallet/history/" . $file_namee);
}
 
$today_date = date("Y-m-d-h-i-sa");


$result = mysqli_query($con, "select username,credit,debit,total from  wallet  where 	username='$username' ORDER BY wallet_id DESC LIMIT 0, 1");
if (!$result) {
    echo 'Could not run query: ';
    exit;
}

$row = mysqli_fetch_row($result);

$data = $row[0];
$credit1 = $row[1];
$debit1 = $row[2];
$total1 = $row[3];


if ($data == "") {

    $sql = "INSERT INTO wallet (username,credit,debit,total,date,admin_by,wallet_id,wallet_image_name)
					VALUES ('$username', '$credit','$debit','$total','$today_date','$login_session','','amount credited no receipts generated')";

    if ($con->query($sql) === TRUE) {
        echo "<b class='success'>" . $credit . "&nbsp; INR &nbsp; added to &nbsp;" . $username . " &nbsp; account</b>";
        $str = "[" . $login_session . "][" . $module_name . "]amount added by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
        header('Location:index.php');
    } else {
        echo "<b class='error'>Employee id already exist</b>";
        $str = "[" . $login_session . "][" . $module_name . "][redundant wallet data] " . $login_session . "\r\n";
        logToFile("../app-error.log", $str);
    }
} else {
    if ($money > 0) {
        $sql = mysqli_query($con, "INSERT INTO wallet (username,credit,debit,total,date,admin_by,wallet_id,wallet_image_name)
					VALUES ('$username', '$credit','$debit','$total1'+'$credit','$today_date','$login_session','','amount credited no receipts generated')");
        echo "<b class='success'>" . $credit . "&nbsp; INR &nbsp; added to &nbsp;" . $username . " &nbsp; account</b>";
        $str = "[" . $login_session . "][" . $module_name . "]amount credited by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
        header('Location:index.php');
    } else {
        $credit = 0;
        if ($total1 > $debit2) {
            $sql = mysqli_query($con, "INSERT INTO wallet (username,credit,debit,total,date,admin_by,wallet_id,wallet_image_name)
					VALUES ('$username', '$credit','$debit2','$total1'-'$debit2','$today_date','$login_session','','../images/wallet/history/$file_namee')");
            echo "<b class='success'>" . $debit2 . "&nbsp; INR &nbsp; diducted from &nbsp;" . $username . " &nbsp; account</b>";
            $str = "[" . $login_session . "][" . $module_name . "]amount debited by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
            header('Location:index.php');
        } else {
            echo "<b class='error'>&nbsp;" . $username . "&nbsp; wallet ballence  is &nbsp;" . $total1 . "&nbsp;INR &nbsp; we can't process please recharge your account </b>";
            $str = "[" . $login_session . "][" . $module_name . "][out of bounce] " . $login_session . "\r\n";
            logToFile("../app-error.log", $str);
        }
    }
}
?>

