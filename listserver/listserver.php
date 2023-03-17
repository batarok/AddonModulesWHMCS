<?php
/**
 * List dokumen module
 *
 * @package    WHMCS
 * @author     WHMCS Limited <development@whmcs.com>
 * @copyright  Copyright (c) WHMCS Limited 2005-2013
 * @license    http://www.whmcs.com/license/ WHMCS Eula
 * @version    $Id$
 * @link       http://www.whmcs.com/
 */

use WHMCS\Database\Capsule as capsule;

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function listserver_config()
{
    return [
            "name" => "List Server Shared",
            "description" => "List All Server Shared hosting Active",
            "author" => "barkah",
            "languae" => "indonesia",
            "version" => "1.0",
            ];
}


function listserver_activate()
{
    # Return Result
    return array('status'=>'success','description'=>'Sukses install addon List Server');
}

function listserver_deactivate()
{
    return array('status'=>'success','description'=>'Sukses uninstall addon List Server');
}



/**
 * Output di halaman admin
 *
 */
function listserver_output($vars)
{
    if (isset($_GET['view']) && $_GET['view'] == 'edit') {
        include_once __DIR__ . '/query_admin_edit.php'; //dummy
        include_once __DIR__ . '/admin_edit.php'; //dummy
    } else {
        include_once __DIR__ . '/query_admin_output.php';
        include_once __DIR__ . '/admin_output.php';
    }
}
