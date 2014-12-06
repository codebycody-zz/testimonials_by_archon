<?php
	function insert_testimonial($content, $author){

	}
?>

<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Testimonials by Archon options</h2>
	
	<div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
		
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">
					
					<div class="postbox">
					
						<h3><span>Let's Get Started!</span></h3>
						<div class="inside">
							<form method="post" action="">
								<table class="form-table">
									<tr>
										<td>
											<label for="testimonial_content">Testimonial Content</label>
										</td>
										<td>
											<textarea name="testimonial_content" id="testimonial_content" type="text" value="" class="regular-text" cols="37"></textarea>
										</td>
									</tr>
									<tr>
										<td>
											<label for="testimonial_author">Testimonial Author</label>
										</td>
										<td>
											<input name="testimonial_author" id="testimonial_author" type="text" value="" class="regular-text" cols="37" />
										</td>
									</tr>
								</table>
								<p>
									<input class="button-primary" type="submit" name="testimonial_submit" value="Save" /> 
								</p>
							</form>
						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->

					<div class="postbox">
					
						<h3><span>Most Recent Testimonial</span></h3>
						<div class="inside">
							<ul>
							<li>
								<?php echo do_shortcode('[tesimonial]'); ?>
							</li>
							</ul>
						</div> <!-- .inside -->
					
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->
			
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
				
				<div class="meta-box-sortables">
					
					<div class="postbox">
					
						<h3><span>Shortcode exsamples</span></h3>
						<div class="inside">
							<p>[tesimonial id="5"]</p>
							<?php echo do_shortcode('[tesimonial id=1]'); ?>
							<p>[tesimonial]</p>
							<?php echo do_shortcode('[tesimonial]'); ?>
						</div> <!-- .inside -->
						
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables -->
				
			</div> <!-- #postbox-container-1 .postbox-container -->
			
		</div> <!-- #post-body .metabox-holder .columns-2 -->
		
		<br class="clear">
	</div> <!-- #poststuff -->
	
</div> <!-- .wrap -->