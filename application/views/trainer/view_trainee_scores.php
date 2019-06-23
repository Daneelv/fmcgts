<div class="forms" >
    <h1>Edit trainees</h1>

    <?php


        foreach ($trainees_scores as $scores)
        {
              
            echo "Practical: ";
            echo $scores->practical,"<br/>";

            echo "Theory: ";
            echo $scores->theory,"<br/>";
           
    ?>


              <!--<span class='editlistbuttons'>
                    <a href="edit_trainees_score/<?php //echo $sel_t->id?>">Edit</a>
                 </span>-->
            


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
