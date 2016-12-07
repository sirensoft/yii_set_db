<?php

namespace frontend\controllers;
use common\components\AppController;

class JhcisController extends AppController{
   
    public function actionIndex(){
        
        $sql = "show tables";
        $raw = $this->query_all($sql);
        //$this->print_r($raw);
        foreach ($raw as $tb) {
            echo $t = $tb['Tables_in_jhcisdb'];
            $sql = " DROP TRIGGER IF EXISTS ".$t."_after_insert; ";
            $this->execute($sql);
            $sql = " CREATE TRIGGER `".$t."_after_insert` AFTER INSERT ON `$t` 
                     FOR EACH ROW BEGIN	    
                        REPLACE INTO tehn_track_db (tb_name,command,ttime) VALUES ('$t','insert',NOW());
		
                    END; ";
            if($tb <> 'tehn_track_db'){
                $this->execute($sql);
            }
            
            echo "...end.<br>";
        }
        
    }
    
}
