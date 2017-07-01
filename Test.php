<?php
if(!empty($_POST['answer'])){
    if($_POST['answer'] == 1){
        $data['check'] = TRUE;
    }else  $data['check'] = FALSE;

    echo json_encode($data);

}