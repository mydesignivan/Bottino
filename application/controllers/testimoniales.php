<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Testimoniales extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        $this->load->model('contents_model');
        $this->load->model('testimonial_model');
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->assets->add_js_group('plugins_sudoslider');
        $this->_render('front/testimoniales_view', array(
            'listMenu'             => $this->contents_model->get_menu(),
            'content_footer'       => $this->contents_model->get_content('footer'),
            'tlp_title'            => TITLE_TESTIMONIALES,
            'tlp_meta_description' => META_DESCRIPTION_TESTIMONIALES,
            'tlp_meta_keywords'    => META_KEYWORDS_TESTIMONIALES,
            'reference'            => 'testimoniales',
            'list'                 => $this->testimonial_model->get_list()
        ));
    }

    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}