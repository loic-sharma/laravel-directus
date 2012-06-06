<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<title>Blog - Login to Directus</title>
	
	<link rel="shortcut icon" href="http://127.0.0.1:8080/directus/media/site/favicon.ico">

	<link rel="stylesheet" href="{{URL::to_asset('bundles/directus/css/directus.css')}}" type="text/css" media="screen" title="" charset="utf-8">
	<link rel="stylesheet" href="{{URL::to_asset('bundles/directus/css/colors/green.css')}}" type="text/css" media="screen" title="" charset="utf-8">

	<script type="text/javascript" src="{{URL::to_asset('bundles/directus/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{URL::to_asset('bundles/directus/js/jquery-ui.js')}}"></script>
	<script type="text/javascript" src="{{URL::to_asset('bundles/directus/js/directus.js')}}" id="base_path" base_path="{{URL::base()}}"></script>

	<script>
		var browser = navigator.appName;
		var b_version = navigator.appVersion;
		var version = parseFloat(b_version);

		if(browser == 'Microsoft Internet Explorer')
		{
			alert('You are using IE :(\n\nChrome/FireFox/Safari are the recommended browsers for Directus.\n\nYou can continue, but things may not be as pretty.');
		}

		else if(browser != 'Netscape')
		{
			alert('Chrome/FireFox/Safari are the recommended browsers for Directus.\n\nThank you.');
		}
	</script>
</head>

<body>
	
	<div id="alert_container">
		@if(count($errors->all()) > 0)
			<div class="alert_box">
				<div class="alert_box_message attention">
					<div class="alert_box_icon"></div>
			
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
	</div>
	
	<div id="toolbar">
		<div class="container clearfix">
			<div id="site_title">
				<span class="title">Blog</span>
				<a class="badge view_site" href="{{URL::base()}}" target="_blank">View Site</a>
			</div>
		</div>
	</div>
	<div id="login">
		{{$content}}

		<div id="login_footer">
			Powered by <a href="http://getdirectus.com">Directus (v5.1.b)</a>
		</div>
	</div>
</body>
</html>	