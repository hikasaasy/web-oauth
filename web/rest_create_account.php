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
	      <a href="rest_show_account.php">取引先詳細表示</a>
|
	      <b>取引先作成</b>
|
	      <a href="rest_update_account.php">取引先更新</a>
|
	      <a href="rest_delete_account.php">取引先削除</a>
<br/>
<form method="post">
  <input type="text" name="accountName" />
  <input type="submit" value="登録" />
</form>
            <?php
            $accountName = $_POST['accountName'];
            if(strlen($accountName) == 0){
              echo "取引先名を入力してください";
            }else{
              echo $accountName . "を登録します";
              $id = create_account($accountName, $instance_url, $access_token);
              echo $id . "を登録しました";
            }
            ?>
        </tt>
    </body>
</html>
