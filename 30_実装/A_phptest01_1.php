<form action="phptest01_2.php" method="post">
    <h1>新規ユーザー登録</h1>
    ログインID : 
    <input type="text" name="loginID" required><br>
    パスワード：
    <input type="password" name="password" required><br>
    ニックネーム : 
    <input type="text" name="nickname" required><br>
    学科名 : 
    <input type="text" name="course" required><br>
    専攻名 : 
    <input type="text"  name="major" required><br>
    学年 : 
    <select name="grade" required>
        <option value=1>１</option>
        <option value=2>２</option>
        <option value=3>３</option>
        <option value=4>４</option>
    </select><br>
    クラス名 : 
    <input type="text" name="classname" required><br>
    得意科目 : 
    <input type="text" name="Fsubject" required><br>
 
    <input type="submit" value="登録">
</form>