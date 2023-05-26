<!DOCTYPE html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>ログイン</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style_test.css">
</head>
<body>
<style>
    button,
    input[type="text"],
    input[type="password"],
    input[type="submit"],
    input[type="button"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #999;
      border-radius: 4px;
    }

    input[type="submit"].blue{
        background-color: #acf;
    }
    input[type="submit"].blue:hover{
        background-color: #9bf;
    }

    input[type="submit"].red{
        background-color: #fbb;
    }
    input[type="submit"].red:hover{
        background-color: #faa;
    }

    input[type="button"]:hover,
    input[type="submit"]:hover {
      background-color: #ddd;
    }

    input[type="button"]:active,
    input[type="submit"]:active {
      background-color: #ace;
    }
    
  </style>
    <div class="container">
            
        <div class="row justify-content-center">
        
            <div>laksdfj</div>
            <div class="text-center h4 p-2">ログイン</div>

            <div class="pt-2 pb-2
                        col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5"
                 style="background-color:#FFFFFF">

                <form action="test01.php" method="POST">
                <div class="row mt-3">
                    <!--<label for="username">ユーザーID</label>-->
                    ユーザーID
                    <input type="text" name="userID" placeholder="userID" required>
                </div>

                <div class="row mt-3">
                    パスワード
                    <input type="password" name="password" placeholder="password" required>
                </div>

                <div class="row mt-3 pt-3 pb-3
                            justify-content-between">

                    <div class="col-3">
                        <div class="row">
                            <input type="button" value="戻る" onclick="history.back()">
                        </div>
                        <div class="row">
                            <input type="button" value="戻る" onclick="location.href='test02.php'">
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="row">
                            <input type="submit" class="blue" value="ログイン">
                        </div>
                    </div>
                    
                </div>
                </form>
                

            </div>
        </div>
    </div>
    
</body>
</html>