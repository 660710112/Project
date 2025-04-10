let currentLang = localStorage.getItem("lang") || "th";

function setLang(lang) {
  currentLang = lang;
  localStorage.setItem("lang", lang);
  loadLang();
}

function loadLang() {
  fetch("lang.json")
    .then(res => res.json())
    .then(data => {
      const dict = data[currentLang];
      document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.getAttribute("data-i18n");
        if (dict[key]) el.innerText = dict[key];
      });
    });
}

window.addEventListener("DOMContentLoaded", loadLang);
