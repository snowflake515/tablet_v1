<?php
$id_appt = $encounter->Appointments_ID;
//$con = "AND ((TML1_Org_ID = 0 and  TML1_Theo_Default = 1) OR (TML1_Org_ID = $id_org))";

 

$con = " (TML1_Org_ID = $id_org)";
$hidden = '(Hidden = 0 OR Hidden IS NULL)';
$tml1_ids = 'TML1_Id IN (select TML1_ID from [Wellness_eCastEMR_Data].[dbo].[TabletInput] where Encounter_ID =  '.$encounter->Encounter_ID.' GROUP BY TML1_ID )';
 
$tml1 = $this->Tml1Model->get_where( $con .' AND ('.$hidden.' OR '.$tml1_ids.')')->result();
?>
<div class="page-header">
  <h1>
    Template For <?php echo $encounter->p_LastName . ', ' . $encounter->p_FirstName ?>
  </h1>
</div>
<div class="container-fluid">

  <div class="row">
    <div class="col-xs-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4>Template Name</h4>
        </div>
        <div class="widget-body">
          <div class="panel-body">
            <div class="form-group">
              <label class="col-md-3 control-label">Template</label>
              <div class="col-md-9 ">
                <input type="hidden" name="Encounter_ID" id="Encounter_ID" value="<?php echo $Encounter_ID ?>">
                <?php
        $option = array('' => 'Select Template');
        $op_hide = array();  
				foreach($tml1 as $t1){
					//$option[$t1->TML1_ID] = ($t1->TML1_Org_ID == 0) ? $t1->TML1_Description.'(Library)' :  $t1->TML1_Description; 
          if($t1->Hidden == 1){
            $op_hide[$t1->TML1_ID] = '[Deleted] --- '.$t1->TML1_Description;
          }else{
            $option[$t1->TML1_ID] =  $t1->TML1_Description;  
          }
          
				}
               // $option = option_select($tml1, 'TML1_ID', 'TML1_Description');
                echo form_dropdown('TML1_ID', $option + $op_hide, set_value('TML1_ID'), 'class = "form-control" id="TML1_ID" onchange="change_new_tml1(this)"');
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="space-12"></div>
      <div class="widget-box widget-cstm" id="container-tml2">
        <div class="widget-header">
          <a href="#tml-cat-wr" class="pull-right btn btn-sm btn-default btn-t collapsed"  data-toggle="collapse"  style="padding-left: 10px; padding-right: 10px">
            <small class="o">Open</small>
            <small class="c">Close</small>
          </a>
          <h4>Template Categories </h4>
        </div>
        <div class="collapse" id="tml-cat-wr">
          <div class="widget-body dcmh" style="max-height: 300px; overflow: auto; -webkit-overflow-scrolling: touch;" >
            <div style="min-height: 299px; position: relative" class="dcmh">
              <div class="hide wrap-tml-con"></div>
              <div class="panel-body">
                <div id="wrap_tml2">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="space-12"></div>
    </div>

    <div class="col-xs-12">

      <div class="widget-box widget-cstm" id="container-tml3">
        <div class="widget-header">
          <h4>Template Items </h4>
        </div>
        <div class="widget-body dcmh" style="max-height: 429px; overflow: auto; -webkit-overflow-scrolling: touch; ">
          <div style="min-height: 428px; position: relative" class="dcmh">
            <div class="hide wrap-tml-con"></div>
            <div class="panel-body">
              <div id="wrap_tml3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <p>
    <?php
    echo anchor('encounter/start/' . $id_appt, '<i class="icon icon-arrow-left"></i>&nbsp;&nbsp; Back', array('class' => 'btn btn-default btn-sm'));
    echo anchor('clinical_trigger/encounter/'.$encounter->Encounter_ID, '<i class="icon icon-save"></i>&nbsp;&nbsp; Save', array('id'=> 'btn-sv', 'class' => 'btn btn-primary btn-sm hide'));

    ?>
  </p>

  <div class="msg-notif hide">Saved</div>


</div>

<div class="modal fade" id="modal_template" data-backdrop="false" style="background: rgba(0,0,0,0.5);">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-body" >
        <h4 class="modal-title" id="modal_InstructionLabel"></h4>
        <div class="space-10"></div>
        <input type="hidden"  id="modal_tml3_id">
        <input type="text" class="form-control" id="val_insructure">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="insert_answer_instr(this)">Save</button>
      </div>
    </div>
  </div>
</div>

<?php
$this->load->view('template2/templte_css_js');
?>
