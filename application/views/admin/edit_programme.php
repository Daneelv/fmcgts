<div class="forms" >
    <h1>Edit programmes</h1>

    <?php



        foreach ($programmes as $programme)
        {

            $programme_id = $programme->id;
           
		   echo  "<p class='editlist'>", $programme->name;

            ?>


                <span class='editlistbuttons'>
                    <a href="edit_programme_details/<?php echo  $programme_id?>">Edit</a>
                	<a href="view_delete_programme/<?php echo  $programme_id?>">Delete</a>
                </span>
            </p>

                <?php
        }
    ?>  

    <?php
        echo form_close();
    ?>

</div>
