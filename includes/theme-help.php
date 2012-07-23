<div id="theme-help" class="i-am-a-fancy-admin">
	<div class="container">
		<h2>Help</h2>
		
		<?php if ($updated):?>
		<div class="updated fade"><p><strong><?=__( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>
		
		<div class="sections">
			<ul>
				<li class="section"><a href="#posting">Posting</a></li>
				<li class="section"><a href="#shortcodes">Shortcodes</a></li>
			</ul>
		</div>
		<div class="fields">
			<ul>
				
				<li class="section" id="posting">
					<h3>Posting</h3>
					<p>General instructions for using the publications.ucf.edu WordPress site</p>
					<p><strong>Get the embed code:</strong>
					<ol>
						<li>Upload the publication to Issuu. After uploading, go to the UCF Issuu Library (after logging into Issuu, in the top-right-hand corner, hover over our username and select 'My Library') and locate the publication you uploaded. Hover over the publication's thumbnail and click 'Open'.</li>
						<li>On this page, you'll see a small embed code with the publication's description and various sharing options. Directly under the publication embed, look for the icon with the brackets "< >" that says 'Get Embed Code.' Click it; a modal window will appear. To the left, click the 'WordPress' link. Right-click + copy the code in the text area directly underneath 'Get the embed code.'</li></ol>
<br>
					<p><strong>Add the publication to WordPress:</strong></p>					
						<ol>
						<li>Log into the new publications.ucf.edu WordPress site. Once logged in, locate 'Pub Editions' in the left-hand menu, and click 'Add New'.
						<li>First, in the 'Issuu Pub' box underneath the text editor, paste the code from Issuu that you just copied.</li>
						<li>In the box to the bottom-right labeled 'Publications', scroll and locate the name of the publication you'd like to add the new pub edition to.  Click the checkbox next to it. You should only check one publication name here. If this is a new piece that does not yet exist on the site, you can create a new one by clicking '+Add New Publication', typing a name, and clicking the 'Add New Publication' button below.</li>
						<li>In the 'Categories' box, select the categor(ies) relevant to the pub edition. Assuming this isn't a new type of publication, you should use the same categories that the previous pub edition is tagged with.  Not doing so can mess up the list of publications by category on the front end. You can check for these categories easily by locating the publication on the front end and noting where the publication is 'Found in.'</li>
						<li>Add a title for the pub edition. The naming convention here should be the name of the publication and what year/season/month it was released; i.e. "2011-2012 Transfer Viewbook"</li>
						<li>If you want to designate a specific publication date, locate the 'Publish immediately' label in the 'Publish' box. Click the 'Edit' link next to it, and pick the date that the publication was originally published. Not setting a specific date here will default to the current day/time.</li>
						<li>When you're finished, click the blue 'Publish' button.</li>
					</ol>
					</p>
				</li>
				
				<li class="section" id="shortcodes">
					<h3>Shortcodes</h3>
					
					<h4>slideshow</h4>
					<p>Create a javascript slideshow of each top level element in the shortcode.  All attributes are optional, but may default to less than ideal values.  Available attributes:</p>
					<table>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th scope="col">Default Value</th>
						</tr>
						<tr>
							<td>height</td>
							<td>CSS height of the outputted slideshow</td>
							<td>100px</td>
						</tr>
						<tr>
							<td>width</td>
							<td>CSS width of the outputted slideshow</th>
							<td>100%</td>
						</tr>
						<tr>
							<td>transition</td>
							<td>Length of transition in milliseconds</td>
							<td>1000</td>
						</tr>
						<tr>
							<td>cycle</td>
							<td>Length of each cycle in milliseconds</td>
							<td>5000</td>
						</tr>
						<tr>
							<td>animation</td>
							<td>The animation type, one of: 'slide' or 'fade'</td>
							<td>slide</td>
						</tr>
					</table>
					<p>Example:
<pre><code>[slideshow height="500px" transition="500" cycle="2000"]
&lt;img src="http://some.image.com" .../&gt;
&lt;div class="robots"&gt;Robots are coming!&lt;/div&gt;
&lt;p&gt;I'm a slide!&lt;/p&gt;
[/slideshow]</code></pre>
					
					<h4>document-list</h4>
					<p>Outputs a list of {$plural} filtered by arbitrary taxonomies, for example a tag
					or category.  A default output for when no objects matching the criteria are
					found.</p>
					<p>Example:</p>
<pre><code># Output a maximum of 5 items tagged foo or bar, with a default output.
[{$scode} tags="foo bar" limit="5"]No {$plural} were found.[/{$scode}]

# Output all objects categorized as foo
[{$scode} categories="foo"]

# Output all objects matching the terms in the custom taxonomy named foo
[{$scode} foo="term list example"]

# Outputs all objects found categorized as staff and tagged as small.
[{$scode} limit="5" join="and" categories="staff" tags="small"]</code></pre>
				</li>
				
			</ul>
		</div>
	</div>
</div>