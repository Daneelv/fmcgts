<div class="forms" >
    <h1>Add Programme</h1>
    <?php
        echo '<div class="success">';
        echo $this->session->flashdata('success');
        echo '</div>';

        echo '<div class="errors">';
        echo validation_errors();
        echo '</div>';

        $attributes = array('name' => 'addForm', 'id' => 'addForm');
        echo form_open('admin_c/add_programme', $attributes);

                    
    ?>

    <div class='inputline'>
    Programme Name: <input type="text" title="Programme Name" name="programme_name" maxlength="50" value="<?php echo set_value('programme_name', 'Programme Name'); ?>" onclick="if(this.value=='Programme Name'){this.value=''}"/>
    </div>   
    <!--<div class='inputline'>Modules:<br/>

    <fieldset>
    <?php 
    //echo form_multiselect('module_selection', $module_names);
    
    /* $i=0;
    foreach ($module_names as $mod) 
    {
    ?>
       <input type="checkbox" name="select" value="<?php echo set_value('checkboxes','$mod');?>" /><?php echo $mod ?><br />

    <?php
       
    }
    for($i = 0,$i<$module_names,$i++)
    {

        $selected_modules[$i] = $this->session->userdata('checkboxes');;
        $i++;

    $this->session->set_userdata('array_module', $selected_modules);
    }
   */
    
    ?></fieldset> -->
    </div>

    
    <div class='inputbutton'>       
    <input type="submit" value="Add" name="submit" />    
    <input type="reset" value="Reset" name="reset" />    
    </div> 

    
    <?php
        echo form_close();
    ?>

</div>