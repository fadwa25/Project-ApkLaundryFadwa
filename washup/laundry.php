<?php
$laundry_data = [
    1 => [
        'nama'    => 'Juragan Laundry',
        'alamat'  => 'Jl. Cilolohan No. 77, Tasikmalaya',
        'foto'    => 'image/JuraganDashboard.png',
        'layanan' => [
            [
                'nama'    => 'Cuci Kering Lipat',
                'desc'    => 'Layanan standar cuci, kering, dan lipat rapi.',
                'harga'   => 'Rp. 5.000/Kg',
                'durasi'  => '48 Jam',
            ],
            [
                'nama'    => 'Cuci Kering Setrika',
                'desc'    => 'Layanan standar cuci, kering, dan setrika rapi.',
                'harga'   => 'Rp. 7.000/Kg',
                'durasi'  => '48 Jam',
            ],
            [
                'nama'    => 'Cuci Sprei Selimut',
                'desc'    => 'Khusus untuk sprei dan selimut tipis.',
                'harga'   => 'Rp. 12.000/Kg',
                'durasi'  => '72 Jam',
            ],
        ],
    ],
    2 => [
        'nama'    => 'Rama Laundry',
        'alamat'  => 'Jl. Kahuripan No. 12, Tasikmalaya',
        'foto'    => 'image/RamaDashboard.png',
        'layanan' => [
            [
                'nama'    => 'Cuci Kering Lipat',
                'desc'    => 'Layanan standar cuci, kering, dan lipat rapi.',
                'harga'   => 'Rp. 6.000/Kg',
                'durasi'  => '12 Jam',
            ],
            [
                'nama'    => 'Cuci Express',
                'desc'    => 'Layanan cepat selesai dalam waktu singkat.',
                'harga'   => 'Rp. 10.000/Kg',
                'durasi'  => '6 Jam',
            ],
        ],
    ],
    3 => [
        'nama'    => 'Afifa Laundry',
        'alamat'  => 'Jl. Unsil No. 5, Tasikmalaya',
        'foto'    => 'image/AfifaDashboard.png',
        'layanan' => [
            [
                'nama'    => 'Cuci Kering Lipat',
                'desc'    => 'Layanan standar cuci, kering, dan lipat rapi.',
                'harga'   => 'Rp. 5.500/Kg',
                'durasi'  => '48 Jam',
            ],
            [
                'nama'    => 'Cuci Sprei Selimut',
                'desc'    => 'Khusus untuk sprei dan selimut tipis.',
                'harga'   => 'Rp. 11.000/Kg',
                'durasi'  => '72 Jam',
            ],
        ],
    ],
];

// Ambil ID dari URL, default ke 1
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Validasi ID ada di data
if (!isset($laundry_data[$id])) {
    header('Location: home.php');
    exit;
}

$laundry = $laundry_data[$id];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo htmlspecialchars($laundry['nama']); ?> - WashUp Laundry</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body class="washup-body">
<div class="washup-wrapper">

  <!-- TOPBAR -->
  <header class="washup-topbar">
    <a href="home.php" class="washup-logo">
      <div class="washup-logo-icon">
        <img src="image/LogoWahUp.png" width="80" height="80">
      </div>
    </a>
    <div class="washup-topbar-right">
      <button class="washup-notif-btn" title="Notifikasi">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M13.73 21a2 2 0 0 1-3.46 0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        NOTIFIKASI
      </button>
      <div class="washup-customer-badge">
        <span class="dot"></span>
        CUSTOMER
      </div>
    </div>
  </header>

  <!-- TOMBOL KEMBALI -->
  <a href="home.php" class="washup-back-btn">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <polyline points="15 18 9 12 15 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Kembali
  </a>

  <!-- DETAIL LAUNDRY CARD -->
  <div class="washup-detail-card">

    <!-- Foto Banner Laundry -->
    <img
      class="washup-detail-hero-img"
      src="<?php echo htmlspecialchars($laundry['foto']); ?>"
      alt="<?php echo htmlspecialchars($laundry['nama']); ?>"
      onerror="this.src='assets/img/default-detail.jpg'; this.onerror=null;"
    />

    <div class="washup-detail-body">

      <!-- Nama & Alamat -->
      <div class="washup-detail-name"><?php echo htmlspecialchars($laundry['nama']); ?></div>
      <div class="washup-detail-address"><?php echo htmlspecialchars($laundry['alamat']); ?></div>

      <!-- Layanan Tersedia -->
      <div class="washup-services-title">Layanan Tersedia</div>

      <div class="washup-services-list">
        <?php foreach ($laundry['layanan'] as $index => $layanan): ?>
        <div class="washup-service-item">

          <div class="washup-service-info">
            <div class="washup-service-name"><?php echo htmlspecialchars($layanan['nama']); ?></div>
            <div class="washup-service-desc"><?php echo htmlspecialchars($layanan['desc']); ?></div>
            <div class="washup-service-meta">
              <span class="washup-service-price"><?php echo htmlspecialchars($layanan['harga']); ?></span>
              <span class="washup-service-duration">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="12" cy="12" r="10" stroke-width="2"/>
                  <polyline points="12 6 12 12 16 14" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <?php echo htmlspecialchars($layanan['durasi']); ?>
              </span>
            </div>
          </div>

          <!-- Tombol Pesan / Tambah -->
          <button
            class="washup-service-btn"
            title="Pesan <?php echo htmlspecialchars($layanan['nama']); ?>"
            onclick="pesanLayanan(<?php echo $id; ?>, <?php echo $index; ?>)"
          >
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <line x1="3" y1="6" x2="21" y2="6" stroke-width="2" stroke-linecap="round"/>
              <path d="M16 10a4 4 0 0 1-8 0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>

        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>

</div>

<!-- BOTTOM NAVIGATION -->
<nav class="washup-bottom-nav">
  <a href="home.php" class="washup-nav-item">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <polyline points="9 22 9 12 15 12 15 22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    HOME
  </a>
  <a href="status.php" class="washup-nav-item active">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <rect x="3" y="3" width="18" height="18" rx="4" stroke-width="2" class="nav-icon-filled"/>
      <circle cx="12" cy="12" r="4" stroke-width="2"/>
    </svg>
    STATUS
  </a>
  <a href="profil.php" class="washup-nav-item">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <circle cx="12" cy="7" r="4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    PROFIL
  </a>
</nav>

<script>
// Fungsi tombol pesan layanan
function pesanLayanan(laundryId, layananIndex) {
  // Arahkan ke halaman pemesanan
  // Sesuaikan dengan halaman pesan Anda
  window.location.href = 'pesan.php?laundry=' + laundryId + '&layanan=' + layananIndex;
}
</script>

</body>
</html>