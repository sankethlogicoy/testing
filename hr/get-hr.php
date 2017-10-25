<?php

include('../session.php');

include('../logger.php');
include('../database.php');
$module_name = "HR module";
$task = $_GET['num'];

switch ($task) {
    case "1":
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $date_of_birth = $_GET['date_of_birth'];
        $emp_mob = $_GET['emp_mob'];
        $emp_desig = $_GET['emp_desig'];
        $emp_personal_mailid = $_GET['emp_personal_mailid'];
        $emp_username = $_GET['emp_office_mailid'];
        $emp_password = $_GET['emp_password'];
        $emp_gender = $_GET['emp_gender'];
        $emp_type = $_GET['emp_type'];
        $emp_dept = $_GET['emp_dept'];
        $emp_access_type = $_GET['emp_access_type'];
        $emp_id = $_GET['emp_id'];
        $emp_address = $_GET['emp_address'];
        $emp_city = $_GET['emp_city'];
        $emp_state = $_GET['emp_state'];
        $emp_pincode = $_GET['emp_pincode'];
        $emp_blood_group = $_GET['emp_blood_group'];
        $emp_joining_date = $_GET['emp_joining_date'];
        $emp_ranking = $_GET['emp_ranking'];
        $encoded = encryptIt($emp_password);
        $sql = "INSERT INTO register (reg_id,first_name,last_name,date_of_birth,emp_gender,emp_mob,emp_desig,emp_personal_mailid,emp_username,emp_password,emp_type,
emp_dept,emp_id,emp_address,emp_city,emp_state,emp_pincode,emp_blood_group,emp_joining_date,emp_access_type,emp_ranking)
VALUES ('','$first_name','$last_name','$date_of_birth','$emp_gender','$emp_mob','$emp_desig','$emp_personal_mailid','$emp_username','$encoded','$emp_type','$emp_dept','$emp_id','$emp_address','$emp_city','$emp_state',$emp_pincode,'$emp_blood_group','$emp_joining_date','$emp_access_type','$emp_ranking')";
        if ($con->query($sql) === TRUE) {
            // echo "<b class='success'>New Employee created successfully</b>";
            echo "success";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " account  added by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
        } else {
            echo "error";
            //echo "<b class='error'>Employee id or employe mail id already exist</b>";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not create account] \r\n";
            logToFile("../app-error.log", $str);
        }

        $con->close();

        break;
    case "2":
        $emp_id = $_GET['empid'];
        $error = "";

        $result = mysqli_query($con, "select emp_id from register where emp_id='$emp_id'");
        if (!$result) {
            echo 'Could not run query: ';
            exit;
        }

        $row = mysqli_fetch_row($result);
        $error = $row[0];
        echo $error;

        break;
    case "3":
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $date_of_birth = $_GET['date_of_birth'];
        
        $emp_desig = $_GET['emp_desig'];
        $emp_personal_mailid = $_GET['emp_personal_mailid'];
        $emp_username = $_GET['emp_office_mailid'];

        
        $emp_type = $_GET['emp_type'];
        $emp_dept = $_GET['emp_dept'];
        $emp_access_type = $_GET['emp_access_type'];
        $emp_id = $_GET['emp_id'];
        
         
        $emp_ranking = $_GET['emp_ranking'];
        $id = $_GET['id'];
        $sql = "update register set first_name='$first_name',last_name='$last_name',date_of_birth='$date_of_birth',emp_desig='$emp_desig',emp_personal_mailid='$emp_personal_mailid',emp_username='$emp_username',emp_type='$emp_type',
