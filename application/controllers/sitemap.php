<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sitemap extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('contents_model');
        $this->load->helpers('form');
        $this->_data=array(
            'tlp_title'            => TITLE_SITEMAP ,
            'tlp_meta_description' => META_DESCRIPTION_SITEMAP,
            'tlp_meta_keywords'    => META_KEYWORDS_SITEMAP,
            'tlp_section'          => 'frontpage/sitemap_view.php',
            'listMenu'  =>  $this->contents_model->get_menu()
        );
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->view('template_frontpage_view', $this->_data);
    }


}