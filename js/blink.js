// Mendapatkan elemen span dengan id "counter"
var counterElement = document.getElementById("counter");

// Mendapatkan jumlah pengunjung saat ini dari localStorage atau mengatur nilainya menjadi 0 jika tidak ada
var visitorCount = localStorage.getItem("visitorCount") || 0;

// Mengupdate tampilan dengan jumlah pengunjung saat ini
counterElement.textContent = visitorCount;

// Menambahkan 1 ke jumlah pengunjung saat ini
visitorCount++;
// Menyimpan jumlah pengunjung saat ini ke localStorage
localStorage.setItem("visitorCount", visitorCount);
