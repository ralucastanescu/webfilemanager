<h2>
    <?php
        echo $file['title'];
    ?>
</h2>
<?php
echo $file['created_at'];
?>
<p>
    Created by: <?php echo $file['username']; ?>
</p>
<hr>
<div class="file_details">
    <div class="row">
        <div class="col-md-9">
            <p>File description:</p>
            <h6>
                <?php
                echo $file['description'];
                ?>
            </h6>
            <?php if(!empty($file['tag'])) { ?>
                <hr>
                <p>File tag:</p>
                <h6>
                    <?php
                    echo $file['tag'];
                    ?>
                </h6>
            <?php } ?>
        </div>
        <?php
        if(!empty($file['attachment'])) {
            ?>
            <div class="col-md-3">
                <p><?php echo $file['original_name']; ?></p>
                <a href="<?php echo site_url() . 'assets/uploadedFiles/' . $file['attachment']; ?>" download="<?php echo $file['original_name']; ?>" class="btn btn-info">
                    Download file
                </a>
                <br/>
            </div>
            <?php
        } else { ?>
            <div class="col-md-3">
                <p>
                    No file uploaded
                </p>
            </div>
        <?php } ?>

    </div>
</div>

<hr>
<?php if($this->session->userdata('user_id') == $file['user_id']) { ?>
    <div class="row">
        <div class="col-md-1">
            <a class="btn btn-default" href="edit/<?php echo $file['id']; ?>">
                Edit file
            </a>
        </div>
        <div class="col-md-1">
            <?php echo form_open('files/delete/' . $file['id']); ?>
            <form>
                <input type="hidden" name="id" value="<?php echo $file['id'] ?>">
                <button type="submit" value="delete" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
<?php } ?>


