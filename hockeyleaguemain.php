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
        <h2 style="font-family: Calibri">Filter players by team and display all player stats</h2>
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
        <h2 style="font-family: Calibri" class="titles">Show information of player</h2>
        <input type="text" class="user-input-placeholders" name="playerFirstName" placeholder="First Name">
        <br>
        <input type="text" class="user-input-placeholders" name="playerLastName" placeholder="Last Name">
        <br><br>
        <button type="submit">Submit</button>
    </form>
</div>

<div class="box">
    <form class="mainform" action="maxPlayerSalary.php" method="get">
        <h2 style="font-family: Calibri">Find player with highest salary for team</h2>
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
        <h2 style="font-family: Calibri">Calculate average number of goals per player for team</h2>
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
    <form class="mainform" action="groupaggregatemin.php" method="get">
        <h2 style="font-family: Calibri">Minimum average team salary</h2>
        <button type="submit">Min</button>
    </form>
    <form class="mainform" action="groupaggregatemax.php" method="get">
        <h2 style="font-family: Calibri">Maximum average team salary</h2>
        <button type="submit">Max</button>
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


<div class="box">
    <form class="mainform" action="updateSalary.php" method="post">
        <h2 style="font-family: Calibri" class="titles">Update a player's salary</h2>
        <input type="text" class="user-input-placeholders" name="playerId" placeholder="Player ID">
        <br>
        <input type="text" class="user-input-placeholders" name="salary" placeholder="New salary">
        <br><br>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>



<?php


?>
