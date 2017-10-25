<?php
include('login.php'); // Includes Login Script

if (isset($_SESSION['login_user'])) {
    header("location: profile");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Artifact Employee Login Portal</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><link href="css/fonts.css" rel="stylesheet" type="text/css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css?x25758" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../images/Artifact.ico">
        <script type="text/javascript" src="validate.js"></script> 
    </head>
    <body>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="main">
                <img src="images/Artifact.png" alt="logo" class="img_logo"/>
                <h1 class="portal_txt">PORTAL</h1>

                <div id="login">
                    <center>
                        <form action="" method="post" onsubmit="return loginValidate();">


                            <table>
                                <tr>
                                <label id="lb3"><?php echo $error; ?></label><br>
                                <label id="lb1"></label><br>
                                <td>

                                </td>
                                <td>
                                    <input id="username" name="username" placeholder="Username" type="text">
                                </td>
                                </tr>
                                <tr><td colspan="2">

                                        <label id="lb2"></label><br>

                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <input id="password" name="password" placeholder="Password" type="password">
                                    </td>
                                </tr>

                                <tr><th colspan="2">

                                        <input name="submit" type="submit" class="login_hvr" value=" LOGIN ">

                                    </th>
                                </tr>
                            </table>


                    </center>
					

                    <br><a href="forgetpassword.php" class="forget_clr">Forget Password</a>
                    </form>

                </div>
            </div>
        </div>



    </body>
</html>