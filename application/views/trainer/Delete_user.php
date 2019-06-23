<div class="forms" >
    <h1>Edit trainees</h1>

    <?php

        echo "Trainee Name:<br/>";

        //print_r($trainee);
       foreach ($trainee as $train)
        {
              
            
            $name = $train->name;
            $company_id = $train->company_id;
            $type = $train->type;
            $username = $train->username;
            $superior = $train->superior;
            $id = $train->id;

        
    ?>


               

                <?php

        }
         
         //echo form_open('trainer_c/delete_user');
        echo "Are you sure you want to delete all details for " ,$name;



    ?>  




   <p><a href="http://test.fmcgts.co.za/index.php/trainer_c/delete_user/<?php echo $id?>">Yes</a><a href="http://test.fmcgts.co.za/index.php/trainer_c/edit_trainees">No</a></p>

    <br/>





    <!--<input type="submit" value="Yes" name="submit"/>
    <input type="submit" value="No" name="submit"/>-->

    <?php
        echo form_close();
    ?>

</div>