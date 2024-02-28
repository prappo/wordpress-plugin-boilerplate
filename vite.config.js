import { v4wp } from "@kucrut/vite-for-wp";
import react from "@vitejs/plugin-react";
import path from "path"

export default {
  plugins: [
    v4wp({
      input: "js/src/main.jsx",
      outDir: "js/dist",
    }),
    // wp_scripts(),
    react(),
  ],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./js/src"),
    },
  },
};
