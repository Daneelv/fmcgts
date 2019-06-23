<!doctype html>
<html>
    <head>
        <title>fmcgts</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" />

    </head>
    <body>

        <div id="nav">
           <span style="font-size:12px;padding:0 10px 0 10px;">
           
           <?php

if($this->session->userdata('companyid'))
{
//echo company logo
$src = $this->helper->get_logo_src($this->session->userdata('companyid'));

echo "<img style='width: 77px; height: 33px;' src='" . base_url() . $src->logo . "' />";
}
           
   ?>        
           
</span>

            <?php
            //logged on menu different for every role.
            if ($this->session->userdata('is_logged_in')) {

                echo '<ul>';

                //display a home button for each role.
                $role = $this->session->userdata('role');

                echo '<li>', anchor("{$role}_c/index", 'Home'), '</li>';




                echo '<li>', anchor('login_c/logout', 'Logout'), '</li>';

                echo '</ul>';

                $id = $this->session->userdata('userid');
                $username = $this->session->userdata('username');
                echo "<span class='loggedon'>Hi ", anchor("user/view/$id", $username);
                echo '</a>, Logged on as ';
                echo $this->session->userdata('role');



                echo '</span>';
            } else {
                echo '<ul>';

                echo '<li>', anchor('login_c', 'Login'), '</li>';
                echo '</ul>';
            }
            ?>


        </div>

        




<!--/* End of file header.php */
/* Location: ./application/views/includes/header.php */-->