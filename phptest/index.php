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
        $middlename = "R";
        $lastname = "Thota";
        $time = "afternoon";
        //now let's form a sentence
        $statement = "Good ";
        $statement .= $time;
        $statement .= ", my name is ";
        $statement .= $lastname;
        //yes, you have to put the spaces yourself.
        $statement .= ", ";
        $statement .= $name." ".$middlename;
        //sample echo statement
        echo "I'm echoing this: ".$statement;
        //sample print statement
        print ("<br />I'm printing this: ".$statement);
        //A comma doesn't work.
?>
        </div>

        <div class="exercise">
<?php
        $one = 50;
        $two = 60;
        $three = $two/$one;
        echo "50/60 equals ".$three;
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
                        "sex" => "Male",
                        "pass" => "password",
                        "hash" => ""),
            1 => array("name" => "Anirudha",
                        "age"  => "21",
                        "dept" => "IT",
                        "sex" => "Male",
                        "pass" => "s&y",
                        "hash" => "",),
            2 => array("name" => "Anirudha",
                        "age"  => "21",
                        "dept" => "IT",
                        "sex" => "Male",
                        "pass" => "newpass2**",
                        "hash" => "",),
            3 => array("name" => "Sagar",
                        "age"  => "21",
                        "dept" => "IT",
                        "sex" => "Male",
                        "pass" => "awesome$@##word",
                        "hash" => "",),
        );
        foreach($student_info as $id=>$student){
            //$student['hash']= hash("md5", $student['pass']);
            $student_info[$id]['hash'] =  hash("md5", $student['pass']);

        }
?>
        <table>
            <thead><td>Name</td><td>Age</td><td>dept</td><td>sex</td><td>password</td><td>hash</td></thead>
            <tbody>
<?php foreach($student_info as $student){ ?>
            <tr> <?php foreach ($student as $key => $value ){ ?>
                <td> <?php echo $value ?> </td>
                <?php } ?>
            </tr>
<?php }?>
</tbody>
        </table>
        </div>
        
        <div class="exercise">
            Checking for duplicates:<br />
            <?php
                $count = 0;
                foreach($student_info as $id => $student){
                    foreach($student_info as $anotherid => $anotherstudent){
                        if($student['name']==$anotherstudent['name'] && $id != $anotherid ){
                            $studentname = $student['name'];
                            $count += 1;
                            echo "<span class='err'>Error!</span> $studentname repeated<br/>";
                        }
                    }
                }
                if(!$count){
                    echo "No errors found.<br />";
                }
            ?>
            <br />Checking passwords:<br/>
            <?php 
                foreach($student_info as $student){
                    $name = $student['name'];
                    if(ctype_alnum($student['pass'])){
                        echo "<span class='err'>Error! </span>$name, your password must contain a special character.<br />";
                    }
                    if(strlen($student['pass'])<5){
                        echo "<span class='err'>Error! </span>$name, your password must be atleast 5 chars long <br />";
                    } 
                }
            ?>
        </div>
        <div class="exercise">
            Using get_name_from_ID($array, $item):<br />
            <?php 
                function get_name_from_ID($student_info, $q_id){
                    foreach($student_info as $id => $student ){
                        if($id == $q_id){
                           return $student['name']; 
                        }
                    }
                }
                foreach($student_info as $id=>$student){
                    echo "id ".$id." is ".get_name_from_ID($student_info, $id)."<br />";
                }
            ?>
        </div>
        <div class="exercise">
            Today is :
            <?php echo date("l, d M Y H:i:s");
            ?>
        </div>
    </div>
    </body>

</html>
