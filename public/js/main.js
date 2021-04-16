//ナビゲーション（モバイル）のログイン・ユーザ登録ボタンの表示制御
const spNavXbtn = document.getElementById("sp-nav-x-btn");
const spNavShowLoginBtn = document.getElementById("sp-nav-show-login-btn");
const spLoginBtn = document.getElementById("sp-login-btn");

if(spNavShowLoginBtn){
    spNavShowLoginBtn.addEventListener("click", () => {
        spNavXbtn.classList.remove("hidden");
        spNavShowLoginBtn.classList.add("hidden");
        spLoginBtn.classList.remove("hidden");
    });
}

if(spNavXbtn){
    spNavXbtn.addEventListener("click", () => {
        spNavXbtn.classList.add("hidden");
        spNavShowLoginBtn.classList.remove("hidden");
        spLoginBtn.classList.add("hidden");
    });
}

//モーダルのDOM要素を取得
const modalOverlay = document.getElementById("modal_overlay");
const modal = document.getElementById("delete-confirm-modal");
if(modalOverlay){
    var modalOverlayClassList = modalOverlay.classList;
}
if(modal){
    var modalClassList = modal.classList;
}
//削除ボタン押下時のモーダルの表示処理
const openModal = (boolval) => {
    if (boolval) {
        modalOverlayClassList.remove("hidden");
        setTimeout(() => {
            modalClassList.remove("opacity-0");
            modalClassList.remove("-translate-y-full");
            modalClassList.remove("scale-150");
        }, 100);
    } else {
        modalClassList.add("-translate-y-full");
        setTimeout(() => {
            modalClassList.add("opacity-0");
            modalClassList.add("scale-150");
        }, 100);
        setTimeout(() => modalOverlayClassList.add("hidden"), 100);
    }
};

//フラッシュメッセージを消す処理
const flashMessage = document.getElementById("flash-message");
if(flashMessage){
    setTimeout(() => {
        flashMessage.classList.add("hidden");
    }, 3000);

}