# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

WordPress Plugin Boilerplate — a scaffolding project for building WordPress plugins with a React (Vite) frontend and a PHP backend communicating via REST API. Uses a Laravel-inspired ORM (`prappo/wp-eloquent`) and a custom routing system.

## Commands

```bash
# Install
npm install
composer install

# Development (runs both frontend and admin Vite dev servers)
npm run dev            # frontend :5173, admin :5174
npm run dev:admin      # admin only
npm run dev:frontend   # frontend only
npm run dev:all        # dev + block:start
npm run dev:server     # dev + wp-now local server

# Build
npm run build          # builds frontend, admin, and blocks

# Blocks
npm run block:start    # start block dev (webpack via @wordpress/scripts)
npm run block:build

# Formatting
npm run format:check   # prettier check
npm run format:fix     # prettier fix

# Release (build + grunt packaging)
npm run release        # outputs to release/ folder

# Plugin renaming
# Edit plugin-config.json, then:
npm run rename

# i18n
npm run i18n           # generate .pot file

# Storybook
npm run storybook      # port 6006

# PHP linting
vendor/bin/phpcs --standard=phpcs.xml.dist
```

Note: there is no JS/PHP test runner wired up. Vitest is listed as a devDependency but no `test` script exists in `package.json`.

## Architecture

### Two-layer structure: PHP backend + React frontend

**PHP backend** (`includes/`, `libs/`, `database/`):
- Entry point: `wordpress-plugin-boilerplate.php` → loads `plugin.php` (main class `WordPressPluginBoilerplate`)
- Singleton pattern via `Traits\Base` — all major classes use `get_instance()`
- `includes/Routes/Api.php` — defines REST API routes using `libs/API/Route` (Laravel-style: `Route::prefix()`, `$route->get()`, `$route->post()`)
- `includes/Controllers/` — route handlers (e.g., `Accounts\Actions`, `Posts\Actions`)
- `includes/Models/` — Eloquent-style models extending `Prappo\WpEloquent\Database\Eloquent\Model`
- `database/Migrations/` — table creation; `database/Seeders/` — seed data
- `includes/Core/Install.php` — runs on plugin activation (creates pages, tables, seeds)
- `includes/Assets/Admin.php` and `Frontend.php` — enqueue scripts/styles, pass data to JS via `wp_localize_script`
- `config/plugin.php` — plugin configuration array

**React frontend** (`src/`):
- `src/admin/` — admin panel app (entry: `src/admin/main.jsx`)
- `src/frontend/` — public-facing app (entry: `src/frontend/main.jsx`)
- `src/components/` — shared UI components (shadcn/ui with Radix primitives)
- `src/blocks/` — Gutenberg block source (built with `@wordpress/scripts`)
- `src/lib/` — shared utilities
- Two separate Vite configs: `vite.admin.config.js` and `vite.frontend.config.js`, integrated via `@kucrut/vite-for-wp`
- Uses Tailwind CSS, React Router, Jotai for state, react-hook-form + Zod for forms

### API routing pattern

Routes are defined in `includes/Routes/Api.php` using `Route::prefix(ROUTE_PREFIX, callback)`. Controllers use `Class@method` string syntax. Route params use `{id}` placeholders (converted to regex). Auth is applied per-route or per-group via `->auth()`.

### Backend-to-frontend data passing

PHP passes data to React via `wp_localize_script` in Asset classes. Frontend accesses it as a global object (e.g., `wordpressPluginBoilerplateFrontend`). The global name is defined in the Asset class and must match on the JS side.

### Shortcodes

`libs/Utils/Shortcode.php` provides a fluent builder: `Shortcode::add()->tag('x')->attrs([...])->render($callable_or_view_path)`. View-file renders resolve to `views/shortcode/*.php`; attrs are available in the view via the `$atts` array (e.g. `$atts['name']`), with `$shortcode_content` for inner content. (Attributes are intentionally not `extract()`-ed into local variables — escape them in the view.)

### Plugin renaming

`npm run rename` reads `plugin-config.json` and rewrites namespace, main class/function names, text domain, plugin file name, and constant/function prefixes across the codebase (grunt task + composer dump-autoload). Do not hand-edit these identifiers in many places — change `plugin-config.json` and run `npm run rename` instead. After rename, the `wpb_` / `WPB_` prefixes and the global JS object name shown in this file will change to match the new config.

## Code Style

- PHP follows WordPress Coding Standards (see `phpcs.xml.dist`); minimum PHP 7.2, minimum WP 5.9
- JS/JSX uses Prettier (wp-prettier variant) with Tailwind plugin and import sorting
- Default namespace: `WordPressPluginBoilerplate`; default constant prefix: `WORDPRESS_PLUGIN_BOILERPLATE_` (both parameterized through `plugin-config.json` — see Plugin renaming)
- `@` path alias resolves to `src/` in Vite configs

## Troubleshooting

- Local WP + `npm run dev`: if the Vite dev server can't be reached from the site, set Local's Router mode to `localhost` (SSL/domain mismatch otherwise blocks HMR).
- First-run `npm run dev` sometimes appears to hang — re-running usually resolves it.