emp_dept='$emp_dept',emp_id='$emp_id',emp_access_type='$emp_access_type',emp_ranking='$emp_ranking' where reg_id=$id";
        if ($con->query($sql) === TRUE) {
            //echo "<b class='success'>Employee update successfully</b>";
            echo "success";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " account updated by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
        } else {
            //echo "<b class='error'>please check your emp id</b>";
            echo "error";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not update account] \r\n";
            logToFile("../app-error.log", $str);
        }

        break;
    case "4":
        $id = $_GET['id'];
        $rowid = $_GET['rowid'];
        $sql = "update register set flag=1 where reg_id='$id'";
        if ($con->query($sql) === TRUE) {
            //echo "<b class='success'>Deleted successfully</b>";
            echo "success";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] account deleted by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
        } else {
            //echo "Error: " . $sql . "<br />" . $con->error;
            echo "error";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not delete account] \r\n";
            logToFile("../app-error.log", $str);
        }
        break;
    case "5":
        ?>
        <center> <div class="table-responsive">    <table class="table table-striped">
                    <thead> 
                        <tr> 
                            <th>Emp id</th> 

                            <th>Name</th>

                            <th>Designation</th>
                            <th>Type Of Employee</th>
                            <th>Edit</th>
                            <th>Delete</th>

                    </thead>
                    </tr>

                    <br />
                    <?php

                    $username = $_GET['username'];
                    $start_from = $_GET['st_point'];
                    $limit = $_GET['end_point'];
                    $count = 0;


                    $sql2 = "select * from register where flag=0 and (first_name LIKE '%$username%' or emp_id like '%$username%') order by emp_id  LIMIT $start_from, $limit";
                    $name = "";

                    $result = mysqli_query($con, "SELECT COUNT(first_name) FROM register where flag=0 and first_name LIKE '%$username%'");

                    $row1 = mysqli_fetch_row($result);
                    $total_records = $row1[0];


                    $total_pages = ceil($total_records / $limit);
                    echo ' <input type="hidden" class="border" id="username" value="' . $username . '" readonly>';
                    if ($result1 = mysqli_query($con, $sql2)) {
                        if (mysqli_num_rows($result1) > 0) {
                            $count = mysqli_num_rows($result1);

                            $i = 1;
                            while ($row = mysqli_fetch_array($result1)) {
                                $name = $row['first_name'];
                                echo "<tbody>";
                                echo '<tr id="rowid' . $i . '">';
                                echo "<td>" . $row['emp_id'] . "</td>";
                                echo "<td>" . $row['first_name'] . "</td>";
                                echo "<td>" . $row['emp_desig'] . "</td>";
                                echo "<td>" . $row['emp_type'] . "</td>";
                                echo ' <input type="hidden" class="border" id="login_id' . $i . '" value="' . $row['reg_id'] . '" readonly>';
                                echo ' <input type="hidden" class="border" id="name' . $i . '" value="' . $row['first_name'] . '" readonly>';
                                echo ' <input type="hidden" class="border" id="last_namee' . $i . '" value="' . $row['last_name'] . '" readonly>';
                                echo ' <input type="hidden" class="border" id="date_of_birthh' . $i . '" value="' . $row['date_of_birth'] . '">';
                                echo ' <input type="hidden" class="border" id="emp_mobb' . $i . '" value="' . $row['emp_mob'] . '">';
                                echo ' <input type="hidden" class="border" id="emp_desigg' . $i . '" value="' . $row['emp_desig'] . '" readonly>';
                                echo ' <input type="hidden" class="border" id="emp_personal_mailidd' . $i . '" value="' . $row['emp_personal_mailid'] . '" readonly>';
                                echo ' <input type="hidden" class="border" id="emp_office_mailidd' . $i . '" value="' . $row['emp_username'] . '">';
                                echo ' <input type="hidden" class="border" id="emp_genderr' . $i . '" value="' . $row['emp_gender'] . '">';
                                echo ' <input type="hidden" class="border" id="emp_typee' . $i . '" value="' . $row['emp_type'] . '">';
                                echo ' <input type="hidden" class="border" id="emp_deptt' . $i . '" value="' . $row['emp_dept'] . '">';
                                echo ' <input type="hidden" class="border" id="emp_access_typee' . $i . '" value="' . $row['emp_access_type'] . '" readonly>';
                                echo ' <input type="hidden" class="border" id="emp_idd' . $i . '" value=' . $row['emp_id'] . ' readonly>';
                                echo ' <input type="hidden" class="border" id="emp_addresss' . $i . '" value=' . $row['emp_address'] . ' readonly>';
                                echo ' <input type="hidden" class="border" id="emp_cityy' . $i . '" value=' . $row['emp_city'] . ' readonly>';
                                echo ' <input type="hidden" class="border" id="emp_statee' . $i . '" value=' . $row['emp_state'] . ' readonly>';
                                echo ' <input type="hidden" class="border" id="emp_pincodee' . $i . '" value=' . $row['emp_pincode'] . ' readonly>';

                                echo ' <input type="hidden" class="border" id="emp_rankingg' . $i . '" value=' . $row['emp_ranking'] . ' readonly>';
                                echo ' <input type="hidden" class="border" id="emp_blood_groupp' . $i . '" value="' . $row['emp_blood_group'] . '" readonly>';
                                echo ' <input type="hidden" class="border" id="emp_joining_datee' . $i . '" value=' . $row['emp_joining_date'] . ' readonly>';

                                echo "<td><button data-toggle='modal' class='btn btn-primary' onclick = 'passUpdateValues(name" . $i . ".value,last_namee" . $i . ".value,date_of_birthh" . $i . ".value,
   emp_personal_mailidd" . $i . ".value,emp_office_mailidd" . $i . ".value,
   
   emp_typee" . $i . ".value,
   emp_deptt" . $i . ".value,
   emp_access_typee" . $i . ".value,
     emp_idd" . $i . ".value,
	 emp_desigg" . $i . ".value,
	 emp_rankingg" . $i . ".value,login_id" . $i . ".value);' >UPDATE  &nbsp;<i class='fa fa-pencil' aria-hidden='true'></i></button></td>";
                                echo "<td><button class='btn btn-danger' onclick = 'deleteUser(" . $row['reg_id'] . "," . $i . ");'>DELETE &nbsp;<i class='fa fa-times' aria-hidden='true'></i></button></td>";

                                $i++;
                            }
                            echo "</tr>";
                            if ($count == 0) {
                                echo "hellllllll";
                            }

                            echo "</tbody></table></div></center>";
                        }
                    }
                    $a = 5;

                    $one = $start_from + $a;
                    $two = $start_from - $a;
                    if ($two < 0) {
                        $two = 0;
                    }

                    if ($count >= 5) {


                        echo "<td><button class='btn btn-success' onclick = 'getEmployeesBylimit(username.value,0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

                        echo "<td><button class='btn btn-success' onclick = 'getEmployeesBylimit(username.value," . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";

                        echo "<td><button class='btn btn-success' onclick = 'getEmployeesBylimit(username.value," . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
                    } else {
                        echo "<table><tr><td><td><td><td><td><td><td><td><td><td><td><td></tr></table>";
                        echo "<td><button class='btn btn-success' onclick = 'getEmployeesBylimit(username.value,0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

                        echo "<td><button class='btn btn-success' onclick = 'getEmployeesBylimit(username.value," . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
                    }

                    echo "<br><br>";

                    break;

                case "6":
                    $rec_dept = $_GET['rec_dept'];
                    $rec_newtech = $_GET['rec_newtech'];
                    $sql = "INSERT INTO add_tech (tech_id,rec_dept,rec_newtech)
