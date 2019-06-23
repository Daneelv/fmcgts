<div class="forms" >
    <h1>Edit trainees</h1>

    <?php

        $company_selection = $this->session->userdata('company_selection');
        echo $company_selection,"<br/>";

        echo "Name: ";

        foreach($module_selection as $module)
        {
            
             echo $module->name," | ";


        }
            echo "<br/>";
            echo "__________________________________________________";
         ?>
         <br/><br/>
         <?php

        foreach ($sel as $sel_t)
        {
              

           echo $sel_t->name," : ";

            foreach ($trainee_scores as $scores)
            {
              
                //echo $score->module_id;

                    if($sel_t->id == $scores->trainee_id)
                    {
                        $avg = ($scores->practical + $scores->theory)/2;

                        echo $avg," | ";
                    }
            }

            ?>  

            <p><a href="edit_trainees_score/<?php echo $sel_t->id?>">Edit</a></p>
            <br/><br/>
           
        <?php




        }
    ?>  


    <!--<input type="hidden" name="company_id" value="" />
    <input type="hidden" name="superior" value="" />
    <input type="hidden" name="type" value="trainee" />

    <input type="text" title="Full Name" name="name" maxlength="50" value="<?php //echo set_value('name', 'Full Name'); ?>" onclick="if(this.value=='Full Name'){this.value=''}"/>
    <input type="text" title="Username" name="username" maxlength="50" value="<?php //echo set_value('username', 'Username'); ?>" onclick="if(this.value=='Username'){this.value=''}"/>
    <input type="password" title="Password" name="password" value="<?php //echo set_value('password', 'Password'); ?>" onclick="if(this.value=='Password'){this.value=''}"/> -->
    

    <?php
        echo form_close();
    ?>

</div>
