<h2>
    <?php echo $title; ?>
</h2>

<p>
    This is a basic web file manager application.
    Currently, some test files have been uploaded, by a few users:
    <ul>
        <li>
            username: raluca, password: 123
        </li>
        <li>
            username: matei, password: 123
        </li>
        <li>
            username: anca, password: 123
        </li>
    </ul>
    A registration form is available, for further addition of users. <br/>
    Only users can add new files, however, guests can preview/download any existing attachments. <br/>
    Each user can preview/download all files, with permission to edit/delete only information for files uploaded by them.
    <br/><hr>
    ** Only file details can be updated (name, description, tag), but not the attachment itself. <br/>
    ** When a file is deleted, all information is deleted from both database, as well as "assets" folder.
</p>