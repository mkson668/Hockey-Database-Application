<?php 
 
$db_conn = OCILogon("ora_p0x8", "a35103126", "dbhost.ugrad.cs.ubc.ca:1522/ug"); 
 
$gameId = $_GET['gameId']; 

$query = 'SELECT * FROM Tickets WHERE gameId = :gameId'; 
 
$stid = OCIParse($db_conn, $query); 
OCIBindByName($stid, ':gameId', $gameId); 
 
echo 'Tickets for game ' . $gameId . "<br>"; 
 
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
 
