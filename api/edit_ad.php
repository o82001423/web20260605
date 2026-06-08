<?php 
include_once "db.php";
// 建立 title 資料表的 DB 物件


foreach($_POST['id']as $idx => $id){
    if(isset($id,$_POST['del'])&& in_array($id,$_POST['del'])){
        $Ad->del($id);
    }else{
        $row=$Title->find($id);
        $row['text']=$_POST['text'][$idx];
        $row['sh']=(isset($_POST['sh'])&& in_array($id,$_POST['sh']))?1:0;

        $Title->save($row);
    }
}





to("../admin.php?do=title");
?>