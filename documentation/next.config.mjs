import { createMDX } from 'fumadocs-mdx/next';

const withMDX = createMDX();

/** @type {import('next').NextConfig} */
const config = {
  output: "export", // <=== enables static exports
  basePath: "/wordpress-plugin-boilerplate",
  reactStrictMode: true,
};

export default withMDX(config);
