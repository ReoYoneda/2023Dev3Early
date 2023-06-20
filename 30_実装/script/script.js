// モーダルを開くためのトリガー要素を取得
var modalTrigger = document.getElementById("modal-trigger");

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