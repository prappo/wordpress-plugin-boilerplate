"use client"
import { useEffect } from 'react';
import Link from 'next/link';
import { FaReact, FaPalette, FaBolt, FaTools, FaPuzzlePiece, FaBook, FaRocket, FaGithub, FaEye } from 'react-icons/fa';

export default function HomePage() {
 
  return (
    <div className="min-h-screen bg-gradient-to-b from-white to-gray-100 dark:from-gray-900 dark:to-gray-800 text-gray-900 dark:text-white">
      <main className="max-w-6xl mx-auto px-4 py-16">
       

        {/* Hero Section */}
        <section className="text-center mb-20">
          <h1 className="text-4xl font-bold mb-4">WordPress Plugin Boilerplate</h1>
          <p className="text-xl text-gray-600 dark:text-gray-300 mb-8">
            Create your WordPress plugin in weeks, not months. Rapidly prototype and deliver your plugin with confidence!
          </p>
          <img src="/wordpress-plugin-boilerplate/artworks/images/dashboard-light.png" alt="Dashboard" className="w-2/3 mx-auto rounded-lg shadow-xl mb-8" />
          <div className="flex justify-center gap-4">
            <Link href="/docs" className="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md font-semibold transition duration-300 flex items-center">
              <FaRocket className="mr-2" />
              Get Started
            </Link>
            <Link target="_blank" href="https://github.com/prappo/wordpress-plugin-boilerplate" className="bg-gray-800 hover:bg-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 text-white px-6 py-3 rounded-md font-semibold transition duration-300 flex items-center">
              <FaGithub className="mr-2" />
              GitHub
            </Link>
            <Link href="/preview" className="bg-white hover:bg-gray-100 dark:hover:bg-gray-200 text-blue-600 dark:text-blue-800 px-8 py-3 rounded-md font-semibold transition duration-300 flex items-center">
              <FaEye className="mr-2" />
              Live Preview
            </Link>
          </div>
        </section>

        {/* Features Section */}
        <section className="mb-20">
          <h2 className="text-3xl font-bold text-center mb-12">Key Features</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            <FeatureCard
              icon={<FaReact className="text-4xl text-blue-500" />}
              title="Modern Tech Stack"
              description="Built with React, TypeScript, and SASS for powerful, type-safe, and stylish development."
            />
            <FeatureCard
              icon={<FaPalette className="text-4xl text-purple-500" />}
              title="Tailwind CSS & Shadcn UI"
              description="Rapidly build custom UIs with utility-first CSS and beautiful, accessible components."
            />
            <FeatureCard
              icon={<FaBolt className="text-4xl text-yellow-500" />}
              title="Vite & HMR"
              description="Lightning-fast build times and instant feedback with Hot Module Replacement."
            />
            <FeatureCard
              icon={<FaTools className="text-4xl text-green-500" />}
              title="Grunt.js & Storybook"
              description="Automate your workflow and develop UI components in isolation with powerful tools."
            />
            <FeatureCard
              icon={<FaPuzzlePiece className="text-4xl text-red-500" />}
              title="Modular Architecture"
              description="Easily extend and customize your plugin with our well-organized, modular codebase."
            />
            <FeatureCard
              icon={<FaBook className="text-4xl text-indigo-500" />}
              title="Comprehensive Documentation"
              description="Detailed guides and API references to help you make the most of the boilerplate."
            />
          </div>
        </section>

        {/* New Screenshots Section */}
        <section className="mb-20">
          <h2 className="text-3xl font-bold text-center mb-12">Screenshots</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            <ScreenshotCard
              src="/wordpress-plugin-boilerplate/artworks/images/dashboard-light.png"
              alt="Dashboard Light Mode"
              title="Dashboard - Light Mode"
            />
            <ScreenshotCard
              src="/wordpress-plugin-boilerplate/artworks/images/dashboard-dark.png"
              alt="Dashboard Dark Mode"
              title="Dashboard - Dark Mode"
            />
            <ScreenshotCard
              src="/wordpress-plugin-boilerplate/artworks/images/settings-light.png"
              alt="Settings Light Mode"
              title="Settings - Light Mode"
            />
            <ScreenshotCard
              src="/wordpress-plugin-boilerplate/artworks/images/settings-dark.png"
              alt="Settings Dark Mode"
              title="Settings - Dark Mode"
            />
          </div>
        </section>

        {/* Call to Action */}
        <section className="text-center bg-blue-600 dark:bg-blue-800 text-white py-16 rounded-lg">
          <h2 className="text-3xl font-bold mb-4">Ready to build your WordPress plugin?</h2>
          <p className="text-xl mb-8">Get started with our boilerplate and save weeks of development time.</p>
          <Link href="/docs" className="bg-white hover:bg-gray-100 dark:hover:bg-gray-200 text-blue-600 dark:text-blue-800 px-8 py-3 rounded-md font-semibold transition duration-300">
            Start Building Now
          </Link>
        </section>
      </main>
    </div>
  );
}

function FeatureCard({ icon, title, description }: { icon: React.ReactNode; title: string; description: string }) {
  return (
    <div className="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
      <div className="flex items-center mb-4">
        {icon}
        <h3 className="text-xl font-semibold ml-4">{title}</h3>
      </div>
      <p className="text-gray-600 dark:text-gray-300">{description}</p>
    </div>
  );
}

function ScreenshotCard({ src, alt, title }: { src: string; alt: string; title: string }) {
  return (
    <div className="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
      <img src={src} alt={alt} className="w-full h-auto rounded-lg mb-4" />
      <h3 className="text-xl font-semibold text-center">{title}</h3>
    </div>
  );
}