<?php
namespace WordPressPluginBoilerplate\Libs\Utils;

/**
 * Custom Post Type
 * 
 * @since 1.0.0
 */
class CPT
{
    private $slug;
    private $args = [];
    private $taxonomies = []; // Store taxonomies for this CPT


    private function __construct($slug)
    {
        $this->slug = $slug;
        $this->args = [
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true, // Ensure it shows in the admin menu
            'supports' => ['title', 'editor'],
            'labels' => [], // Initialize labels array
        ];
    }

    public static function make($slug)
    {
        return new self($slug);
    }

    public function title($title)
    {
        $this->args['labels']['name'] = $title;
        $this->args['labels']['menu_name'] = $title; // Menu name for admin
        return $this;
    }

    public function singular_name($singularName)
    {
        $this->args['labels']['singular_name'] = $singularName;
        $this->args['labels']['add_new'] = "Add New $singularName";
        $this->args['labels']['add_new_item'] = "Add New $singularName";
        $this->args['labels']['edit_item'] = "Edit $singularName";
        $this->args['labels']['new_item'] = "New $singularName";
        $this->args['labels']['view_item'] = "View $singularName";
        $this->args['labels']['search_items'] = "Search $singularName";
        return $this;
    }

    public function plural_name($pluralName)
    {
        $this->args['labels']['all_items'] = "All $pluralName";
        $this->args['labels']['name'] = $pluralName; // Ensure this overrides singular name
        return $this;
    }

    public function supports(array $supports)
    {
        $this->args['supports'] = $supports;
        return $this;
    }

    public function menu_icon($icon)
    {
        $this->args['menu_icon'] = $icon;
        return $this;
    }

    public function show_in_menu()
    {
        $this->args['show_in_menu'] = true;
        return $this;
    }

    public function hide_in_menu()
    {
        $this->args['show_in_menu'] = false;
        return $this;
    }

    public function add_category_support()
    {
        $this->taxonomies[] = 'category'; // Add category support
        return $this;
    }

    public function add_tag_support()
    {
        $this->taxonomies[] = 'post_tag'; // Add tag support
        return $this;
    }

    public function register()
    {
        add_action('init', function () {
            register_post_type($this->slug, $this->args);

            // Register taxonomies (categories and tags) for the custom post type
            if (!empty($this->taxonomies)) {
                foreach ($this->taxonomies as $taxonomy) {
                    register_taxonomy_for_object_type($taxonomy, $this->slug);
                }
            }
        });
    }
}
