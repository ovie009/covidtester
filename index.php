<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>covid tester</title>
    <link rel="stylesheet" href="style.css">
    <script src="./jquery-3.4.1.min.js"></script>
    <script src="./main.js"></script>
</head>
<body>
    <h1>covid tester</h1>
    <form>
        <input type="text" name="username" id="username" placeholder="username">
        <input type="password" name="password" id="password" placeholder="password">
        <div class="mode_wrapper">
            <select name="account_type" id="account_type">
                <option value="Patient">Patient</option>
                <option value="Doctor">Doctor</option>
            </select>
            <button type="button">login</button>
        </div>
    </form>

    <ul class="readings">
        <li>
            <strong> Heart Rate: </strong>  
            0<sup>BPM</sup>
         </li>
        <li>
            <strong>Oxygen Levels: </strong>
            0<sup>%</sup> 
        </li>
        <li>
            <strong>Temperature:</strong>  
            0<sup>0</sup>C 
        </li>
        <li>2023-01-16 10:30am</li>
    </ul>

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
</body>
</html>