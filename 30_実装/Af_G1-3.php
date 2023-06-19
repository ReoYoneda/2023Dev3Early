<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>

    <div class="container">
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="ステータスを確認して [皆の投稿へ]を押してください">
                        ステータス
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- ステータス -->

                <div class="row mb-3">
                    <div>
                        <label for="userID">ログインID</label>
                    </div>
                    <div>
                        <input type="text" class="input-display" name="userID" id="userID" value="loginID" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="password">パスワード</label>
                    </div>
                    <div>
                        <input type="password" class="input-display" name="password" id="password" value="password" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="nickname">ニックネーム</label>
                    </div>
                    <div>
                        <input type="text" class="input-display" name="nickname" id="nickname" value="nickname" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="course">学科</label>
                    </div>
                    <div>
                        <input type="text" name="course" id="course" value="course" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="major">専攻</label>
                    </div>
                    <div>
                        <input type="text" name="major" id="major" value="major" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="grade">学年</label>
                    </div>
                    <div>
                        <select name="grade" id="grade" disabled>
                            <option value="" style="color: #bbb">選択してください</option>
                            <option value=1 selected>１年生</option>
                            <option value=2>２年生</option>
                            <option value=3>３年生</option>
                            <option value=4>４年生</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="classname">クラス</label>
                    </div>
                    <div>
                        <input type="text" name="classname" id="classname" value="classname" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <div>
                        <label for="Fsubject">得意科目</label>
                    </div>
                    <div>
                        <input type="text" name="Fsubject" id="Fsubject" value="favorite subject" disabled>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div>
                        <label for="Fsubject">ステータス</label>
                    </div>
                    <div class="row ml-0 py-3 status">
                        <table>
                            <tr>
                                <td>　　　 現在のレベル</td>    <td>：</td>     <td class="text-right">　  50　　　　　　</td>
                            </tr>
                            <tr>
                                <td>　　　 要求レベル</td>      <td>：</td>     <td class="text-right">　   6　　　　　　</td>
                            </tr>
                            <tr>
                                <td>　　　 累計獲得RP</td>      <td>：</td>     <td class="text-right">　 520　　　　　　</td>
                            </tr>
                            <tr>
                                <td>　　　 次のLvまで</td>      <td>：</td>     <td class="text-right">　  15　　　　　　</td>
                            </tr>
                            <tr>
                                <td>　　　 ランキング</td>      <td>：</td>     <td class="text-right">　 100位　　　　　</td>
                            </tr>
                            <tr>
                                <td>　　　 ユーザーレート</td>  <td>：</td>     <td class="text-right">　  XX+ 　　　　　</td>
                            </tr>
                            <tr>
                                <td>　　　 被評価平均</td>      <td>：</td>     <td class="text-right">　 4.5　　　　　　</td>
                            </tr>
                            <tr>
                                <td>　　　 与評価平均</td>      <td>：</td>     <td class="text-right">　 4.5　　　　　　</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <style>
                    .td{
                        padding: 0;
                        box-shadow: none;
                        background-color: transparent;
                        border: none;
                    }
                </style>
                <div class="row">
                    <div>
                        <label for="Fsubject">ステータス</label>
                    </div>
                    <div class="row status">
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">現在のレベル</div><div class="td text-center col-2">：</div><div class="td text-right col-3">12500　　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">要求レベル</div><div class="td text-center col-2">：</div><div class="td text-right col-3">1251　　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">累計獲得RP</div><div class="td text-center col-2">：</div><div class="td text-right col-3">5200000　　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">次のLvまで</div><div class="td text-center col-2">：</div><div class="td text-right col-3">2000　　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">ランキング</div><div class="td text-center col-2">：</div><div class="td text-right col-3">9999位　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">ユーザーレート</div><div class="td text-center col-2">：</div><div class="td text-right col-3">SSS+ 　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">被評価平均</div><div class="td text-center col-2">：</div><div class="td text-right col-3">4.5　　</div><div class="td col-2"></div>
                        <div class="td col-1 col-sm-2"></div><div class="td col-4 col-sm-3">与評価平均</div><div class="td text-center col-2">：</div><div class="td text-right col-3">4.5　　</div><div class="td col-2"></div>
                    </div>
                </div>

                <!--/ステータス -->

                <div class="row mb-3
                            justify-content-between">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="ログアウト" onclick="location.href='Af_G1-1.php'">
                        </div>
                    </div>

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" class="black" value="皆の投稿" onclick="location.href='Af_G1-4-1.php'">
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

    </div>
    
</body>
</html>