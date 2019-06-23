<div class="forms" >
    <h1>Edit modules</h1>

    <?php




        foreach ($modules as $module)
        {


           echo "<p class='editlist'>", $module->name;
           ?>


             <span class='editlistbuttons'>
             	<a href="edit_module_details/<?php echo $module->id?>">Edit</a>
                
                <a href="view_delete_module/<?php echo $module->id?>">Delete</a>
             </span>
           </p>

                <?php
        }
    ?>  


    <?php
        echo form_close();
    ?>

</div>
