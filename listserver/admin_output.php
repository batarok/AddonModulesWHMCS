<p>List All Server Shared Hosting yang ada di WHMCS ada <strong><?=$countserver ?></strong></p>
    <div class="tab-pane active" id="tab1">


<div class="tablebg">
    <table id="sortabletbldocid" class="datatable" width="100%" border="0" cellspacing="1" cellpadding="3">
        <tbody>
            <tr>
                <th>Hostname</th>
                <th>IP Server</th>
                <th>Panel</th>
                <th>Nameserver</th>
                <th>Aktivasi</th>
                <th>Login</th>
            </tr>
            <?php
            foreach ($allserver as $key => $value) {
            ?>
            <tr>
                <td><?=$value->hostname?></td>
                <td><?=$value->ipaddress?></td>
                <td><?=$value->type?></td>
                <td><?=$value->nameserver1?> | <?=$value->nameserver2?></td>
                <td><?php if($value->active == '1'){echo "Ya";}else{echo "";}?> </td>
                <td><?php $command = 'DecryptPassword';
$postData = array(
    'password2' => $value->password,
);

$results = localAPI($command, $postData, $adminUsername);
$pass = $results['password'];
//echo $pass;

//login sesuai panel dg method post menggunakan form supaya tidak terlihat saat proses login
if($value->type == 'cpanel'){
    echo "<form method='post' action='http://$value->hostname:2086/login/?user=$value->username&pass=$pass' target='_blank'><input type='hidden' name='extra_submit_param' value='extra_submit_value'><button type='submit' name='submit_param' value='submit_value'>LOGIN</button></form>";
}elseif($value->type == 'plesk') {
    echo "<form method='post' action='http://$value->hostname:8880/login_up.php3?login_name=$value->username&passwd=$pass' target='_blank'><button>LOGIN</button></form>";
}
else{
    echo "</td></tr>";
}
 ?>

            <?php //closing perulangan
            }
            ?>

        </tbody>
    </table>
</div>
</div>