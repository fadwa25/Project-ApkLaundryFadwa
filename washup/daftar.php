<?php 
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $role = $_POST['role'];

    if ($password !== $confirm) {
        $error = "Password tidak cocok!";
    } elseif (strlen($password) < 6) {
        $error = "Password minimal 6 karakter!";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $error = "Email sudah terdaftar!";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
            if ($stmt->execute([$email, $hashed, $role])) {
                header("Location: login.php?success=1");
                exit;
            } else {
                $error = "Gagal mendaftar!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DaftarWashupLaundry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="daftar-container">
    <div class="header">
      <div class="logo">
        <img src="image/LogoWahUp.png" alt="WashUp Laundry">
    </div>
  </div>

    <div class="form-content">
      <h1 class="text-center">Daftar Akun</h1>
      <p class="subtitle text-center">Silahkan isi data untuk mendaftar</p>

      <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label fw-semibold">Masukan Email</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" name="email" class="form-control" placeholder="@gmail.com" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Masukan Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="minimal 6 karakter" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Konfirmasi Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="confirm_password" class="form-control" placeholder="ketik ulang" required>
          </div>
        </div>

        <div class="role-title mb-2">MASUK SEBAGAI :</div>
      <div class="row g-3">
        <div class="col-6">
          <label class="role-btn w-100 text-center p-3">
            <input type="radio" name="role" value="CUSTOMER" checked>
            <img src="image/IconCustomer.png" width="32"><br>
            <span class="fw-semibold">CUSTOMER</span>
          </label>
        </div>
        <div class="col-6">
          <label class="role-btn w-100 text-center p-3">
            <input type="radio" name="role" value="OWNER">
            <img src="image/IconOwner.png" width="32"><br>
            <span class="fw-semibold">OWNER</span>
          </label>
        </div>
      </div>

      <button class="btn btn-success w-100 py-3 fw-bold mt-4">DAFTAR</button>

      <div class="text-center my-4 text-muted">
        Sudah Memiliki Akun?
      </div>
            <a href="login.php" class="btn btn-outline-secondary w-100 py-3 fw-semibold">
        LOGIN
      </a>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>