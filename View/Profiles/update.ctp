<?php 
    if($this->Session->flash() != "") {
    
?>  
<div class="alert alert-success">  
    <a class="close" data-dismiss="alert">×</a>  
    <strong>Success!</strong> Profile Updated.  
    </div>
<?php 
    }
?>
<div class="container">
    <p></p>
    <div class="update-event">
        <a href="/helpscout/profiles/" class="btn btn-info btn-mini"><span class="glyphicon glyphicon-arrow-left"></span>  Back to View All Profiles</a> &nbsp;&nbsp;
    <div class="event-text">
        <h1>Edit Profile</h1>
    </div>
    </div>
</div>
<div class="container">
<?php echo $this->Form->create('Profile', array('type' => 'POST', 'class' => 'form-horizontal', 'role' => 'form')); ?>
        <div class="form-group">
            <label for="event_name" class="col-sm-2 control-label">First Name</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('first_name', array('class' => 'form-control input-lg', 'type' => 'text',     
                                                                  'size' => '36', 'required' => 'required', 'value' => $profile['Profile']['first_name'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="arrival_name" class="col-sm-2 control-label">Last Name</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('last_name', array('class' => 'form-control input-lg', 'type' => 'text',      
                                                                  'size' => '36', 'required' => 'required', 'value' => $profile['Profile']['last_name'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="arrival_id" class="col-sm-2 control-label">Address One</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('address_1', array('class' => 'form-control input-lg', 'type' => 'text',      
                                                                  'size' => '36', 'required' => 'required', 'value' => $profile['Profile']['address_1'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="misc_name" class="col-sm-2 control-label">Address Two</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('address_2', array('class' => 'form-control input-lg', 'type' => 'text',      
                                                                  'size' => '36', 'value' => $profile['Profile']['address_2'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="misc_id" class="col-sm-2 control-label">City</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('city', array('class' => 'form-control input-lg', 'type' => 'text',       
                                                                  'size' => '36', 'required' => 'required', 'value' => $profile['Profile']['city'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        
        <div class="form-group">
            <label for="misc_id" class="col-sm-2 control-label">State</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('state', array('class' => 'form-control input-lg', 'type' => 'text',      
                                                                  'size' => '36', 'required' => 'required', 'value' => $profile['Profile']['state'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="misc_id" class="col-sm-2 control-label">Postal Code</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('postal_code', array('class' => 'form-control input-lg', 'type' => 'text',        
                                                                  'size' => '36', 'required' => 'required', 'value' => $profile['Profile']['postal_code'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="misc_id" class="col-sm-2 control-label">Email</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('email', array('class' => 'form-control input-lg', 'type' => 'text',      
                                                                  'size' => '36', 'required' => 'required', 'value' => $profile['Profile']['email'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="misc_id" class="col-sm-2 control-label">Phone Number</label>
            <div class="col-xs-4">
                <?php echo $this->Form->input('phone_number', array('class' => 'form-control input-lg', 'type' => 'text',       
                                                                  'size' => '36', 'required' => 'required', 'value' => $profile['Profile']['phone_number'],
                                                                  'label' => false, 'div' => false)); ?>
            </div>
        </div>
        <input type="hidden" name="data[Profile][profile_id]" value="<?php echo $profile['Profile']['profile_id']; ?>">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button name="submit" type="submit" class="btn btn-lg btn-primary">Update Profile</button>
            </div>
        </div>
</form>
</div>