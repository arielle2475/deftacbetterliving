<?php
$table = 'admins';
 
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'adminname', 'dt' => 0 ),
    array( 'db' => 'adminemail',  'dt' => 1 ),
    array( 'db' => 'isactive',   'dt' => 2 ),

        'formatter' => function( $d, $row ) {
            return date( 'd-m-Y', strtotime($d));
        }
    )
   
);
 
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'thesis',
    'host' => 'localhost'
);
 
 
require( 'vendor/datatables/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>