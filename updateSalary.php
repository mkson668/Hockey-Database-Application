<?php

$db_conn = OCILogon("ora_p0x8", "a35103126", "dbhost.ugrad.cs.ubc.ca:1522/ug");
$playerId = $_POST['playerId'];
$salary = $_POST['salary'];

$update = 'UPDATE Players SET salary = :salary WHERE playerId = :playerId';
$stid = OCIParse($db_conn, $update);
OCIBindByName($stid, ':playerId', $playerId);
OCIBindByName($stid, ':salary', $salary);

if (!$stid) {
    echo "<br>Cannot parse the following command: " . $query . "<br>";
    $e = oci_error($db_conn);
    echo htmlentities($e['message']);
} else {
#    echo "<br>parsed following command: " . $query . "<br>";
#    echo $stid . "<br>";
    $r = OCIExecute($stid);

    if ($r) {
         $viewQuery = 'SELECT playerId, name, salary FROM Players WHERE playerId = :playerId';
        $stid2 = OCIParse($db_conn, $viewQuery);
        OCIBindByName($stid2, ':playerId', $playerId);

        $r2 = OCIExecute($stid2);
        
         echo "<h2>Update successful</h2><br>";
         print '<table border = "1">';
         while ($row = oci_fetch_array($stid2, OCI_NUM + OCI_RETURN_NULLS)) {
             print '<tr>';
             foreach ($row as $item) {
                 print '<td>' . ($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp') . '</td>';
             }
             print '</tr>';
         }
         print '</table>';
    } else {
        echo "<h2>Update failed. Make sure playerId exists and salary is a positive integer</h2>";
    }
}
