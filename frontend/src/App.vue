<script setup>
import { ref } from 'vue'

// Trạng thái mở/đóng menu trên điện thoại
const isMobileMenuOpen = ref(false)

function toggleMenu() {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
}
</script>

<template>
  <div class="page-wrapper">

    <nav class="navbar">
      <div class="container nav-container">
        <a href="#" class="logo">
          <i class="fa-solid fa-building-columns text-orange"></i>
          <span class="text-dark">EDU</span><span class="text-orange">TALENT</span>
        </a>

        <ul class="desktop-menu">
          <li><a href="#" class="active">Chương Trình Học</a></li>
          <li><a href="#">Luyện Thi IELTS</a></li>
          <li><a href="#">Doanh Nghiệp</a></li>
          <li><a href="#">Góc Học Tập</a></li>
          <li><a href="#">Về Chúng Tôi</a></li>
        </ul>

        <div class="desktop-actions">
          <button class="btn-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
          <button class="btn-login">Đăng nhập</button>
          <button class="btn-login">Đăng ký</button>
        </div>

        <button class="mobile-toggle" @click="toggleMenu">
          <i :class="isMobileMenuOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"></i>
        </button>
      </div>

      <div class="mobile-menu" :class="{ 'is-open': isMobileMenuOpen }">
        <a href="#" class="active">Chương Trình Học</a>
        <a href="#">Luyện Thi IELTS</a>
        <a href="#">Doanh Nghiệp</a>
        <a href="#">Góc Học Tập</a>
        <a href="#">Về Chúng Tôi</a>
        <div class="mobile-actions">
          <button class="btn-login-mobile w-full">Đăng nhập</button>
          <button class="btn-login-mobile w-full">Đăng ký</button>
        </div>
      </div>
    </nav>

    <main class="main-content">
      <div class="container">

        <section class="hero-section animate-fade-in-up">
          <div class="hero-content">
            <div class="badge-outline">Định hướng tương lai</div>
            <h1 class="hero-title">
              Khát Vọng Là <br><span class="text-orange">Khởi Đầu</span>
            </h1>
            <p class="hero-subtitle">Của Mọi Thành Tựu Toàn Cầu</p>
          </div>
          <div class="hero-image-wrapper">
            <img src="https://framerusercontent.com/images/cMzQdKUk6pKTzsg1j8Xg0F6j4E.png?width=1056&height=600" alt="Học viên" class="hero-image">
          </div>
        </section>

        <section class="bento-grid">

          <div class="bento-card card-orange col-span-2 animate-fade-in-up delay-100">
            <i class="fa-solid fa-laptop-file bg-icon"></i>
            <div class="card-inner">
              <div class="card-header space-between">
                <span class="badge-solid">MỚI</span>
                <button class="btn-circle btn-circle-white"><i class="fa-solid fa-arrow-right text-orange"></i></button>
              </div>
              <h2 class="card-title-lg text-white">Thi Thử IELTS/TOEIC<br>Nhận Kết Quả Ngay</h2>
            </div>
          </div>

          <div class="bento-card card-dark col-span-2 animate-fade-in-up delay-200">
            <i class="fa-solid fa-book-open-reader bg-icon"></i>
            <div class="card-inner">
              <div class="card-header justify-end">
                <button class="btn-circle btn-circle-dark"><i class="fa-solid fa-arrow-right"></i></button>
              </div>
              <h2 class="card-title-lg text-white">Tài Liệu Học Tập<br>& Thư Viện Đề Thi</h2>
            </div>
          </div>

          <div class="bento-card card-white animate-fade-in-up delay-300">
            <i class="fa-solid fa-circle-user bg-icon"></i>
            <div class="card-inner">
              <div class="card-header justify-end">
                <button class="btn-link text-orange"><i class="fa-solid fa-arrow-up-right-from-square"></i></button>
              </div>
              <div class="card-bottom">
                <h3 class="card-title-sm">Cổng Học Viên</h3>
                <p class="card-desc">Đăng nhập Portal</p>
              </div>
            </div>
          </div>

          <div class="bento-card card-white animate-fade-in-up delay-400">
            <i class="fa-solid fa-map-location-dot bg-icon"></i>
            <div class="card-inner">
              <div class="card-header justify-end">
                <button class="btn-link text-orange"><i class="fa-solid fa-arrow-up-right-from-square"></i></button>
              </div>
              <div class="card-bottom">
                <h3 class="card-title-sm">Hệ Thống</h3>
                <p class="card-desc">Cơ sở đào tạo</p>
              </div>
            </div>
          </div>

          <div class="bento-card card-light animate-fade-in-up delay-500">
            <i class="fa-solid fa-briefcase bg-icon"></i>
            <div class="card-inner">
              <div class="card-header justify-end">
                <button class="btn-link text-orange"><i class="fa-solid fa-arrow-up-right-from-square"></i></button>
              </div>
              <div class="card-bottom">
                <h3 class="card-title-sm">Doanh Nghiệp</h3>
                <p class="card-desc">Giải pháp đào tạo</p>
              </div>
            </div>
          </div>

          <div class="bento-card card-light animate-fade-in-up delay-600">
            <i class="fa-regular fa-calendar-check bg-icon"></i>
            <div class="card-inner">
              <div class="card-header justify-end">
                <button class="btn-link text-orange"><i class="fa-solid fa-arrow-up-right-from-square"></i></button>
              </div>
              <div class="card-bottom">
                <h3 class="card-title-sm">Lịch Khai Giảng</h3>
                <p class="card-desc">Tháng này</p>
              </div>
            </div>
          </div>

        </section>
      </div>
    </main>

    <button class="floating-btn">
      <i class="fa-solid fa-headset"></i> Tư Vấn
    </button>
  </div>
