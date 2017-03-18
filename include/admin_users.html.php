<div class="container hidden" id="admin_users">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">用户管理</h1>
            <table class="table table-condensed table-striped table-hover">
                <tbody>
                    <tr>
                        <td class="hidden-xs">ID</td>
                        <td>用户名</td>
                        <td></td>
                    </tr>
                    <?php
                        require_once 'utils.php';
                        $assoc = getUsers();
                        $n=count($assoc);
                        for($i=0;$i<$n;$i++){
                            echo '<tr>';
                            echo '<td class="hidden-xs">'.$assoc[$i]['id'].'</td>';
                            echo '<td><a href="userinfo.php?user='.$assoc[$i]['username'].'">'.$assoc[$i]['username'].'</a></td>';
                            echo '<td>	<big>';
                            echo '<a href="edit_userinfo.php?user_id='.$assoc[$i]['id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="编辑"></span></a>';
                            echo ' <a class="text-danger" onClick="deleteUser('.$assoc[$i]['id'].',\''.$assoc[$i]['username'].'\');"><span class="glyphicon glyphicon-remove" aria-hidden="true" title="删除"></span></a>';
                            echo '</big></td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
	function deleteUser(id,name){
		if(confirm("你确认要删除用户: "+name+" ("+id+") 及其所有活动吗?")){
			window.location.href="admin.php?delete_user&id="+id;
		}
	}
</script>