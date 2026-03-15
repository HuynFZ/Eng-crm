<template>
  <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 font-sans">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-md border border-gray-100">
      <div class="text-center mb-10">
        <h1 class="text-4xl font-black text-gray-900 tracking-tighter">
          Talemy<span class="text-orange-500">Edu</span>
        </h1>
        <p class="text-gray-400 mt-3 font-medium text-sm">Hệ thống quản trị đào tạo 1-1 chuyên sâu</p>
      </div>

      <form @submit.prevent="handleLogin" class="space-y-6">
        <div>
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Tài khoản</label>
          <input v-model="email" type="email" placeholder="email@talemy.vn"
                 class="w-full px-5 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:bg-white outline-none transition-all duration-200" />
        </div>

        <div>
          <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Mật khẩu</label>
          <input v-model="password" type="password" placeholder="••••••••"
                 class="w-full px-5 py-4 rounded-2xl bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-orange-500 focus:bg-white outline-none transition-all duration-200" />
        </div>

        <div class="flex items-center justify-between text-xs">
          <label class="flex items-center text-gray-500 cursor-pointer">
            <input type="checkbox" class="mr-2 accent-orange-500"> Ghi nhớ đăng nhập
          </label>
          <a href="#" class="text-orange-600 font-bold hover:underline">Quên mật khẩu?</a>
        </div>

        <button type="submit"
                class="w-full bg-black hover:bg-orange-600 text-white font-black py-4 rounded-2xl shadow-lg shadow-gray-200 transition-all duration-300 transform active:scale-95">
          ĐĂNG NHẬP HỆ THỐNG
        </button>
      </form>

      <div class="mt-8 text-center">
        <p class="text-[10px] text-gray-400 font-medium">© 2026 TalemyEdu Management System. All rights reserved.</p>
      </div>
    </div>
  </div>
</template>