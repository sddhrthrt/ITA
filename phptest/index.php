<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <link type="text/css" rel="stylesheet" href="style.css" />
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,700' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
        <title>php basics</title>
    </head>
    <body >
    <div class="body">
        <div class="title">php basics</div>
        <div class="exercise">
<?php
        //variables galore
        $name = "Siddhartha";
        $surname = "RT";
        $time = "afternoon";
        //now let's form a sentence
        $statement = "Good ";
        $statement .= $time;
        $statement .= ", My name is ";
        $statement .= $surname;
        //yes, you have to put the spaces yourself.
        $statement .= ", ";
        $statement .= $name;
        //sample echo statement
        echo $statement;
        //sample print statement
        print ("<br />i'm printing this: ".$statement);
        //A comma doesn't work.
?>
        </div>

        <div class="exercise">
<?php
        $one = 50;
        $two = 60;
        $three = $two/$one;
        echo $three;
?>
        </div>

        <div class="exercise">
<?php
        echo "while loop: <br />";
        $i = 0;
        while($i < 5){
            echo $i."<br />";
            $i++;
        }
        echo "for loop: <br />";
        for($i=0;$i<5;$i++){
            echo $i."<br />";
        }
?>
        </div>

        <div class="exercise">
<?php
        $student_info = array(
            0 => array("name" => "Siddhartha",
            "age"  => "21",
            "dept" => "IT",
            "sex" => "Male"),
            1 => array("name" => "Anirudha",
            "age"  => "21",
            "dept" => "IT",
            "sex" => "Male"),
        );
?>
        <table>
            <th><td>Name</td><td>Age</td><td>dept</td><td>sex</td></th>
<?php
        for($i=0;$i<count($student_info);$i++){
            echo "<tr>
                <td>$student_info[$i]['name']</td>
                <td>$student_info[$i]['age'] </td>
                <td>$student_info[$i]['dept'] </td>
                <td>$student_info[$i]['sex'] </td>
                </tr>";
        }

?>
        </table>
        </div>

    </div>
    </body>

</html>
