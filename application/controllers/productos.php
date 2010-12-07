<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Productos extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('contents_model');
        $this->load->model('products_model');
        $this->_data=array(
            'tlp_title'            => TITLE_PRODUCTOS,
            'tlp_meta_description' => META_DESCRIPTION_PRODUCTOS,
            'tlp_meta_keywords'    => META_KEYWORDS_PRODUCTOS,
            'tlp_script'           => array('plugins_cycle'),
            'listMenu'             => $this->contents_model->get_menu()
        );
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $total_segments = $this->uri->total_segments();
        if( $total_segments==1 ) redirect($this->config->item('base_url'));

        $info = $this->products_model->get_list_front($this->uri->segment($total_segments));
        if( !$info ) redirect($this->config->item('base_url'));
        
        $tlp_script=array();
        if( isset($info['sidebar']['gallery']) ) $tlp_script[] = 'plugins_adgallery';
        $data = array_merge($this->_data, array(
            'tlp_section'          => 'frontpage/products_view.php',
            'tlp_script'           => array_merge($this->_data['tlp_script'], $tlp_script),
            'info'                 => $info
        ));
        //print_array($data,true);
        $this->load->view('template_frontpage_view', $data);
    }

    public function search(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->helper('text');
            $data = array_merge($this->_data, array(
                'tlp_section'  => 'frontpage/products_resultsearch_view.php',
                'info'         => $this->products_model->search()
            ));
            $this->load->view('template_frontpage_view', $data);
        }
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}