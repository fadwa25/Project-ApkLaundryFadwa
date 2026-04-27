// === Role Selection ===
const customerBtn = document.getElementById('customerBtn');
const ownerBtn = document.getElementById('ownerBtn');

customerBtn.addEventListener('click', () => {
  customerBtn.classList.add('active');
  ownerBtn.classList.remove('active');
});

ownerBtn.addEventListener('click', () => {
  ownerBtn.classList.add('active');
  customerBtn.classList.remove('active');
});

// === Login Function ===
const loginBtn = document.getElementById('loginBtn');

loginBtn.addEventListener('click', () => {
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const isCustomer = customerBtn.classList.contains('active');

  if (!email || !password) {
    alert("Mohon isi Email dan Password!");
    return;
  }

  // Simulasi login berhasil (tanpa database dulu)
  const role = isCustomer ? "CUSTOMER" : "OWNER";
  
  alert(`✅ Login Berhasil!\n\nSelamat datang, ${email}\nRole: ${role}`);

  // Di sini nanti bisa redirect ke halaman home
  // window.location.href = "home.html";
});

// === Register (bisa dikembangkan nanti) ===
function register() {
  alert("Halaman Registrasi akan dibuat di tahap berikutnya.\n\nMau saya buatkan sekarang?");
}