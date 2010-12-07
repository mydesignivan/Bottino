<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('contents_model');
        $this->load->helpers('form');
        $this->_data=array(
            'listMenu'   => $this->contents_model->get_menu(),
            'tlp_script' => array('plugins_cycle')
        );
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $ref = $this->uri->segment(1);
        $params = $this->_get_params($ref);
        $content = $this->contents_model->get_content($ref=="" ? "home" : null);

        $tlp_script = array();
        if( isset($content['sidebar']['gallery']) ) $tlp_script[] = 'plugins_adgallery';
        if( strpos($content['content'], '{chart}')!==FALSE ) {
            $tlp_script[] = 'plugins_tooltip';
            $tlp_script[] = 'class_chart';
        }
        
        $data = array_merge($this->_data, array(
            'tlp_title'            => $params['title'],
            'tlp_meta_description' => $params['meta_description'],
            'tlp_meta_keywords'    => $params['meta_keywords'],
            'tlp_section'          => 'frontpage/contents_view.php',
            'tlp_script'           => array_merge($this->_data['tlp_script'], $tlp_script),
            'reference'            => $params['reference'],
            'content'              => $content
        ));
        $this->load->view('template_frontpage_view', $data);
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_show_formcv(){
        $this->load->view('frontpage/ajax/cv_view');
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