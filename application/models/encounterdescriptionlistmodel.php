<?php

class EncounterDescriptionListModel extends CI_Model {

  var $table = "EncounterDescriptionList";
  var $key = "EncounterDescription_ID";

  function __construct() {
    parent::__construct();
    $this->data_db = $this->load->database('data', TRUE);
  }

  function insert($data) {
    $this->data_db->trans_begin();
    $this->data_db->insert($this->table, $data);
    $this->data_db->trans_commit();
  }

  function update($id, $data) {
    $this->data_db->trans_begin();
    $this->data_db->where($this->key, $id);
    $this->data_db->update($this->table, $data);
    $this->data_db->trans_commit();
  }

  function delete($id) {
    $this->data_db->trans_begin();
    $this->data_db->where($this->key, $id);
    $this->data_db->delete($this->table);
    $this->data_db->trans_commit();
  }

  function get_all() {
    return $this->data_db->get($this->table);
  }

  function get_by_id($id) {
    $this->data_db->where($this->key, $id);
    $this->data_db->from($this->table);
    return $this->data_db->get();
  }

  function get_by_field($field, $val, $other_condition = null) {
    $this->data_db->where($field, $val);
    if($other_condition != null){
      $this->data_db->where($other_condition);
    }
    $this->data_db->from($this->table);
    return $this->data_db->get();
  }

}