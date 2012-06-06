<h2>Dashboard</h2>

<hr class="chubby">

<div class="clearfix" style="position:relative;">	
	<div id="dashboard_modules">
		
		<div id="backups_module" class="item_module"> 
			<div class="item_module_title"> 
				Database Backup
			</div>
			<div class="item_module_box section"> 
				There are (0) backups
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
				<li>No popular items</li>				</ul>
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
			<td class="activity_action">
				<span class="activity backedup">Installed</span>			</td>
			<td class="activity_description">
				<div class="wrap">
				Directus install				</div>
			</td>
			<td class="activity_user text_right">
				by You			</td>
			<td class="activity_date" title="Apr 19th 2012, 4:41:42 am">
				2 days ago			</td>
		</tr>
					</tbody>
		</table>
		
	</div>
</div>