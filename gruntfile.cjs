const grunt = require('grunt');
const pkg = require('./package.json');
const loadGruntTasks = require('load-grunt-tasks');

// Define files to include/exclude in the release package
const distFiles = [
    '**',
    '!artworks/**',
    '!artifacts/**',
    '!bin/**',
    '!bower_components/**',
    '!release/**',
    '!node_modules/**',
    '!packages/**',
    '!**/node_modules/**',
    '!vendor/bin/**',
    '!test-results/**',
    '!.DS_Store',
    '!.editorconfig',
    '!.gitignore',
    '!.jshintrc',
    '!.env',
    '!bower.json',
    '!composer.json',
    '!composer.lock',
    '!contributing.md',
    '!docs/**',
    '!gruntfile.cjs',
    '!package.json',
    '!package-lock.json',
    '!readme.md',
    '!phpcs.xml.dist',
    '!phpunit.xml.dist',
    '!phpstan.neon.dist',
    '!webpack.config.js',
    '!**/*~',
    '!tests/**',
    '!**/test',
    '!.github/**',
    '!**/.github/**',
    '!**/.git/**',
    '!**/.gitattributes',
    '!**/.gitkeep',
    '!.storybook/**',
    '!vite.config.js',
    '!tsconfig.json',
    '!tailwind.config.js',
    '!npm/**',
    '!yarn.lock',
    '!postcss.config.js',
    '!components.json',
    '!js/dist/assets/**/*.js.map',
];

// Initialize Grunt configuration
grunt.initConfig({
    pkg,

    // Task to copy files to the release directory
    copy: {
        main: {
            expand: true,
            src: distFiles,
            dest: 'release/wordpress-plugin-boilerplate',
        },
    },

     // Task to delete .js.map files
    clean: {
        mapFiles: ['release/wordpress-plugin-boilerplate/js/dist/assets/**/*.js.map']
    },

    // Task to compress the release directory into a zip file
    compress: {
        main: {
            options: {
                mode: 'zip',
                archive: `./release/wordpress-plugin-boilerplate.zip`,
            },
            expand: true,
            src: distFiles,
            dest: '/wordpress-plugin-boilerplate',
        },
        version: {
            options: {
                mode: 'zip',
                archive: `./release/wordpress-plugin-boilerplate-${pkg.version}.zip`,
            },
            expand: true,
            src: distFiles,
            dest: '/wordpress-plugin-boilerplate',
        },
    },
});

// Load all grunt tasks automatically
loadGruntTasks(grunt);

// Register 'release' task to copy files and create a zip archive
grunt.registerTask('release', ['copy:main', 'compress:main', 'compress:version']);

// Set linefeed style to Unix (LF)
grunt.util.linefeed = '\n';

module.exports = grunt;
