<?php
require_once '../App.php';

if ($request->hasPost('submit') && $request->hasGet('id')) {
    $id = $request->get('id');
$title = $request->clean('title');
$validation->validate('title' , $title , ["str","required"]);
$errors = $validation->getError();
if (empty($errors)) {
    $stm =$conn->prepare("select * from todo where id=(:id)");
 $stm->bindParam(":id",$id,PDO::PARAM_INT);
 $out = $stm->execute();
if($out){
    //update
$stm = $conn->prepare("update todo set title=(:title) where id=(:id)");
$stm->bindParam(":title",$title,PDO::PARAM_STR);
$stm->bindParam(":id",$id,PDO::PARAM_INT);
$is_updated =$stm->execute();
if ($is_updated) {
    $session->set("success","Data Updated sucessfully");
    $request->header('../index.php');
}else{
    $session->set("errors","errors while Updated");
    $request->header("../edit.php?id=$id"); 
}
}
    
}else{
    $session->set("errors",$errors);
    $request->header("../edit.php?id=$id");
}


}else{
    $request->header('../index.php');
}