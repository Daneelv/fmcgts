<<div class="forms" >
    <h1>Delete Trainer</h1>

    <?php

        echo "Trainer Name:<br/>";

        //print_r($module);
       foreach ($trainer as $train)
        {
              
            
            $trainName = $train->name;
            $trainId = $train->id;

        }
         
        echo "Are you sure you want to delete all details for " ,$trainName;



    ?>  




   <p><a href="http://test.fmcgts.co.za/index.php/admin_c/delete_trainer/<?php echo $trainId?>">Yes</a><a href="http://test.fmcgts.co.za/index.php/admin_c/edit_trainers">No</a></p>

    <br/>



    <?php
        echo form_close();
    ?>

</div>