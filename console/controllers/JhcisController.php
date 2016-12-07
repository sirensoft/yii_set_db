<?php

namespace console\controllers;

use common\components\AppController;

class JhcisController extends AppController {

    public function actionInsert() {

        $sql = "show tables";
        $raw = $this->query_all($sql);
        //$this->print_r($raw);
        foreach ($raw as $tb) {
            echo $t = $tb['Tables_in_jhcisdb'];
            $sql = " DROP TRIGGER IF EXISTS " . $t . "_after_insert; ";
            $this->execute($sql);
             if ($tb !== 'tehn_track_db') {
            $sql = " CREATE TRIGGER `" . $t . "_after_insert` AFTER INSERT ON `$t` 
                     FOR EACH ROW BEGIN	    
                        REPLACE INTO tehn_track_db (tb_name,command,note,ttime) VALUES ('$t','insert','',NOW());
		
                    END; ";
           
                $this->execute($sql);
            }

            echo "...end.\r\n";
        }
    }

//

    public function actionUpdate() {

        $sql = "show tables";
        $raw = $this->query_all($sql);
        //$this->print_r($raw);
        foreach ($raw as $tb) {
            echo $t = $tb['Tables_in_jhcisdb'];
            $sql = " DROP TRIGGER IF EXISTS " . $t . "_after_update; ";
            $this->execute($sql);
            if ($tb !== 'tehn_track_db') {
                $sql = " CREATE TRIGGER `" . $t . "_after_update` AFTER UPDATE ON `$t` 
                     FOR EACH ROW BEGIN	    
                        REPLACE INTO tehn_track_db (tb_name,command,note,ttime) VALUES ('$t','update','',NOW());
		
                    END; ";

                $this->execute($sql);
            }

            echo "...end.\r\n";
        }
    }
    
       public function actionDelete() {

        $sql = "show tables";
        $raw = $this->query_all($sql);
        //$this->print_r($raw);
        foreach ($raw as $tb) {
            echo $t = $tb['Tables_in_jhcisdb'];
            $sql = " DROP TRIGGER IF EXISTS " . $t . "_after_delete; ";
            $this->execute($sql);
            if ($tb !== 'tehn_track_db') {
                $sql = " CREATE TRIGGER `" . $t . "_after_delete` AFTER DELETE ON `$t` 
                     FOR EACH ROW BEGIN	    
                        REPLACE INTO tehn_track_db (tb_name,command,note,ttime) VALUES ('$t','delete','',NOW());
		
                    END; ";

                $this->execute($sql);
            }

            echo "...end.\r\n";
        }
       
    }
    public function actionDrop(){
         echo $this->execute("CALL drop_track_trigger;");
    }

//
}
