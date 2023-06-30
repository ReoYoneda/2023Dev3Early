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
    // 再生成したオブジェクトの取得
    var modalTextElem = document.getElementById("textModal");

    // body要素のスクロールを禁止し、スクロールチェーンを防止する。
    body.style.overflow = "hidden";

    // imgタグを表示する
    modalImgElem.style.display = "block";
    // objectタグを非表示にする
    modalTextElem.style.display = "none";

    // リソースの名前を出力する
    modalContentName.innerHTML = path.substring(21);
    // imgタグのsrc属性を書き換える
    modalImgElem.setAttribute("src", path);

    // モーダルを表示する
    modal.style.display = "block";
};

/* ファイルをクリックしたときにモーダルを表示する
   objectタグはdata属性を書き換えるだけでは中身が書き変わらない。
   よって、objectタグのオブジェクト(id取得)を削除して再び生成する手法で中身を更新する。 */
function openText(path) {
    // 再生成したオブジェクトの取得
    var modalTextElem = document.getElementById("textModal");
    // オブジェクトの親ノードの取得
    var parentElement = modalTextElem.parentNode;
    // 親ノードに対する子ノードを削除
    parentElement.removeChild(modalTextElem);
    // objectのオブジェクトを生成
    var newModalTextElem = document.createElement('object');
    // 生成したオブジェクトにidを付与
    newModalTextElem.id = "textModal";
    // 親ノードに対する子ノードに生成したオブジェクトを配置
    parentElement.appendChild(newModalTextElem);

    // body要素のスクロールを禁止し、スクロールチェーンを防止する。
    body.style.overflow = "hidden";

    // imgタグを非表示にする
    modalImgElem.style.display = "none";
    // objectタグを表示する
    newModalTextElem.style.display = "block";

    // リソースの名前を出力する
    modalContentName.innerHTML = path.substring(20);
    // objectタグのdata属性を書き換える
    newModalTextElem.setAttribute("data", path);

    // モーダルを表示する
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