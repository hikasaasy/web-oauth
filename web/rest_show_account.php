<?php
session_start();
require_once 'rest_func.php';
$access_token = $_SESSION['access_token'];
$instance_url = $_SESSION['instance_url'];
if (!isset($access_token) || $access_token == ""
 || !isset($instance_url) || $instance_url == "") {
		header('Location: index.html');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>REST/OAuth サンプル</title>
    </head>
    <body>
        <tt>
        <a href="rest_show_accounts.php">取引先リスト</a>
|
	      <b>取引先詳細表示</b>
|
<a href="rest_create_account.php">取引先作成</a>
|
	      <a href="rest_update_account.php">取引先更新</a>
|
<a href="rest_delete_account.php">取引先削除</a>
<br/>
<form method="post">
  <input type="text" name="accountId" />
  <input type="submit" value="表示" />
</form>
            <?php
            $accountId = $_POST['accountId'];
            if(strlen($accountId) == 0){
              echo "取引先IDを入力してください";
            }else{
              echo $accountId . "を表示します<br/>";
              show_account($accountId, $instance_url, $access_token);
            }
            ?>
        </tt>
    </body>
</html>
