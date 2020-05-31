<?php echo validation_errors(); ?>
<?php if($this->session->flashdata('failed_login')) { ?>
    <div class="alert alert-warning" role="alert">
        <?php
        echo $this->session->flashdata('failed_login');
        ?>
    </div>
<?php } ?>
<?php if($this->session->flashdata('user_loggedout')) { ?>
    <div class="alert alert-danger" role="alert">
        <?php
        echo $this->session->flashdata('user_loggedout');
        ?>
    </div>
<?php } ?>
<?php echo form_open('users/login'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center">
            <?php echo $title; ?>
        </h2>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" id="" name="username" placeholder="Username" required autofocus>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" id="" name="password" placeholder="Password" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Log in</button>
    </div>
</div>
<?php echo form_close(); ?>