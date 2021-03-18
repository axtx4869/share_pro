//ナビゲーション（モバイル）のログイン・ユーザ登録ボタンの表示制御
const spNavXbtn = document.getElementById("sp-nav-x-btn");
const spNavShowLoginBtn = document.getElementById("sp-nav-show-login-btn");
const spLoginBtn = document.getElementById("sp-login-btn");

spNavShowLoginBtn.addEventListener("click", () => {
    spNavXbtn.classList.remove("hidden");
    spNavShowLoginBtn.classList.add("hidden");
    spLoginBtn.classList.remove("hidden");
});

spNavXbtn.addEventListener("click", () => {
    spNavXbtn.classList.add("hidden");
    spNavShowLoginBtn.classList.remove("hidden");
    spLoginBtn.classList.add("hidden");
});
