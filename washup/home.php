<?php
$laundry_list = [
    [
        'id'       => 1,
        'nama'     => 'Juragan Laundry',
        'alamat'   => 'Jl. Cilolohan No. 77, Tasikmalaya',
        'rating'   => 4.8,
        'status'   => 'BUKA',
        'durasi'   => '48h - 72h',
        'foto'     => 'image/JuraganLaundry.png',
    ],
    [
        'id'       => 2,
        'nama'     => 'Rama Laundry',
        'alamat'   => 'Jl. Kahuripan No. 12, Tasikmalaya',
        'rating'   => 4.5,
        'status'   => 'BUKA',
        'durasi'   => '12h - 24h',
        'foto'     => 'image/RamaLaundry.png',
    ],
    [
        'id'       => 3,
        'nama'     => 'Afifa Laundry',
        'alamat'   => 'Jl. Unsil No. 5, Tasikmalaya',
        'rating'   => 4.0,
        'status'   => 'BUKA',
        'durasi'   => '48h - 72h',
        'foto'     => 'image/AfifaLaundry.png',
    ],
];

$username = 'FADWA';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>WashUp Laundry - Home</title>
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
        <!-- Bell icon -->
        <img src="image/NotifIcon.png">
        NOTIFIKASI
      </button>
      <div class="washup-customer-badge">
        <span class="dot"></span>
        CUSTOMER
      </div>
    </div>
  </header>

  <!-- HERO BANNER -->
  <section class="washup-hero">
    <h1>Hai, <?php echo htmlspecialchars($username); ?>! WashUp Siap membantumu</h1>
    <p>Untuk pengalaman melakukan Laundry yang mudah, terpantau, dan terpercaya.<br>Sekali klik cucianmu langsung beres!</p>
    <div class="washup-search-box">
      <span class="washup-search-icon">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="11" r="8" stroke-width="2" stroke-linecap="round"/>
          <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </span>
      <input type="text" placeholder="Cari laundry ..." id="searchInput" oninput="filterLaundry()" />
    </div>
  </section>

  <!-- LAUNDRY TERDEKAT -->
  <div class="washup-section-title">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="18" height="18">
      <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="var(--washup-primary)"/>
    </svg>
    Laundry Terdekat
  </div>

  <div class="washup-laundry-list" id="laundryList">
    <?php foreach ($laundry_list as $laundry): ?>
    <a href="laundry.php?id=<?php echo $laundry['id']; ?>" class="washup-laundry-card" data-nama="<?php echo strtolower($laundry['nama']); ?>">
      
      <!-- Thumbnail -->
      <img
        class="washup-laundry-thumb"
        src="<?php echo htmlspecialchars($laundry['foto']); ?>"
        alt="<?php echo htmlspecialchars($laundry['nama']); ?>"
        onerror="this.src='assets/img/default-laundry.jpg'; this.onerror=null;"
      />

      <!-- Info -->
      <div class="washup-laundry-info">
        <div class="washup-laundry-name"><?php echo htmlspecialchars($laundry['nama']); ?></div>
        <div class="washup-laundry-address">
          <!-- Pin icon kecil -->
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="var(--washup-text-muted)"/>
          </svg>
          <?php echo htmlspecialchars($laundry['alamat']); ?>
        </div>
        <div class="washup-laundry-meta">
          <span class="washup-badge-open"><?php echo htmlspecialchars($laundry['status']); ?></span>
          <span class="washup-badge-duration">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <circle cx="12" cy="12" r="10" stroke-width="2"/>
              <polyline points="12 6 12 12 16 14" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <?php echo htmlspecialchars($laundry['durasi']); ?>
          </span>
        </div>
      </div>

      <!-- Rating & Arrow -->
      <div class="washup-laundry-rating">
        <span class="washup-star">★</span>
        <?php echo number_format($laundry['rating'], 1); ?>
      </div>
      <span class="washup-arrow">›</span>
    </a>
    <?php endforeach; ?>
  </div>

</div>

<!-- BOTTOM NAVIGATION -->
<nav class="washup-bottom-nav">
  <a href="home.php" class="washup-nav-item active">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="nav-icon-filled"/>
      <polyline points="9 22 9 12 15 12 15 22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    HOME
  </a>
  <a href="status.php" class="washup-nav-item">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <rect x="3" y="3" width="18" height="18" rx="4" stroke-width="2"/>
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
// Filter laundry berdasarkan pencarian
function filterLaundry() {
  const keyword = document.getElementById('searchInput').value.toLowerCase();
  const cards   = document.querySelectorAll('.washup-laundry-card');
  cards.forEach(card => {
    const nama = card.getAttribute('data-nama') || '';
    card.style.display = nama.includes(keyword) ? '' : 'none';
  });
}
</script>

</body>
</html>