VALUES ('','$rec_dept','$rec_newtech')";
                    if ($con->query($sql) === TRUE) {
                        //echo "<b class='success'>New tech added successfully</b>";
                        echo "success";
                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " new tech  added by " . $login_session . "\r\n";
                        logToFile("../app-success.log", $str);
                    } else {
                        echo "error";
                        //echo "<b class='error'>please check your query</b>";
                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not add new tech] \r\n";
                        logToFile("../app-error.log", $str);
                    }

                    $con->close();
                    break;
                case "7":
                    $dept_name = $_GET['dept_name'];
                    $sql = mysqli_query($con, "SELECT rec_newtech FROM add_tech where rec_dept='$dept_name'");
                    $data = "";
                    while ($row = $sql->fetch_assoc()) {

                        $data = $row['rec_newtech'];


                        echo '<option>' . $data . '</option>';
                    }



                    break;
                case "8":
                    $requirement_id = $_GET['requirement_id'];
                    $dept_name = $_GET['dept_name'];
                    $tech_name = $_GET['tech_name'];
                    $skill_set = $_GET['skill_set'];
                    $date_of_posting = $_GET['date_of_posting'];
                    $sql = "INSERT INTO recruitement (recruitement_id,dept_name,tech_name,skill_set,date_of_posting)
