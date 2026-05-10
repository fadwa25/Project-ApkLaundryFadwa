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
loginBtn.addEventListener('click', () => {
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const isCustomer = customerBtn.classList.contains('active');

  if (!email || !password) {
    alert("Mohon isi Email dan Password!");
    return;
  }
});