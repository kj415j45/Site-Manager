function username_check(){
	$("#u_n").removeClass("has-success");
	$("#u_n").removeClass("has-error");
	$("#notice").empty();
	var check_username=new RegExp("[a-zA-Z]\\w{3,15}");
	if($("#username").val().length==0){
		$("#u_n").addClass("has-error");
		$("#notice").append('<div class="alert alert-danger text-center" role="alert">用户名不能为空</div>');
		return false;
	}
	if($("#username").val().match(check_username)!=$("#username").val()){
		$("#u_n").addClass("has-error");
		$("#notice").append('<div class="alert alert-danger text-center" role="alert">用户名必须字母开头，字母数字下划线组成，4-16个字符</div>');
		return false;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
	    if(xmlhttp.readyState==4&&xmlhttp.status==200){
			if(xmlhttp.responseText==$("#username").val()){
				$("#u_n").removeClass("has-success");
				$("#u_n").removeClass("has-error");
				$("#notice").empty();
				$("#u_n").addClass("has-error");
				$("#notice").append('<div class="alert alert-danger text-center" role="alert">用户名已存在</div>');
				return false;
			}else{
				$("#u_n").addClass("has-success");
				return true;
			}
	    }
	}
	xmlhttp.open("GET","regist.php?check_username="+$("#username").val(),true);
	xmlhttp.send();
}
function password_check(){
	$("#u_p").removeClass("has-success");
	$("#u_p").removeClass("has-error");
	$("#notice").empty();
	var check_password_easy_number=new RegExp("[0-9]{6,16}");
	var check_password_easy_letter=new RegExp("[a-zA-Z]{6,16}");
	if($("#password").val().length<6||$("#password").val().length>16){
		$("#u_p").addClass("has-error");
		$("#notice").append('<div class="alert alert-danger text-center" role="alert">密码长度限制为6-16位</div>');
		return false;
	}
	if($("#password").val().match(check_password_easy_number)==$("#password").val()){
		$("#u_p").addClass("has-error");
		$("#notice").append('<div class="alert alert-danger text-center" role="alert">密码不应为纯数字</div>');
		return false;
	}else if($("#password").val().match(check_password_easy_letter)==$("#password").val()){
		$("#u_p").addClass("has-error");
		$("#notice").append('<div class="alert alert-danger text-center" role="alert">密码不应为纯字母</div>');
		return false;
	}
	$("#u_p").addClass("has-success");
	return true;
}
function confirm_password_check(){
	$("#c_u_p").removeClass("has-success");
	$("#c_u_p").removeClass("has-error");
	$("#notice").empty();
	if($("#confirm_password").val()!=$("#password").val()){
		$("#c_u_p").addClass("has-error");
		$("#notice").append('<div class="alert alert-danger text-center" role="alert">两次输入的密码不相同</div>');
		return false;
	}
	$("#c_u_p").addClass("has-success");
	return true;
}
function login(){
	$("#notice").empty();
	$("#notice").append('<div class="alert alert-info text-center" role="alert">登录中...</div>');
	document.getElementById("md5password").value=hex_md5(document.getElementById("password").value);
	document.getElementById("password").disabled=true;
	document.login_form.submit();
}
function regist(){
	$("#notice").empty();
	$("#notice").append('<div class="alert alert-info text-center" role="alert">注册中...</div>');
	if(username_check()&&password_check()&&confirm_password_check()){
		document.getElementById("md5password").value=hex_md5(document.getElementById("password").value);
		document.getElementById("password").disabled=true;
		document.login_form.submit();
	}
}