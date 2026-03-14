import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite' // Thêm dòng này

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        vue(),
        tailwindcss(), // Thêm dòng này vào mảng plugins
    ],
})