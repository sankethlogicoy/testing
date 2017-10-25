<?php

include('../session.php');

include('../logger.php');
include('../database.php');

$task = $_GET['num'];


switch ($task) {
    case "1":




        $username = $_GET['username'];

        $getpassword = "";

        $result = mysqli_query($con, "select total from wallet where username='$username' ORDER BY wallet_id DESC LIMIT 0, 1");
        if (!$result) {
            echo 'Could not run query: ';
            exit;
        }

        $row = mysqli_fetch_row($result);

        $total = $row[0];
        if ($total == 0) {
            $total = 0;
        }
        if ($total != 0) {
            echo $total;
        } else {
            echo $total;
        }
        break;

    case "2":
        ?>
        <center><div class="table-responsive">  <table class="table">
                    <thead> 
                        <tr> 
                            <th>SL NO</th>
                            <th>NAME</th>  
                            <th>CREDIT</th>
                            <th>DEBIT</th>
                            <th>TOTAL</th>
                            <th>DATE</th> 
                            <th>ADDED BY</th> 
                            <th>Receipts</th> 

                    </thead>
                    </tr>

                    <br />
                    <?php

                    $username = $_GET['username'];
                    $n = strcmp($user_type, "admin");
                    if ($n == 0) {
                        $sql2 = "select * from wallet where username LIKE '%$username%' order by wallet_id desc";
                    } else {
                        $sql2 = "select * from wallet where username='$login_session' order by wallet_id desc";
                    }

                    if ($result1 = mysqli_query($con, $sql2)) {
                        if (mysqli_num_rows($result1) > 0) {


                            $i = 1;


                            while ($row = mysqli_fetch_array($result1)) {

                                echo "<tbody>";
                                echo "<tr class=''>";

                                echo "<tr class=''>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>  &#8377;&nbsp;" . $row['credit'] . "</td>";
                                echo "<td>  &#8377;&nbsp;" . $row['debit'] . "</td>";
                                echo "<td>  &#8377;&nbsp;" . $row['total'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['admin_by'] . "</td>";

                                if ($row['debit'] > 0) {
                                    echo ' <input type="hidden" class="border" id="name' . $i . '" value=' . $row['wallet_image_name'] . '>';
                                    echo "<td><a data-toggle='modal' href='javascript:void(0);' onclick = 'dynamicImage(name" . $i . ".value);'>Click to see receipt</a></a></td>";
                                } else {
                                    echo "<td>" . $row['wallet_image_name'] . "</td>";
                                }
                                $i++;
                            }
                            echo "</tr></tbody></div></table></center>";
                        }
                    }
                    break;
                default:
                    echo "you went wrong";
            }
            ?>
	 
