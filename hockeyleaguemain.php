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
    <form class="mainform" action="hockeyleaguemain.php">
        <h2 style="font-family: Calibri">filter players by team and display all player stats</h2>
        <select name="teamSelected">
            <option value="Oilers">Oilers</option>
            <option value="Canucks">Canucks</option>
            <option value="Flames">Flames</option>
            <option value="MapleLeafs">Maple Leafs</option>
            <option value="Jets">Jets</option>
            <input type="submit">
    </form>
</div>

<div class="box">
    <form class="mainform" action="hockeyleaguemain.php">
        <h2 style="font-family: Calibri" class="titles">show coach of player</h2>
        <input type="text" class="user-input-placeholders" name="playerFirstName" placeholder="First Name">
        <input type="text" class="user-input-placeholders" name="playerLastName" placeholder="Last Name">
        <button type="submit">submit</button>
    </form>
</div>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: aaron
 * Date: 2018-03-23
 * Time: 3:56 PM
 */
$db_conn = OCILogon("ora_z0i0b", "a35396150", "dbhost.ugrad.cs.ubc.ca:1522/ug"); // establish connection

function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
    //echo "<br>running ".$cmdstr."<br>";
    global $db_conn, $success;
    $statement = OCIParse($db_conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

    if (!$statement) {
        echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
        $e = OCI_Error($db_conn); // For OCIParse errors pass the
        // connection handle
        echo htmlentities($e['message']); // test
        $success = False;
    }

    $r = OCIExecute($statement, OCI_DEFAULT);
    if (!$r) {
        echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
        $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
        echo htmlentities($e['message']);
        $success = False;
    } else {

    }
    return $statement;

}

$team = $_GET['teamSelected']; // get the team from drop table

$query = 'select * from Players where team = ' . $team; // form query using drop table input

echo $query; // printf

$stid = oci_parse($db_conn, $query);
$r = oci_execute($stid);

print '<table border = "1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
    print '<tr>';
    foreach ($row as $item) {
        print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
    }
    print '</tr>';
}
print '</table>';

?>