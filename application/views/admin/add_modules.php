<div class="forms" >
    <h1>Add modules</h1>
    <?php
        echo '<div class="success">';
        echo $this->session->flashdata('success');
        echo '</div>';

        echo '<div class="errors">';
        echo validation_errors();
        echo '</div>';

        $attributes = array('name' => 'addForm', 'id' => 'addForm');
        echo form_open('admin_c/add_modules', $attributes);

                    
    ?>
    <div class='inputline'>
    SETA number: <input type="text" title="SETA number" name="seta_number" maxlength="50" value="<?php echo set_value('seta_number', 'Seta number'); ?>" onclick="if(this.value=='Seta number'){this.value=''}"/>
     </div>   
     
    <div class='inputline'>    
    Module name: <input type="text" title="Module name" name="module_name" maxlength="50" value="<?php echo set_value('module_name', 'Module name'); ?>" onclick="if(this.value=='Module name'){this.value=''}"/>
     </div>   
     
    <div class='inputline'>    
    Practical: <input type="number" title="Practical" name="practical" value="<?php echo set_value('practical', 0); ?>" onclick="if(this.value== 0){this.value=''}"/>
    </div>    
    
    <div class='inputline'>    
    Theory: <input type="number" title="Theory" name="theory" value="<?php echo set_value('theory', 0); ?>" onclick="if(this.value== 0){this.value=''}"/>  
    </div>   

    <div class='inputline'>Programme: <?php 
    echo form_dropdown('programme_selection', $programme_names);
    ?></div> 
    
    <div class='inputbutton'>   
    <input type="submit" value="Add" name="submit" />    
    <input type="reset" value="Reset" name="reset" />    
    </div> 
    
    <?php
        echo form_close();
    ?>

</div>
