<div class="fog"></div> 
	
<div class="modal_window" style="display:none;"> 
	<div class="modal_window_header" class="clearfix"> 
		Server details
		<a class="close_modal" href=""></a> 
	</div> 
	
	<div class="modal_window_content" id="phpinfo">
		
		<h2>Requirements</h2>
		<table border="0" cellpadding="3" width="600">
			<tbody>
				<tr><td class="e">Directus Path</td><td class="v">{{Bundle::path('directus')}}</td></tr>
				<tr><td class="e">Directus Version</td><td class="v">1.0</td></tr>
				<tr><td class="e">PHP Version</td><td class="v">{{phpversion()}}</td></tr>
				<tr><td class="e">MySQL Server</td><td class="v">{{$connection['host']}}</td></tr>
				<tr><td class="e">MySQL Database</td><td class="v">{{$connection['database']}}</td></tr>
				<tr><td class="e">MySQL Table Prefix</td><td class="v">{{(empty($connection['prefix'])) ? '<span class="quiet">None</span>' : $connection['prefix']}}</td></tr>
				<tr><td class="e">MySQL User</td><td class="v">{{$connection['username']}} <span class="quiet">({{($connection['password']) ? 'Using' : 'No'}} Password)</span></td></tr>
				<tr><td class="e">MySQL Version</td><td class="v">{{$mysql_version}}</td></tr>
				<tr><td class="e">MySQL</td><td class="v">{{(extension_loaded('mysql')) ? '<span class="green">On</span>' : '<span class="bright_red">Off</span>'}}</td></tr>
				<tr><td class="e">File Uploads</td><td class="v">{{(ini_get('file_uploads')) ? '<span class="green">On</span>' : '<span class="bright_red">Off</span>'}}</td></tr>
				<tr><td class="e">Session Autostart</td><td class="v">{{(ini_get('session.auto_start')) ? '<span class="bright_red">On</span>' : '<span class="green">Off</span>'}}</td></tr>
				<tr><td class="e">GD</td><td class="v">{{(extension_loaded('gd')) ? '<span class="green">On</span>' : '<span class="bright_red">Off</span>'}}</td></tr>
				<tr><td class="e">ZLIB</td><td class="v">{{(extension_loaded('zlib')) ? '<span class="green">On</span>' : '<span class="bright_red">Off</span>'}}</td></tr>
				<tr><td class="e">cURL</td><td class="v">{{(function_exists('curl_init')) ? '<span class="green">On</span>' : '<span class="bright_red">Off</span>'}}</td></tr>
				<tr><td class="e">Directus - Temp Folder</td><td class="v">{{(is_writable(path('storage').'directus'.DS.'temp'.DS)) ? '<span class="green">Writable</span>' : '<span class="bright_red">Read Only</span>'}} <span class="quiet">({{path('storage').'directus'.DS.'temp'.DS}})</span></td></tr>
				<tr><td class="e">Directus - Media Folder</td><td class="v">{{(is_writable(path('storage').'directus'.DS.'files'.DS)) ? '<span class="green">Writable</span>' : '<span class="bright_red">Read Only</span>'}} <span class="quiet">({{path('storage').'directus'.DS.'files'.DS}})</span></td></tr>
				<tr><td class="e">Directus - Thumb Folder</td><td class="v">{{(is_writable(path('storage').'directus'.DS.'thumbs'.DS)) ? '<span class="green">Writable</span>' : '<span class="bright_red">Read Only</span>'}} <span class="quiet">({{path('storage').'directus'.DS.'temp'.DS}})</span></td></tr>
				<tr><td class="e">Directus - Avatar Folder</td><td class="v">{{(is_writable(path('storage').'directus'.DS.'avatars'.DS)) ? '<span class="green">Writable</span>' : '<span class="bright_red">Read Only</span>'}} <span class="quiet">({{path('storage').'directus'.DS.'avatars'.DS}})</span></td></tr>
				<tr><td class="e">Directus - Backups Folder</td><td class="v">{{(is_writable(path('storage').'directus'.DS.'backups'.DS)) ? '<span class="green">Writable</span>' : '<span class="bright_red">Read Only</span>'}} <span class="quiet">({{path('storage').'directus'.DS.'backups'.DS}})</span></td></tr>
			</tbody>
		</table>
		
		<div class="pad_top">
			<a class="button pill" href="#" onclick="$('#phpinfo_extended').toggle(); return false;">Show extended details</a>
		</div>
		
		<div id="phpinfo_extended" style="display:none;">
			
			<h2 class="pad_top">Session Variables</h2>
			<table border="0" cellpadding="3" width="600">
				<tbody>
					@foreach($session as $key => $value)
						<tr>
							<td class="e">{{$key}}</td>
							<td class="v">
								@if(is_array($value))
									<pre><?php print_r($value); ?></pre>
								@else
									{{$value}}
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			 
			<span id="hide_logo">
				<h2 class="pad_top">PHP Info</h2>
				<span class="quiet block pad_bottom"><em>Below is a print out from phpinfo()</em></span>

				{{$phpinfo}}
			</span>
			
		</div>
	</div> 
</div>