<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller {

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
        $ref = $this->uri->segment(1);
        $params = $this->_get_params($ref);
        $content = $this->contents_model->get_content($ref=="" ? "home" : null);

        if( isset($content['sidebar']['gallery']) ) $this->assets->add_js_group('plugins_adgallery');
        if( strpos($content['content'], '{chart}')!==FALSE ) {
            $this->assets->add_js_group('plugins_tooltip');
            $this->assets->add_js('class/chart');
        }
        
        $this->_render('front/contents_view', array(
            'listMenu'   => $this->contents_model->get_menu(),
            'tlp_title'            => $params['title'],
            'tlp_meta_description' => $params['meta_description'],
            'tlp_meta_keywords'    => $params['meta_keywords'],
            'reference'            => $params['reference'],
            'content'              => $content
        ));
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_show_formcv(){
        $this->load->view('front/ajax/cv_view');
    }
    public function ajax_send_formcv(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $file = $_FILES['txtCV'];
            
            if( is_uploaded_file($file['tmp_name']) ){
                $filename = UPLOAD_PATH_CV . get_filename($file['name']);
                if( move_uploaded_file($file['tmp_name'], $filename) ){
                    chmod($filename, 0777);
                    
                    $message = EMAIL_CV_MESSAGE;
                    $message = str_replace('{name}', $this->input->post('txtName'), $message);
                    $message = str_replace('{email}', $this->input->post('txtEmail'), $message);
                    $message = str_replace('{comment}', nl2br($this->input->post('txtComment')), $message);

                    $this->load->library('email');
                    $this->email->from($this->input->post('txtEmail'), $this->input->post('txtName'));
                    $this->email->to(EMAIL_CV_TO);
                    $this->email->subject(EMAIL_CV_SUBJECT);
                    $this->email->message($message);
                    $this->email->attach($filename);
                    echo $this->email->send() ? "send" : "notsend";
                }
            }else echo "notupload";
        }
        die();
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_params($ref){
         switch($ref){
             default:
                 return array(
                     'title'            => TITLE_INDEX,
                     'meta_description' => META_DESCRIPTION_INDEX,
                     'meta_keywords'    => META_KEYWORDS_INDEX,
                     'reference'        => 'home'
                 );
             break;
         }
    }

}