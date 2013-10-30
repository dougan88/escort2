<ul>
    <li>
        <a href='<?php echo $this->createUrl('show', array('id'=>$data->a_id));?>'><?php echo $data->a_name; ?></a>
    </li>
    <p>
        <?php echo $data->a_description; ?>
    </p>
</ul>