</template>

<style scoped>
/* =========================================
   VARIABLES & BASE
========================================= */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

:root {
  --bg-white: #ffffff;
  --bg-main: #f8fafc;

  /* Bảng màu Slate cho text/viền */
  --slate-100: #f1f5f9;
  --slate-200: #e2e8f0;
  --slate-400: #94a3b8;
  --slate-500: #64748b;
  --slate-700: #334155;
  --slate-800: #0f172a;

  /* MÀU CAM NỔI BẬT */
  --orange-primary: #ff7b00; /* Cam đậm rực rỡ */
  --orange-hover: #e66e00;
  --orange-light: #fff2e5;

  --card-dark: #1e293b;
  --card-light: #f1f5f9;
  --white: #ffffff;
}

.page-wrapper {
  font-family: 'Inter', 'Segoe UI', sans-serif;
  background-color: var(--bg-main);
  min-height: 100vh;
  color: var(--slate-700);
  padding-bottom: 80px;
  overflow-x: hidden;
}

.container {
  max-width: 1440px;
  margin: 0 auto;
  padding: 0 24px;
}

button { cursor: pointer; border: none; background: none; font-family: inherit; transition: all 0.3s ease; }
a { text-decoration: none; color: inherit; transition: all 0.3s ease; }
ul { list-style: none; }

.text-dark { color: var(--slate-800); }
.text-orange { color: var(--orange-primary); }
.text-white { color: var(--white); }

/* =========================================
   NAVBAR
========================================= */
.navbar {
  background-color: var(--white);
  position: sticky;
  top: 0;
  z-index: 50;
  border-bottom: 1px solid var(--slate-200);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

.nav-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 80px;
}

.logo {
  font-size: 1.5rem;
  font-weight: 800;
  display: flex;
  align-items: center;
  gap: 12px;
  letter-spacing: 0.5px;
}

.desktop-menu {
  display: flex;
  gap: 32px;
  font-size: 0.9rem;
  font-weight: 600;
  color: var(--slate-800);
}
.desktop-menu a:hover, .desktop-menu a.active { color: var(--orange-primary); }

.desktop-actions { display: flex; align-items: center; gap: 24px; }
.btn-icon { color: var(--slate-700); font-size: 1.1rem; }
.btn-icon:hover { color: var(--orange-primary); }

.btn-login {
  border: 1px solid var(--orange-primary);
  color: var(--orange-primary);
  padding: 10px 24px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 0.9rem;
  background-color: var(--white);
}
.btn-login:hover {
  background-color: var(--orange-primary);
  color: var(--white);
}

/* Mobile Nav */
.mobile-toggle { display: none; font-size: 1.5rem; color: var(--slate-700); }

.mobile-menu {
  display: none;
  background-color: var(--white);
  padding: 16px 24px;
  border-top: 1px solid var(--slate-200);
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}
.mobile-menu.is-open { display: flex; flex-direction: column; gap: 16px; }
.mobile-menu a { font-weight: 500; padding: 8px 0; color: var(--slate-800); }
.mobile-menu a.active { color: var(--orange-primary); }

.btn-login-mobile {
  background-color: var(--orange-primary);
  color: var(--white);
  padding: 12px 24px;
  border-radius: 8px;
  font-weight: 600;
}
.w-full { width: 100%; }

/* =========================================
   HERO SECTION
========================================= */
.main-content { padding-top: 32px; }

.hero-section {
  display: flex;
  background-color: var(--white);
  border-radius: 24px;
  overflow: hidden;
  margin-bottom: 24px;
  position: relative;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
  border: 1px solid var(--slate-200);
}

.hero-content {
  flex: 1;
  padding: 64px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: relative;
  z-index: 10;
}

.badge-outline {
  display: inline-block;
  border: 1px solid var(--slate-200);
  color: var(--slate-700);
  background-color: var(--white);
  padding: 6px 16px;
  border-radius: 50px;
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  margin-bottom: 24px;
  width: max-content;
}

