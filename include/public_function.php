<?php
/**
 * 弹出JS提示框
 * @param string $message 提示信息
 */
function js_message($message){
    echo "<script language='javascript' type='text/javascript'>alert($message);</script>";
}
/**
 * 页面跳转
 * @param string $target 跳转目标(不要加http://)
 */
function page_jump($target){
    header("Location: http://$target");
}
?>