<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link type="text/css" rel="stylesheet" href="style.css" />
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,700' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
        <title>databases with php</title>
<?php
    $username="root";
    $password = "";
    $database = "phpdb";
    $link = mysql_connect("localhost",$username, $password);
    @mysql_select_db($database) or die("unable to select database");
    $query = "CREATE TABLE faculty (id INT(6) NOT NULL AUTO_INCREMENT, first varchar(16) NOT NULL, last varchar(16) NOT NULL, title varchar(16) NOT NULL, email varchar(32), office varchar(16), telephone int(10), PRIMARY KEY(id), UNIQUE(id))";
    //mysql_query($query);
    //echo mysql_errno($link) . ": " . mysql_error($link). "\n";?>
    </head>
    <body >
    <div class="body">
        <div class="title">databases in php</div>
        <div class="exercise">
<?php  $errors=array(); $block=false;
    if(isset($_POST["add"])){
        $first = $_POST["first"];
        if(strlen($first)==0){
            array_push($errors, "Enter a valid name");
        }
        $last = $_POST["last"];
        if(strlen($last)==0){
            array_push($errors, "Enter a valid last name");
        }
        $title = $_POST["title"];
        $email = $_POST["email"];
        if(strlen($email)==0){
            array_push($errors, "Enter a valid email");
        }
        $office = $_POST["office"];
        $telephone = $_POST["telephone"];
        if(count($errors)==0){
            $query_add = "INSERT INTO faculty(first, last, title, email, office, telephone) values('$first', '$last', '$title', '$email', '$office', '$telephone')";
            mysql_query($query_add);
        }else{
            array_push($errors, "Entry failed");
        }
    }
            ?>
            <h3>Add Faculty</h3>
                <div class="formholder">
                    <form method="post" action="<?php $_PHP_SELF ?>">
            <table>
                <thead>
                    <td>First Name</td><td>Last Name</td><td>Title</td><td>Email</td><td>Office</td><td>Telephone</td>
                </thead>
                <tbody>
                    <tr>
                    <td><input name="first" type="text" id="first"></td>
                    <td><input name="last" type="text" id="last"></td>
                    <td><select name="title"><option value="mr">Mr</option><option value="mrs">Mrs</option><option value="ms">Miss</option></select></td>
                    <td><input name="email" size="20" type="text" id="email"></td>
                    <td><input name="office" size="4" type="text" id="office"></td>
                    <td><input name="telephone" size="10" type="text" id="telephone"></td>
                    <td><input name="add" type="submit" class="pull-right" id="add" value="Add Faculty"></td>
                    </tr>
                </tbody>
            </table>
                    </form>
                </div>
        <?php if(mysql_error($link)){ ?>
        <div class="err"><?php 
        echo mysql_errno($link) . ": " . mysql_error($link). "\n";
        ?></div>
        <?php } ?>
        <?php if(count($errors)>0){ ?>
        <div class="err"><?php 
            foreach($errors as $error){
                echo $error."<br />";
            }
        ?></div>
        <?php } ?>

        </div>
    </div>
    <div class="exercise">
    <h3>Data</h3>
    <?php 
        if(isset($_POST["search"])){
            $q_first=$_POST["first"];
            $q_last=$_POST["last"];
            $q_email=$_POST["email"];
            $q_telephone=$_POST["telephone"];
            $wheres = array();
            $query_string="select * from faculty";
            if(strlen($q_first)>0){
                array_push($wheres, "first='$q_first'");
            }
            if(strlen($q_last)>0){
                array_push($wheres,"last='$q_last'");
            }
            if(strlen($q_email)>0){
                array_push($wheres, "email='$q_email'");
            }
            if(strlen($q_telephone)>0){
                array_push($wheres, "telephone='$q_telephone'");
            }
            if(count($wheres)>0){
                $append_string = " where ";
                foreach($wheres as $where){
                    $append_string = $append_string.$where." and ";
                }
                $append_string = substr($append_string, 0, strlen($append_string)-5);
                $query_string=$query_string.$append_string.";";
                echo "<div class='info'>Query string: ".$query_string."</div>";
            }
            else{
                $query_string=$query_string.";";
            }
            $result = mysql_query($query_string);
        }
        else{
            $query_string="select * from faculty;";
            $result = mysql_query($query_string);
        }
    ?>
                    <form method="post" action="<?php $_PHP_SELF ?>">
            <table>
                <thead>
                    <td>First Name</td><td>Last Name</td><td>Title</td><td>Email</td><td>Office</td><td>Telephone</td>
                </thead>
                <tbody>
                    <tr>
                    <td><input name="first" type="text" id="first"></td>
                    <td><input name="last" type="text" id="last"></td>
                    <td><!--<select value="title"><option value="mr">Mr</option><option value="mrs">Mrs</option><option value="ms">Miss</option></select>--></td>
                    <td><input name="email" size="20" type="text" id="email"></td>
                    <td><!--<input name="office" size="4" type="text" id="office">--></td>
                    <td><input name="telephone" size="10" type="text" id="telephone"></td>
                    <td><input name="search" type="submit" class="pull-right" id="search" value="Search Faculty"></td>
                    </tr>
        <?php 
            while($data = mysql_fetch_row($result)){
                echo "<tr>"./*"<td>".$data[0]."</td>.*/"<td>".$data[1]."</td><td>".$data[2]."</td><td>".$data[3]."</td><td>".$data[4]."</td><td>".$data[5]."</td><td>".$data[6]."</td></tr>";
            }
        ?>
                </tbody>
            </table>

    </div>
    </body>
<?php 
    mysql_close();
    ?>
</html>
