<?php
require_once '../App.php';
if ($request->hasGet('id')) {
    $id = $request->get('id');
    $stm =$conn->prepare("select * from todo where id=(:id)");
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $out = $stm->execute();
    if ($out) {
       $stm =  $conn->prepare("delete from todo where id=(:id)");
        $stm->bindParam(":id",$id,PDO::PARAM_INT);
 $is_deleted =$stm->execute();
if ($is_deleted) {
    $session->set("success","Data Deleted sucessfully");
    $request->header('../index.php');
}else{
    $session->set("errors","data not founded");
    $request->header("../index.php");
}
    }else{
        $session->set("errors","data not founded");
        $request->header("../index.php");
    }
}else{
    $request->header("../index.php");
}