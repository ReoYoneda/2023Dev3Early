<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Replies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>

    <div class="container">
            
        <div class="row py-2 justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- ナビ -->
                <div class="row nav">
                    <a class="col" href="Af_G1-4-1.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
                    <a class="col" href="Af_G1-6-1-1.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
                    <a class="col" href="Af_G1-7.php" title="ランキング"><i class="bi bi-trophy"></i></a>
                    <a class="col" href="Af_G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="col" href="Af_G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="col" href="Af_G1-10.php" title="ヘルプ？"><i class="bi bi-question-circle"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="回答するときは[回答]を押してください">
                        回答一覧
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-11 col-lg-10 col-xl-9"><!-- 用のコンテナサイズ -->
            
                <!-- 投稿情報 -->
                <div class="row tdiv">

                    <div class="td col-6">2023/05/01 20:20</div>
                    <div class="td col-6">（ここはニックネームです）</div>
                
                    <div class="td col-6 col-md-4">情報システム専攻科</div>
                    <div class="td col-2 col-md-2">2年</div>
                    <div class="td col-4 col-md-3">SD2D</div>
                    <div class="td col-md-3 d-none d-md-block">　L v　:　999</div>
                
                    <div class="td col-md-9">科目 : システム設計</div>
                    <div class="td col-md-3 d-none d-md-block">　DP　:　100</div>
                
                    <div class="td title col-md-9">設計の課題を教えてください</div>
                    <div class="col-md-3 d-none d-md-block">
                        <div class="row">
                            <div class="td m-0">　被評 :　4.5</div>
                            <div class="td m-0">　与評 :　4.5</div>
                        </div>
                    </div>
                    <style>.b-source{
                                background-color: #f0f0f0;
                                border-radius: 4px;
                                box-shadow: 0px 0px 1.5px 1.5px #ccc;
                                white-space: nowrap;
                                overflow: hidden;
                            }
                    </style>
                    <div class="td p-0 col-3">
                        <div class="row justify-content-center">
                            <div class="b-source mt-2 p-0 col-9">
                                <img src="A_img/img1.jpg" height="100px" width="100%">
                            </div>
        
                            <bottun id="modal-trigger" class="b-source mt-2 col-9">file</button>
                        </div>
                    </div>
                    <div class="td col-9" style="white-space: wrap; overflow: hidden;">
                        オセロ（リバーシ）ゲームをプログラミングするアルゴリズムを説明します。以下の手順を参考にしてください。
                         ゲーム盤の作成: オセロのゲーム盤は通常、8x8 の格子状になっています。この盤を表すデータ構造（例: 2次元配列）を作成します。初期状態では、中央に4つの石を配置します（通常、黒石と白石が交互に配置されます）。
                        石の配置: プレイヤーが石を配置するための入力を待ちます。石の配置は盤上の座標（行と列）で指定されます。プレイヤーが石を置くと、その位置の石の状態を更新します。
                        石のひっくり返し: 石を置いた後、その石によって相手の石をひっくり返す必要があるかどうかをチェックします。指定した位置に石を置いた後、8方向（上下左右および4つの斜め方向）に対して、
                        隣接する相手の石があるかどうかを確認します。隣接する相手の石の列または行が、自分の石で挟まれている場合、その間の相手の石を自分の石にひっくり返します。
                        ターンの切り替え: プレイヤー間でターンを交互に切り替えます。石の配置と石のひっくり返しの手順を交互に繰り返します。
                        ゲームの終了条件の確認: ゲームが終了したかどうかを確認します。終了条件の例としては、盤上に石を置ける場所がない場合や、盤面が全て埋まった場合があります。終了条件が満たされた場合、得点を計算して勝者を判定します。
                        勝者の表示: ゲームの結果を表示し、勝者を宣言します。
                        以上が基本的なオセロゲームのアルゴリズムです。プログラミング言語によって具体的な実装方法は異なりますが、このアルゴリズムを参考にしてゲームを作成することができます。必要に応じて、ユーザー入力の処理やGUIの実装などを追加することもできます。
                        石み合わせて実践することで、アルゴリズムのプログラミングスキルを上達させることができます。継続的な学習と積極的な取り組みが重要ですので、自身の目標に向かって努力を続けましょう。
                    </div>
                </div>
                <div class="row tdiv">

                    <div class="td col-6">2023/05/01 20:20</div>
                    <div class="td col-6">（ここはニックネームです）</div>
                
                    <style>.b-source{
                                background-color: #f0f0f0;
                                border-radius: 4px;
                                box-shadow: 0px 0px 1.5px 1.5px #ccc;
                                white-space: nowrap;
                                overflow: hidden;
                            }
                    </style>
                    <div class="td p-0 col-3">
                        <div class="row justify-content-center">
                            <div class="b-source mt-2 p-0 col-9">
                                <img src="A_img/img1.jpg" height="100px" width="100%">
                            </div>
        
                            <bottun id="modal-trigger-id" class="b-source mt-2 col-9">file</button>
                        </div>
                    </div>
                    <div class="td col-9" style="white-space: wrap; overflow: hidden;">
                        オセロ（リバーシ）ゲームをプログラミングするアルゴリズムを説明します。以下の手順を参考にしてください。
                         ゲーム盤の作成: オセロのゲーム盤は通常、8x8 の格子状になっています。この盤を表すデータ構造（例: 2次元配列）を作成します。初期状態では、中央に4つの石を配置します（通常、黒石と白石が交互に配置されます）。
                        石の配置: プレイヤーが石を配置するための入力を待ちます。石の配置は盤上の座標（行と列）で指定されます。プレイヤーが石を置くと、その位置の石の状態を更新します。
                        石のひっくり返し: 石を置いた後、その石によって相手の石をひっくり返す必要があるかどうかをチェックします。指定した位置に石を置いた後、8方向（上下左右および4つの斜め方向）に対して、
                        隣接する相手の石があるかどうかを確認します。隣接する相手の石の列または行が、自分の石で挟まれている場合、その間の相手の石を自分の石にひっくり返します。
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="p-2">モーダルのコンテンツ</div>
            
            <div class="modal-source">
                <img src="A_img/img2.jpg">
                <object data="text/20230603184500_A_G1-2-3(b).txt"></object>
            </div>
        </div>
    </div>

<script>

// モーダルを開くためのトリガー要素を取得
var modalTrigger = document.getElementById("modal-trigger-id");

// モーダル要素を取得
var modal = document.getElementById("modal");

// トリガーをクリックしたときにモーダルを表示する
modalTrigger.onclick = function () {
  modal.style.display = "block";
};

// モーダル外の領域をクリックしたときにモーダルを非表示にする
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
</script>
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
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-source>img{
    width: 100%;
    object-fit: contain;
}
object{
    min-height: 700px;
    width: 100%;
}

/* モーダルのコンテンツ */
.modal-content {
  position: fixed;
  top: 50%;
  left: 50%;
  background-color: #eee;
  transform: translate(-50%, -50%);
  width: 90%;
  max-height: 85%;
  height: fit-content;
  text-align: center;
}

.modal-source{
    width: 95%;
    margin: 0 auto 2%;
    overflow: scroll;
}

</style>

</body>

</html>