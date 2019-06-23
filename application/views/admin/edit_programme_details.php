<div class="forms" >
    <h1>Edit programme</h1>
    <?php
        echo "Programme Details:<br/>";
        foreach ($programme as $prog)
        {
           
            $name = $prog->name;
        }
        echo form_open('admin_c/update_programme_details');
    ?>
  
    Programme name:<input type="text" title="Name" name="name" maxlength="50" value="<?php echo set_value('name', $name);?>"/><br/>
    <br/><br/>
    <input type="submit" value="Save" name="submit" />    
    <input type="reset" value="Reset" name="reset" />
    <?php
        echo form_close();
    ?>
</div>