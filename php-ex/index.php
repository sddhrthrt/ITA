<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link type="text/css" rel="stylesheet" href="style.css" />
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,700' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
        <title>php exercise 1</title>
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
    if(isset($_POST['login'])){
        if($_SESSION['username']!=''){
            echo "<div class='err'>Some other user already logged in.</div><br />";
        }
        $query = 'select password from users where username="'.$_POST['name'].'"';
        $result = mysql_query($query);
        if(mysql_num_rows($result)>0){
            $password = mysql_fetch_array($result);
            $password = $password[0];
            if($_POST['password']==$password){
               echo "You are logged in.";
                $_SESSION['username']=$_POST['name'];
            }
            else{
            echo "Sorry, wrong username/password combination";
            }
        }else{
            echo "Sorry, wrong username/password combination";
        }
    }
    if(isset($_POST['logout'])){
        if($_SESSION['username']!=''){
            $_SESSION['username']='';
            echo "Successfully logged out.";
        }
        else{
            echo "No user logged in.";
        }
    }
    if($_SESSION['username']==''){
?>
        <form method="post" action=<?php echo $_SERVER['PHP_SELF'] ?>>
                Log in:<input type="text" name="name" value="username" />
                <input type="password" name="password" value="password" />
                <input type="submit" name="login" value="Log In" />
        </form>
<?php }else{ ?>
        Welcome, <?php echo $_SESSION['username']; ?>!
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="submit" name="logout" value="Log Out" />
        </form>
<?php } ?>
        </div>

        <div class="exercise">
            <form action="billing.php" method="post">
            <h3> Event registration form </h3>
            <hr />
            How many people are you buying tickets for?
            <select name="number">
            <option value="1" name="1" >1</option>
            <option value="2" name="2" >2</option>
            <option value="3" name="3" >3</option>
            <option value="4" name="4" >4</option>
            <option value="5" name="5" >5</option>
            <option value="6" name="6" >6</option>
            <option value="10" name="10" >10</option>
            </select> 
            <br /><br />
            What's the size of your tshirt?
            <input type="radio" name="tshirtsize" id="s" checked="checked" value="s" /><label for="s">Small</label></input>
            <input type="radio" name="tshirtsize" id="m" value="m" /><label for="m">Medium</label></input>
            <input type="radio" name="tshirtsize" id="l" value="l" /><label for="l">Large</label></input>
            <input type="radio" name="tshirtsize" id="xl" value="xl" /><label for="xl">Extra Large</label></input>
            <hr />
            Name:*<br />
            <input type="text" name="fname" size="10" /><input type="text" name="lname" size="15" />
            <br /> Email: <br />
            <input type="email" name="email" size="30" />
            <br />
            <input type="submit" value="submit" name="order" />
        </div>
    </div>
    </body>
<?php 
    mysql_close();
    ?>
</html>
