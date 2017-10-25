<?php
include('../session.php');
include('../database.php');
// Fetching Values From URL

$num = $_GET['num'];
include('../logger.php');
$module_name = "IT Management";
 
$n = strcmp($num, "itreq");

if ($n == 0) {
    $req_type = $_GET['req_type'];
    $req_desc = $_GET['req_desc'];
    $req_priority = $_GET['req_priority'];
    $today_date = date("Y-m-d");
    $start_time = date("h:i:sa");
    $end_time = "not updated";
    $req_end_date = "0000-00-00";

    $sql = "INSERT INTO it_request(req_id,req_type,req_by,req_dec,req_start_time,req_end_time,req_feedback,req_date,req_status,req_end_date,req_priority,ticket_accept_by)
VALUES ('','$req_type','$login_session','$req_desc','$start_time','$end_time','','$today_date','request initiated','$req_end_date','$req_priority','not yet accept')";
    if ($con->query($sql) === TRUE) {
        echo "<b class='success'>your request submitted successfully</b>";
        $str = "[" . $login_session . "][" . $module_name . "] it request submitted by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
    } else {
        echo "please contact database administrator";
        $str = "[" . $login_session . "][" . $module_name . "][could not handle database] operation  " . $login_session . "\r\n";
        logToFile("../app-error.log", $str);
    }

    $con->close();
}

$n = strcmp($num, "status");

if ($n == 0) {
    $id = $_GET['id'];

    $req_status = $_GET['status'];
    $priority = $_GET['priority'];
    $admin_comment = $_GET['admin_comment'];

    $t = strcmp($req_status, "Resolved");
    if ($t == 0) {
        $req_end_date = date("Y-m-d");
        $req_end_time = date("h:i:sa");
        $sql = "update it_request set req_status='$req_status',req_end_time='$req_end_time',ticket_accept_by='$login_session',req_end_date='$req_end_date',req_priority='$priority',admin_comment='$admin_comment' where req_id='$id'";
    } else {
        $req_end_time = 'not updated';
        $req_end_date = 'not updated';
        $sql = "update it_request set req_status='$req_status',ticket_accept_by='$login_session',req_end_time='$req_end_time',req_end_date='$req_end_date',req_priority='$priority',admin_comment='$admin_comment' where req_id='$id'";
    }



    if ($con->query($sql) === TRUE) {
        echo "<b class='success'>Request Status Changes successfully</b>";
        $str = "[" . $login_session . "][" . $module_name . "] it request ststus changed by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
    } else {
        echo "<b class='error'>please contact database admin</b>";
        $str = "[" . $login_session . "][" . $module_name . "][could not handle database] could not change it status  " . $login_session . "\r\n";
        logToFile("../app-error.log", $str);
    }

    $con->close();
}
$n = strcmp($num, "comment");

if ($n == 0) {
    $id = $_GET['id'];
    $priority = $_GET['priority'];
    $comment_msg = $_GET['comment_msg'];

    $sql = "update it_request set req_feedback='$comment_msg',req_priority='$priority' where req_id='$id'";




    if ($con->query($sql) === TRUE) {
        echo "<b class='success'>Request Status Changes successfully</b>";
        $str = "[" . $login_session . "][" . $module_name . "] it request ststus changed by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
    } else {
        echo "<b class='error'>please contact database admin</b>";
        $str = "[" . $login_session . "][" . $module_name . "][could not handle database] could not change it status  " . $login_session . "\r\n";
        logToFile("../app-error.log", $str);
    }

    $con->close();
}

$n = strcmp($num, "ittype");

if ($n == 0) {
    $item_name = $_GET['item_name'];
    $sql = "INSERT INTO it_request_type (request_type)
VALUES ('$item_name')";

    if ($con->query($sql) === TRUE) {
        echo "<b class='success'>New Request type Sent  successfully</b>";
        $str = "[" . $login_session . "][" . $module_name . "] request type  added by " . $login_session . "\r\n";
        logToFile("../app-success.log", $str);
    } else {
        echo "<b class='error'>Request type already exist</b>";
        $str = "[" . $login_session . "][" . $module_name . "][please contac database administrator] count add new request type  " . $login_session . "\r\n";
        logToFile("../app-error.log", $str);
    }

    $con->close();
}
$n = strcmp($num, "escalation");

if ($n == 0) {
    $subject = $_GET['req_type'];
    $message = $_GET['escalation_commentin'];
    $send_by = $_GET['send_by'];
    $send_to = $_GET['send_toin'];
    $header = "From:" . $login_session . " <" . $send_by . "> \r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-type: text/html;charset=UTF-8 \r\n";

    ini_set('smtp_port', "25");






    mail($send_to, $subject . "<Urgent>", $message, $header);
    echo "<b class='success'>Mail sent successfully</b>";
}

$n = strcmp($num, "2");

