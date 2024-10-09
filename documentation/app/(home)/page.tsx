"use client"
import Link from 'next/link';

export default function HomePage() {
  return (
    <main className="flex h-screen flex-col gap-5 py-10 items-center text-center">
      <img src="wordpress-plugin-boilerplate/artworks/images/dashboard-light.png" alt="Dashboard" className="w-1/3 rounded-md shadow-md" />
      <h1 className="mb-4 text-2xl font-bold">Wordpress Plugin Boilerplate</h1>
      <p className="text-fd-muted-foreground">
        Create your WordPress plugin in weeks, not months. Rapidly prototype and deliver your plugin with confidence!
      </p>
      <div className="flex gap-4">
        <Link href="/docs" className="bg-blue-500 w-fit text-white px-4 py-2 rounded-md">Get Started</Link>
        <Link target="_blank" href="https://github.com/prappo/wordpress-plugin-boilerplate" className="bg-fd-primary w-fit text-white px-4 py-2 rounded-md">GitHub</Link>
        <Link href="/preview" className="w-fit text-gray-900 border border-gray-900 px-4 py-2 rounded-md">Preview</Link>
      </div>
    </main>
  );
}
