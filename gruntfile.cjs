const grunt = require('grunt');
const pkg = require('./package.json');
const config = require('./plugin-config.json');
const loadGruntTasks = require('load-grunt-tasks');
const { version } = require('os');
const { default: path } = require('path');

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
    '!plugin-config.json',
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

// Replace functionality
var replace = require('replace')
    , _ = grunt.util._
    , log = grunt.log;

grunt.registerMultiTask('sed', 'Search and replace.', function() {
    var data = this.data;

    if (!data.pattern) {
      log.error('Missing pattern property.');
      return;
    }

    if (_.isUndefined(data.replacement)) {
      log.error('Missing replacement property.');
      return;
    }

    data.path = data.path || '.';

    replace({
      regex: data.pattern
    , replacement: data.replacement
    , paths: _.isArray(data.path) ? data.path : [data.path]
    , recursive: data.recursive
    , quiet: grunt.option('verbose') ? false : true
    , silent: false
    , async: false
    });
  });
  



// Initialize Grunt configuration
grunt.initConfig({
    pkg,
    sed:{
        version: {
            pattern: "Version: [0-9]+\\.[0-9]+\\.[0-9]+",
            replacement: `Version: ${config.plugin_version}`,
            path: config.plugin_file_name,
            recursive: false
        },
        change_plugin_file_namespace:{
            pattern: "namespace WordPressPluginBoilerplate",
            replacement: `namespace ${config.namespace}`,
            recursive: false,
            path: 'plugin.php',
        },
        change_plugin_file_namespace_use:{
            pattern: "use WordPressPluginBoilerplate",
            replacement: `use ${config.namespace}`,
            recursive: false,
            path: 'plugin.php',
        },
        change_main_file_namespace:{
            pattern: "namespace WordPressPluginBoilerplate",
            replacement: `namespace ${config.namespace}`,
            recursive: false,
            path: config.plugin_file_name,
        },
        change_main_file_namespace_use:{
            pattern: "use WordPressPluginBoilerplate",
            replacement: `use ${config.namespace}`,
            recursive: false,
            path: config.plugin_file_name,
        },
        change_includes_namespace:{
            pattern: "namespace WordPressPluginBoilerplate",
            replacement: `namespace ${config.namespace}`,
            recursive: true,
            path: 'includes',
        },
        change_includes_namespace_use:{
            pattern: "use WordPressPluginBoilerplate",
            replacement: `use ${config.namespace}`,
            path:'includes',
            recursive: true
        },
        change_libs_namespace:{
            pattern: "namespace WordPressPluginBoilerplate",
            replacement: `namespace ${config.namespace}`,
            recursive: true,
            path: 'libs',
        },
        change_libs_namespace_use:{
            pattern: "use WordPressPluginBoilerplate",
            replacement: `use ${config.namespace}`,
            path:'libs',
            recursive: true
        },
        change_functions_prefix:{
            pattern: "wordpress_plugin_boilerplate_",
            replacement: `${config.plugin_prefix}_`,
            path: 'includes/functions.php',
            recursive: false
        },
        change_main_class_name:{
            pattern: "WordPressPluginBoilerplate",
            replacement: config.main_class_name,
            path: config.plugin_file_name,
            recursive: false
        },
        change_main_function_name:{
            pattern: "wordpress_plugin_boilerplate_init",
            replacement: config.main_function_name,
            path: config.plugin_file_name,
            recursive: false
        },
        change_constant_prefix:{
            pattern: "WORDPRESS_PLUGIN_BOILERPLATE_",
            replacement: config.constant_prefix + "_",
            path: [config.plugin_file_name, 'includes'],
            recursive: true
        }
    },

    checktextdomain: {
        options: {
          text_domain: config.text_domain,
          correct_domain: true,
          keywords: [
            "__:1,2d",
            "_e:1,2d",
            "_x:1,2c,3d",
            "esc_html__:1,2d",
            "esc_html_e:1,2d",
            "esc_html_x:1,2c,3d",
            "esc_attr__:1,2d",
            "esc_attr_e:1,2d",
            "esc_attr_x:1,2c,3d",
            "_ex:1,2c,3d",
            "_n:1,2,4d",
            "_nx:1,2,4c,5d",
            "_n_noop:1,2,3d",
            "_nx_noop:1,2,3c,4d",
            "wp_set_script_translations:1,2d",
            ],
        },
    },

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
        todocs: {
            options: {
                mode: 'zip',
                archive: `./docs/plugin/wordpress-plugin-boilerplate.zip`,
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
grunt.registerTask('release', ['copy:main', 'compress:main', 'compress:version', 'compress:todocs', 'clean:mapFiles']);

grunt.registerTask('rename', [
    'sed:version', 
    'sed:change_main_file_namespace', 
    'sed:change_main_file_namespace_use', 
    'sed:change_includes_namespace', 
    'sed:change_includes_namespace_use', 
    'sed:change_libs_namespace', 
    'sed:change_libs_namespace_use',
    'sed:change_plugin_file_namespace', 
    'sed:change_plugin_file_namespace_use', 
    'sed:change_functions_prefix', 
    'sed:change_main_class_name', 
    'sed:change_main_function_name', 
    'sed:change_constant_prefix','checktextdomain']);
// Set linefeed style to Unix (LF)
grunt.util.linefeed = '\n';

module.exports = grunt;
