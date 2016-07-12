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
<a href="rest_create_account.php">取引先作成</a>
|
	      <b>取引先更新</b>
|
<a href="rest_delete_account.php">取引先削除</a>
<br/>
<br/>
<form method="post">
  ID: <input type="text" name="accountId" />
  , 名前: <input type="text" name="accountName" />
  , 住所: <input type="text" name="accountCity" />
  <input type="submit" value="更新" />
</form>
            <?php
            $accountId = $_POST['accountId'];
            $accountName = $_POST['accountName'];
            $accountCity = $_POST['accountCity'];
            if(strlen($accountId) == 0){
              echo "取引先IDを入力してください";
            }else{
              if(strlen($accountName) == 0){
                echo "名前を入力してください";
              }else{
                if(strlen($accountCity) == 0){
                  echo "住所を入力してください";
                }else{
                  echo $accountId . "を更新します<br/>";
                  update_account($accountId, $accountName, $accountCity, $instance_url, $access_token);
                }
              }
            }
            ?>
        </tt>
    </body>
</html>
