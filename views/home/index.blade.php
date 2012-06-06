<h2>Dashboard</h2>

<hr class="chubby">

<div class="clearfix" style="position:relative;">	
	<div id="dashboard_modules">
		
		<div id="backups_module" class="item_module"> 
			<div class="item_module_title"> 
				Database Backup
			</div>
			<div class="item_module_box section"> 
				There are ({{$backups}}) backups
			</div>
			<div class="item_module_box"> 
				<input id="create_backup" class="button color pill" type="button" value="Create New Backup"> 
			</div> 
		</div>
		
		<div id="popular_items" class="item_module"> 
			<div class="item_module_title"> 
				Popular Items
			</div>
			<div class="item_module_box">
				<ul class="item_module_list">
					<li>No popular items</li>
				</ul>
			</div>
		</div>
		
		<div id="directus_notifications" class="item_module"> 
			<div class="item_module_title"> 
				Directus Notifications
			</div>
			<div class="item_module_box"> 
				There are currently no notifications
			</div>
		</div>
	</div>
	
	<div id="dashboard_activity">
		<h3>Activity</h3>
		<table id="activity">
			<tbody>			
				<tr>
					<td class="activity_action"><span class="activity edited">Edited</span></td>
					<td class="activity_description">
						<div class="wrap"><a href="edit.php?table=posts&item=2" title="1">1</a> within Posts</div>
					</td>
					<td class="activity_user text_right">by You</td>
					<td class="activity_date" title="Jun 1st 2012, 3:46:12 am">40 minutes ago</td>
				</tr>
				<tr>
					<td class="activity_action"><span class="activity edited">Edited</span></td>
					<td class="activity_description">
						<div class="wrap"><a href="edit.php?table=posts&item=2" title="1">1</a> within Posts</div>
					</td>
					<td class="activity_user text_right">by You</td>
					<td class="activity_date" title="Jun 1st 2012, 3:44:37 am">42 minutes ago</td>
				</tr>
				<tr>
					<td class="activity_action">
						<span class="activity added">Added</span>			</td>
			<td class="activity_description">
				<div class="wrap">
				<a href="edit.php?table=posts&item=2" title="1">1</a> within Posts				</div>
			</td>
			<td class="activity_user text_right">
				by You			</td>
			<td class="activity_date" title="Jun 1st 2012, 3:44:23 am">
				42 minutes ago			</td>
		</tr>

				<tr>
			<td class="activity_action">
				<span class="activity media">Uploaded</span>			</td>
			<td class="activity_description">
				<div class="wrap">
				<a href="#" class="open_media" media_id="1">VGHS Episode #3</a> within Directus Media				</div>
			</td>
			<td class="activity_user text_right">
				by You			</td>
			<td class="activity_date" title="Jun 1st 2012, 12:12:40 am">
				4 hours ago			</td>
		</tr>
				<tr>
			<td class="activity_action">
				<span class="activity system">Installed</span>
				</td>
			<td class="activity_description">
				<div class="wrap">
				Directus install				</div>
			</td>
			<td class="activity_user text_right">
				by You			</td>
			<td class="activity_date" title="Jun 1st 2012, 12:06:54 am">
				4 hours ago			</td>
		</tr>
					</tbody>
		</table>
		
	</div>
</div>