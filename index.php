<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>covid tester</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./icons/coronavirus.png" type="image/x-icon">
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

                <h1 class="login_heading">c<img class="covid_icon" src="./icons/coronavirus.png" alt="">vid tester</h1>
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
            if ($_SESSION['account_type'] == 'Doctor') {
                # code...?>
                <table>
                    <tr>
                        <th>Patient</th>
                        <th>Heart Rate (BPM)</th>
                        <th>Oxygen Level (%0) </th>
                        <th>Temperature (<sup>0</sup>C) </th>
                        <th>Datetime</th>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>2023-01-16 10:30am</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>2023-01-16 10:30am</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>2023-01-16 10:30am</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>2023-01-16 10:30am</td>
                    </tr>
                </table>
                <div class="show_buttons_wrapper">
                    <button type="button">show less</button>
                    <button type="button">show more</button>
                </div>
                <?php
            } else if ($_SESSION['account_type'] == 'Patient') {
                # code...?>
                <nav>
                    <a href="./logout.php">logout</a>
                </nav>
                <ul class="readings">
                    <li>
                        <strong> Heart Rate: </strong>
                        <span>
                            0<sup>BPM</sup>
                        </span>
                    </li>
                    <li>
                        <strong>Oxygen Levels: </strong>
                        <span>
                            0<sup>%</sup> 
                        </span>
                    </li>
                    <li>
                        <strong>Temperature:</strong>  
                        <span>
                            0<sup>0</sup>C 
                        </span>
                    </li>
                    <li>2023-01-16 10:30am</li>
                </ul>
                <?php
            }
        }
    ?>
</body>
</html>