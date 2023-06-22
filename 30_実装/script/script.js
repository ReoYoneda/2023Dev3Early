// モーダルを開くためのトリガー要素を取得
var modalTrigger = document.getElementById("modal-trigger");

// モーダル要素を取得
var modal = document.getElementById("modal");

// コンテンツ名・画像タグ・オブジェクトタグの要素を取得
var modalContentName = document.getElementById("modalContentName");
var modalImgElem = document.getElementById("imgModal");
var modalTextElem = document.getElementById("textModal");

// 画像をクリックしたときにモーダルを表示する
function openImg(path) {

    modalImgElem.style.display = "block";
    modalTextElem.style.display = "none";

    modalContentName.innerHTML = path.substring(21);
    modalImgElem.setAttribute("src", path);

    modal.style.display = "block";
};

// ファイルをクリックしたときにモーダルを表示する
function openText(path) {

    modalImgElem.style.display = "none";
    modalTextElem.style.display = "block";
    
    modalContentName.innerHTML = path.substring(20);
    modalTextElem.setAttribute("data", path);

    modal.style.display = "block";
};

// モーダル外の領域をクリックしたときにモーダルを非表示にする
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};