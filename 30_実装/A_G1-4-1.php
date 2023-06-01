<input type="button" onclick="location.href='A_G1-5.php'" value="投稿">
<input type="button" onclick="location.href='A_G1-6-1-1.php'" value="じぶんの投稿">
<input type="button" onclick="location.href='A_G1-7.php'" value="ランキング">
<input type="button" onclick="location.href='A_G1-8.php'" value="開催イベント">
<input type="button" onclick="location.href='A_G1-9-1.php'" value="ステータス">
<input type="button" onclick="location.href='A_G1-10.php'" value="ヘルプ">
<input type="button" onclick="location.href='A_LogOut.php'" value="ログアウト"><br><br>

<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "A_DBManager.php";
    $get = new DBManager();
    $posts = $get->get_posts();
    $users = $get->get_users();
    $cnt = 0;
    foreach($posts as $post){
        $user = $users[$post["user_id"]-1];
        $evaluation = $get->get_user_info($user["user_id"]);
        $cnt++;
        echo
        '<form action="A_G1-4-2.php" method="POST" id="form'.$post["post_id"].'" onclick="Submit'.$cnt.'()">
        <input type="hidden" value="'.$post["post_id"].'">
        ----------------------------------------------------------------------------<br>'.
        '日時:'.$post["post_date"].'<br>
        学科　　 : '.$user["user_course"].'<br>
        学年　　 : '.$user["user_grade"].'年<br>
        クラス　 : '.$user["user_classname"].'<br>
        得意科目 : '.$user["user_Fsubject"].'<br>
        タイトル : '.$post["post_title"].'<br>
        名前　　 : '.$user["user_name"].'<br>
        Lv　　　 : '.$evaluation["Lv"].'<br>
        DP 　 　 : '.$evaluation["DP"].'<br>
        被評　　 : '.$evaluation["Ravg"].'<br>
        与評　　 : '.$evaluation["Savg"].'<br>
        </form>
        <script>
            function Submit'.$cnt.'(){
                document.getElementById("form'.$cnt.'").submit();
            }
        </script>
        ';
    }
?>