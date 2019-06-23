<div class="forms" >
    <h1>Edit companies</h1>

    <?php



        foreach ($company_names as $company)
        {

           

            echo "<p class='editlist'>", $company->name,"<!--<br/>-->";
           ?>


            <span class='editlistbuttons'>
            	<a href="edit_company_details/<?php echo $company->id?>">Edit</a>
                
                <a href="view_delete_company/<?php echo $company->id?>">Delete</a>
             </span>
             </p>

                <?php
        }
    ?>  

    <?php
        echo form_close();
    ?>

</div>