if ($n == 0) {
    $email = "";
    $username = $_GET['username'];
    $start_from = $_GET['st'];
    $limit = $_GET['end'];
    $num = 0;
    $sql = mysqli_query($con, "SELECT emp_username FROM register where first_name='$login_session'");
    while ($row = $sql->fetch_assoc()) {
        $email = $row['emp_username'];
    }
    echo ' <input type="hidden" class="border" id="username" value="' . $username . '" readonly>';
    ?>
    <center> <div class="table-responsive">    
            <table class="table">
                <thead> 

                    <tr> 


                        <th>Request By</th>
                        <th>Item type</th>
                        <th>Priority</th>

                        <th>Ticket Handled by</th>
                        <th>Item description</th>
                        <th>Request Date</th>
                        <th>Request Time</th>

                        <th>Current Status</th>
                        <th>User Comment</th>

    <?php
    $n = strcmp($user_type, "admin");
    if ($n == 0) {
        ?>
                            <th>Resolved Date</th>
                            <th>Resolved time</th>
                            <th>Add Comment</th>
                            <th>Change Status</th>


                            <th>Update</th>


        <?php
        $sql2 = "select * from it_request where req_by like '%$username%' or req_priority='$username' order by req_date desc, req_start_time desc LIMIT $start_from, $limit";
    } else {
        $sql2 = "select * from it_request where req_by='$login_session' order by req_date desc, req_start_time desc LIMIT $start_from, $limit";
        ?>
                            <th>Admin Comment</th>
                            <th>Write Comment</th>

                            <th>Update</th> 
        <?php
    }
    ?>
                </thead>
                </tr>

                <br>
    <?php
    if ($result1 = mysqli_query($con, $sql2)) {
        if (mysqli_num_rows($result1) > 0) {

            $num = mysqli_num_rows($result1);
            $i = 1;


            while ($row = mysqli_fetch_array($result1)) {

                echo "<tbody>";




                echo "<tr class=''>";

                echo "<td>" . $row['req_by'] . "</td>";

                echo "<td>" . $row['req_type'] . "</td>";
                echo ' <input type="hidden" class="border" id="req_type' . $i . '" value="' . $row['req_type'] . '" readonly>';
                if ($row['req_status'] === "Reject" || $row['req_status'] === "Resolved") {

                    echo '<td><select id="priority' . $i . '" disabled> <option>' . $row['req_priority'] . '</option>
       <option>low</option>
		<option>medium</option>
		<option>high</option>
		<option>urgent</option></select></td>';
                } else if ($user_type == "admin") {
                    echo '<td><select id="priority' . $i . '"> <option>' . $row['req_priority'] . '</option>
       <option>low</option>
		<option>medium</option>
		<option>high</option>
		<option>urgent</option></select></td>';
                } else {
                    echo '<td><select id="priority' . $i . '"> <option>' . $row['req_priority'] . '</option>
       <option>low</option>
		<option>medium</option>
		<option>high</option>
		<option>urgent</option></select></td>';
                }
                echo "<td>" . $row['ticket_accept_by'] . "</td>";
                echo ' <input type="hidden" class="border" id="reqid' . $i . '" value=' . $row['req_id'] . '>';
                echo ' <input type="hidden" class="border" id="send_by' . $i . '" value=' . $email . '>';
                echo "<td>" . $row['req_dec'] . "</td>";

                echo "<td>" . $row['req_date'] . "</td>";
                echo "<td>" . $row['req_start_time'] . "</td>";

                echo "<td>" . $row['req_status'] . "</td>";
                echo '<td>' . $row['req_feedback'] . '</td>';


                if ($n == 0) {
                    echo "<td>" . $row['req_end_date'] . "</td>";
                    echo "<td>" . $row['req_end_time'] . "</td>";
                    echo '<td><textarea id="admin_comment' . $i . '">' . $row['admin_comment'] . '</textarea></td>';
                    echo '<td><select id="status' . $i . '"><option value="0">Select</option><option>Accept</option><option>Reject</option><option>Resolved</option></select></td>';
                    echo "<td><input type='button' onclick ='setItRequestStatus(reqid" . $i . ".value,status" . $i . ".value,priority" . $i . ".value,admin_comment" . $i . ".value);'  value='Set Status'></td>";
                    $today_date = date("Y-m-d");

                    $start = strtotime($today_date);
                    $end = strtotime($row['req_date']);
                    $count = $start - $end;
                    $days = floor($count / (3600 * 24));
                    /* if($row['req_priority']=="urgent")
                      {
                      echo "<td><input type='button' onclick = 'setItRequestStatus(reqid".$i.".value,status".$i.".value);'  value='Send Escalations'></td>";
                      } */
                    if (/* $days>=5 && */ $row['req_status'] == "Accept" && $row['req_status'] != "Resolved" && $row['req_priority'] == "urgent") {
                        echo "<td><input type='button' data-toggle='modal'  onclick = 'setEscalation(req_type" . $i . ".value,send_by" . $i . ".value);' value='Send Escalation'></td>";
                    }
                } else {
                    echo '<td>' . $row['admin_comment'] . '</td>';

                    if ($row['req_status'] === "Reject" || $row['req_status'] === "Resolved") {
                        echo '<td><textarea id="comment' . $i . '" disabled>' . $row['req_feedback'] . '</textarea></td>';
                        echo "<td><input type='button' onclick = 'setICommentStatus(reqid" . $i . ".value,comment" . $i . ".value,priority" . $i . ".value);'  value='Update' disabled></td>";
                    } else {
                        echo '<td><textarea id="comment' . $i . '">' . $row['req_feedback'] . '</textarea></td>';
                        echo "<td><input type='button' onclick = 'setICommentStatus(reqid" . $i . ".value,comment" . $i . ".value,priority" . $i . ".value);'  value='Update'></td>";
                    }
                }




                $i++;
            }
            echo "</tr></tbody></table></center></div> ";
        }
    }
    $a = 5;

    $one = $start_from + $a;
    $two = $start_from - $a;
    if ($two < 0) {
        $two = 0;
    }

    if ($num >= 5) {


        echo "<td><button onclick = 'getItData(username.value,0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

        echo "<td><button onclick = 'getItData(username.value," . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";

        echo "<td><button onclick = 'getItData(username.value," . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
    } else {
        echo "<table><tr><td><td><td><td><td><td><td><td><td><td><td><td></tr></table>";
        echo "<td><button onclick = 'getItData(username.value,0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

        echo "<td><button onclick = 'getItData(username.value," . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
    }



    echo "<br><br>";
}
?> 




