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
            $ps->bindValue(2,password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
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
                    if(password_verify($password,$row["user_password"]) == true){
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
            return $search;
        }

        function file_up($){
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                if(!file_exists('photo')){
                    mkdir('photo');
                }    
                $file='photo/'.basename($_FILES['file']['name']);//ファイルの名前だけの保存
                if(move_uploaded_file($_FILES['file']['tmp_name'],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
                    echo $file, 'のアップロードに成功しました。';
                    $result = glob('photo/*');//ファイルの一覧（名前）を取得
                    echo '<p>';
                    foreach($result as $a){
                        echo '<img src="',$a,'" height="200px">';
                    }
                    echo '</p>';
                }else{
                    echo 'アップロードに失敗しました。';
                }
            }else{
                echo 'ファイルを選択してください。';
            }
        }

    }
?>