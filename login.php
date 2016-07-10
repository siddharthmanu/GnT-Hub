<?php
        include 'dbconnect.php';
        if($_POST['roll']!==NULL && $_POST['pass']!==NULL)
        {
                $roll = strtolower($_POST['roll']);
                $pass = $_POST['pass'];
                $query = "SELECT * FROM members WHERE roll='$roll'";
                $result = mysql_query($query);
                $person = mysql_fetch_object($result);
                if(!empty($person))
                {
                        if($person->password == NULL)
                        {
                                $json = file_get_contents('http://mobile.nitrkl.ac.in/check.php?f1='.$roll.'&f2='.$pass);
                                $obj = json_decode($json);
                                if($obj->re=="success")
                                {
                                        mysql_query("UPDATE members SET password='$pass' WHERE roll='$roll'");
                                        $check = true;
                                }
                                else
                                        $check = false;
                        }
                        else
                                $check = ($person->password == $pass);
                        if ($check)
                        {
                                mysql_query("UPDATE members SET last_login=NOW() WHERE roll='$roll'");
                                mysql_query("UPDATE members SET no_of_logins=no_of_logins+1 WHERE roll='$roll'");
                                session_start();
                                $_SESSION['roll'] = $roll;
                                echo 'success';
                        }
                        else
                                echo 'error';
                }
                else
                        echo 'error';
        }
        else
                header('Location: index');
?>