<?php

class ArchiveModel extends CI_Model {

//  var $table = "Appointments";
//  var $key = "Appointments_ID";

  function __construct() {
    parent::__construct();
    $this->data_db = $this->load->database('archive', TRUE);
  }

}