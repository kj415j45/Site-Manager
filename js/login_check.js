function username_check(){
	$("#u_n").removeClass("has-success");
	$("#u_n").removeClass("has-error");
	var check_username=new RegExp("[a-zA-Z]\\w{3,15}");
	if($("#username").val().match(check_username)!=$("#username").val()){
		$("#u_n").addClass("has-error");
		//alert("用户名必须字母开头，字母数字下划线组成，4-16个字符");
		return;
	}
	$("#u_n").addClass("has-success");
	return;
}
function password_check(){
	$("#u_p").removeClass("has-success");
	$("#u_p").removeClass("has-error");
	var check_password_easy_number=new RegExp("[0-9]{6,16}");
	var check_password_easy_letter=new RegExp("[a-zA-Z]{6,16}");
	if($("#password").val().length<6||$("#password").val().length>16){
		$("#u_p").addClass("has-error");
		//alert("密码长度限制为6-16位");
		return;
	}
	if($("#password").val().match(check_password_easy_number)==$("#password").val()){
		$("#u_p").addClass("has-error");
		//alert("密码不应为纯数字");
		return;
	}else if($("#password").val().match(check_password_easy_letter)==$("#password").val()){
		$("#u_p").addClass("has-error");
		//alert("密码不应为纯字母");
		return;
	}
	$("#u_p").addClass("has-success");
	return;
}