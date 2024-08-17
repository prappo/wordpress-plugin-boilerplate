module.exports = function (grunt) {
    // Load the package.json file for accessing metadata
    const pkg = grunt.file.readJSON('package.json');

    // Define files to include/exclude in the release package
    const distFiles = [
        '**',                           // Include all files by default
        '!artifacts/**',                // Exclude build artifacts
        '!bin/**',                      // Exclude binary files
        '!bower_components/**',         // Exclude Bower components
        '!build/**',                    // Exclude build directory
        '!node_modules/**',             // Exclude Node.js modules
        '!packages/**',                 // Exclude packages directory
        '!**/node_modules/**',          // Exclude nested Node.js modules
        '!vendor/bin/**',               // Exclude vendor binaries
        '!test-results/**',             // Exclude test result files
        '!.DS_Store',                   // Exclude macOS-specific .DS_Store files
        '!.editorconfig',               // Exclude editor configuration files
        '!.gitignore',                  // Exclude .gitignore file
        '!.jshintrc',                   // Exclude JSHint configuration file
        '!.env',                        // Exclude environment variables file
        '!bower.json',                  // Exclude Bower configuration file
        '!composer.json',               // Exclude Composer configuration file
        '!composer.lock',               // Exclude Composer lock file
        '!contributing.md',             // Exclude contributing guidelines
        '!gruntfile.js',                // Exclude this Gruntfile
        '!package.json',                // Exclude package.json file
        '!package-lock.json',           // Exclude package-lock.json file
        '!readme.md',                   // Exclude README file
        '!phpcs.xml.dist',              // Exclude PHPCS configuration file
        '!phpunit.xml.dist',            // Exclude PHPUnit configuration file
        '!phpstan.neon.dist',           // Exclude PHPStan configuration file
        '!webpack.config.js',           // Exclude Webpack configuration file
        '!**/*~',                       // Exclude backup files (ending with ~)
        '!tests/**',                    // Exclude test files
        '!**/test',                     // Exclude directories named test
    ];

    // Initialize Grunt configuration
    grunt.initConfig({
        pkg,

        // Task to copy files to the build directory
        copy: {
            main: {
                expand: true,
                src: distFiles,
                dest: 'build/wordpress-plugin-boilerplate',
            },
        },

        // Task to compress the build directory into a zip file
        compress: {
            main: {
                options: {
                    mode: 'zip',
                    archive: './build/wordpress-plugin-boilerplate-<%= pkg.version %>.zip',
                },
                expand: true,
                src: distFiles,
                dest: '/wordpress-plugin-boilerplate',
            },
        },
    });

    // Load all grunt tasks automatically
    require('load-grunt-tasks')(grunt);

    // Register 'build' task to copy files and create a zip archive
    grunt.registerTask('build', ['copy:main', 'compress']);

    // Set linefeed style to Unix (LF)
    grunt.util.linefeed = '\n';
};
