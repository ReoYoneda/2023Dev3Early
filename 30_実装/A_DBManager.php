<?php
    class DBManager{

        private function dbConnect(){
            $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8','webuser','abccsd2');
            return $pdo;
        }

        function Create_test($loginID,$password,$nickname,$course,$major,$grade,$classname,$Fsubject,  
                             $trp,$rnum,$rvalue,$snum,$svalue){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO users (user_loginid,user_password,user_name,user_course,
                                        user_major,user_grade,user_classname,user_Fsubject)
                                VALUES(?,?,?,?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            $ps->bindValue(2,password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
            $ps->bindValue(3,$nickname,PDO::PARAM_STR);
            $ps->bindValue(4,$course,PDO::PARAM_STR);
            $ps->bindValue(5,$major,PDO::PARAM_STR);
            $ps->bindValue(6,$grade,PDO::PARAM_INT);
            $ps->bindValue(7,$classname,PDO::PARAM_STR);
            $ps->bindValue(8,$Fsubject,PDO::PARAM_STR);
            $ps->execute();

            $sql = "INSERT INTO `evaluation` (`user_id`,`evaluation_trp`,`evaluation_receivednum`,
                                `evaluation_receivedvalue`,`evaluation_sentnum`,`evaluation_sentvalue`)
                                VALUES((SELECT MAX(user_id) FROM users),?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$trp,PDO::PARAM_INT);
            $ps->bindValue(2,$rnum,PDO::PARAM_INT);
            $ps->bindValue(3,$rvalue,PDO::PARAM_INT);
            $ps->bindValue(4,$snum,PDO::PARAM_INT);
            $ps->bindValue(5,$svalue,PDO::PARAM_INT);
            $ps->execute();
        }

        function create($loginID,$password,$nickname,$course,$major,$grade,$classname,$Fsubject){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO users (user_loginid,user_password,user_name,user_course,
                                        user_major,user_grade,user_classname,user_Fsubject)
                                VALUES(?,?,?,?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            /*$ps->bindValue(2,password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);*/
            $ps->bindValue(2,$password,PDO::PARAM_STR);
            $ps->bindValue(3,$nickname,PDO::PARAM_STR);
            $ps->bindValue(4,$course,PDO::PARAM_STR);
            $ps->bindValue(5,$major,PDO::PARAM_STR);
            $ps->bindValue(6,$grade,PDO::PARAM_STR_CHAR);
            $ps->bindValue(7,$classname,PDO::PARAM_STR);
            $ps->bindValue(8,$Fsubject,PDO::PARAM_STR);
            $ps->execute();

            $sql = "INSERT INTO `evaluation` (`user_id`,`evaluation_trp`,`evaluation_receivednum`,
                                `evaluation_receivedvalue`,`evaluation_sentnum`,`evaluation_sentvalue`)
                                VALUES((SELECT MAX(user_id) FROM users),0,0,0,0,0)";
            $ps = $pdo->prepare($sql)->execute();
        }

        function login($loginID,$password){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM users WHERE user_loginid = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            if(!empty($search)){
                foreach($search as $row){
                    /*if(password_verify($password,$row["user_password"]) == true){
                        return $search;
                    }*/
                    if($password == $row["user_password"]){
                        return $search;
                    }
                }
            }
            return $search=[];
        }

        function get_users(){
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM users";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function get_users_info(){
            /*---------------
            user_id
            user_loginid
            user_password
            user_name
            user_course
            user_major
            user_grade
            user_classname
            user_Fsubject
            +++++++++++++++
            user_lv
            user_dp
            user_nrp
            user_rank
            user_ratio
            user_rate
            user_Ravg
            user_Savg
            ---------------*/
            $pdo = $this->dbConnect();
            $sql = "SELECT *
                    FROM users AS u 
                    LEFT OUTER JOIN evaluation AS e
                    ON u.user_id = e.user_id
                    LEFT OUTER JOIN (SELECT RANK() over(ORDER BY evaluation_trp DESC) AS user_rank, user_id
                                    FROM evaluation) AS r
                    ON u.user_id = r.user_id
                    ORDER BY evaluation_trp DESC";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();

            $sql = "SELECT COUNT(*) AS user_cnt FROM users";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $cnt = $ps->fetch();
            $user_cnt = $cnt["user_cnt"];

            foreach($search as &$row){
                $row["user_lv"] = $Lv = floor(sqrt(($row['evaluation_trp']+2)*5-9));     # $rowに「user_lv」を追加
                $row["user_dp"] = (INT)($Lv/10)+1;                                       # $rowに「user_dp」を追加
                $row["user_nrp"] = (INT)((($Lv+1)*($Lv+1)+3)/5)-$row['evaluation_trp'];  # $rowに「user_nrp」を追加
                
                

                $row["user_ratio"] = (int)($row["user_rank"]/$user_cnt*100); # $rowに「user_ratio」を追加
                $ratio = $row["user_ratio"];
                $rate = ["SSS","SS","S","A","B","C","D","E","F","G","G"];
                $user_rate = $rate[$ratio/10];

                $row["user_rate"] = $user_rate;                                     # $rowに「user_rate」を追加

                if($ratio%10 < 3){                                                  # $row["user_rate"]に「+」,「-」を追加
                    $row["user_rate"] .= " +　";
                }else if($ratio%10 >= 7){
                    $row["user_rate"] .= " - 　";
                }else{
                    $row["user_rate"] .= "　　";
                }

                if($row['evaluation_receivednum']!=0){                              # $rowに「user_Ravg」を追加
                    $row["user_Ravg"] = number_format($row['evaluation_receivedvalue']/$row['evaluation_receivednum'],1);
                }else{
                    $row["user_Ravg"] = number_format(0.0,1) ;
                }
                if($row['evaluation_sentnum']!=0){                                  # $rowに「user_Savg」を追加
                    $row["user_Savg"] = number_format($row['evaluation_sentvalue']/$row['evaluation_sentnum'],1);
                }else{
                    $row["user_Savg"] = number_format(0.0,1) ;
                }
                
            }
            
            return $search;
        }

        function get_user_info($userID){
            /*---------------
            user_id
            user_loginid
            user_password
            user_name
            user_course
            user_major
            user_grade
            user_classname
            user_Fsubject
            +++++++++++++++
            user_lv
            user_dp
            user_nrp
            user_rank
            user_ratio
            user_rate
            user_Ravg
            user_Savg
            ---------------*/
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM users AS u LEFT OUTER JOIN evaluation AS e
                    ON u.user_id = e.user_id
                    WHERE u.user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetch();
            $row = $search;

            $sql = "SELECT COUNT(*) AS user_cnt FROM users";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetch();
            $ary = $search;
            $row["user_cnt"] = $ary["user_cnt"];

            $row["user_lv"] = $Lv = floor(sqrt(($row['evaluation_trp']+2)*5-9));     # $rowに「user_lv」を追加
            $row["user_dp"] = (INT)($Lv/10)+1;                                       # $rowに「user_dp」を追加
            $row["user_nrp"] = (INT)((($Lv+1)*($Lv+1)+3)/5)-$row['evaluation_trp'];  # $rowに「user_nrp」を追加
            
            $sql = "SELECT *
                    FROM (SELECT RANK() over(ORDER BY evaluation_trp DESC) AS userRank, user_id
                    FROM evaluation) AS RANK
                    WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetch();
            $rank = $search;

            $row["user_rank"] = $rank["userRank"];                              # $rowに「user_rank」を追加

            $row["user_ratio"] = (int)($row["user_rank"]/$row["user_cnt"]*100); # $rowに「user_ratio」を追加
            $ratio = $row["user_ratio"];
            $rate = ["SSS","SS","S","A","B","C","D","E","F","G","G"];
            $user_rate = $rate[$ratio/10];

            $row["user_rate"] = $user_rate;                                     # $rowに「user_rate」を追加

            if($ratio%10 < 3){                                                  # $row["user_rate"]に「+」,「-」を追加
                $row["user_rate"] = $row["user_rate"]."+";
            }else if($ratio%10 >= 7){
                $row["user_rate"] = $row["user_rate"]."-";
            }

            if($row['evaluation_receivednum']!=0){                              # $rowに「user_Ravg」を追加
                $row["user_Ravg"] = number_format($row['evaluation_receivedvalue']/$row['evaluation_receivednum'],1);
            }else{
                $row["user_Ravg"] = number_format(0.0,1) ;
            }
            if($row['evaluation_sentnum']!=0){                                  # $rowに「user_Savg」を追加
                $row["user_Savg"] = number_format($row['evaluation_sentvalue']/$row['evaluation_sentnum'],1);
            }else{
                $row["user_Savg"] = number_format(0.0,1) ;
            }
            return $row;
        }

        function create_post($userID,$title,$subject,$text){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `posts`(`user_id`, `post_flag`, `post_title`, `post_subject`, `post_text`) 
                                VALUES (?,1,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->bindValue(2,$title,PDO::PARAM_STR);
            $ps->bindValue(3,$subject,PDO::PARAM_STR);
            $ps->bindValue(4,$text,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_post_image($image_path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `post_images`(`post_id`, `post_image_path`) 
                                        VALUES ((SELECT MAX(post_id) FROM posts),?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$image_path,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_post_file($file_path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `post_files`(`post_id`, `post_file_path`) 
                                        VALUES ((SELECT MAX(post_id) FROM posts),?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$file_path,PDO::PARAM_STR);
            $ps->execute();
        }

        function get_posts(){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM posts";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function get_post($postID){
            $pdo = $this->dbConnect();
            $sql = "SELECT p.post_id AS post_id, p.user_id, p.post_flag, post_date, post_title, post_subject, post_text, post_image_path, post_file_path
                    FROM posts AS p
                    LEFT OUTER JOIN post_images AS p_i
                    ON p.post_id = p_i.post_id
                    LEFT OUTER JOIN post_files AS p_f
                    ON p.post_id = p_f.post_id
                    WHERE p.post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetch();

            return $search;
        }

        function create_reply($postID,$userID,$text){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `replies`(`post_id`, `user_id`, `reply_text`)
                                  VALUES (?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_INT);
            $ps->bindValue(2,$userID,PDO::PARAM_STR);
            $ps->bindValue(3,$text,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_reply_image($image_path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `reply_images`(`reply_id`, `reply_image_path`) 
                                        VALUES ((SELECT MAX(reply_id) FROM replies),?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$image_path,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_reply_file($file_path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `reply_files`(`reply_id`, `reply_file_path`) 
                                        VALUES ((SELECT MAX(reply_id) FROM replies),?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$file_path,PDO::PARAM_STR);
            $ps->execute();
        }

        function get_replies($postID){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM replies
                    WHERE post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function get_reply($replyID){
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM replies AS r
                    LEFT OUTER JOIN reply_images AS r_i
                    ON r.reply_id = r_i.reply_id
                    LEFT OUTER JOIN reply_files AS r_f
                    ON r.reply_id = r_f.reply_id
                    WHERE r.reply_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$replyID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetch();

            return $search;
        }

        function get_my_posts($userID){
            $pdo = $this->dbConnect();
            $sql = "SELECT p.post_id AS post_id, p.user_id, p.post_flag, post_date, post_title, post_subject, post_text, post_image_path, post_file_path
                    FROM posts AS p
                    LEFT OUTER JOIN post_images AS p_i
                    ON p.post_id = p_i.post_id
                    LEFT OUTER JOIN post_files AS p_f
                    ON p.post_id = p_f.post_id
                    WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetchAll();

            return $search;
        }

        function get_evaluate_users($postID){
            $pdo = $this->dbConnect();
            $sql = "SELECT DISTINCT user_id FROM replies
                    WHERE post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function evaluate($s_userID,$r_userID,$dp,$num){
            $AddTrp = $dp * $num;
            $pdo = $this->dbConnect();
            $sql = "UPDATE `evaluation`
                    SET `evaluation_trp`=`evaluation_trp`+ ? ,
                        `evaluation_receivednum`=`evaluation_receivednum`+ 1,
                        `evaluation_receivedvalue`=`evaluation_receivedvalue`+ ?
                    WHERE user_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$AddTrp,PDO::PARAM_STR);
            $ps->bindValue(2,$num,PDO::PARAM_STR);
            $ps->bindValue(3,$r_userID,PDO::PARAM_STR);
            $ps->execute();

            $sql = "UPDATE `evaluation`
                    SET `evaluation_sentnum`=`evaluation_sentnum`+ 1,
                        `evaluation_sentvalue`=`evaluation_sentvalue`+ ?
                    WHERE user_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$num,PDO::PARAM_STR);
            $ps->bindValue(2,$s_userID,PDO::PARAM_STR);
            $ps->execute();
        }

        function post_close($userID,$postID,$dp){
            $pdo = $this->dbConnect();
            $sql = "UPDATE `posts`
                    SET `post_flag`= 0 
                    WHERE post_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_STR);
            $ps->execute();

            $sql = "UPDATE `evaluation`
                    SET `evaluation_trp`=`evaluation_trp`+ ?
                    WHERE user_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$dp*3,PDO::PARAM_STR);
            $ps->bindValue(2,$userID,PDO::PARAM_STR);
            $ps->execute();
        }

        function get_events(){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM `events`";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();

            return $search;
        }

        function user_update($userID,$loginID,$nickname,$course,$major,$grade,$classname,$Fsubject){
            $pdo = $this->dbConnect();
            $sql = "UPDATE `users`
                    SET `user_loginid`= ? ,`user_name`= ? ,`user_course`= ? ,`user_major`= ? ,
                        `user_grade`= ? ,`user_classname`= ? ,`user_Fsubject`= ?
                    WHERE user_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            /*$ps->bindValue(2,password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);*/
            $ps->bindValue(2,$nickname,PDO::PARAM_STR);
            $ps->bindValue(3,$course,PDO::PARAM_STR);
            $ps->bindValue(4,$major,PDO::PARAM_STR);
            $ps->bindValue(5,$grade,PDO::PARAM_STR_CHAR);
            $ps->bindValue(6,$classname,PDO::PARAM_STR);
            $ps->bindValue(7,$Fsubject,PDO::PARAM_STR);
            $ps->bindValue(8,$userID,PDO::PARAM_STR);
            $ps->execute();
        }

    }
?>