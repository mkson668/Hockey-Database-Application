<?php
$db_conn = OCILogon("ora_p0x8", "a35103126", "dbhost.ugrad.cs.ubc.ca:1522/ug");
if ($db_conn) {
    #echo 'it connected';
} else {
    $err = OCIError();
    echo 'does not connect';
} // establish connection
echo "<h2>Player with highest salary</h2><br>";

$query = 'SELECT name 
FROM Players 
WHERE salary = (SELECT max(salary) from Players)';

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
}
