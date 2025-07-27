<?php
require_once "../App.php";

if ($request->hasGet("id") && $request->hasget("name")) {
    $id = $request->get('id');
    $name = $request->get('name');

//select
$stm =$conn->prepare("select * from todo where id=(:id)");
$stm->bindParam(":id",$id,PDO::PARAM_INT);
$out = $stm->execute();
if ($out) {
    $stm = $conn->prepare("update todo set status=(:status) where id=(:id)");
    $stm->bindParam(":status",$name,PDO::PARAM_STR);
    $stm->bindParam(":id",$id,PDO::PARAM_INT);
    $is_updated =$stm->execute();
if($is_updated){
    $session->set("success","statues Updated sucessfully");
    $request->header('../index.php'); 
}else{
    $request->header('../index.php'); 

}


}else{
    $request->header('../index.php');

}
}else{
    $request->header('../index.php');
}