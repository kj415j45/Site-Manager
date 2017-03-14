<div class="container" id="admin_activities">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">活动管理</h1>
                <table class="table table-condensed table-striped table-hover">
                    <tbody>
                        <tr>
                            <td class="hidden-xs">ID</td>
                            <td>活动名称</td>
                            <td class="hidden-xs">发起人</td>
                            <td class="hidden-xs">开始时间</td>
							<td></td>
                        </tr>
						<?php
							require_once __DIR__."/sql_connect.php";
							SQL::SELECT("activities.id,activity_name,username,activity_describe,start_time,end_time",
							"activities,users",
							"activities.author_id = users.id",
							"ORDER BY activities.id");
							while($row=SQL::getResult()->fetch_assoc()){
								$assoc[]=$row;
							}
							$activities_count=count($assoc);
							for($i=$activities_count-1;$i>=0;$i--){
								$start_time=strtotime($assoc["$i"]["start_time"]);
								$end_time=strtotime($assoc["$i"]["end_time"]);
								$now=time();
								echo "<tr>";
								echo '<td class="hidden-xs">'.$assoc["$i"]['id']."</td>";
								echo "<td><a href=".$site_host."activity.php?id=".$assoc["$i"]['id'].">".$assoc["$i"]['activity_name']."</a>";
								if($now<$start_time){
									echo '<span class="label label-warning">即将开始</span>';
								}else if($now>$end_time){
									echo '<span class="label label-default">已结束</span>';
								}else{
									echo '<span class="label label-success">正在进行</span>';
								}
								echo "</td>";
								echo "<td>".$assoc["$i"]['username']."</td>";
								echo '<td class="hidden-xs">'.$assoc["$i"]['start_time']."</td>";
								echo '<td><big>';
								echo '<a href="edit_activity.php?id='.$assoc["$i"]['id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="编辑"></span></a>';
								echo ' <a class="text-danger" href="admin.php?delete_activity&id='.$assoc["$i"]['id'].'"><span class="glyphicon glyphicon-remove" aria-hidden="true" title="删除"></span></a>';
								echo '</big></td>';
								echo "</tr>";
							}
						?>
                    </tbody>
                </table>
		</div>
	</div>
</div>