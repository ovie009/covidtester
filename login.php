<?php

    include_once "./database_connect.php";
    if (isset($_POST["username"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $accountType = $_POST['account_type'];
        // echo $username.'#'.$password.'#'.$accountType;

        // sql query
        $sql = "SELECT * FROM `login` WHERE username = ?;";
    
        // create prepared statement
        $stmt = mysqli_stmt_init($connect);
    
        // run prepared statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'Query Failed';
        } else {
            // Bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "s", $username);
            // run parameters inside database
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                # code...
                $dataUser = $row['username'];
                $dataPassword = $row['password'];
                $dataAccountType = $row['account_type'];
                if ($accountType === $dataAccountType) {
                    if ($password === $dataPassword) {
                        # code...
                        session_start();
                        $_SESSION['account_type'] = $dataAccountType;
                        $expiration = time() + 7200; // expiration date is two hours from now
                        setcookie("account_type", $dataAccountType, $expiration);
                        echo "successful";
                        // header("location: index.php?successful");
                        
                    } else {
                        echo "incorrectPassword";
                        // header("location: index.php?incorrectPassword");
                    }
                } else {
                    echo "invalidAccount";
                }
            } else {
                # code...
                echo "invalidUser";
                // header("location: index.php?invalidUsername");
            }
            mysqli_stmt_close($stmt);
            mysqli_close($connect);
            
        }
    } else {
        # code...
        header("location: index.php?invalidBackdoor");
        // echo 'invalid back door';
    }
    
?>
