<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sitemap extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        $this->load->model('contents_model');
        $this->load->helpers('form');
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->_render('front/sitemap_view', array(
            'tlp_title'            => TITLE_SITEMAP ,
            'tlp_meta_description' => META_DESCRIPTION_SITEMAP,
            'tlp_meta_keywords'    => META_KEYWORDS_SITEMAP,
            'listMenu'             => $this->contents_model->get_menu(),
            'content_footer'       => $this->contents_model->get_content('footer')
        ));
    }


}