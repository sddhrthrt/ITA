<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link type="text/css" rel="stylesheet" href="style.css" />
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,700' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
        <title>sessions with php</title>
<?php
    $username="root";
    $password = "";
    $database = "php_ex";
    $link = mysql_connect("localhost",$username, $password);
    @mysql_select_db($database) or die("unable to select database");
    //mysql_query($query);
    //echo mysql_errno($link) . ": " . mysql_error($link). "\n";?>
    </head>
    <body >
    <div class="body">
        <div class="title">sessions in php</div>
        <div class="exercise">
<?php 
    session_start();
    if(isset($_POST['order'])){
        $tickets = $_POST['number'];
        $tshirts = $_POST['tshirtsize'];

        $tickets_amount = $tickets*250;
        $tshirts_amount = 0;
        $tshirts_verbose="";
        switch($tshirts){
        case 's':
            $tshirts_verbose = "Small";
            $tshirts_amount = 250;
            break;
        case 'm':
            $tshirts_verbose = "Medium";
            $tshirts_amount = 300;
            break;
        case 'l':
            $tshirts_verbose = "Large";
            $tshirts_amount = 350;
            break;
        case 'xl':
            $tshirts_verbose = "Xtra Large";
            $tshirts_amount = 400;
            break;
        default:
            $tshirts_verbose = "None";
            $tshirts_amount = 0;
            break;
        }

        $total_amount = ((int)$tickets_amount + (int)$tshirts_amount)*1.125;
    }
?>
    <table>
    <h2> Order summary: </h2>
    <div class="hold-center">
    <h3>
    Hello <?php echo $_POST['fname']." ".$_POST['lname']."!" ?></h3>
    <table>
    <tr>
    <td class="text-right">Number of Tickets ordered: </td><td><?php echo $tickets; ?></td></tr>
<tr><td class="text-right">Tshirt size: </td><td><?php echo $tshirts_verbose; ?></td></tr>
<tr><td class="text-right">Your bill amount is:</td><td> <?php echo $total_amount; ?></td></tr>
<tr><td class="text-right">A confirmation mail has been sent to : </td><td><?php echo $_POST['email']; ?></td></tr>
    </table>
    </div>
        </div>
    </div>
    </body>
<?php 
    mysql_close();
    ?>
</html>
