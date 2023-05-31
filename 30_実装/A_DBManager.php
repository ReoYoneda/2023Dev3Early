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
        function get_user_info_test($loginID){
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM users AS u LEFT OUTER JOIN evaluation AS e
                    ON u.user_id = e.user_id
                    WHERE u.user_loginID = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
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

        function get_user_info($userID){
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM users AS u LEFT OUTER JOIN evaluation AS e
                    ON u.user_id = e.user_id
                    WHERE u.user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetchAll();
            $row = $search[0];

            $sql = "SELECT COUNT(*) AS user_cnt FROM users";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();
            $ary = $search[0];
            $row["user_cnt"] = $ary["user_cnt"];

            $row["Lv"] = $Lv = floor(sqrt(($row['evaluation_trp']+2)*5-9));     # $row[""]に「Lv」を追加
            $row["DP"] = (INT)($Lv/10)+1;                                       # $row[""]に「DP」を追加
            $row["NRP"] = (INT)((($Lv+1)*($Lv+1)+3)/5)-$row['evaluation_trp'];  # $row[""]に「NRP」を追加
            
            $sql = "SELECT *
                    FROM (SELECT RANK() over(ORDER BY evaluation_trp DESC) AS userRank, user_id
                    FROM evaluation) AS RANK
                    WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetchAll();
            $rank = $search[0];

            $row["user_rank"] = $rank["userRank"];

            $row["user_ratio"] = (int)($row["user_rank"]/$row["user_cnt"]*100);
            $ratio = $row["user_ratio"];
            $rate = ["SSS","SS","S","A","B","C","D","E","F","G","G"];
            $user_rate = $rate[$ratio/10];

            $row["user_rate"] = $user_rate;

            if($ratio%10 < 3){
                $row["user_rate"] = $row["user_rate"]."+";
            }else if($ratio%10 >= 7){
                $row["user_rate"] = $row["user_rate"]."-";
            }

            if($row['evaluation_receivednum']!=0){                                   # $row[""]に「Ravg」を追加
                $row["Ravg"] = number_format($row['evaluation_receivedvalue']/$row['evaluation_receivednum'],1);
            }else{
                $row["Ravg"] = number_format(0.0,1) ;
            }
            if($row['evaluation_sentnum']!=0){                                       # $row[""]に「Savg」を追加
                $row["Savg"] = number_format($row['evaluation_sentvalue']/$row['evaluation_sentnum'],1);
            }else{
                $row["Savg"] = number_format(0.0,1) ;
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

    }
?>