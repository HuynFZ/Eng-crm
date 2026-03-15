<template>
  <div class="min-h-screen bg-gray-50">
    <div class="animate-fade-in">
      <LoginScreen v-if="!isLoggedIn" @login-success="handleLoginSuccess" />

      <template v-else>
        <TeacherDashboard v-if="viewMode === 'teacher'" @logout="handleLogout" />
        <StudentBooking v-else-if="viewMode === 'student'" />
      </template>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import LoginScreen from './Login.vue'
import TeacherDashboard from './Teacher.vue'
import StudentBooking from './StudentBooking.vue'

const isLoggedIn = ref(false)
const viewMode = ref('teacher')

onMounted(() => {
  // Check URL: Nếu có ?mode=student thì vào thẳng trang học viên chọn lịch
  const params = new URLSearchParams(window.location.search);
  if (params.get('mode') === 'student') {
    viewMode.value = 'student';
    isLoggedIn.value = true; // Cho phép xem trang booking không cần login
  }
})

const handleLoginSuccess = () => {
  isLoggedIn.value = true
  viewMode.value = 'teacher'
}

const handleLogout = () => {
  if (confirm("Huy muốn đăng xuất khỏi hệ thống?")) {
    isLoggedIn.value = false
    viewMode.value = 'teacher'
    // Xóa query params nếu đang ở chế độ student
    window.history.replaceState({}, document.title, "/");
  }
}
</script>

<style>
.animate-fade-in { animation: fadeIn 0.4s ease-out; }
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>