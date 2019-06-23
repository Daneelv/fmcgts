<div class="forms" >
    <h1>Edit company</h1>
    <?php
        echo "Comapny Details:<br/>";
        foreach ($company as $com)
        {
            $name = $com->name;
            $logo = $com->logo;
            $other = $com->other;
            $trainer = $com->trainer;
        }
        echo form_open('admin_c/update_company_details');
    ?>

       Name:<input type="text" title="Name" name="name" maxlength="50" value="<?php echo set_value('name', $name);?>"/><br/>
    <!--Logo:<input type="text" title="Logo" name="logo" maxlength="50" value="<?php //echo set_value('logo',$logo);?>"/><br/>-->

    <div class='inputline'>
    Trainer: <?php 
        echo form_dropdown('trainer_selection', $trainer_names,$trainer);
    ?>
    </div>
    
    <br/><br/>
    <input type="submit" value="Save" name="submit" />    
    <input type="reset" value="Reset" name="reset" />
    <?php
        echo form_close();
    ?>
   
</div>