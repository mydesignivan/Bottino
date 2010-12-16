<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Contents extends MY_Controller {

    /* CONSTRUCTOR
     **************************************************************************/
    function __construct(){
        parent::MY_Controller();

        if( !$this->session->userdata('logged_in') ) redirect('panel');
        
        $this->load->model("contents_panel_model");
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function index(){
        $this->assets->add_js_group(array('plugins_treeview', 'plugins_validate', 'plugins_fancybox', 'helpers_json'));
        $this->assets->add_js(array('plugins/picturegallery/picturegallery', 'class/contents'));
        $this->assets->add_js_group(array('plugins_tiny_mce'), false);
        $this->assets->add_js('plugins/jquery-ui.sortable/jquery-ui-1.8.2.custom.min', false);
        $this->_render('panel/contents_view', array(
            'tlp_section'        => 'panel/contents_view.php',
            'tlp_title'          => TITLE_INDEX,
            'tlp_title_section'  => "Contenidos",
            'treeview'           => $this->contents_panel_model->get_treeview()
        ), 'panel_view');
    }


    /* AJAX FUNCTIONS
     **************************************************************************/
     public function ajax_show_form(){
         $data = array();
         if( is_numeric($this->uri->segment(4)) ){
             $data['info'] = $this->contents_panel_model->get_info($this->uri->segment(4));
         }
         $this->_render('panel/ajax/contents_form_view', $data, 'ajax_view');
     }
     
     public function ajax_create(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->contents_panel_model->create();
            echo($res ? "ok" : $res);
            die();
        }
     }

     public function ajax_edit(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            $res = $this->contents_panel_model->edit();
            echo($res ? "ok" : $res);
            die();
        }
     }

     public function ajax_del(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            echo($this->contents_panel_model->delete($this->uri->segment(4)) ? "ok" : "error");
            die();
        }
     }

     public function ajax_order(){
        die($this->contents_panel_model->order() ? "success" : "error");
     }

     public function ajax_show_treeview(){
        die($this->contents_panel_model->get_treeview());
     }

    public function ajax_upload_gallery(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){

            $this->load->library('superupload');

            $config = array(
                'path'            => UPLOAD_PATH_SIDEBAR.'.tmp/',
                'thumb_width'     => IMAGESIZE_SIDEBAR_THUMB_W,
                'thumb_height'    => IMAGESIZE_SIDEBAR_THUMB_H,
                'image_width'     => IMAGESIZE_SIDEBAR_FULL_W,
                'image_height'    => IMAGESIZE_SIDEBAR_FULL_H,
                'maxsize'         => UPLOAD_MAXSIZE,
                'filetype'        => UPLOAD_FILETYPE,
                'filename_prefix' => $this->session->userdata('users_id')."_",
                'master_dim'      => 'height'
            );
            $this->superupload->initialize($config);
            echo json_encode($this->superupload->upload('txtUploadFile'));
            die();
        }
    }

    public function ajax_upload_delete(){
        if( $_SERVER['REQUEST_METHOD']=="POST" ){
            @unlink($this->input->post('au_filename_image'));
            @unlink($this->input->post('au_filename_thumb'));
            die("ok");
        }
    }

    public function ajax_prueba(){
        $this->contents_panel_model->prueba();
    }
    
    /* PRIVATE FUNCTIONS
     **************************************************************************/
}
