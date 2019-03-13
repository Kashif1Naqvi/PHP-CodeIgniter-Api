<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Website_model extends CI_Model {

    var $website = 'website';

    function get_website_list() {
        $this->db->select('*');
        $this->db->from($this->website);
        $query = $this->db->get();
        if($query){
        	return $query->result();
        }
        return NULL;
    }

    function get_website($id) {
        $query = $this->db->get_where($this->website, array("id" => $id));
        if ($query) {
            return $query->row();
        }
        return NULL;
    }
	
    function add_website($website_title, $website_url) {
        $data = array('title' => $website_title, 'url' => $website_url);
        $this->db->insert($this->website, $data);
    }

    function update_website($website_id, $website_title, $website_url) {
        $data = array('title' => $website_title, 'url' => $website_url);
        $this->db->where('id', $website_id);
        $this->db->update($this->website, $data);
    }
	
    function delete_website($website_id) {
        $this->db->where('id', $website_id);
        $this->db->delete($this->website);
    }

}