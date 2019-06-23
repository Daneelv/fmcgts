<div class="forms" >
    <h1>Edit Trainers</h1>

    <?php



        foreach ($trainers as $trainer)
        {

            $trainer_id =  $trainer->id;
            $trainer->type;
            echo "<p class='editlist'>", $trainer->type," : ","<!--<br/>-->";
            echo $trainer->name,"<!--<br/>-->";

           
           ?>

                 <span class='editlistbuttons'>
                    <a href="edit_trainer_details/<?php echo $trainer_id?>">Edit</a>
               
                   		<a href="view_delete_trainer/<?php echo $trainer_id?>">Delete</a>
             	</span>
            </p>

                <?php
        }
    ?>  


    <?php
        echo form_close();
    ?>

</div>
