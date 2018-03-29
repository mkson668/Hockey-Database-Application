
<?php
$db_conn = OCILogon("ora_p0x8", "a35103126", "dbhost.ugrad.cs.ubc.ca:1522/ug");
if ($db_conn) {
    #echo 'it connected';
} else {
    $err = OCIError();
    echo 'does not connect';
} // establish connection
echo "<h2>Average goals of all players</h2><br>";

/*$query = 'SELECT avg(goals)
FROM Players';

$stid = OCIParse($db_conn, $query);
    
if (!$stid) {
    echo "<br>Cannot parse the following command: " . $query . "<br>";
    $e = oci_error($db_conn);
    echo htmlentities($e['message']);
} else {
#    echo "<br>parsed following command: " . $query . "<br>";
#    echo $stid . "<br>";
    $r = OCIExecute($stid);
    if (!$r) {
echo oci_error($stid);
}
    print '<table border = "1">';
    while ($row = oci_fetch_array($stid, OCI_NUM + OCI_RETURN_NULLS)) {
        print '<tr>';
        foreach ($row as $item) {
            print '<td>' . ($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp') . '</td>';
        }
        print '</tr>';
    }
    print '</table>';
}*/

$team = $_GET['teamGoalSelected'];

if ($team == 'All Teams') {
    $query = 'SELECT AVG(goals) FROM Players';
    $stid = OCIParse($db_conn, $query);

    if (!$stid) {
        echo "<br>Cannot parse the following command: " . $query . "<br>";
        $e = oci_error($db_conn);
        echo htmlentities($e['message']);
    } else {
#    echo "<br>parsed following command: " . $query . "<br>";
#    echo $stid . "<br>";
        $r = OCIExecute($stid);
        if (!$r) {
            echo oci_error($stid);
        }
        print '<table border = "1">';

    $ncols = oci_num_fields($stid);
    echo "<tr>";
    for ($i = 1; $i <= $ncols; $i++) {
       $columnName = oci_field_name($stid, $i);
        echo "<td>$columnName</td>";
    }
    echo "</tr>";

        while ($row = oci_fetch_array($stid, OCI_NUM + OCI_RETURN_NULLS)) {
            print '<tr>';
            foreach ($row as $item) {
                print '<td>' . ($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp') . '</td>';
            }
            print '</tr>';
        }
        print '</table>';
    }

    $query = 'SELECT goals, name, teamName FROM Players';
    $stid = OCIParse($db_conn, $query);

    if (!$stid) {
        echo "<br>Cannot parse the following command: " . $query . "<br>";
        $e = oci_error($db_conn);
        echo htmlentities($e['message']);
    } else {
#    echo "<br>parsed following command: " . $query . "<br>";
#    echo $stid . "<br>";
        $r = OCIExecute($stid);
        if (!$r) {
            echo oci_error($stid);
        }
        print '<table border = "1">';

    $ncols = oci_num_fields($stid);
    echo "<tr>";
    for ($i = 1; $i <= $ncols; $i++) {
       $columnName = oci_field_name($stid, $i);
        echo "<td>$columnName</td>";
    }
    echo "</tr>";

        while ($row = oci_fetch_array($stid, OCI_NUM + OCI_RETURN_NULLS)) {
            print '<tr>';
            foreach ($row as $item) {
                print '<td>' . ($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp') . '</td>';
            }
            print '</tr>';
        }
        print '</table>';
    }
} else {

    $query = 'SELECT avg(goals), teamName
FROM Players WHERE teamName = :team';

    $stid = OCIParse($db_conn, $query);

    if (!$stid) {
        echo "<br>Cannot parse the following command: " . $query . "<br>";
        $e = oci_error($db_conn);
        echo htmlentities($e['message']);
    } else {

        $team = $_GET['teamGoalSelected'];
        $query = 'SELECT AVG(goals)
FROM Players WHERE teamName = :team';
        $stid = OCIParse($db_conn, $query);
        OCIBindByName($stid, ':team', $team);

        if (!$stid) {
            echo "<br>Cannot parse the following command: " . $query . "<br>";
            $e = oci_error($db_conn);
            echo htmlentities($e['message']);
        } else {
#    echo "<br>parsed following command: " . $query . "<br>";
#    echo $stid . "<br>";

            $r = OCIExecute($stid);

            print '<table border = "1">';

    $ncols = oci_num_fields($stid);
    echo "<tr>";
    for ($i = 1; $i <= $ncols; $i++) {
       $columnName = oci_field_name($stid, $i);
        echo "<td>$columnName</td>";
    }
    echo "</tr>";

            while ($row = oci_fetch_array($stid, OCI_NUM + OCI_RETURN_NULLS)) {
                print '<tr>';
                foreach ($row as $item) {
                    print '<td>' . ($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp') . '</td>';
                }
                print '</tr>';
            }
            print '</table>';
        }

        $query = 'SELECT name, goals, teamName FROM Players WHERE teamName = :team';
        $stid = OCIParse($db_conn, $query);
        OCIBindByName($stid, ':team', $team);

        if (!$stid) {
            echo "<br>Cannot parse the following command: " . $query . "<br>";
            $e = oci_error($db_conn);
            echo htmlentities($e['message']);
        } else {
#    echo "<br>parsed following command: " . $query . "<br>";
#    echo $stid . "<br>";
            $r = OCIExecute($stid);
            if (!$r) {
                echo oci_error($stid);
            }
            print '<table border = "1">';

    $ncols = oci_num_fields($stid);
    echo "<tr>";
    for ($i = 1; $i <= $ncols; $i++) {
       $columnName = oci_field_name($stid, $i);
        echo "<td>$columnName</td>";
    }
    echo "</tr>";

            while ($row = oci_fetch_array($stid, OCI_NUM + OCI_RETURN_NULLS)) {
                print '<tr>';
                foreach ($row as $item) {
                    print '<td>' . ($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp') . '</td>';
                }
                print '</tr>';
            }
            print '</table>';
        }
    }
}
