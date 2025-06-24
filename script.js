function register() {
  const user = document.getElementById("username").value;
  const pass = document.getElementById("password").value;

  if (!user || !pass) return alert("Vui lòng nhập đầy đủ!");

  // Lưu vào localStorage (giả lập DB)
  localStorage.setItem("account_username", user);
  localStorage.setItem("account_password", pass);

  alert("Đăng ký thành công!");
  window.location.href = "login.html";
}

function login() {
  const user = document.getElementById("username").value;
  const pass = document.getElementById("password").value;

  const savedUser = localStorage.getItem("account_username");
  const savedPass = localStorage.getItem("account_password");

  if (user === savedUser && pass === savedPass) {
    alert("Đăng nhập thành công!");
    window.location.href = "index.html";
  } else {
    alert("Sai tài khoản hoặc mật khẩu!");
  }
}
