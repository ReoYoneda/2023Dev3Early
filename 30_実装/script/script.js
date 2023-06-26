var body = document.querySelector("body");

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

    body.style.overflow = "hidden";

    modalImgElem.style.display = "block";
    modalTextElem.style.display = "none";

    modalContentName.innerHTML = path.substring(21);
    modalImgElem.setAttribute("src", path);

    modal.style.display = "block";
};

// ファイルをクリックしたときにモーダルを表示する
function openText(path) {

    body.style.overflow = "hidden";

    modalImgElem.style.display = "none";
    modalTextElem.style.display = "block";

    modalContentName.innerHTML = path.substring(20);
    modalTextElem.setAttribute("data", path);

    modal.style.display = "block";
};

// モーダル外の領域をクリックしたときにモーダルを非表示にする
window.onclick = function (event) {
  if (event.target == modal) {

    body.style.overflow = "auto";

    modal.style.display = "none";
  }
};


// ファイル添付時　プレビュー用
function viewImg(hoge){
    var imgBox = document.getElementById("imgBox");
    var imgElem = document.getElementById('preview');
    if(hoge.files.length > 0){
        var fileData = new FileReader();
        fileData.readAsDataURL(hoge.files[0]);
        /*id属性が付与されているimgタグのsrc属性に、
        fileReaderで取得した値の結果を入力することでプレビュー表示している*/
        fileData.onload = (function() {
            imgElem.src = fileData.result;
        });
        imgBox.style.display = "block";
    }else{
        imgBox.style.display = "none";
    }
}
function viewSrc(hoge){
    var srcBox = document.getElementById("srcBox");
    if(hoge.files.length > 0){
        var fileName = hoge.value.substring(12);
        srcBox.innerHTML = fileName;
        srcBox.style.display = "block";
    }else{
        srcBox.style.display = "none";
    }
}

function previewImg(){
    var img = document.getElementById("img");
    var url = URL.createObjectURL(img.files[0]);
    openImg(url);
    document.getElementById("modalContentName").innerHTML = img.value.substring(12);
}