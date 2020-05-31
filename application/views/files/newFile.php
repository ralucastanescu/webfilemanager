<h2>
    <?php echo $title; ?>
</h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('files/newFile'); ?>
    <div class="form-group">
        <label>File name</label>
        <input type="text" class="form-control" id="" name="title" placeholder="File Name">
    </div>
    <div class="form-group">
        <label>File description</label>
        <textarea type="text" class="form-control" id="" name="description" placeholder="File Description"></textarea>
    </div>
    <div class="form-group">
        <label>File tag</label>
        <input type="text" class="form-control" id="" name="tag" placeholder="File tag">
    </div>
    <div class="form-group">
        <label>Attachment</label>
        <input type="file" class="form-control-file" id="" name="userfile" size="200" value="upload">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>
