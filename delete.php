<?php
require_once 'core/init.php';

$u_id = $_GET['u_id'];

$delete = DB::getInstance()->delete('users', array('id','=', $u_id));

if(!$delete->count()){
        Redirect::to('search.php');
    }else{
    	echo 'Not DELETTED';
    }

?>