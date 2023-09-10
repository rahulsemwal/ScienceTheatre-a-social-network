<?php
function upload(){
    $query=mysql_query("insert into     video(`u_id`,`title`,`discription`,`link`,`submit_date`,`update`)values('$u_id','$_REQUEST[title]','$_REQUEST[discription]','$link','$date','1');");
}?>


