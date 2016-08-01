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
					<p>General instructions for using the publications.ucf.edu WordPress site.  Last updated 8/1/2016.</p>
					<p><strong>Get the URL of the publication on issuu:</strong></p>
					<ol>
						<li>Upload the publication to Issuu.</li>
						<li>
							Navigate to the individual publication.
							<br>
							You can do this by logging into Issuu, clicking "Publisher Tools" at the top
							of the page, and clicking the name or thumbnail of the publication.  Alternatively, you can click on the publication listed
							on <a href="http://issuu.com/universityofcentralflorida" target="_blank">UCF's landing page on Issuu.</a>
						</li>
						<li>
							Simply <strong>copy the URL in your browser's address bar.</strong>
							<br>
							Alternatively, on the individual publication page, scroll down just below the embedded publication, and click the "Share" link, then copy the direct link provided.
							<br>
							<strong>Note: you no longer have to copy an embed code from issuu!</strong> All you need is the URL of the publication on issuu.
						</li>
					</ol>
<br>
					<p><strong>Add the publication to WordPress:</strong></p>
					<ol>
						<li>Log into publications.ucf.edu. Once logged in, locate 'Pub Editions' in the left-hand menu, and click 'Add New'.
						<li>First, in the 'Pub. Edition Fields' box underneath the text editor, paste the publication's url into the "issuu URL of publication" field. <strong>Leave the other fields in this box blank;</strong> they will be populated automatically for you.</li>
						<li>In the box to the bottom-right labeled 'Publications', scroll and locate the name of the publication you'd like to add the new pub edition to.  Click the checkbox next to it. You should only check one publication name here. If this is a new piece that does not yet exist on the site, you can create a new one by clicking '+Add New Publication', typing a name, and clicking the 'Add New Publication' button below.</li>
						<li>In the 'Categories' box, select the categor(ies) relevant to the pub edition. Assuming this isn't a new type of publication, you should use the same categories that the previous pub edition is tagged with.  Not doing so can mess up the list of publications by category on the front end. You can check for these categories easily by locating the publication on the front end and noting where the publication is 'Found in.'</li>
						<li>Add a title for the pub edition. The naming convention here should be the name of the publication and what year/season/month it was released; i.e. "2011-2012 Transfer Viewbook"</li>
						<li>If you want to designate a specific publication date, locate the 'Publish immediately' label in the 'Publish' box. Click the 'Edit' link next to it, and pick the date that the publication was originally published. Not setting a specific date here will default to the current day/time.</li>
						<li>When you're finished, click the blue 'Publish' button.</li>
					</ol>
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
				</li>

			</ul>
		</div>
	</div>
</div>
