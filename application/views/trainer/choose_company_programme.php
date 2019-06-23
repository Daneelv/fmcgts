<div class="forms" >
    <h1>Add modules</h1>
    <?php
        /*echo '<div class="success">';
        echo $this->session->flashdata('success');
        echo '</div>';

        echo '<div class="errors">';
        echo validation_errors();
        echo '</div>';*/

        $attributes = array('name' => 'addForm', 'id' => 'addForm');
        echo form_open('trainer_c/choose_company_programme', $attributes);

    ?>
    <div class='inputline'>Company: <?php 
    echo form_dropdown('company_selection', $company_names);
    ?></div> 

    <div class='inputline'>Programme: <?php 
    echo form_dropdown('programme_selection', $course_names);
    ?></div> 
    
    <div class='inputbutton'>   
    <input type="submit" value="Add" name="submit" />    
    <input type="reset" value="Reset" name="reset" />    
    </div> 
    
    <?php
        echo form_close();
    ?>

</div>