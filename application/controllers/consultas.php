<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Consultas extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('contents_model');
        $this->_data=array(
            'listMenu'    => $this->contents_model->get_menu(),
            'tlp_script' => array('plugins_cycle')
        );
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $data = array_merge($this->_data, array(
            'tlp_title'            => TITLE_CONSULTS,
            'tlp_meta_description' => META_DESCRIPTION_CONSULTS,
            'tlp_meta_keywords'    => META_KEYWORDS_CONSULTS,
            'tlp_section'          => 'frontpage/consults_view.php',
            'tlp_script'           => array_merge($this->_data['tlp_script'], array('plugins_validator','class_consults'))
        ));
        $this->load->view('template_frontpage_view', $data);
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');
            $this->load->model('users_model');
            
            $message = EMAIL_CONSULTS_MESSAGE;
            $message = str_replace('{name}', $this->input->post('txtName'), $message);
            $message = str_replace('{subject}', $this->input->post('txtSubject'), $message);
            $message = str_replace('{email}', $this->input->post('txtEmail'), $message);
            $message = str_replace('{consult}', nl2br($this->input->post('txtConsult')), $message);

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