.hero-title {
  font-size: 3.5rem;
  font-weight: 800;
  color: var(--slate-800);
  line-height: 1.2;
  margin-bottom: 16px;
}

.hero-subtitle {
  font-size: 1.25rem;
  color: var(--slate-500);
  font-weight: 300;
}

.hero-image-wrapper {
  flex: 1;
  position: relative;
  min-height: 400px;
}
.hero-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: top;
  transition: transform 0.7s ease;
}
.hero-section:hover .hero-image { transform: scale(1.05); }

/* =========================================
   BENTO GRID
========================================= */
.bento-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}
.col-span-2 { grid-column: span 2; }

.bento-card {
  border-radius: 24px;
  padding: 32px;
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 220px;
  border: 1px solid var(--slate-200);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}
.bento-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}

.bg-icon {
  position: absolute;
  right: -10%;
  bottom: -10%;
  font-size: 8rem;
  opacity: 0.1;
  transition: all 0.5s ease;
}
.bento-card:hover .bg-icon { transform: scale(1.1); }

.card-inner { position: relative; z-index: 10; height: 100%; display: flex; flex-direction: column; justify-content: space-between; }
.card-header { display: flex; margin-bottom: 32px; }
.space-between { justify-content: space-between; align-items: flex-start; }
.justify-end { justify-content: flex-end; }

/* THEMES CHO TỪNG CARD */
/* Thẻ màu Cam (Thi thử) */
.card-orange { background-color: var(--orange-primary); color: white; border: none; }
.card-orange:hover { background-color: var(--orange-hover); }
.card-orange .bg-icon { color: white; opacity: 0.2; right: -5%; top: -15%; bottom: auto; }

/* Thẻ màu Đen (Tài liệu) */
.card-dark { background-color: var(--card-dark); color: white; border: none; }
.card-dark .bg-icon { color: white; opacity: 0.05; }
.card-dark:hover .bg-icon { transform: rotate(12deg); }

/* Thẻ màu Trắng & Xám */
.card-white { background-color: var(--white); }
.card-white .bg-icon { color: var(--slate-200); opacity: 0.5; }
.card-light { background-color: var(--card-light); }
.card-light .bg-icon { color: var(--slate-300); opacity: 0.5; }

/* Typography trong Card */
.card-title-lg { font-size: 1.75rem; font-weight: 700; line-height: 1.3; }
.card-title-sm { font-size: 1.25rem; font-weight: 700; color: var(--slate-800); margin-bottom: 4px; }
.card-desc { font-size: 0.9rem; color: var(--slate-500); font-weight: 500; }

/* Components trong Card */
.badge-solid {
  background-color: var(--white);
  color: var(--orange-primary);
  font-size: 0.75rem;
  font-weight: 800;
  padding: 4px 12px;
  border-radius: 50px;
}

.btn-circle {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.btn-circle-white { background-color: var(--white); }
.btn-circle-dark { background-color: rgba(255, 255, 255, 0.1); color: white; }
.card-dark:hover .btn-circle-dark { background-color: var(--white); color: var(--card-dark); }

.btn-link { font-size: 1.25rem; }
.bento-card:hover .btn-link { color: var(--orange-hover); transform: scale(1.1); }

/* =========================================
   FLOATING BUTTON (Màu Cam)
========================================= */
.floating-btn {
  position: fixed;
  bottom: 32px;
  right: 32px;
  background-color: var(--orange-primary);
  color: var(--white);
  padding: 14px 28px;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 12px;
  box-shadow: 0 10px 25px rgba(255, 123, 0, 0.3);
  z-index: 100;
}
.floating-btn:hover {
  background-color: var(--orange-hover);
  transform: scale(1.05);
}

/* =========================================
   RESPONSIVE
========================================= */
@media (max-width: 1024px) {
  .desktop-menu, .desktop-actions { display: none; }
  .mobile-toggle { display: block; }
  .hero-title { font-size: 2.5rem; }
  .hero-content { padding: 40px; }
  .bento-grid { grid-template-columns: repeat(2, 1fr); }
  .col-span-2 { grid-column: span 2; }
}

@media (max-width: 768px) {
  .hero-section { flex-direction: column; }
  .hero-image-wrapper { min-height: 250px; }
  .bento-grid { grid-template-columns: 1fr; }
  .col-span-2 { grid-column: span 1; }
  .bento-card { min-height: 180px; }
  .floating-btn { bottom: 20px; right: 20px; padding: 12px 20px; font-size: 0.9rem; }
}

/* =========================================
   ANIMATIONS
========================================= */
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
.delay-100 { animation-delay: 100ms; }
.delay-200 { animation-delay: 200ms; }
.delay-300 { animation-delay: 300ms; }
.delay-400 { animation-delay: 400ms; }
.delay-500 { animation-delay: 500ms; }
.delay-600 { animation-delay: 600ms; }
</style>