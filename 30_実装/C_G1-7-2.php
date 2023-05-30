<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
    <style>
    .example2{
        padding: 10px;
        margin-top:10px;
        display: flex;
        justify-content: space-between;

    }
    .example3{
        padding: 10px;
        margin-top:10px;
        display: inline-block;
    }
    .example{
        padding: 10px;
        margin-top:10px;
  }
      
    .flex{
        display: flex;
        justify-content: space-between;
    }
    .flex>p{
        width: 49%;
    }
    .bg-ddd {
        background-color: #F0FFFF;
    }
    p {
        padding: 20px;
        background-color: #EDF7FF;
    }
    p.bg-transparent {
        background-color: transparent;
    }
    .ex3{
        font-size:16px;
        line-height:0%;
    }
    .img-wrap{
        width: auto;
        height: auto;
        display:flex;
    }
    .img-wrap img{
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
    .a{
        background-color: #F0FFF0;
    }
    .b{
        background-color: #F0FFFF;
    }
    </style>
        <div class="a">
      <div name="maindiv" class="container alert-info">
        <h1 class="text-secondary text-center">回答</h1>
      </div>
    </div>
        <div class="b">
            <div class="ex3">
                <div class="bg-ddd">
                    <div align="center" class="example">
                        <div align="left" class="example2">
                            <a>ニックネーム</a>
                            <a>2023/05/23</a>
                        </div>
                        <div align="center" class="example">
                            <div align="left" class="example">
                                <a>Lv:999(SSS+)</a>
                                &emsp;
                                <a>DP:4</a>
                                &emsp;
                                <a>与評4.5</a>
                            </div>
                        </div>
                        <div align="left" class="example">
                            <a>○○○○演習</a>
                        </div>
                        <div align="center" class="example">
                            <h2>○○がわからないので教えてください</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--写真・ファイル説明-->
        <div class="a">
            <div class="img-wrap">
                <img src="img/img1.jpg"alt="">
                aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            </div>
            <a href="C_G1-5.php">ファイル</a>
        </div>
        <!--内容入力-->
        <div align="left"class="example">
            <label for="exampleFormControlTextarea1" class="form-label">内容</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"rows="10"placeholder="内容"></textarea>
        </div>
        <!--画像アップロード-->
        <div align="left"class="example">
            <label for="txt" class="form-label">画像</label>
            <input type="submit" value="画像アップロード">
        </div>
        <div class="img-wrap">
            <img src="img/img1.jpg" class="img-thumbnail">                </div>
        </div>
        <!--ファイルアップロード-->
        <div align="left"class="example">
            <label for="txt"class="form-label">ファイル</label>
            <input type="submit"value="ファイルアップロード">
            <ul id="ID001" ></ul>
        </div>
        <div align="right"class="example2">
            <input type="submit" value="戻る">
            <input type="submit" value="投稿">
        </div>
    </body>
</html>