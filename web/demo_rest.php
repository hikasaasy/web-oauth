<?php
session_start();
require_once 'rest_func.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>REST/OAuth サンプル</title>
    </head>
    <body>
        <tt>
            <?php
            $access_token = $_SESSION['access_token'];
            $instance_url = $_SESSION['instance_url'];

            if (!isset($access_token) || $access_token == "") {
                die("Error - access token missing from session!");
            }

            if (!isset($instance_url) || $instance_url == "") {
                die("Error - instance URL missing from session!");
            }

            show_accounts($instance_url, $access_token);

            // $id = create_account("My New Org", $instance_url, $access_token);

            // show_account($id, $instance_url, $access_token);

            // show_accounts($instance_url, $access_token);

            // update_account($id, "My New Org, Inc", "San Francisco", $instance_url, $access_token);

            // show_account($id, $instance_url, $access_token);

            // show_accounts($instance_url, $access_token);

            // delete_account($id, $instance_url, $access_token);

            // show_accounts($instance_url, $access_token);
            ?>
        </tt>
    </body>
</html>
