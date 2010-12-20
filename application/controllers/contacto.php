<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contacto extends MY_Controller {

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
        $ref = $this->uri->segment(1);
        $this->load->helpers('form');

        $this->assets->add_js_group(array('plugins_validate'));
        $this->assets->add_js(array('plugins/formatnumber/formatnumber.min', 'class/account'));
        $this->_render('front/contact_view', array(
            'listMenu'             => $this->contents_model->get_menu(),
            'content_footer'       => $this->contents_model->get_content('footer'),
            'tlp_title'            => TITLE_CONTACTO,
            'tlp_meta_description' => META_DESCRIPTION_CONTACTO,
            'tlp_meta_keywords'    => META_KEYWORDS_CONTACTO,
            'listCountry'          => $this->lists_model->get_country(array(''=>'Seleccione un pa&iacute;s')),
            'content'              => $this->contents_model->get_content('contacto')
        ));
    }

    public function send(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $this->load->library('email');
            $this->load->model('users_model');
            
            $config = array();
            $config['nl2br'] = 'txtMessage';
            $config['default'] = '---';
            $config['data'] = array('country' => $this->lists_model->get_country_name($this->input->post('cboCountry')));

            $msg = set_message(json_decode(EMAIL_CONTACT_MESSAGE), $config);

            //die($msg);

            //$datauser = $this->users_model->get_info(array('username'=>'mydesignadmin'));
            $datauser = $this->users_model->get_info(array('username'=>'admin'));
            $to = $datauser['email_contact'];

            $this->email->from($this->input->post('txtEmail'), $this->input->post('txtName'));
            $this->email->to($to);
            $this->email->subject(EMAIL_CONTACT_SUBJECT);
            $this->email->message($msg);
            $status = $this->email->send();
            $this->session->set_flashdata('status_sendmail', $status ? "ok" : "error");

            redirect('/contacto/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
     public function ajax_show_states(){
        $arr = $this->lists_model->get_states($this->input->post('country_id'));
        echo '<option value="">Seleccione una provincia</option>';
        foreach( $arr as $val ) echo '<option value="'.$val['name'].'">'.$val['name'].'</option>';
     }

    /* PRIVATE FUNCTIONS
     **************************************************************************/

}