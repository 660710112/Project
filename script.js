const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});


document.getElementById("registerForm").addEventListener("submit", function(e) {
  e.preventDefault();
  fetch("register.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      name: document.getElementById("regName").value,
      email: document.getElementById("regEmail").value,
      password: document.getElementById("regPassword").value
    })
  })
  .then(res => res.json())
  .then(data => {
    alert(data.message || "สมัครสมาชิกสำเร็จ!");
  });
});

document.getElementById("loginForm").addEventListener("submit", function(e) {
  e.preventDefault();
  fetch("login.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      email: document.getElementById("loginEmail").value,
      password: document.getElementById("loginPassword").value
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === "success") {
      alert("เข้าสู่ระบบสำเร็จ!");
      window.location.href = data.role === "admin" ? "admin.html" : "movies.html";
    } else {
      alert(data.message || "เข้าสู่ระบบล้มเหลว");
    }
  });
});
