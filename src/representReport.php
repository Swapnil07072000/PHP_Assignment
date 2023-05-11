<?php
    if((!isset($_COOKIE['id'])) && (!isset($_COOKIE['fname'])) &&
    (!isset($_COOKIE['lname'])) && (!isset($_COOKIE['eng'])) &&
    (!isset($_COOKIE['hin'])) && (!isset($_COOKIE['maths'])) &&
    (!isset($_COOKIE['science'])) && (!isset($_COOKIE['his'])) &&
    (!isset($_COOKIE['geo']))) {
        header("Location: reportForm.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="../assets/css/style.css"></link>
    <title>Report Card</title>
</head>
<body>

    <?php
        
        function grade($marks) {
            define('outOff', 100);
            $cal = ($marks*100)/100;
            if($cal>=75) return "Distinction";
            else if(($cal>=60) && ($cal<=74)) return "First Class";
            else if(($cal>=33) && ($cal<=59)) return "Pass";
            if($cal < 33) return "Fail";
        }
        function finalGrade($sub1, $sub2, $sub3, $sub4, $sub5, $sub6) {
            $cal = (($sub1+$sub2+$sub3+$sub4+$sub5+$sub6)*100)/(100*6);
            $cal = round($cal);
            if($cal>=75) return "Distinction";
            else if(($cal>=60) && ($cal<=74)) return "First Class";
            else if(($cal>=33) && ($cal<=59)) return "Pass";
            if($cal < 33) return "Fail";
        }
    ?>

    <div id="displayPage">
        <div id="title" class="row">
            <h3><b>Grade Report</b></h3>
        </div>
        <div class="row">
            <div class="col">
                <p name="studentID"><b>Student ID: </b></p>
                <p name="studentID_val"><?php echo ($_COOKIE['id']) ?></p>
            </div>
            <div class="col">
                <p name="studentName"><b>Student Name: </b></p>
                <p name="studentName_val"><?php echo 
                ($_COOKIE['fname']." ".$_COOKIE['lname']); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p name="studentBranch"><b>Branch/Class: </b></p>
                <p name="studentBranch_val"><?php 
                                                if($_COOKIE['bname'] && 
                                                $_COOKIE['bname'] != "None") {
                                                    echo ($_COOKIE['bname']);
                                                 }else echo "----"; 
                                            ?>
                </p>
            </div>
        </div>
        <div class="row" id="email">
            <div class="col">
                <p name="studentEmail"><b>Email ID: </b></p>
                <p name="studentEmail_val"><?php 
                                                if($_COOKIE['email'] && 
                                                $_COOKIE['email'] != "None") {
                                                    echo ($_COOKIE['email']);
                                                 }else echo "----" 
                                            ?>
                </p>
            </div>
        </div>
        <div class="row">
            <table class="table border">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>English</td>
                        <td><?php echo ($_COOKIE['eng'])?></td>
                        <td><?php
                            if(isset($_COOKIE['eng'])) {
                                echo grade($_COOKIE['eng']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Hindi</td>
                        <td><?php echo ($_COOKIE['hin'])?></td>
                        <td><?php
                            if(isset($_COOKIE['hin'])) { 
                                echo grade($_COOKIE['hin']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Maths</td>
                        <td><?php echo ($_COOKIE['maths'])?></td>
                        <td><?php 
                            if(isset($_COOKIE['maths'])) {
                                echo grade($_COOKIE['maths']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Science</td>
                        <td><?php echo ($_COOKIE['science'])?></td>
                        <td><?php 
                            if(isset($_COOKIE['science'])) {
                                echo grade($_COOKIE['science']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>History</td>
                        <td><?php echo ($_COOKIE['his'])?></td>
                        <td><?php 
                            if(isset($_COOKIE['his'])) {
                                echo grade($_COOKIE['his']);
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Geography</td>
                        <td><?php echo ($_COOKIE['geo'])?></td>
                        <td><?php 
                            if(isset($_COOKIE['geo'])) {
                                echo grade($_COOKIE['geo']);
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="grade" class="row">
            <p><b>Final Grade: </b><?php echo (finalGrade($_COOKIE['eng'], $_COOKIE['hin'],
            $_COOKIE['maths'], $_COOKIE['science'], $_COOKIE['his'], $_COOKIE['geo']))?></p>
        </div>
        <div id="remark" class="row">
            <p><b>Remark: </b></p>
            <div class="col box-model">
                <?php
                    if($_COOKIE['remark'] && 
                    $_COOKIE['remark'] != "None") {
                        echo ($_COOKIE['remark']);
                     }else echo "----";
                ?>
            </div>
        </div>
        <div class="row text-center">
            <button type="button" id="backBtn" class="btn btn-primary btn-sm title">Back</button>
        </div>
    </div>
    <script  src="../assets/js/jquery-3.6.4.min.js"></script>
    <script  src="../assets/js/bootstrap.min.js"></script>
    <script  src="../assets/js/script.js"></script>
</body>
</html>