=== WordPress Plugin Boilerplate ===
Contributors: prappo
Tags: boilerplate, react, vite, rest-api, developer
Requires at least: 5.9
Tested up to: 6.8
Requires PHP: 7.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A modern WordPress plugin boilerplate with a React (Vite) frontend and a PHP REST API backend.

== Description ==

WordPress Plugin Boilerplate is a scaffolding project for building WordPress plugins using modern web technologies and tools such as React, TypeScript, Tailwind CSS, Shadcn UI, Vite, Storybook and Hot Module Replacement (HMR).

It ships with:

* A React-based admin panel and public frontend, each with its own Vite build.
* A Laravel-inspired Eloquent ORM layer for database access.
* A fluent, Laravel-style REST API routing system with per-route authentication.
* Gutenberg block scaffolding built with @wordpress/scripts.
* A renaming workflow so you can rebrand the boilerplate for your own plugin.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/wordpress-plugin-boilerplate` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the new admin menu item added by the plugin to access its settings.

== Frequently Asked Questions ==

= Is this plugin meant for end users? =

It is a developer boilerplate intended as a starting point for building your own WordPress plugin.

= How do I rename the plugin for my own project? =

Edit `plugin-config.json` and run `npm run rename`. This rewrites the namespace, class names, text domain, prefixes and the main plugin file name across the codebase.

== Changelog ==

= 1.0.0 =
* Initial release.
