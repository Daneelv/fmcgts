<div class="forms" >
    <h1>Add Company</h1>
    <?php
        echo '<div class="success">';
        echo $this->session->flashdata('success');
        echo '</div>';

        echo '<div class="errors">';
        echo validation_errors();
        echo '</div>';

        $attributes = array('name' => 'addForm', 'id' => 'addForm');
        echo form_open('admin_c/add_company', $attributes);

                    
    ?>

    <div class='inputline'>
    Comapny Name: <input type="text" title="Comapny Name" name="company_name" maxlength="50" value="<?php echo set_value('company_name', 'Company Name'); ?>" onclick="if(this.value=='Company Name'){this.value=''}"/>
    </div>

    <!--<div class='inputline'>
    Company Logo: <input type="text" title="Company Logo" name="company_logo" maxlength="50" value="<?php echo set_value('company_logo', 'Company Logo'); ?>" onclick="if(this.value=='Company Logo'){this.value=''}"/>
    </div>-->

    <div class='inputline'>
    Trainer: <?php 
        echo form_dropdown('trainer_selection', $trainer_names);
    ?>
    </div>
    
    <div class='inputbutton'>
    <input type="submit" value="Add" name="submit" />    
    <input type="reset" value="Reset" name="reset" />    
	</div>

    <?php
        echo form_close();
    ?>

</div>
