<form action="A_G1-2-3.php" method="post">
    <h3>ユーザ情報入力</h3>
    <input type="hidden" name="loginID" value="<?php echo $_POST["loginID"] ?>">
    <input type="hidden" name="password" value="<?php echo $_POST["password"] ?>">
    ニックネーム : 
    <input type="text" name="nickname" required><br>
    学科名　　　 : 
    <input type="text" name="course" required><br>
    専攻名　　　 : 
    <input type="text"  name="major"><br>
    学年　　　　 : 
    <select name="grade" required>
        <option value=1>１年生</option>
        <option value=2>２年生</option>
        <option value=3>３年生</option>
        <option value=4>４年生</option>
    </select><br>
    クラス名　　 : 
    <input type="text" name="classname"><br>
    得意科目　　 : 
    <input type="text" name="Fsubject"><br>

    <input type="button" onclick="history.back()" value="戻る">

    <input type="submit" value="確認">
 
</form>