<?php

define("IN_SITE", true);
require_once(__DIR__.'/libs/db.php');
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/libs/helper.php');
//require_once(__DIR__.'/models/is_admin.php');
$CMSNT = new DB();


$whitelist = array(
    '127.0.0.1',
    '::1'
);

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 

 $list_addon = $CMSNT->get_list("SELECT * FROM `addons`");
    //print_r($list_addon);
    foreach ($list_addon as $addon){
        $id = $addon['id'];
        $domain = str_replace('www.', '', $_SERVER['HTTP_HOST']);
        $purchase_key = md5($domain.'|'.$id);
        $status = $CMSNT->update("addons",[
            'purchase_key'  => $purchase_key
        ], " `id` = '$id' ");
        echo '<p>Active Success Addon: ' . $addon['name']. "</p>";
    }
    die('<h1>Script Crack By KHANGAPI</h1>');