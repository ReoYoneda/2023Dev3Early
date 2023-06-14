<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>

<input type="button" onclick="location.href='A_G1-4-1.php'" value="みんなの投稿">
<input type="button" onclick="location.href='A_G1-6-1-1.php'" value="じぶんの投稿">
<input type="button" onclick="location.href='A_G1-7.php'" value="ランキング">
<input type="button" onclick="location.href='A_G1-8.php'" value="開催イベント">
<input type="button" onclick="location.href='A_G1-9-1.php'" value="ステータス">
<input type="button" onclick="location.href='A_G1-10.php'" value="ヘルプ">

<h3>ランキング</h3>

<table border="1">
    <tr>
        <td colspan="2">a</td><td colspan="2">a</td><td colspan="2">a</td><td colspan="2">a</td>
    </tr>
    <tr>
        <td colspan="1">a</td><td colspan="1">a</td><td colspan="1">a</td><td colspan="2">a</td>
    </tr>
    <tr>
        <td colspan="1">a</td><td colspan="1">a</td><td colspan="1">a</td><td colspan="1">a</td>
    </tr>
    <tr>
        <td colspan="1">a</td><td colspan="1">a</td><td colspan="1">a</td><td colspan="1">a</td>
    </tr>
</table>