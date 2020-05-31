<h2>
    <?php echo $title; ?>
</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" id="" name="name" placeholder="Name">
</div>
<div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" id="" name="username" placeholder="Username">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" id="" name="email" placeholder="E-mail">
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="" name="password" placeholder="Password">
</div>
<div class="form-group">
    <label>Password Confirmation</label>
    <input type="password" class="form-control" id="" name="passwordconfirmation" placeholder="Password confirmation">
</div>

<button type="submit" class="btn btn-primary">Register</button>
<?php echo form_close(); ?>