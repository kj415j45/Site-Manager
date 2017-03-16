<div class="container hidden" id="admin_sites">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">场地管理
				<small>
					<div class="pull-right">
						<a class="btn btn-primary " href="edit_site.php" role="button">
							<span class="glyphicon glyphicon-plus"></span> 
							<span class="hidden-xs">新建场地</span>
						</a>
					</div>
				</small>
			</h1>
            <table class="table table-condensed table-striped table-hover">
                <tbody>
                    <tr>
                        <td class="hidden-xs">ID</td>
                        <td>场地名称</td>
                        <td></td>
                    </tr>
                    <?php
                        $get_by_admin=true;
                        require_once 'get_sites.php';
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
	function deleteSite(id,name){
		if(confirm("你确认要删除场地: "+name+" ("+id+") 和它的所有活动吗?")){
			window.location.href="admin.php?delete_site&id="+id;
		}
	}
</script>