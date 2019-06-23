<div class="forms" >
    <h1>Delete Module</h1>

    <?php

        echo "Module Name:<br/>";

        //print_r($module);
       foreach ($module as $mod)
        {
              
            
            $modName = $mod->name;
            $modId = $mod->id;

        }
         
        echo "Are you sure you want to delete all details for " ,$modName;



    ?>  




   <p><a href="http://test.fmcgts.co.za/index.php/admin_c/delete_module/<?php echo $modId?>">Yes</a><a href="http://test.fmcgts.co.za/index.php/admin_c/edit_modules">No</a></p>

    <br/>



    <?php
        echo form_close();
    ?>

</div>