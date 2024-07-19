

<!-- Modal -->
<div class="modal fade" id="modal_patient" tabindex="-1" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <?php echo form_open()?>
        <?php echo form_hidden('submit_form', 'patient_save');?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" >Verify Cell Phone and Email for "<?php echo $patient->LastName ?>, <?php echo $patient->FirstName ?> <?php echo $patient->MiddleName ?>"</h4>
        </div>
        <div class="modal-body">
          <p class="text-muted">Please verify the patient’s cell phone number and email address. If the patient asks for
            the reason for this information, inform them that we will only use it to send secure
            patient reports and clinical information to them via our ConnectONE<span style="font-size: 9px; position: relative; top: -3px">tm</span> portal.</p>
          <div class="form-group">
            <label class="control-label" >Cell Phone Number :</label>
            <input type="text" class="form-control" name="PhoneHome"  value="<?php echo $patient->PhoneCell ?>" >
          </div>
          <div class="form-group" style="margin: 0">
            <label class="control-label" >Email Address :</label>
            <input type="text" class="form-control" name="Email"  value="<?php echo $patient->Email ?>" >
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Next</button>
        </div>
        <?php echo form_close()?>

    </div>
  </div>
</div>
