<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Testimonial_model extends Model {

    /* CONSTRUCTOR
     **************************************************************************/
    function  __construct() {
        parent::Model();
    }

    /* PUBLIC FUNCTIONS
     **************************************************************************/
    public function get_list(){
        $this->db->order_by('order', 'asc');
        return $this->db->get_where(TBL_TESTIMONIAL)->result_array();
    }

    public function get_info($id){
        return $this->db->get_where(TBL_TESTIMONIAL, array('id'=>$id))->row_array();
    }

    public function create(){
        $data = array(
            'autor'         => $this->input->post('txtAutor'),
            'empresa'       => $this->input->post('txtEmpresa'),
            'cargo'         => $this->input->post('txtCargo'),
            'testimonio'    => $this->input->post('txtTestimonio'),
            'order'         => $this->_get_num_order(TBL_TESTIMONIAL),
            'date_added'    => strtotime(date('d-m-Y')),
            'last_modified' => strtotime(date('d-m-Y'))
        );
        return $this->db->insert(TBL_TESTIMONIAL, $data);
    }

    public function edit(){
        $data = array(
            'autor'         => $this->input->post('txtAutor'),
            'empresa'       => $this->input->post('txtEmpresa'),
            'cargo'         => $this->input->post('txtCargo'),
            'testimonio'    => $this->input->post('txtTestimonio'),
            'last_modified' => strtotime(date('d-m-Y'))
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update(TBL_TESTIMONIAL, $data);
    }

    public function delete($id){
        $this->db->where_in('id', $id);
        return $this->db->delete(TBL_TESTIMONIAL);
    }

    public function order(){
        $initorder = $this->input->post('initorder');
        $rows = json_decode($this->input->post('rows'));

        $this->db->select('order');
        $res = $this->db->get_where(TBL_TESTIMONIAL, array('id'=>$initorder))->row_array();
        $order = $res['order'];

        //print_array($rows, true);
        foreach( $rows as $row ){
            $id = substr($row, 2);
            $this->db->where('id', $id);
            if( !$this->db->update(TBL_TESTIMONIAL, array('order' => $order)) ) return false;
            $order++;
        }

        return true;
    }

    /* PRIVATE FUNCTIONS
     **************************************************************************/
    private function _get_num_order($tbl_name, $where=array()){
        $this->db->select_max('`order`');
        $this->db->where($where);
        $row = $this->db->get($tbl_name)->row_array();
        return is_null($row['order']) ? 1 : $row['order']+1;
    }
    
}