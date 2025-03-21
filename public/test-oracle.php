<?php
try {
    $conn = oci_connect('system', 'oracle', 'localhost:1521/XEPDB1');
    if (!$conn) {
        $e = oci_error();
        throw new Exception($e['message']);
    }
    echo "Conexión exitosa a Oracle!\n";
    
    $stid = oci_parse($conn, 'SELECT * FROM v$version');
    oci_execute($stid);
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo $row['BANNER'] . "\n";
    }
    
    oci_free_statement($stid);
    oci_close($conn);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 