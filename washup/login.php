<?php 
include 'config.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        
        header("Location: home.php");
        exit;
    } else {
        $error = "Email atau password salah!";
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
      <h1 class="text-center">Login Akun</h1>
      <p class="subtitle text-center">Silahkan Lakukan Login untuk Melanjutkan!</p>

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
            <input type="password" name="password" class="form-control" placeholder="Password Anda" required>
          </div>
        </div>

      <div class="text-end mb-4">
        <a href="#" class="text-primary text-decoration-none">Lupa Password</a>
      </div>

      <button type="submit" class="btn btn-success w-100 py-3 fw-bold mt-4">
        LOGIN
    </button>

      <div class="text-center my-4 text-muted">
        Belum Memiliki Akun?
      </div>
            <a href="daftar.php" class="btn btn-outline-secondary w-100 py-3 fw-semibold">
        DAFTAR
        </a>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Custom JavaScript -->
  <script src="script.js"></script>
</body>
</html>