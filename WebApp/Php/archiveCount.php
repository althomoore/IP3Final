<?php

foreach ($conn->query("SELECT COUNT(*) FROM `document` WHERE `Author_id`='1' AND `status`='archived'") as $row1) {
    echo $row1['COUNT(*)'];
};