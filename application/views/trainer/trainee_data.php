<div class="forms" >
    <h1>Add trainee information</h1>
    <?php
        echo '<div class="success">';
        echo $this->session->flashdata('success');
        echo '</div>';

        echo '<div class="errors">';
        echo validation_errors();
        echo '</div>';

        $attributes = array('name' => 'addForm', 'id' => 'addForm');
        echo form_open('trainer_c/choose_courses', $attributes);

                    
    ?>

    <input type="hidden" name="company_id" value="" />
    <input type="hidden" name="superior" value="" />
    <input type="hidden" name="type" value="trainee" />

    <?php 
        echo form_dropdown('superior_selection', $superiors);
        echo form_dropdown('course_selection', $courses);
    ?>
    <input type="submit" value="Add" name="submit" />    
    <input type="reset" value="Reset" name="reset" />    

    <?php
        echo form_close();
    ?>

</div>
