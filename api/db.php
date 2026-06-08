<?php

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db15";
    protected $pdo;
    protected $table;

    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->a2s($arg[0]);
                $sql .=" WHERE " .join("AND",$tmp);
            }else{
            $sql .= $arg[0];
            }
    }

    if(isset($arg[1])){
        $sql .= $arg[1];
    }

    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    function count(...$arg){
        $sql="SELECT count(*) FROM $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->a2s($arg[0]);
                $sql .=" WHERE " .join("AND",$tmp);
            }else{
            $sql .= $arg[0];
            }
    }

    if(isset($arg[1])){
        $sql .= $arg[1];
    }

    return $this->pdo->query($sql)->fetchColumn();
    }


    function find($arg){
        $sql="SELECT * FROM $this->table ";

        if(is_array($arg)){
                $tmp=$this->a2s($arg);
                $sql .=" WHERE " .join("AND",$tmp);
        }else{
            $sql .=" WHERE `id`= '$arg'";
        }

    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($arg){
        if(isset($arg['id'])){

            $tmp=$this->a2s($arg);
            $sql="UPDATE $this->table SET ".join(" , ", $tmp);
            $sql .=" WHERE `id`= '{$arg['id']}'";

        }else{
            $key=array_keys($arg);
            $sql =" INSERT INTO $this->table (`".join(" , ",$key)."`) VALUES('".join("','",$arg)."')";
            
        }
        return $this->pdo->exec($sql);
    }


    function del($arg){
    $sql="DELETE FROM $this->table ";
    if(is_array($arg)){
        $tmp=$this->a2s($arg);
        $sql .=" WHERE " .join("AND",$tmp);
    }
    else{
        $sql .=" WHERE `id`= '$arg'";
    }
    return $this->pdo->exec($sql);
    }

    protected function a2s($arry){
        $tmp=[];
        foreach($arry as $key => $val){
            $tmp[]="`$key`='$val'";
        }
        return $tmp;
     }  



function q($sql){
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}

}

function dd($array){
    echo"<pre>";
    print_r($array);
    echo"</pre>";
}
function to($url){
    header("location:$url");
}

$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$news=new DB('news');
$Admin=new DB('admin');
$Menu=new DB('menu');
$Total=new DB('total');
$Botton=new DB('botton');
?>