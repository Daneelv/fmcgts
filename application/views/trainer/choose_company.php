<div class="forms" >
    <h1>Choose company</h1>

    <?php
       

        //$c_id = $this->session->userdata('c_id');
        //print_r($company_names);
        $attributes = array('name' => 'selectComp', 'id' => 'selectComp');
        echo form_open('trainer_c/choose_companies',$attributes);
            
    ?>

            Company: <?php 
            echo form_dropdown('comp_selection', $company_names);
            ?>

             <br/><br/>
             <input type="submit" value="Go" name="submit" />    
    <?php

        
        echo form_close();
    ?>

</div>