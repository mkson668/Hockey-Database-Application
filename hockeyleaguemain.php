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
        .mainform {
            margin-bottom: 30px;
        }
        .mainform {
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
    <form class="mainform" action="selection.php" method="get">
        <h2 style="font-family: Calibri">filter players by team and display all player stats</h2>
        <select name="teamSelected">
            <option value="Oilers">Oilers</option>
            <option value="Canucks">Canucks</option>
            <option value="Flames">Flames</option>
            <option value="Maple Leafs">Maple Leafs</option>
            <option value="Jets">Jets</option>
        </select> <br><br>
            <input type="submit">
    </form>
</div>

<div class="box">
    <form class="mainform" action="join.php" method="get">
        <h2 style="font-family: Calibri" class="titles">show info of player</h2>
        <input type="text" class="user-input-placeholders" name="playerFirstName" placeholder="First Name">
        <br>
        <input type="text" class="user-input-placeholders" name="playerLastName" placeholder="Last Name">
        <br><br>
        <button type="submit">Submit</button>
    </form>
</div>

<div class="box">
    <form class="mainform" action="maxPlayerSalary.php" method="get">
        <h2 style="font-family: Calibri">Find player with highest salary</h2>
        <select name="teamSalarySelected">
            <option value="All Teams">All Teams</option>
            <option value="Oilers">Oilers</option>
            <option value="Canucks">Canucks</option>
            <option value="Flames">Flames</option>
            <option value="Maple Leafs">Maple Leafs</option>
            <option value="Jets">Jets</option>
        </select> <br><br>
        <input type="submit">
    </form>
</div>

<div class="box">
    <form class="mainform" action="division.php">
        <h2 style="font-family: Calibri">Return all teams that have played at every venue</h2>
        <button type="submit">Submit</button>
    </form>
</div>

<div class="box">
    <form class="mainform" action="averageGoals.php" method="get">
        <h2 style="font-family: Calibri">Calculate average number of goals per player</h2>
        <select name="teamGoalSelected">
            <option value="All Teams">All Teams</option>
            <option value="Oilers">Oilers</option>
            <option value="Canucks">Canucks</option>
            <option value="Flames">Flames</option>
            <option value="Maple Leafs">Maple Leafs</option>
            <option value="Jets">Jets</option>
        </select> <br><br>
        <button type="submit">Calculate</button>
    </form>
</div>

<div class="box">
    <form class="mainform" action="deleteGame.php" method="post"> 
        <h2 style="font-family: Calibri">Delete a game</h2> 
        <input type="text" class="user-input-placeholders" name="gameId" placeholder="Game ID">
        <br><br>
        <button type="submit">Delete</button>
    </form>
</div>


<div class="box">
    <form class="mainform" action="viewTickets.php" method="get"> 
        <h2 style="font-family: Calibri">Find tickets for a Game</h2> 
        <input type="text" class="user-input-placeholders" name="gameId" placeholder="Game ID">
        <br><br>
        <button type="submit">Find Tickets</button>
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
/*$db_conn = OCILogon("ora_z0i0b", "a35396150", "dbhost.ugrad.cs.ubc.ca:1522/ug");
if ($db_conn) {
    echo 'it connected';
    }else{
    $err = OCIError();
    echo 'does not connect';
} // establish connection
$team = $_GET['teamSelected']; // get the team from drop table
$query = 'SELECT * FROM Players' . $team; // form query using drop table input
echo $query; // printf
$stid = OCIParse($db_conn, $query);
//oci_bind_by_name($stid, ':team', $team, -1);
if (!$stid) {
    echo "<br>Cannot parse the following command: " . $query . "<br>";
    $e = oci_error($db_conn);
    echo htmlentities($e['message']);
} else {
    echo "<br>parsed following command: " . $query . "<br>";
    echo $stid . "<br>";
    $r = OCIExecute($stid);
    print '<table border = "1">';
    while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
        print '<tr>';
        foreach ($row as $item) {
            print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
        }
        print '</tr>';
    }
    print '</table>';
}*/
?>
