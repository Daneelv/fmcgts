
<div class="forms">
    <h1>Login</h1>


    <?php
    echo '<div class="success">';
    echo $this->session->flashdata('success');
    echo '</div>';
    
     if($this->session->flashdata('error')){
      echo '<div class="errors">';
      echo $this->session->flashdata('error');
      echo '<br />';
      echo anchor('login_c/forgot_password', 'Forgot password...');
      
      echo '</div><br/>';
    }
	
    $attributes = array('name' => 'loginForm', 'id' => 'loginForm');
    echo form_open('login_c/login', $attributes);
    ?>
    <div class='inputline'>Username:<input type="text" name="username" maxlength="50" value="<?php echo set_value('username','Username'); ?>" onclick="if(this.value=='Username'){this.value=''}"/></div>
    <div class='inputline'>Password: <input type="password" name="password" maxlength="50" value="<?php echo set_value('password','Password'); ?>" onclick="if(this.value=='Password'){this.value=''}"/></div>
    <div class='inputbutton'><input type="submit" name="submit" value="Login" /></div>
    
    <br/>
    
    <?php  ?>
   
</div>
