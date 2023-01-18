<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>covid tester</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./images/coronavirus.png" type="image/x-icon">
    <script src="./jquery-3.4.1.min.js"></script>
    <script src="./main.js"></script>
</head>
<body>
    <?php 

        if (!isset($_SESSION['account_type'] )) {
            # code...?>
            <div class="login_wrapper">
                <div class="error_notice invalidUser">
                    Invalid User!
                </div>
                <div class="error_notice incorrectPassword">
                    Incorrect Password!
                </div>
                <div class="error_notice invalidAccount">
                    Invalid Account Type!
                </div>

                <h1 class="login_heading">c<img class="covid_icon" src="./images/coronavirus.png" alt="">vid tester</h1>
                <form class="login_form">
                    <input type="text" name="username" id="username" placeholder="username">
                    <input type="password" name="password" id="password" placeholder="password">
                    <div class="show_password_wrapper">
                        <input type="checkbox" name="showPassword" id="show-password" > <label for="show-password">show password</label>
                    </div>
                    <div class="login_form_footer">
                        <select name="account_type" id="account_type">
                            <option value="Patient">Patient</option>
                            <option value="Doctor">Doctor</option>
                        </select>
                        <button type="button" class="login_submit">login</button>
                    </div>
                </form>
            </div>
            <?php
        } else {
            ?><nav>
                <a class="logout" href="./logout.php">logout</a>
            </nav><?php
            if ($_SESSION['account_type'] == 'Doctor') {
                # code...?>
                <section class="doctor_section">
                    <h1 class="login_heading">c<img class="covid_icon" src="./images/coronavirus.png" alt="">vid tester</h1>
                    <table>
                        
                    </table>
                    <div class="show_buttons_wrapper">
                        <button type="button">show less</button>
                        <button type="button">show more</button>
                    </div>
                </section>
                <?php
            } else if ($_SESSION['account_type'] == 'Patient') {
                # code...?>
                <section class="patient_section">
                    <h1 class="login_heading">c<img class="covid_icon" src="./images/coronavirus.png" alt="">vid tester</h1>
                    <ul id="readings" class="readings">
                        <li>
                            <img src="./images/heart-beats.png" alt="heart rate icon">
                            <strong> Heart Rate: </strong>
                            <span>
                                0<sup>BPM</sup>
                            </span>
                        </li>
                        <li>
                            <img src="./images/oxygen-saturation.png" alt="oxygen level icon">
                            <strong>Oxygen Levels: </strong>
                            <span>
                                0<sup>%</sup> 
                            </span>
                        </li>
                        <li>
                            <img src="./images/hot.png" alt="temperature icon">
                            <strong>Temperature:</strong>  
                            <span>
                                0<sup>0</sup>C 
                            </span>
                        </li>
                        <li class="datetime_indicator">2023-01-16 10:30am</li>
                    </ul>
                    <a class="contact_doctor" href="tel:+2347088960285">Contact Doctor</a>
                </section>
                <?php
            }
        }
    ?>
</body>
</html>