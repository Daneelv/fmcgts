<div class="forms" >
    <h1>Edit module</h1>
    <?php
        echo "Module Details:<br/>";
        foreach ($module as $mod)
        {
            $seta_number = $mod->seta_number;
            $name = $mod->name;
            $practical = $mod->practical;
            $theory = $mod->theory;
        }
        echo form_open('admin_c/update_module_details');
    ?>
    Seta Number:<input type="text" title="Seta Number" name="seta_number" maxlength="50" value="<?php echo set_value('seta_number',$seta_number);?>"/><br/>
    Course name:<input type="text" title="Name" name="name" maxlength="50" value="<?php echo set_value('name', $name);?>"/><br/>
    Practical percentage:<input type="text" title="Practical" name="practical" maxlength="50" value="<?php echo set_value('practical', $practical);?>"/><br/>
    Theory percentage:<input type="text" title="Theory" name="theory" maxlength="50" value="<?php echo set_value('theory', $theory);?>"/><br/>
    <br/><br/>
    <input type="submit" value="Save" name="submit" />    
    <input type="reset" value="Reset" name="reset" />
    <?php
        echo form_close();
    ?>
</div>
