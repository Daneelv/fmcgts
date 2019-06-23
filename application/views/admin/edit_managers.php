<div class="forms" >
    <h1>Edit Managers</h1>

    <?php



        foreach ($managers as $manager)
        {

            $manager_id =  $manager->id;
            $manager->type;
            echo "<p class='editlist'>", $manager->type," : ","<!--<br/>-->";
            echo $manager->name,"<!--<br/>-->";

           
           ?>
           
           

            <span class='editlistbuttons'>
            <a href="edit_manager_details/<?php echo $manager_id?>">Edit</a>
            <a href="view_delete_manager/<?php echo $manager_id?>">Delete</a>
            </span>
            </p>

                <?php
        }
    ?>  


    <?php
        echo form_close();
    ?>

</div>
