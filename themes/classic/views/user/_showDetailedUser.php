<ul>
    <li>
        <a href='<?php echo $this->createUrl('show', array('id'=>$data->u_id));?>'><?php echo $data->u_username; ?></a>
    </li>
    <p>
        <?php echo $data->u_email; ?>
    </p>
</ul>