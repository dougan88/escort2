<ul>
    <li>
        <a href='<?php echo $this->createUrl('girls/edit', array('id'=>$data->g_id));?>'><?php echo $data->g_name; ?></a>
    </li>
    <li>
        <?php echo $data->g_age; ?>
    </li>

    <p>
        <?php echo $data->g_description; ?>
    </p>
</ul>