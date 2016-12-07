<?php

 $conn= \Yii::$app->db;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>
<div class="site-index">

  

    <div class="body-content">

    <?php
    
   
    $conn->open();
    echo $conn->dsn;
    
    
    ?>

    </div>
</div>
