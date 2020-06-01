<h2>
    <?php echo $title; ?>
</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('files/update/'); ?>
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $file['id'] ?>">
        <label>File name</label>
        <input type="text" class="form-control" id="" name="title"
               placeholder="File Name" value="<?php echo $file['title']; ?>">
    </div>
    <div class="form-group">
        <label>File description</label>
        <textarea class="form-control" id="" name="description" placeholder="File Description"><?php echo $file['description']; ?></textarea>
    </div>
<div class="form-group">
    <label>File tag</label>
    <input class="form-control" id="" name="tag" placeholder="File Tag" value="<?php echo $file['tag']; ?>">
</div>

<button type="submit" class="btn btn-primary">Update file</button>
<?php echo form_close(); ?>
