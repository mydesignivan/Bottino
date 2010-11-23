<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Trabajeconosotros extends Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::Controller();

        $this->load->model('contents_model');
        $this->load->model('lists_model');
        $this->_data=array(
            'listMenu'    => $this->contents_model->get_menu()
        );
    }

    /* PRIVATE PROPERTIES
     **************************************************************************/
    private $_data;

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->helpers('form');

        $data = array_merge($this->_data, array(
            'tlp_title'            => TITLE_TRABAJECONOSOTROS,
            'tlp_meta_description' => META_DESCRIPTION_TRABAJECONOSOTROS,
            'tlp_meta_keywords'    => META_KEYWORDS_TRABAJECONOSOTROS,
            'tlp_section'          => 'frontpage/trabajeconosotros_view.php',
            'tlp_script'           => array('plugins_easyslider', 'plugins_validator', 'plugins_datepicker', 'plugins_formatnumber', 'class_tcn')
        ));
        $this->load->view('template_frontpage_view', $data);
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

                    $phone = $this->input->post('txtPhoneNum');
                    if( $this->input->post('txtPhoneCode')!='' ) $phone = $this->input->post('txtPhoneCode')." - ".$phone;

                    $message = EMAIL_TNC_MESSAGE;
                    $message = str_replace('{name}', $this->input->post('txtName'), $message);
                    $message = str_replace('{phone}', $phone, $message);
                    $message = str_replace('{email}', $this->input->post('txtEmail'), $message);
                    $message = str_replace('{address}', $this->input->post('txtAddess'), $message);
                    $message = str_replace('{fnac}', $this->input->post('txtNac'), $message);
                    $message = str_replace('{sex}', $this->input->post('optSex'), $message);
                    $message = str_replace('{tipo}', $this->input->post('optTipo'), $message);
                    $message = str_replace('{zone}', $this->input->post('txtZona'), $message);
                    $message = str_replace('{experiencie}', nl2br($this->input->post('txtExperiencia')), $message);
                    $message = str_replace('{programs}', nl2br($this->input->post('txtPrograms')), $message);

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