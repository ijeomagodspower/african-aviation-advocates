<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'HTMega_Elementor_Assests_Cache' ) ) {

    class HTMega_Elementor_Assests_Cache {

        const UPLOADS_DIR = 'htmega/';
        const CSS_DIR = 'css/';
        const FILE_PREFIX = 'htmega-';
        protected $post_id = 0;

        private static $_instance = null;
        protected $upload_file_path;
        protected $upload_file_url;
        protected $file_system;

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        public function __construct( $post_id = 0 ) {
            global $wp_filesystem;
            if ( ! $wp_filesystem ) {
                require_once ABSPATH . '/wp-admin/includes/file.php';
                WP_Filesystem();
            }
            $this->file_system = $wp_filesystem;

            $this->post_id = $post_id;
            $upload_dir = wp_upload_dir();
            $this->upload_file_path = trailingslashit( $upload_dir['basedir'] );
            $this->upload_file_url = trailingslashit( $upload_dir['baseurl'] );
            $this->upload_file_url = ( is_ssl() ? str_replace( 'http://', 'https://', $this->upload_file_url ) : $this->upload_file_url );
        }

        public function get_css_dir_name() {
            return trailingslashit( self::UPLOADS_DIR ) . trailingslashit( self::CSS_DIR );
        }

        public function get_css_dir() {
            return wp_normalize_path( $this->upload_file_path . $this->get_css_dir_name() );
        }

        public function get_post_id() {
            return $this->post_id;
        }

        public function get_upload_file_path() {
            return $this->upload_file_path . self::UPLOADS_DIR . self::CSS_DIR . self::FILE_PREFIX . $this->get_post_id() . '.css';
        }

        public function get_upload_file_url() {
            return $this->upload_file_url . self::UPLOADS_DIR . self::CSS_DIR . self::FILE_PREFIX . $this->get_post_id() . '.css';
        }

        public function combine_ht_mega_css_files() {
            if ( ! is_dir( $this->get_css_dir() ) ) {
                wp_mkdir_p( $this->get_css_dir() );
            }

            $widgets = $this->get_widgets_used_on_page( $this->get_post_id() );

            if ( $widgets && is_array( $widgets ) ) {
                if ( ! file_exists( $this->get_upload_file_path() ) ) {
                    $css_content = '';
                    foreach ( $widgets as $widget ) {
                        $widget_css = $this->get_widget_css( $widget ); 
                        $css_content .= $widget_css;
                    }

                    if ( $css_content ) {
                        $this->file_system->put_contents( $this->get_upload_file_path(), $css_content, FS_CHMOD_FILE );
                    
                    }
                }
                if ( file_exists( $this->get_upload_file_path() ) ) {
                    wp_enqueue_style('htmega-' . $this->get_post_id(), $this->get_upload_file_url(), [ 'elementor-frontend' ], HTMEGA_VERSION . '.' . get_post_modified_time());
                }
            }
        }

        public function get_widgets_used_on_page( $post_id ) {
            if ( ! $post_id ) {
                return false;
            }

            $document = \Elementor\Plugin::$instance->documents->get( $post_id );
            if ( ! $document ) {
                return false;
            }
            $elements_data = $document->get_elements_data();
            $unique_htmega_widgets = [];
            $this->find_unique_htmega_widgets( $elements_data, $unique_htmega_widgets );
            return ! empty( array_keys( $unique_htmega_widgets ) ) ? array_keys( $unique_htmega_widgets ) : [];
        }
        
        private function find_unique_htmega_widgets( $elements, &$unique_widgets, &$processed_templates = [], $depth = 0, $max_depth = 5 ) {
            // Exit if we've reached the maximum recursion depth
            if ( $depth > $max_depth ) {
                return;
            }

            if ( $elements ) {
                foreach ( $elements as $element ) {
                    // Check if the element is an HT Mega widget
                    if ( isset( $element['widgetType'] ) && strpos( $element['widgetType'], 'htmega' ) !== false ) {
                        $unique_widgets[$element['widgetType']] = true;
                    }

                    // Loop through settings to check for dynamic template keys
                    if ( isset( $element['settings'] ) ) {
                        foreach ( $element['settings'] as $setting_key => $setting_value ) {

                            if ( is_array( $setting_value ) ) {
                                // If it's an array (repeater), loop through each item
                                foreach ( $setting_value as $repeater_item ) {
                                    if ( is_array( $repeater_item ) ) {
                                        // Check for numeric template IDs inside the repeater item
                                        foreach ( $repeater_item as $repeater_key => $repeater_value ) {
                                            if ( is_numeric( $repeater_value ) && !in_array( $repeater_value, $processed_templates ) ) {
                                                $processed_templates[] = $repeater_value;

                                                $template_document = \Elementor\Plugin::$instance->documents->get( $repeater_value );
                                                if ( $template_document ) {
                                                    $template_elements_data = $template_document->get_elements_data();
                                                    $this->find_unique_htmega_widgets( $template_elements_data, $unique_widgets, $processed_templates, $depth + 1, $max_depth );
                                                }
                                            }
                                        }
                                    }
                                }
                            } elseif ( is_numeric( $setting_value ) && !in_array( $setting_value, $processed_templates ) ) {
                                // Avoid processing the same template more than once
                                $processed_templates[] = $setting_value;
                                
                                $template_document = \Elementor\Plugin::$instance->documents->get( $setting_value );
                                if ( $template_document ) {
                                    // Recursively find widgets within the template
                                    $template_elements_data = $template_document->get_elements_data();
                                    $this->find_unique_htmega_widgets( $template_elements_data, $unique_widgets, $processed_templates, $depth + 1, $max_depth );
                                }
                            }
                        }
                    }

                    // Recursively check the current element's inner elements
                    if ( isset( $element['elements'] ) && ! empty( $element['elements'] ) ) {
                        $this->find_unique_htmega_widgets( $element['elements'], $unique_widgets, $processed_templates, $depth + 1, $max_depth );
                    }
                }
            }
        }


        protected function get_widget_css( $widget ) {
            $widget = str_replace( 'htmega-', '', $widget );
            $widget = str_replace( '-addons', '', $widget );

            if ( is_plugin_active( 'htmega-pro/htmega_pro.php' ) ) {
                $widget_css_path = file_exists( HTMEGA_ADDONS_PL_PATH_PRO . 'assets/widgets/' . $widget . '/style.min.css' )
                    ? ( defined( 'WP_DEBUG' ) && WP_DEBUG
                        ? HTMEGA_ADDONS_PL_PATH_PRO . 'assets/widgets/' . $widget . '/style.css'
                        : HTMEGA_ADDONS_PL_PATH_PRO . 'assets/widgets/' . $widget . '/style.min.css' )
                    : ( defined( 'WP_DEBUG' ) && WP_DEBUG
                        ? HTMEGA_ADDONS_PL_PATH . 'assets/widgets/' . $widget . '/style.css'
                        : HTMEGA_ADDONS_PL_PATH . 'assets/widgets/' . $widget . '/style.min.css' );
            } else {
                $widget_css_path = defined( 'WP_DEBUG' ) && WP_DEBUG
                    ? HTMEGA_ADDONS_PL_PATH . 'assets/widgets/' . $widget . '/style.css'
                    : HTMEGA_ADDONS_PL_PATH . 'assets/widgets/' . $widget . '/style.min.css';
            }

            return file_exists( $widget_css_path ) ? $this->file_system->get_contents( $widget_css_path ) : '';
        }

        public function delete() {
            add_action( 'wp_enqueue_scripts', [ $this, 'combine_ht_mega_css_files' ] );

            if ( file_exists( $this->get_upload_file_path() ) ) {
                $this->file_system->delete( $this->get_upload_file_path() );
            }
        }

        public function delete_all() {
            $files = glob( $this->get_css_dir() . '*' );

            foreach ( $files as $file ) {
                if ( is_file( $file ) ) {
                    $this->file_system->delete( $file );
                }
            }
        }
    }

    HTMega_Elementor_Assests_Cache::instance();

}
