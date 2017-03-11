<?php
/**
 * 弹出JS提示框
 * @param string $message 提示信息
 */
function js_message($message){
    echo "<script language='javascript'>alert('".$message."');</script>";
}
/**
 * 页面跳转
 * @param string $target 跳转目标
 * @param int $time      跳转延迟
 */
function page_jump($target,$time){
    header("Refresh:".$time.";url=".$target);
}
/**
 * 内容显示
 * @param $var 任意变量类型的变量
 */
function show($var){
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}