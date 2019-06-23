<div class="forms" >
    <h1>Delete Programme</h1>

    <?php

        echo "Programme Name:<br/>";

        //print_r($module);
       foreach ($company as $com)
        {
              
            
            $comName = $com->name;
            $comId = $com->id;

        }
         
        echo "Are you sure you want to delete all details for " ,$comName;



    ?>  




   <p><a href="http://test.fmcgts.co.za/index.php/admin_c/delete_company/<?php echo $comId?>">Yes</a><a href="http://test.fmcgts.co.za/index.php/admin_c/edit_companies">No</a></p>

    <br/>



    <?php
        echo form_close();
    ?>

</div>