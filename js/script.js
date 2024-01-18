// Tambahkan di bagian paling atas skrip JavaScript
function saveModePreference(mode) {
  localStorage.setItem("modePreference", mode);
}

function getModePreference() {
  return localStorage.getItem("modePreference");
}

let sideMenu = document.querySelectorAll(".nav-link");
sideMenu.forEach((item) => {
  let li = item.parentElement;

  item.addEventListener("click", () => {
    sideMenu.forEach((link) => {
      link.parentElement.classList.remove("active");
    });
    li.classList.add("active");
  });
});

let menuBar = document.querySelector(".menu-btn");
let sideBar = document.querySelector(".sidebar");
let adminText = document.querySelector(".logo .text");
let logoImg = document.querySelector(".logo-img");

menuBar.addEventListener("click", () => {
  sideBar.classList.toggle("hide");
  adminText.classList.toggle("hidden");

  // Tambahkan logika untuk menyembunyikan/menampilkan teks admin pada ukuran layar kurang dari 768
  if (window.innerWidth < 768) {
    adminText.classList.toggle("hidden", sideBar.classList.contains("hide"));
  }
});

let switchMode = document.getElementById("switch-mode");
switchMode.addEventListener("change", (e) => {
  if (e.target.checked) {
    document.body.classList.add("dark");
    saveModePreference("dark");
  } else {
    document.body.classList.remove("dark");
    saveModePreference("light");
  }
});

let searchFrom = document.querySelector(".content nav form");
let searchBtn = document.querySelector(".search-btn");
let searchIcon = document.querySelector(".search-icon");
searchBtn.addEventListener("click", (e) => {
  if (window.innerWidth < 576) {
    e.preventDefault();
    searchFrom.classList.toggle("show");
    if (searchFrom.classList.contains("show")) {
      searchIcon.classList.replace("fa-search", "fa-times");
    } else {
      searchIcon.classList.replace("fa-times", "fa-search");
    }
  }
});

window.addEventListener("resize", () => {
  if (window.innerWidth > 576) {
    searchIcon.classList.replace("fa-times", "fa-search");
    searchFrom.classList.remove("show");
  }
  if (window.innerWidth < 768) {
    sideBar.classList.add("hide");

    // Tambahkan logika untuk menyembunyikan teks admin saat layar diubah menjadi kurang dari 768
    if (!sideBar.classList.contains("hide")) {
      adminText.classList.add("hidden");
    }
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const savedMode = getModePreference();

  if (savedMode === "dark") {
    document.body.classList.add("dark");
    switchMode.checked = true;
  } else {
    document.body.classList.remove("dark");
    switchMode.checked = false;
  }

  // Tambahkan logika untuk menyembunyikan teks admin saat layar dimuat dan kurang dari 768
  if (window.innerWidth < 768 && sideBar.classList.contains("hide")) {
    adminText.classList.add("hidden");
  }
});

if (window.innerWidth < 768) {
  sideBar.classList.add("hide");
}

document.addEventListener("DOMContentLoaded", () => {
  // ... (your existing code)

  // Update the rendering of student names
  const studentNameElements = document.querySelectorAll(
    ".table-data .order table tr td:first-child p"
  );
  studentNameElements.forEach((element) => {
    const originalName = element.textContent;
    const truncatedName =
      originalName.length > 20
        ? originalName.substring(0, 20) + "..."
        : originalName;
    element.textContent = truncatedName;
    element.title = originalName; // Add a tooltip with the full name
  });
});
