<div class="forms" >
    <h1>Delete programme</h1>

    <?php

        echo "Programme Name:<br/>";

        //print_r($module);
       foreach ($programme as $prog)
        {
              
            
            $progName = $prog->name;
            $progId = $prog->id;

        }
         
        echo "Are you sure you want to delete all details for " ,$progName;



    ?>  




   <p><a href="http://test.fmcgts.co.za/index.php/admin_c/delete_programme/<?php echo $progId?>">Yes</a><a href="http://test.fmcgts.co.za/index.php/admin_c/edit_programme">No</a></p>

    <br/>



    <?php
        echo form_close();
    ?>

</div>