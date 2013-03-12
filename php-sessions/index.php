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
    $database = "phpdb";
    $link = mysql_connect("localhost",$username, $password);
    @mysql_select_db($database) or die("unable to select database");
    $query = "";
    //mysql_query($query);
    //echo mysql_errno($link) . ": " . mysql_error($link). "\n";?>
    </head>
    <body >
    <div class="body">
        <div class="title">sessions in php</div>
        <div class="exercise">
        <a href="?hello=True">  Click here for a greeting, <?php echo ($_COOKIE['name']!='' ? $_COOKIE['name'] : "Guest") ?></a>

             <div id="greeting">
<?php 
    session_start();
    echo "<div><br /><span class='info'>This session id is ".session_id()."</span></div>";
                if(isset($_GET['reset'])){
                    if(isset($_SESSION['count'])){
                        $_SESSION['count']=1;
                    }
                    setcookie('name', '', time());
                    $_SESSION=array();
                    session_destroy();
                    header('Location: '.$_SERVER['PHP_SELF']); 
                }
                if(isset($_GET['name'])){
                    if($_GET['name']!=""){
                        setcookie('name', $_GET['name'], time()+86400);
                    }
                       header('Location: '.$_SERVER['PHP_SELF']); 
                }
                if(isset($_GET['hello'])||$_COOKIE['name']!=""){
                    if(!isset($_SESSION['count'])){
                        $_SESSION['count']=1;
                    }else{
                        $_SESSION['count']++;
                    }
                    $greetings = array("Hello!", "Hi!", "Heya!", "Cheerio!", "Hallo!!", "Heeeeeey!!!");
                    echo $greetings[array_rand($greetings)]." You are visiter no. ".$_SESSION['count'].", ".($_COOKIE['name']!=''?$_COOKIE['name']:"Guest.");
                    echo "<br />";
                }
                if($_COOKIE['name']==''){?>
                        <br />
                        Hey, what's your name? 
                        <form method="get" action="">
                            <input type="text" name="name"/>
                            <input type="submit" name="name_submit" value="Yeah" />
                        </form>
                    <?php }
                ?>
            </div>
            <br />
                <a href="?reset=True"> Click here to reset </a><span class="err">(Your name and the visitor count will be forgotten!)</span>
        </div>

    </div>
    </body>
<?php 
    mysql_close();
    ?>
</html>
