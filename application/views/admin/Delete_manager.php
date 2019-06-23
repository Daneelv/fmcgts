<div class="forms" >
    <h1>Delete Manager</h1>

    <?php

        echo "Manager Name:<br/>";

        //print_r($module);
       foreach ($manager as $man)
        {
              
            
            $manName = $man->name;
            $manId = $man->id;

        }
         
        echo "Are you sure you want to delete all details for " ,$manName;



    ?>  




   <p><a href="http://test.fmcgts.co.za/index.php/admin_c/delete_manager/<?php echo $manId?>">Yes</a><a href="http://test.fmcgts.co.za/index.php/admin_c/edit_managers">No</a></p>

    <br/>



    <?php
        echo form_close();
    ?>

</div>