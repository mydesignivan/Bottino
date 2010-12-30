<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Testimoniales extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        if( !$this->session->userdata('logged_in') ) redirect('panel');
        
        $this->load->model("testimonial_model");
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->load->helpers('text');
        $this->assets->add_css('view_testimoniales');
        $this->assets->add_js('class/testimoniales_list');
        $this->assets->add_js_group('helpers_json');
        $this->assets->add_js('plugins/jquery-ui.sortable/jquery-ui-1.8.2.custom.min', false);
        $this->_render('panel/testimoniales_list_view', array(
            'tlp_title'          =>  TITLE_INDEX,
            'tlp_title_section'  => "Testimoniales",
            'list'               => $this->testimonial_model->get_list()
        ), 'panel_view');
    }

    public function form(){
        $id = $this->uri->segment(4);

        $data = array('tlp_title'  =>  TITLE_INDEX);

        if( is_numeric($id) ){ // Edit
            $data['tlp_title_section'] = "Editar Producto";
            $data['info'] = $this->testimonial_model->get_info($id);

        }else{  // New
            $data['tlp_title_section'] = "Nuevo Producto";
        }

        $this->assets->add_css('view_testimoniales');
        $this->assets->add_js('class/testimoniales_form');
        $this->assets->add_js_group('plugins_validate');
        $this->assets->add_js_group('plugins_tiny_mce', false);
        $this->_render('panel/testimoniales_form_view', $data, 'panel_view');
    }

    public function create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $res = $this->testimonial_model->create();
            if( !$res ){
                $this->template->set_message('Los datos no pudieron ser guardados.', 'error');
                redirect('/panel/testimoniales/form/');
            }else redirect('/panel/testimoniales/');

        }
    }

    public function edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->testimonial_model->edit();
            $msg = $res ? "Los datos se guardaron con &eacute;xito." : "Los datos no pudieron ser guardados.";
            $this->template->set_message($msg, $res ? "success" : "error");
            redirect('/panel/testimoniales/form/'.$this->input->post('id'));
        }
    }

    public function delete(){
        if( is_numeric($this->uri->segment(4)) ){
            $id = $this->uri->segment_array();
            array_splice($id, 0, 3);

            if( !$this->testimonial_model->delete($id) ){
                $this->template->set_message('No se pudo eliminar el producto.', 'error');
            }
            redirect('/panel/testimoniales/');
        }
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
    public function ajax_order(){
        die($this->testimonial_model->order() ? "success" : "error");
    }


    /* PRIVATE FUNCTIONS
     **************************************************************************/
}
