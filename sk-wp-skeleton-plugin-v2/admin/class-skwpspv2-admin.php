<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class SKWPSPV2_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $plugin_version;
    private $plugin_prefix;
    private $plugin_slug;
    private $settings_api;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $plugin_version, $plugin_prefix, $plugin_slug) {

        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;
        $this->plugin_prefix = $plugin_prefix;
        $this->plugin_slug = $plugin_slug;

        $this->load_dependencies();
    }

    /**
     * Load the required dependencies for this plugin in admin.
     * @param type $param
     */
    public function load_dependencies() {
        require_once SKWPSPV2_ADMIN_PATH . '/includes/class-skwpspv2-settings-api.php';
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/plugin-name-admin.css', array(), $this->plugin_version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/plugin-name-admin.js', array('jquery'), $this->plugin_version, false);
    }

    public function admin_init() {
        $this->settings_api = new SKWPSPV2_Settings_API();

        //set the settings
        $this->settings_api->set_sections(array(
            array(
                'id' => $this->plugin_prefix . '_basics',
                'title' => __('Basic Settings', 'sk-wp-skeleton-plugin-v2')
            ),
            array(
                'id' => $this->plugin_prefix . '_advanced',
                'title' => __('Advanced Settings', 'sk-wp-skeleton-plugin-v2')
            )
        ));
        $this->settings_api->set_fields(array(
            $this->plugin_prefix . '_basics' => array(
                array(
                    'name' => 'text_val',
                    'label' => __('Text Input', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Text input description', 'sk-wp-skeleton-plugin'),
                    'placeholder' => __('Text Input placeholder', 'sk-wp-skeleton-plugin'),
                    'type' => 'text',
                    'default' => 'Title',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name' => 'text_val2',
                    'label' => __('Text Input2', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Text input description2', 'sk-wp-skeleton-plugin'),
                    'placeholder' => __('Text Input placeholder', 'sk-wp-skeleton-plugin'),
                    'type' => 'text',
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name' => 'number_input',
                    'label' => __('Number Input', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Number field with validation callback `floatval`', 'sk-wp-skeleton-plugin'),
                    'placeholder' => __('1.99', 'sk-wp-skeleton-plugin'),
                    'min' => 0,
                    'max' => 100,
                    'step' => '0.01',
                    'type' => 'number',
                    'default' => 'Title',
                    'sanitize_callback' => 'floatval'
                ),
                array(
                    'name' => 'textarea',
                    'label' => __('Textarea Input', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Textarea description', 'sk-wp-skeleton-plugin'),
                    'placeholder' => __('Textarea placeholder', 'sk-wp-skeleton-plugin'),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'html',
                    'desc' => __('HTML area description. You can use any <strong>bold</strong> or other HTML elements.', 'sk-wp-skeleton-plugin'),
                    'type' => 'html'
                ),
                array(
                    'name' => 'checkbox',
                    'label' => __('Checkbox', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Checkbox Label', 'sk-wp-skeleton-plugin'),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'radio',
                    'label' => __('Radio Button', 'sk-wp-skeleton-plugin'),
                    'desc' => __('A radio button', 'sk-wp-skeleton-plugin'),
                    'type' => 'radio',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __('A Dropdown', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Dropdown description', 'sk-wp-skeleton-plugin'),
                    'type' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __('Password', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Password description', 'sk-wp-skeleton-plugin'),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __('File', 'sk-wp-skeleton-plugin'),
                    'desc' => __('File description', 'sk-wp-skeleton-plugin'),
                    'type' => 'file',
                    'default' => '',
                    'options' => array(
                        'button_label' => 'Choose Image'
                    )
                )
            ),
            $this->plugin_prefix . '_advanced' => array(
                array(
                    'name' => 'color',
                    'label' => __('Color', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Color description', 'sk-wp-skeleton-plugin'),
                    'type' => 'color',
                    'default' => ''
                ),
                array(
                    'name' => 'password',
                    'label' => __('Password', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Password description', 'sk-wp-skeleton-plugin'),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'wysiwyg',
                    'label' => __('Advanced Editor', 'sk-wp-skeleton-plugin'),
                    'desc' => __('WP_Editor description', 'sk-wp-skeleton-plugin'),
                    'type' => 'wysiwyg',
                    'default' => ''
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __('Multile checkbox', 'sk-wp-skeleton-plugin'),
                    'desc' => __('Multi checkbox description', 'sk-wp-skeleton-plugin'),
                    'type' => 'multicheck',
                    'default' => array('one' => 'one', 'four' => 'four'),
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
            )
        ));

        //initialize settings
        $this->settings_api->admin_init();
    }

    public function admin_menu() {
        add_options_page($this->plugin_name, $this->plugin_name, 'delete_posts', $this->plugin_prefix . '_page', function () {
            echo '<div class="wrap">';
            echo '<h1 style="text-align:center;font-weight:bold">' . $this->plugin_name . '</h1>';
            echo '<hr/>';
            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();
            echo '</div>';
        });
    }

}
