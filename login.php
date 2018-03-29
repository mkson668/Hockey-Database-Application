<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background: #a0f2e0;
        }

        .box {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .mainform .titles,
        .mainform .checkbox {
            margin-bottom: 30px;
        }

        .mainform .checkbox {
            font-weight: bolder;
        }

        .mainform .user-input-placeholders {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
        }

        .mainform input[type="username"] {
            margin-bottom: 10px;
        }

        .mainform input[type="password"] {
            margin-bottom: 20px;
        }

        .mainform {
            max-width: 400px;
            padding: 15px 35px 45px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 3px solid rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<div class="box">
    <h1 style="font-family: Calibri" class="titles" align="center">Hockey League Database System</h1>
    <form class="mainform" action="hockeyleaguemain.php">
        <h2 style="font-family: Calibri" class="titles">Please enter credentials</h2>
        <input type="username" class="user-input-placeholders" name="username" placeholder="Player Username" required/>
        <input type="password" class="user-input-placeholders" name="password" placeholder="Password" required/><br>
        <label class="checkbox">
            <input style="font-family: Calibri" type="checkbox" name="rememberMe">
            Remember me
        </label> &nbsp; &nbsp;
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 2018-03-23
 * Time: 12:06 PM
 */
?>
