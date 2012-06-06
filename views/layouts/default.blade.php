<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex">
	
	<title>Blog - Dashboard</title>
	
	<link rel="shortcut icon" href="http://127.0.0.1:8080/directus/media/site/favicon.ico">
	
	<link rel="stylesheet" href="{{URL::to_asset('bundles/directus/css/directus.css')}}" type="text/css" media="screen" title="" charset="utf-8">
	<link rel="stylesheet" href="{{URL::to_asset('bundles/directus/css/colors/green.css')}}" type="text/css" media="screen" title="" charset="utf-8">

	@if($data_table)
		<link rel="stylesheet" href="{{URL::to_asset('bundles/directus/css/data-table.css')}}" type="text/css" media="screen" title="" charset="utf-8">
	@endif

	<script type="text/javascript" src="{{URL::to_asset('bundles/directus/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{URL::to_asset('bundles/directus/js/jquery-ui.js')}}"></script>

	@if($data_table)
		<script type="text/javascript" src="{{URL::to_asset('bundles/directus/js/jquery.data-tables.js')}}"></script>
	@endif
	<script type="text/javascript" src="{{URL::to_asset('bundles/directus/js/directus.js')}}" id="base_path" base_path="{{URL::to()}}"></script>
</head>

<body>
	
	<!-- Media Dropzone -->
	
	<form id="media_dropzone" target="iframe" action="inc/upload.php" method="post" enctype="multipart/form-data" name="media_dropzone_form" style="position:absolute; top:0px; left:0px; width:0px; height:0px; opacity:0.1; filter:alpha(opacity=10); background-color:#2F2F2F; z-index:9999999; display:none;">
		<input type="hidden" id="media_dropzone_type" name="type" value="inline|relational">
		<input type="hidden" id="media_dropzone_parent_item" name="parent_item" value="id_of_parent">
		<input type="hidden" id="media_dropzone_extensions" name="extensions" value="jpg,gif,png,etc">
		<input type="file" id="media_dropzone_input" name="upload_media[]" class="short" multiple="multiple" style="position:absolute; top:0px; left:0px; width:100%; height:100%; opacity:0.0; filter:alpha(opacity=0);">
	</form>
	
	<iframe width="0" height="0" id="iframe" name="iframe" src="" scrolling="no" style="position:fixed; top:0px; left:0px; width:0px; height:0px; border:0px solid #cccccc;"></iframe>
	
	<!-- Modal Windows -->
	
	<div id="modal_current_level">0</div>
	
	<!-- Dialog Windows -->
	
	<div id="dialog_window" class="hide"></div>
	
	<!-- Alert Windows -->
	
	<div id="throbber_preload"></div>
	<div id="alert_container">
			</div>
	
	<!-- Hat -->
	
	<div id="toolbar">
		<div class="container clearfix">

			<div id="site_title">
				<span class="title">Blog</span>
				<a class="badge view_site" href="<?php echo URL::to(); ?>" target="_blank">View Site</a>			</div>

			<ul id="user_nav" class="clearfix">
				<li id="throbber"><img src="{{URL::to_asset('bundles/directus/img/throbber.gif')}}" width="16" height="16" /></li>
				<li><img class="user_avatar" src="http://www.gravatar.com/avatar/{{Directus\Auth::user()->gravatar_hash}}?d=identicon&s=50" width="16" height="16"> <span class="username" title="You">{{Directus\Auth::user()->first_name}}</span></li>
				<li><a href="{{URL::to('directus/messages')}}"><span>Inbox</span></a></li>
				<li><a href="{{URL::to('directus/user/settings')}}">User Settings</a></li>
				<li><a href="{{URL::to('directus/logout')}}" class="now_activity" activity="logging_out">Logout</a></li>
			</ul>

		</div>
	</div>
	
	<!-- Tabs -->
	
	<div id="main_nav" class="clearfix">
		<div class="container">
			<div class="clearfix">
				<ul>
					<li><a {{$is_current_page()}} href="{{URL::to('directus')}}"><span>Dashboard</span></a></li>
					<li><a {{$is_current_page('tables')}} href="{{URL::to('directus/tables')}}"><span>Tables<span class="badge count">{{Directus\Table::count()}}</span></span></a></li>
					<li><a {{$is_current_page('media')}} href="{{URL::to('directus/media')}}"><span>Media<span class="badge count">0</span></span></a></li>
					<li><a {{$is_current_page('users')}} href="{{URL::to('directus/users')}}"><span>Users<span class="badge count">{{Directus\User::count()}}</span></span></a></li>
					<li><a {{$is_current_page('settings')}} href="{{URL::to('directus/settings')}}"><span>Settings</span></a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<!-- Page Content -->
	
	<div id="content">
		<div class="container">
			<div id="page">
				<?php echo $content; ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div id="footer">
			Powered by <a href="http://getdirectus.com">Directus</a>
		</div>
	</div>
	
</body>

</html>