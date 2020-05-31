<h2>
    <?php echo $title; ?>
</h2>
<?php if($this->session->flashdata('user_loggedin')) { ?>
    <div class="alert alert-success" role="alert">
        <?php
        echo $this->session->flashdata('user_loggedin');
        ?>
    </div>
<?php } ?>
<?php if($this->session->flashdata('created_file')) { ?>
    <div class="alert alert-success" role="alert">
        <?php
        echo $this->session->flashdata('created_file');
        ?>
    </div>
<?php } ?>
<?php if($this->session->flashdata('updated_file')) { ?>
    <div class="alert alert-info" role="alert">
        <?php
        echo $this->session->flashdata('updated_file');
        ?>
    </div>
<?php } ?>
<?php if($this->session->flashdata('deleted_file')) { ?>
    <div class="alert alert-warning" role="alert">
        <?php
        echo $this->session->flashdata('deleted_file');
        ?>
    </div>
<?php } ?>
<?php if($this->session->flashdata('not_created_file')) { ?>
    <div class="alert alert-danger" role="alert">
        <?php
        echo $this->session->flashdata('not_created_file');
        ?>
    </div>
<?php } ?>
<?php
    foreach ($files as $file) { ?>
        <h3 class="file_title">
            <a href="<?php echo site_url('/files/' . $file['id']) ?>">
                <?php
                echo $file['title'];
                ?>
            </a>
        </h3>
        <p>
            Created by: <?php echo $file['username']; ?>
        </p>
        <div class="row">
            <div class="col-md-9">
                <p>Description:</p>
                <h6>
                    <?php
                    echo character_limiter($file['description'], 200, '...');
                    ?>
                </h6>
            </div>
            <?php
                if(!empty($file['path']) && !empty($file['attachment'])) {
            ?>
            <div class="col-md-3">
                <p><?php echo $file['attachment']; ?></p>
                    <a href="<?php echo site_url() . $file['path']; ?>" download class="btn btn-info">
                        Download file
                    </a>
                <br/>
            </div>
            <?php
            }
            ?>

        </div>
        <p><a class="btn btn-default" href="<?php echo site_url('/files/'.$file['id']); ?>">See details</a></p>

    <hr>
<?php
    }