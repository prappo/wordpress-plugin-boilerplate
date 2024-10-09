"use client"
import { useRef, useEffect } from 'react';
import { startPlaygroundWeb } from '@wp-playground/client';

interface PreviewPageProps {
  onClose: () => void;
}

export default function PreviewPage({ onClose }: PreviewPageProps) {
  const wpPlayground = useRef<HTMLIFrameElement>(null);

  useEffect(() => {
    if (wpPlayground.current) {
      const client = startPlaygroundWeb({
        iframe: wpPlayground.current,
        remoteUrl: `https://playground.wordpress.net/remote.html`,
        blueprint: {
          landingPage: '/wp-admin/admin.php?page=wordpress-plugin-boilerplate#/dashboard',
          preferredVersions: {
            php: '8.3',
            wp: 'latest',
          },
          features: {
            networking: true,
          },
          steps: [
            {
              step: 'login',
              username: 'admin',
              password: 'password',
            },
            {
              step: 'installPlugin',
              pluginZipFile: {
                resource: 'url',
                url: 'http://localhost:3000/wordpress-plugin-boilerplate/plugin/wordpress-plugin-boilerplate.zip',
              },
            },
          ],
        },
      });

      client.catch((error) => {
        console.log('Error starting WordPress Playground:', error);
      });
    }
  }, [wpPlayground.current]);

  return (
    <div className="fixed inset-0 bg-white z-50 flex flex-col">
      <div className="p-4 flex justify-between items-center bg-gray-100">
        <h2 className="text-xl font-bold">WordPress Plugin Boilerplate Preview</h2>
        <button onClick={onClose} className="bg-red-500 text-white px-4 py-2 rounded-md">Close Preview</button>
      </div>
      <iframe ref={wpPlayground} className="flex-grow w-full"></iframe>
    </div>
  );
}