VALUES ('$requirement_id','$dept_name','$tech_name','$skill_set','$date_of_posting')";
                    if ($con->query($sql) === TRUE) {
                        //echo "<b class='success'>Recruitement Request Send successfully</b>";
                        echo "success";
                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . "Recruitement request send by " . $login_session . "\r\n";
                        logToFile("../app-success.log", $str);
                    } else {
                        //echo "<b class='error'>please check your database</b>";
                        echo "error";
                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not add new tech] \r\n";
                        logToFile("../app-error.log", $str);
                    }

                    $con->close();
                    break;
                case "9":
                    ?>
                    <center><div class="table-responsive">  <table class="table table-striped">
                                <thead> 
                                    <tr> 
                                        <th>Candidate Name</th> 

                                        <th>Candidate Id</th>
                                        <th>Reference By</th>   
                                        <th>No Of People's Voted</th>
                                        <th>Avg Rating</th>
                                        <th>Test Marks</th>

                                        <th>Result</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                        <th>Set Status</th>
                                        <th>Check Graph</th>

                                </thead>
                                </tr>

                                <br />
                                <?php

                                $username = $_GET['username'];
                                $start_from = $_GET['st'];
                                $limit = $_GET['end'];
                                $num = 0;
                                echo ' <input type="hidden" class="border" id="username1" value="' . $username . '" readonly>';
                                //$sql2 = "select * from recruitement where dept_name LIKE '%$name%' or tech_name like '%$name%'";
                                $sql2 = "SELECT r.candidate_name ,t.candidate_id,u.reffered_by,round(avg(r.candidate_rank)) as cand_rank,round(t.marks_obtained/total_marks*100) as exam_marks,count(rank_by),t.status from candidate_ranking r,recruitement_test t,resume_upload u where r.candidate_name LIKE '%$username%' and(r.ranking_id=t.test_id and u.candidate_id=t.candidate_id) GROUP BY r.ranking_id,r.candidate_name LIMIT $start_from, $limit";

                                if ($result1 = mysqli_query($con, $sql2)) {
                                    if (mysqli_num_rows($result1) > 0) {
                                        $num = mysqli_num_rows($result1);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result1)) {
                                            $result = $row['cand_rank'] + $row['exam_marks'];
                                            //echo $row['reffered_by'];
                                            echo "<tbody>";
                                            echo '<tr>';

                                            echo "<td>" . $row['candidate_name'] . "</td>";
                                            echo "<td>" . $row['candidate_id'] . "</td>";
                                            echo "<td>" . $row['reffered_by'] . "</td>";
                                            echo ' <input type="hidden" class="border" id="candidate_idd' . $i . '" value="' . $row['candidate_id'] . '">';
                                            echo "<td>" . $row['count(rank_by)'] . "</td>";
                                            echo "<td>" . $row['cand_rank'] . "/10</td>";
                                            echo "<td>" . $row['exam_marks'] . "/100</td>";
                                            echo "<td>" . $result . "/110</td>";
                                            echo ' <input type="hidden" class="border" id="candidate_namee' . $i . '" value="' . $row['candidate_name'] . '">';
                                            echo ' <input type="hidden" class="border" id="cand_rank' . $i . '" value="' . $row['cand_rank'] . '">';
                                            echo ' <input type="hidden" class="border" id="exam_marks' . $i . '" value="' . $row['exam_marks'] . '">';
                                            echo ' <input type="hidden" class="border" id="sum_tot' . $i . '" value="' . $result . '">';
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo '<td><select class="form-control" id="status' . $i . '"><option value="0">Select</option><option>Hired</option><option>Reject</option><option>In Hold</option></select></td>';
                                            echo "<td><button type='button' class='btn btn-primary' onclick ='setHireStatus(status" . $i . ".value,candidate_idd" . $i . ".value," . $start_from . "," . $limit . ");'> SET STATUS&nbsp;<i class='fa fa-pencil' aria-hidden='true'></button></i></td>";
                                            echo "<td><button onclick = 'autoChart(candidate_namee" . $i . ".value,cand_rank" . $i . ".value,exam_marks" . $i . ".value,sum_tot" . $i . ".value);' class='btn btn-success'>CLICK GRAPH &nbsp; <i class='fa fa-pie-chart' aria-hidden='true'></i></button></td>";

                                            $i++;
                                        }
                                        echo "</tr></tbody></table></div></center>";
                                    }
                                }
                                $a = 5;

                                $one = $start_from + $a;
                                $two = $start_from - $a;
                                if ($two < 0) {
                                    $two = 0;
                                }

                                if ($num >= 5) {


                                    echo "<td><button class='btn btn-success' onclick = 'getRecruitementHistory(username1.value,0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

                                    echo "<td><button class='btn btn-success' onclick = 'getRecruitementHistory(username1.value," . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";

                                    echo "<td><button class='btn btn-success' onclick = 'getRecruitementHistory(username1.value," . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
                                } else {
                                    echo "<table><tr><td><td><td><td><td><td><td><td><td><td><td><td></tr></table>";
                                    echo "<td><button class='btn btn-success' onclick = 'getRecruitementHistory(username1.value,0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

                                    echo "<td><button class='btn btn-success' onclick = 'getRecruitementHistory(username1.value," . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
                                }
                                break;
                            case "10":
                                $candidate_id = $_GET['candidate_id'];
                                $candidate_name = $_GET['candidate_name'];
                                $total_marks = $_GET['total_marks'];
                                $obtained_marks = $_GET['obtained_marks'];
                                $result = mysqli_query($con, "select resume_id from resume_upload where candidate_id='$candidate_id'");


                                $row = mysqli_fetch_row($result);

                                $resume_id = $row[0];
                                $result1 = mysqli_query($con, "select candidate_id from recruitement_test where candidate_id='$candidate_id'");


                                $row1 = mysqli_fetch_row($result1);

                                $mydata = $row1[0];
                                if ($mydata == "") {

                                    $sql = "INSERT INTO recruitement_test (test_id,candidate_name,total_marks,marks_obtained,candidate_id)
		VALUES ($resume_id,'$candidate_name',$total_marks,$obtained_marks,'$candidate_id')";
                                    if ($con->query($sql) === TRUE) {
                                        // echo "<b class='success'>Test result submit successfully</b>";
                                        echo "success";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . "Recruitement request send by " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>please check your database</b>";
                                        echo "error";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not add new tech] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                } else {
                                    $sql1 = "update recruitement_test set total_marks='$total_marks',marks_obtained=$obtained_marks where candidate_id='$candidate_id'";
                                    if ($con->query($sql1) === TRUE) {

                                        //echo "<b class='success'>Your marks has been updated successfully</b>";
                                        echo "update";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " marks has been updated successfully " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        // echo "<b class='error'>Your marks already had submitted.</b>";
                                        echo "updated";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][marks update] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                }

                                $con->close();
                                break;
                            case "11":
                                $result = mysqli_query($con, "select distinct candidate_id from resume_upload ORDER BY resume_id DESC LIMIT 1");


                                $row = mysqli_fetch_row($result);

                                $candidate_id = $row[0];

                                if ($candidate_id != "") {
                                    echo $candidate_id;
                                } else {
                                    echo "error";
                                }


                                break;
                            case "12":
                                $candidate_id = $_GET['candidate_id'];
                                $candidate_name = "";

                                $result = mysqli_query($con, "select candidate_name from resume_upload where candidate_id='$candidate_id'");
                                if (!$result) {
                                    echo 'Could not run query: ';
                                    exit;
                                }

                                $row = mysqli_fetch_row($result);
                                $candidate_name = $row[0];
                                echo $candidate_name;


                                break;
                            case "14":
                                $candidate_id = $_GET['candidate_id'];
                                $candidate_name = $_GET['candidate_name'];

                                $candidate_ranking = $_GET['candidate_ranking'];
                                $result = mysqli_query($con, "select resume_id from resume_upload where candidate_id='$candidate_id'");


                                $row = mysqli_fetch_row($result);

                                $resume_id = $row[0];
                                $result1 = mysqli_query($con, "select rank_by,candidate_name,avg_rank from candidate_ranking where rank_by='$login_session' and candidate_name='$candidate_name'");


                                $row1 = mysqli_fetch_row($result1);

                                $mydata = $row1[0];
                                $name = $row1[1];
                                $result2 = mysqli_query($con, "select avg_rank from candidate_ranking where ranking_id='$resume_id'");

                                $row2 = mysqli_fetch_row($result2);
                                $avg_rank = $row2[0];
                                $my_avg = 0;
                                if ($avg_rank == 0) {
                                    $my_avg = $candidate_ranking;
                                } else {
                                    $my_avg = ($avg_rank + $candidate_ranking) / 2;
                                }

                                if ($mydata == "" && $name == "") {

                                    $sql = "INSERT INTO candidate_ranking (ranking_id,candidate_name,candidate_rank,rank_by,avg_rank)
		VALUES ($resume_id,'$candidate_name',$candidate_ranking,'$login_session',$my_avg)";
                                    if ($con->query($sql) === TRUE) {
                                        //echo "<b class='success'>Your vote has been submitted successfully</b>";
                                        echo "success";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . "Recruitement request send by " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>please check your database</b>";
                                        echo "error";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not add new tech] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                } else {
                                    $sql1 = "update candidate_ranking set candidate_rank='$candidate_ranking',avg_rank='$my_avg' where rank_by='$login_session' and ranking_id='$resume_id'";
                                    if ($con->query($sql1) === TRUE) {

                                        //echo "<b class='success'>Your vote has been updated successfully</b>";
                                        echo "update";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " vote has been updated successfully " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>Your vote already had submitted.</b>";
                                        echo "updated";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][ranking update] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                }

                                $con->close();
                                break;
                            case "15":


                                $result = mysqli_query($con, "SELECT first_name,emp_desig,emp_dept FROM `register` WHERE emp_id='$login_emp_id'");
                                if (!$result) {
                                    echo 'Could not run query: ';
                                    exit;
                                }

                                $row = mysqli_fetch_row($result);
                                $name = $row[0];
                                $emp_desig = $row[1];
                                $emp_dept = $row[2];

                                $users_arr[] = array(
                                    "name" => $name,
                                    "emp_desig" => $emp_desig,
                                    "emp_dept" => $emp_dept
                                );
                                echo json_encode($users_arr);

                                break;
                            case "16":
                                $self_emp_name = $_GET['self_emp_name'];
                                $self_emp_desig = $_GET['self_emp_desig'];
                                $self_emp_dept = $_GET['self_emp_dept'];
                                $self_emp_total = $_GET['self_emp_total'];
                                $self_emp_rating = $_GET['self_emp_rating'];
                                $self_date_of_posting = $_GET['self_date_of_posting'];

                                $result = mysqli_query($con, "select emp_id from self_appraisel where emp_id='$login_emp_id'");


                                $row = mysqli_fetch_row($result);

                                $emp_id = $row[0];


                                if ($emp_id == "") {

                                    $sql = "INSERT INTO self_appraisel(self_app_id,self_emp_name,self_emp_desig,self_emp_dept,self_emp_total,self_emp_rating,self_date_of_posting,emp_id)
		VALUES ('','$self_emp_name','$self_emp_desig','$self_emp_dept',$self_emp_total,$self_emp_rating,'$self_date_of_posting','$login_emp_id')";
                                    if ($con->query($sql) === TRUE) {
                                        //echo "<b class='success'>Your vote has been submitted successfully</b>";
                                        echo "success";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . "self appraisel rating submitted successfully  " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>please check your database</b>";
                                        echo "error";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not rate ] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                } else {
                                    $sql1 = "update self_appraisel set self_emp_name='$self_emp_name',self_emp_desig='$self_emp_desig',self_emp_dept='$self_emp_dept', self_emp_total=$self_emp_total
				,self_emp_rating=$self_emp_rating,self_date_of_posting='$self_date_of_posting' where emp_id='$login_emp_id'";
                                    if ($con->query($sql1) === TRUE) {

                                        //echo "<b class='success'>Your vote has been updated successfully</b>";
                                        echo "update";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " vote has been updated successfully " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>Your vote already had submitted.</b>";
                                        echo "updated";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][ranking update] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                }

                                $con->close();
                                break;
                            case "17":

                                $emp_id = $_GET['emp_id'];
                                $result = mysqli_query($con, "SELECT first_name,emp_dept FROM `register` WHERE emp_id='$emp_id'");
                                if (!$result) {
                                    echo 'Could not run query: ';
                                    exit;
                                }


                                $row = mysqli_fetch_row($result);
                                $name = $row[0];
                                $emp_dept = $row[1];


                                $users_arr[] = array(
                                    "ma_emp_name" => $name,
                                    "ma_emp_dept" => $emp_dept
                                );
                                echo json_encode($users_arr);

                                break;
                            case "18":
                                $emp_id = $_GET['ma_emp_id'];
                                $ma_emp_name = $_GET['ma_emp_name'];
                                $ma_emp_dept = $_GET['ma_emp_dept'];
                                $ma_emp_total = $_GET['ma_emp_total'];
                                $ma_emp_rating = $_GET['ma_emp_rating'];
                                $ma_date_of_posting = $_GET['ma_date_of_posting'];
                                $result = mysqli_query($con, "select emp_id from manager_appraisel where emp_id='$emp_id'");


                                $row = mysqli_fetch_row($result);

                                $data = $row[0];


                                if ($data == "") {

                                    $sql = "INSERT INTO manager_appraisel(manager_app_id,ma_emp_name,ma_emp_dept,ma_emp_total,ma_emp_rating,ma_date_of_posting,emp_id)
		VALUES ('','$ma_emp_name','$ma_emp_dept',$ma_emp_total,$ma_emp_rating,'$ma_date_of_posting','$emp_id')";
                                    if ($con->query($sql) === TRUE) {
                                        //echo "<b class='success'>Your vote has been submitted successfully</b>";
                                        echo "success";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . "self appraisel rating submitted successfully  " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>please check your database</b>";
                                        echo "error";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not rate ] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                } else {
                                    $sql1 = "update manager_appraisel set ma_emp_name='$ma_emp_name',ma_emp_dept='$ma_emp_dept', ma_emp_total=$ma_emp_total
				,ma_emp_rating=$ma_emp_rating,ma_date_of_posting='$ma_date_of_posting' where emp_id='$emp_id'";
                                    if ($con->query($sql1) === TRUE) {

                                        //echo "<b class='success'>Your vote has been updated successfully</b>";
                                        echo "update";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " vote has been updated successfully " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>Your vote already had submitted.</b>";
                                        echo "updated";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][ranking update] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                }

                                $con->close();
                                break;
                            case "19":
                                $emp_id = $_GET['emp_id'];
                                $result = mysqli_query($con, "SELECT first_name,emp_desig,emp_dept FROM `register` WHERE emp_id='$emp_id'");
                                if (!$result) {
                                    echo 'Could not run query: ';
                                    exit;
                                }


                                $row = mysqli_fetch_row($result);
                                $name = $row[0];
                                $emp_desig = $row[1];
                                $emp_dept = $row[2];

                                $users_arr[] = array(
                                    "name" => $name,
                                    "emp_desig" => $emp_desig,
                                    "emp_dept" => $emp_dept
                                );
                                echo json_encode($users_arr);

                                break;
                            case "20":
                                $emp_id = $_GET['hr_emp_id'];
                                $hr_emp_name = $_GET['hr_emp_name'];
                                $hr_emp_desig = $_GET['hr_emp_desig'];
                                $hr_emp_dept = $_GET['hr_emp_dept'];
                                $hr_emp_total = $_GET['hr_emp_total'];
                                $hr_emp_rating = $_GET['hr_emp_rating'];
                                $hr_date_of_posting = $_GET['hr_date_of_posting'];
                                $result = mysqli_query($con, "select emp_id from hr360_appraisel where emp_id='$emp_id'");


                                $row = mysqli_fetch_row($result);

                                $data = $row[0];


                                if ($data == "") {

                                    $sql = "INSERT INTO hr360_appraisel(hr_app_id,hr_emp_name,hr_emp_desig,hr_emp_dept,hr_emp_total,hr_emp_rating,hr_date_of_posting,emp_id)
		VALUES ('','$hr_emp_name','$hr_emp_desig','$hr_emp_dept',$hr_emp_total,$hr_emp_rating,'$hr_date_of_posting','$emp_id')";
                                    if ($con->query($sql) === TRUE) {
                                        //echo "<b class='success'>Your vote has been submitted successfully</b>";
                                        echo "success";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . "self appraisel rating submitted successfully  " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>please check your database</b>";
                                        echo "error";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not rate ] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                } else {
                                    $sql1 = "update hr360_appraisel set hr_emp_name='$hr_emp_name',hr_emp_desig='$hr_emp_desig',hr_emp_dept='$hr_emp_dept', hr_emp_total=$hr_emp_total
				,hr_emp_rating=$hr_emp_rating,hr_date_of_posting='$hr_date_of_posting' where emp_id='$emp_id'";
                                    if ($con->query($sql1) === TRUE) {

                                        //echo "<b class='success'>Your vote has been updated successfully</b>";
                                        echo "update";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] " . $login_session . " vote has been updated successfully " . $login_session . "\r\n";
                                        logToFile("../app-success.log", $str);
                                    } else {
                                        //echo "<b class='error'>Your vote already had submitted.</b>";
                                        echo "updated";
                                        $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][ranking update] \r\n";
                                        logToFile("../app-error.log", $str);
                                    }
                                }

                                $con->close();
                                break;

                            case "21":
                                ?>
                                <center><div class="table-responsive">  <table class="table table-striped">
                                            <thead> 
                                                <tr> 
                                                    <th>Employee Name</th> 

                                                    <th>Employee Id</th>
                                                    <th>Employee Designation</th>
                                                    <th>Employee Department</th>

                                                    <th>Self Rating</th>
                                                    <th>Manager Rating</th>
                                                    <th>360 Rating</th>

                                                    <th>Check Graph</th>

                                            </thead>
                                            </tr>

                                            <br />
                                            <?php

                                            $name = $_GET['name'];
                                            $start_from = $_GET['st'];
                                            $limit = $_GET['end'];
                                            $num = 0;
                                            echo ' <input type="hidden" class="border" id="username" value="' . $name . '" readonly>';
                                            //$sql2 = "select * from recruitement where dept_name LIKE '%$name%' or tech_name like '%$name%'";
                                            if ($user_type == "admin") {
                                                $sql2 = "SELECT s.self_emp_name,s.emp_id,m.ma_emp_dept,h.hr_emp_desig,s.self_emp_rating,m.ma_emp_rating,h.hr_emp_rating from self_appraisel s,manager_appraisel m,hr360_appraisel h where s.self_emp_name LIKE '%$name%' and s.emp_id=m.emp_id and s.emp_id=h.emp_id LIMIT $start_from, $limit";
                                            } else {
                                                $sql2 = "SELECT s.self_emp_name,s.emp_id,m.ma_emp_dept,h.hr_emp_desig,s.self_emp_rating,m.ma_emp_rating,h.hr_emp_rating from self_appraisel s,manager_appraisel m,hr360_appraisel h where s.self_emp_name LIKE '%$login_session%' and s.emp_id=m.emp_id and s.emp_id=h.emp_id LIMIT $start_from, $limit";
                                            }
                                            if ($result1 = mysqli_query($con, $sql2)) {
                                                if (mysqli_num_rows($result1) > 0) {
                                                    $i = 1;
                                                    $num = mysqli_num_rows($result1);
                                                    while ($row = mysqli_fetch_array($result1)) {


                                                        echo "<tbody>";
                                                        echo '<tr>';

                                                        echo "<td>" . $row['self_emp_name'] . "</td>";
                                                        echo "<td>" . $row['emp_id'] . "</td>";
                                                        echo "<td>" . $row['hr_emp_desig'] . "</td>";
                                                        echo "<td>" . $row['ma_emp_dept'] . "</td>";
                                                        echo "<td>" . $row['self_emp_rating'] . "/100</td>";
                                                        echo "<td>" . $row['ma_emp_rating'] . "/100</td>";
                                                        echo "<td>" . $row['hr_emp_rating'] . "/100</td>";

                                                        echo ' <input type="hidden" class="border" id="self_emp_name' . $i . '" value="' . $row['self_emp_name'] . '">';
                                                        echo ' <input type="hidden" class="border" id="self_emp_rating' . $i . '" value="' . $row['self_emp_rating'] . '">';
                                                        echo ' <input type="hidden" class="border" id="ma_emp_rating' . $i . '" value="' . $row['ma_emp_rating'] . '">';
                                                        echo ' <input type="hidden" class="border" id="hr_emp_rating' . $i . '" value="' . $row['hr_emp_rating'] . '">';


                                                        echo "<td><button onclick = 'appraiselChart(self_emp_name" . $i . ".value,self_emp_rating" . $i . ".value,ma_emp_rating" . $i . ".value,hr_emp_rating" . $i . ".value);' class='btn btn-success'>CLICK GRAPH &nbsp; <i class='fa fa-pie-chart' aria-hidden='true'></i></button></td>";

                                                        $i++;
                                                    }
                                                    echo "</tr></tbody></table></div></center>";
                                                }
                                            }
                                            $a = 5;

                                            $one = $start_from + $a;
                                            $two = $start_from - $a;
                                            if ($two < 0) {
                                                $two = 0;
                                            }

                                            if ($num >= 5) {


                                                echo "<td><button class='btn btn-success' onclick = 'getItData(username.value,0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

                                                echo "<td><button class='btn btn-success' onclick = 'getItData(username.value," . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";

                                                echo "<td><button class='btn btn-success' onclick = 'getItData(username.value," . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
                                            } else {
                                                echo "<table><tr><td><td><td><td><td><td><td><td><td><td><td><td></tr></table>";
                                                echo "<td><button class='btn btn-success' onclick = 'getItData(username.value,0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

                                                echo "<td><button class='btn btn-success' onclick = 'getItData(username.value," . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
                                            }
                                            break;
                                        case "22":


                                            $result = mysqli_query($con, "select max(emp_id) from register");
                                            if (!$result) {
                                                echo 'Could not run query: ';
                                                exit;
                                            }

                                            $row = mysqli_fetch_row($result);
                                            $error = $row[0];
                                            if ($error != "" || $error == null) {
                                                echo $error;
                                            } else {
                                                echo "error";
                                            }


                                            break;
                                        case "23":
                                            ?>
                                            <center> <div class="table-responsive">    <table class="table table-striped">
                                                        <thead> 
                                                            <tr> 
                                                                <th>Emp id</th> 

                                                                <th>Name</th>

                                                                <th>Designation</th>
                                                                <th>Type Of Employee</th>
                                                                <th>Status</th>
                                                                <th>Action</th>

                                                        </thead>
                                                        </tr>

                                                        <br />
        <?php

        $start_from = $_GET['st_point'];
        $limit = $_GET['end_point'];
        $count = 0;



        $sql2 = "select * from register order by emp_id  LIMIT $start_from, $limit";
        $name = "";



        if ($result1 = mysqli_query($con, $sql2)) {
            if (mysqli_num_rows($result1) > 0) {
                $count = mysqli_num_rows($result1);

                $i = 1;
                while ($row = mysqli_fetch_array($result1)) {
                    $name = $row['first_name'];
                    echo "<tbody>";
                    echo '<tr id="rowid' . $i . '">';
                    echo "<td>" . $row['emp_id'] . "</td>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['emp_desig'] . "</td>";
                    echo "<td>" . $row['emp_type'] . "</td>";
                    echo "<td>" . $row['flag'] . "</td>";
                    echo ' <input type="hidden" class="border" id="login_id' . $i . '" value="' . $row['reg_id'] . '" readonly>';


                    if ($row['flag'] == 1) {
                        echo "<td><button class='btn btn-info' onclick = 'activeUser(" . $row['reg_id'] . ",0);'>Active</button></td>";
                    } else {
                        echo "<td><button class='btn btn-info' onclick = 'activeUser(" . $row['reg_id'] . ",1);'>Deactivate</button></td>";
                    }
                    $i++;
                }
                echo "</tr>";
                if ($count == 0) {
                    echo "hellllllll";
                }

                echo "</tbody></table></div></center>";
            }
        }
        $a = 5;

        $one = $start_from + $a;
        $two = $start_from - $a;
        if ($two < 0) {
            $two = 0;
        }

        if ($count >= 5) {


            echo "<td><button class='btn btn-success' onclick = 'getEmpHistory(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getEmpHistory(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getEmpHistory(" . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
        } else {
            echo "<table><tr><td><td><td><td><td><td><td><td><td><td><td><td></tr></table>";
            echo "<td><button class='btn btn-success' onclick = 'getEmpHistory(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getEmpHistory(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
        }

        echo "<br><br>";

        break;
    case "24":
        $id = $_GET['id'];
        $flag = $_GET['flag'];

        $sql = "update register set flag=$flag where reg_id='$id'";
        if ($con->query($sql) === TRUE) {
            //echo "<b class='success'>Deleted successfully</b>";
            echo "success";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] account deleted by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
        } else {
            //echo "Error: " . $sql . "<br />" . $con->error;
            echo "error";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not delete account] \r\n";
            logToFile("../app-error.log", $str);
        }
        break;
    case "25":
        ?>
                                                        <center><div class="table-responsive">  <table class="table table-striped">
                                                                    <thead> 
                                                                        <tr> 
                                                                            <th>Recruitement id</th> 

                                                                            <th>Dept Name</th>

                                                                            <th>Tech Name</th>

                                                                            <th>Skill Sets</th>


                                                                            <th>Date Of Posting</th>

                                                                    </thead>
                                                                    </tr>

                                                                    <br />
        <?php

        $start_from = $_GET['st'];
        $limit = $_GET['end'];
        $num = 0;

        //$sql2 = "select * from recruitement where dept_name LIKE '%$name%' or tech_name like '%$name%'";
        $sql2 = "select * from recruitement LIMIT $start_from, $limit";

        if ($result1 = mysqli_query($con, $sql2)) {
            if (mysqli_num_rows($result1) > 0) {
                $num = mysqli_num_rows($result1);
                $i = 1;
                while ($row = mysqli_fetch_array($result1)) {


                    echo "<tbody>";
                    echo '<tr>';

                    echo "<td>" . $row['recruitement_id'] . "</td>";
                    echo "<td>" . $row['dept_name'] . "</td>";
                    echo "<td>" . $row['tech_name'] . "</td>";
                    echo "<td>" . $row['skill_set'] . "</td>";
                    echo "<td>" . $row['date_of_posting'] . "</td>";


                    $i++;
                }
                echo "</tr></tbody></table></div></center>";
            }
        }
        $a = 5;

        $one = $start_from + $a;
        $two = $start_from - $a;
        if ($two < 0) {
            $two = 0;
        }

        if ($num >= 5) {


            echo "<td><button class='btn btn-success' onclick = 'getRecruitementList(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getRecruitementList(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getRecruitementList(" . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
        } else {
            echo "<table><tr><td><td><td><td><td><td><td><td><td><td><td><td></tr></table>";
            echo "<td><button class='btn btn-success' onclick = 'getRecruitementList(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getRecruitementList(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
        }
        break;
    case "26":
        $result = mysqli_query($con, "select max(recruitement_id) from recruitement");


        $row = mysqli_fetch_row($result);

        $candidate_id = $row[0];

        if ($candidate_id != "") {
            echo $candidate_id;
        } else {
            echo "requirement-0";
        }


        break;
    case "27":
        $candidate_id = $_GET['candidate_id'];
        $status_msg = $_GET['status_msg'];
        $sql = "update recruitement_test set 	status='$status_msg' where candidate_id='$candidate_id'";
        if ($con->query($sql) === TRUE) {
            //echo "<b class='success'>Updated successfully</b>";
            echo "success";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "] account deleted by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
        } else {
            //echo "Error: " . $sql . "<br />" . $con->error;
            echo "error";
            $str = "[" . date("Y/m/d h:i:sa") . "][" . $login_session . "][" . $module_name . "][count not delete account] \r\n";
            logToFile("../app-error.log", $str);
        }
        break;
    case "28":
        $candidate_name = $_POST['candidate_name'];
        $candidate_id = $_POST['candidate_id'];
        $reffered_by = $_POST['reffered_by'];
        $requirement_id = $_POST['requirement_id1'];
        $resume = $_POST['resume'];
        $sql = "INSERT INTO resume_upload (resume_id,candidate_name,resume_path,candidate_id,reffered_by,requirement_id)
					VALUES ('','$candidate_name','$resume','$candidate_id','$reffered_by','$requirement_id')";

        if ($con->query($sql) === TRUE) {
            //echo "<b class='success'>Recruitement Request Send successfully</b>";
            echo "success";
            $str = "[" . $login_session . "][" . $module_name . "]uploaded by " . $login_session . "\r\n";
            logToFile("../app-success.log", $str);
        } else {
            //echo "<b class='error'>Employee id already exist</b>";
            echo "error";
            $str = "[" . $login_session . "][" . $module_name . "][resume upload " . $login_session . "\r\n";
            logToFile("../app-error.log", $str);
        }
        break;
    case "29":

        $sql = mysqli_query($con, "SELECT distinct recruitement_id FROM recruitement");
        $data = "";
        echo '<option value="0">Select</option>';
        while ($row = $sql->fetch_assoc()) {

            $data = $row['recruitement_id'];


            echo '<option>' . $data . '</option>';
        }

        break;
    case "30":

        $sql = mysqli_query($con, "SELECT distinct first_name FROM register where flag=0");
        $data = "";
        echo '<option value="0">Select</option>';
        while ($row = $sql->fetch_assoc()) {

            $data = $row['first_name'];


            echo '<option>' . $data . '</option>';
        }

        break;
    case "31":

        $sql = mysqli_query($con, "SELECT candidate_id FROM  resume_upload");
        $data = "";
        echo '<option value="0">Select</option>';
        while ($row = $sql->fetch_assoc()) {

            $data = $row['candidate_id'];


            echo '<option>' . $data . '</option>';
        }

        break;
    case "32":
        ?>
                                                                    <center><div class="table-responsive">  <table class="table table-striped">
                                                                                <thead> 
                                                                                    <tr> 
                                                                                        <th>Candidate Id</th> 
                                                                                        <th>Recruitement Id</th> 

                                                                                        <th>Candidate Name</th>

                                                                                        <th>Resume Path Name</th>

                                                                                        <th>Reffered by</th>


                                                                                </thead>
                                                                                </tr>

                                                                                <br />
        <?php

        $start_from = $_GET['st'];
        $limit = $_GET['end'];
        $num = 0;

        //$sql2 = "select * from recruitement where dept_name LIKE '%$name%' or tech_name like '%$name%'";
        $sql2 = "select * from resume_upload LIMIT $start_from, $limit";

        if ($result1 = mysqli_query($con, $sql2)) {
            if (mysqli_num_rows($result1) > 0) {
                $num = mysqli_num_rows($result1);
                $i = 1;
                while ($row = mysqli_fetch_array($result1)) {


                    echo "<tbody>";
                    echo '<tr>';

                    echo "<td>" . $row['candidate_id'] . "</td>";
                    echo "<td>" . $row['requirement_id'] . "</td>";
                    echo "<td>" . $row['candidate_name'] . "</td>";
                    //echo "<td><a  href='" . $row['resume_path.'] . "'>Click to see resume</a></td>";
                    echo "<td><a data-toggle='modal' href='" . $row['resume_path'] . "' target='_blank'>Click to see resume</a></a></td>";
                    echo "<td>" . $row['reffered_by'] . "</td>";


                    $i++;
                }
                echo "</tr></tbody></table></div></center>";
            }
        }
        $a = 5;

        $one = $start_from + $a;
        $two = $start_from - $a;
        if ($two < 0) {
            $two = 0;
        }

        if ($num >= 5) {


            echo "<td><button class='btn btn-success' onclick = 'getResumetList(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getResumetList(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getResumetList(" . $one . "," . $limit . ");'>next</button></td>&nbsp;&nbsp;&nbsp;";
        } else {
            echo "<table><tr><td><td><td><td><td><td><td><td><td><td><td><td></tr></table>";
            echo "<td><button class='btn btn-success' onclick = 'getResumetList(0," . $limit . ");'>First</button></td>&nbsp;&nbsp;&nbsp;";

            echo "<td><button class='btn btn-success' onclick = 'getResumetList(" . $two . "," . $limit . ");'>previous</button></td>&nbsp;&nbsp;&nbsp;";
        }
        break;
    case "33":
        $result = mysqli_query($con, "SELECT emp_dept FROM `register` WHERE emp_id='$login_emp_id'");
        $row = mysqli_fetch_row($result);

        $emp_dept = $row[0];
        $sql = mysqli_query($con, "SELECT emp_id FROM `register` WHERE emp_dept='$emp_dept' and flag=0");
        $data = "";
        echo '<option value="0">Select</option>';
        while ($row = $sql->fetch_assoc()) {

            $data = $row['emp_id'];


            echo '<option>' . $data . '</option>';
        }

        break;
    case "34":

        $sql = mysqli_query($con, "select emp_id from register where flag=0");
        $data = "";
        echo '<option value="0">Select</option>';
        while ($row = $sql->fetch_assoc()) {

            $data = $row['emp_id'];


            echo '<option>' . $data . '</option>';
        }

        break;

    default:
        echo "you went wrong";
}
?>