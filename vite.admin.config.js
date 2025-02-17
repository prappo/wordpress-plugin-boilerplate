import { v4wp } from "@kucrut/vite-for-wp";
import react from "@vitejs/plugin-react";
import path from "path"

export default {
  plugins: [
    v4wp({
      input: "src/admin/main.jsx",
      outDir: "assets/admin/dist",
    }),
    // wp_scripts(),
    react(),
  ],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src"),
    },
  },
};
