import Link from 'next/link';

export default function HomePage() {
  return (
    <main className="flex h-screen flex-col gap-4 justify-center items-center text-center">
      <h1 className="mb-4 text-2xl font-bold">Wordpress Plugin Boilerplate</h1>
      <p className="text-fd-muted-foreground">
        Create your WordPress plugin in weeks, not months. Rapidly prototype and deliver your plugin with confidence!
      </p>
      <Link href="/docs" className="bg-fd-primary w-fit text-white px-4 py-2 rounded-md">Get Started</Link>
     
    </main>
  );
}
