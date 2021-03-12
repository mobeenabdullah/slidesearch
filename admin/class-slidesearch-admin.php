<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Slidesearch
 * @subpackage Slidesearch/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Slidesearch
 * @subpackage Slidesearch/admin
 * @author     Mobeen Abdullah <mobeen.abdullah@gmail.com>
 */
class Slidesearch_Admin {

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
	private $version;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      array    $localize_data    The array of blobal variables for the file-uploader.js.
	 */
	public $localize_data;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string	$plugin_name		The name of this plugin.
	 * @param      string	$version    		The version of this plugin.
	 * @param      array	$localize_data    	The array of blobal variables for the file-uploader.js.
	 */
	public function __construct( $plugin_name, $version, $localize_data ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->localize_data = $localize_data;

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
		 * defined in Slidesearch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slidesearch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/slidesearch-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . 'jquery-file-uploader', plugin_dir_url( __FILE__ ) . 'css/file-uploader.css', array(), $this->version, 'all' );
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
		 * defined in Slidesearch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Slidesearch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/slidesearch-admin.js', array( 'jquery' ), $this->version, false );

		// file uploader js
		wp_enqueue_script( $this->plugin_name . 'jquery-file-uploader', plugin_dir_url( __FILE__ ) . 'js/jquery.uploadfile.js', array( 'jquery' ), $this->version, true );
		wp_register_script( $this->plugin_name . 'file-uploader', plugin_dir_url( __FILE__ ) . 'js/slidesearch-file-uploader.js', array( 'jquery' ), $this->version, true );
		wp_localize_script( $this->plugin_name . 'file-uploader', 'slidsearch', $this->localize_data );
		wp_enqueue_script( $this->plugin_name . 'file-uploader' );

	}


	public function create_admin_menu() {
		add_menu_page(
			__( 'Manage Slides',  $this->plugin_name ),
			__( 'Slide Search', $this->plugin_name ),
			'manage_options',
			$this->plugin_name . '-manage-slides',
			array( $this, 'include_admin_menu_page_partial' )
		);
	}

	public function include_admin_menu_page_partial() {
		include( plugin_dir_path( __FILE__ ) . 'partials/slidesearch-manage-slides.php' );
	}

	public function slidesearch_upload_slides() {
	    $response = array();

	    if ( !file_exists($_FILES['files']['tmp_name']) ) {
            $response['success'] = false;
            $response['error'] = 'No File Selected';
        }

		if ( is_array( $_FILES['files'] ) ) {
            for($i = 0; $i < count($_FILES['file']['name']); $i++) {
                print_r($_FILES['files']['name'][$i]);
            }

            $response['success'] = true;
        }

//		$upload = wp_upload_bits($_FILES["files"]["name"], null, file_get_contents($_FILES["files"]["tmp_name"]));
//		echo json_encode($upload);
        wp_send_json($response);
//		$acceptedTypes = array('.ppt', '.pptx');
//		if (in_array($_FILES['file']['type'], $acceptedTypes)) {
//			$upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));
//			//$upload['url'] will gives you uploaded file path
//		}

	}

}
