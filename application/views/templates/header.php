<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/customCSS/customStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/customJS/menu.js"></script>
    <title>
        My file manager
    </title>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">WebFileManager</a>
        </div>
        <ul class="nav navbar-nav">
            <li id="home"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li id="about"><a href="<?php echo base_url() . 'about' ?>">About</a></li>
            <li id="files"><a href="<?php echo base_url() . 'files' ?>">Files</a></li>

            <?php if($this->session->userdata('logged_in')) { ?>
                <li id="myfiles"><a href="<?php echo base_url() . 'files/myfiles' ?>">My files</a></li>
                <li id="newFile"><a href="<?php echo base_url() . 'files/newFile' ?>">Add new file</a></li>
            <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
                if(!$this->session->userdata('logged_in')) { ?>
                    <li id="register"><a href="<?php echo base_url() . 'users/register' ?>">Register</a></li>
                    <li id="login"><a href="<?php echo base_url() . 'users/login' ?>">Log in</a></li>
                <?php } ?>
            <?php if($this->session->userdata('logged_in')) { ?>
                <li><a href="<?php echo base_url() . 'users/logout' ?>">Log out</a></li>
            <?php } ?>

        </ul>
    </div>
</nav>

<div class="container">

    <?php if($this->session->flashdata('user_registered')) { ?>
        <div class="alert alert-success" role="alert">
            <?php
                echo $this->session->flashdata('user_registered');
            ?>
        </div>
    <?php } ?>