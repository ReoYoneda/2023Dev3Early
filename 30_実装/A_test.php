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

<button id="modal-trigger">モーダルを開く</button>
<a href="A_G1-1.php">ファイルをダウンロード</a>
<div id="modal" class="modal">
  <div class="modal-content">
    <div class="p-2">モーダルのコンテンツ</div>
    <div class="img-box">
        <img src="A_img/img1.jpg">
    </div>
  </div>
</div>

<style>
/* モーダルを非表示にする */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

object{
    height: 100%;
    width: 100%;
}

/* モーダルのコンテンツ */
.modal-content {
  background-color: #f0f0f0;
  height: 50%;
  width: 80%;
  margin: 10% auto;
}

</style>

</body>
<script src="./script/script.js"></script>
</html>