<?php require_once '../../config/connection.php';?>

<?php
    if (!$checkBasicSecurity){/// start if 1
        goto end;
    }
?>

<?php
	///////////////////////geting sequence//////////////////////////
	$countId='PS';
	$sequence=$callclass->_getSequenceCount($conn, $countId);
	$array = json_decode($sequence, true);
	$no= $array[0]['no'];
    $response['pageSession']='PS'.$no.date('Ymdhis');
	
end:
echo json_encode($response);
?>