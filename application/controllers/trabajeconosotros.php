<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Trabajeconosotros extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        $this->load->model('contents_model');
        $this->load->model('lists_model');
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->helpers('form');

        $this->assets->add_js_group(array('plugins_datepicker', 'plugins_validate'));
        $this->assets->add_js(array('plugins/formatnumber/formatnumber.min', 'class/tcn'));
        $this->_render('front/trabajeconosotros_view', array(
            'listMenu'             => $this->contents_model->get_menu(),
            'content_footer'       => $this->contents_model->get_content('footer'),
            'tlp_title'            => TITLE_TRABAJECONOSOTROS,
            'tlp_meta_description' => META_DESCRIPTION_TRABAJECONOSOTROS,
            'tlp_meta_keywords'    => META_KEYWORDS_TRABAJECONOSOTROS
        ));
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $file = $_FILES['txtCV'];
            if( is_uploaded_file($file['tmp_name']) ){

                $filename = UPLOAD_PATH_CV . get_filename($file['name']);
                if( move_uploaded_file($file['tmp_name'], $filename) ){
                    chmod($filename, 0777);

                    $this->load->library('email');
                    $this->load->model('users_model');

                    $config = array();
                    $config['nl2br'] = 'txtConsult';
                    $config['default'] = '---';

                    $message = set_message(json_decode(EMAIL_TNC_MESSAGE), $config);

                    //die($message);

                    //$datauser = $this->users_model->get_info(array('username'=>'mydesignadmin'));
                    $datauser = $this->users_model->get_info(array('username'=>'admin'));
                    $to = $datauser['email_cv'];

                    $this->email->from($this->input->post('txtEmail'), $this->input->post('txtName'));
                    $this->email->to($to);
                    $this->email->subject(EMAIL_TCN_SUBJECT);
                    $this->email->message($message);
                    $this->email->attach($filename);
                    $status = $this->email->send();
                    $this->session->set_flashdata('status_sendmail', $status ? "ok" : "error");

                    redirect('/trabaje-con-nosotros/');
                }
            }
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}