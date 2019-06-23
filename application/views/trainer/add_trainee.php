<div class="forms" >
    <h1>Add trainee</h1>
    <?php
        echo '<div class="success">';
        echo $this->session->flashdata('success');
        echo '</div>';

        echo '<div class="errors">';
        echo validation_errors();
        echo '</div>';

        $attributes = array('name' => 'addForm', 'id' => 'addForm');
        echo form_open('trainer_c/add_trainee', $attributes);

                    
    ?>

    <input type="hidden" name="company_id" value="" />
    <input type="hidden" name="superior" value="" />
    <input type="hidden" name="type" value="trainee" />

    <div class='inputline'>Name:<input type="text" title="Full Name" name="name" maxlength="50" value="<?php echo set_value('name', 'Full Name'); ?>" onclick="if(this.value=='Full Name'){this.value=''}"/></div>

    <div class='inputline'>Username:<input type="text" title="Username" name="username" maxlength="50" value="<?php echo set_value('username', 'Username'); ?>" onclick="if(this.value=='Username'){this.value=''}"/></div>

     <div class='inputline'>Password:<input type="password" title="Password" name="password" value="<?php echo set_value('password', 'Password'); ?>" onclick="if(this.value=='Password'){this.value=''}"/> </div>

   <div class='inputline'>Company: <?php 
   echo form_dropdown('company_selection', $company_names);
    ?></div>

   <div class='inputbutton'> <input type="submit" value="Add" name="submit" /> 
    <input type="reset" value="Reset" name="reset" />  </div>  

    <?php
        echo form_close();
    ?>

</div>
