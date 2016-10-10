<?php
require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';

    if(isset($_GET['id'])){
        $form_id = $_GET['id'];
    	$db = new database();
        $query = "DELETE FROM sign_up_form WHERE formId='$form_id'";
        $result = $db->insertUpdateDelete($query);           
        header("Location: attachment.php");
        exit();
	}
?>