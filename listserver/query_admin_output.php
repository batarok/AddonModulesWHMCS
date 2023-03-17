<?php
use WHMCS\Database\Capsule as capsule;


$listserver = capsule::table('tblservers');

$listserver = $listserver -> select('tblservers.hostname','tblservers.type','tblservers.username','tblservers.password','tblservers.ipaddress','tblservers.nameserver1','tblservers.nameserver2','tblservers.disabled','tblservers.active');
$listserver = $listserver -> where('tblservers.disabled','=','0');
$listserver = $listserver -> whereIn('tblservers.type',[cpanel,plesk]);
$listserver = $listserver -> orderBy('tblservers.active','desc');

$allserver = $listserver -> get();

$countserver  = count($allserver);
?>