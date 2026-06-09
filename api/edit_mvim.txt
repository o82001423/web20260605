<?php 
include_once "db.php";
// 建立 title 資料表的 DB 物件


foreach($_POST['id']as $idx => $id){
    if(in_array($id,$_POST['del'])){
        $Title->del($id);

    }else{
        $row=$Title->find($id);
        $row['text']=$_POST['text'][$idx];
        $row['sh']=(isset($_POST['sh'])==$id)?1:0;

        $Title->save($row);
    }
}





to("../admin.php?do=title");
?>