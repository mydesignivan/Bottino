<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Consultas extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();
        $this->load->model('contents_model');
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->assets->add_js_group('plugins_validate');
        $this->assets->add_js('class/consults');
        $this->_render('front/consults_view', array(
            'listMenu'    => $this->contents_model->get_menu(),
            'tlp_title'            => TITLE_CONSULTS,
            'tlp_meta_description' => META_DESCRIPTION_CONSULTS,
            'tlp_meta_keywords'    => META_KEYWORDS_CONSULTS
        ));
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');
            $this->load->model('users_model');
            
            $config = array();
            $config['nl2br'] = 'txtConsult';
            $config['default'] = '---';

            $message = set_message(json_decode(EMAIL_CONSULTS_MESSAGE), $config);

            //die($message);

            //$datauser = $this->users_model->get_info(array('username'=>'mydesignadmin'));
            $datauser = $this->users_model->get_info(array('username'=>'admin'));
            $to = $datauser['email_consults'];

            $this->email->from($this->input->post('txtEmail'), $this->input->post('txtName'));
            $this->email->to($to);
            $this->email->subject(EMAIL_CONSULTS_SUBJECT);
            $this->email->message($message);
            $status = $this->email->send();
            $this->session->set_flashdata('status_sendmail', $status ? "ok" : "error");

            redirect('/consultas/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}