<?php
	function youtube_embed($videoUrl){
		?>
		<div class="embed-responsive embed-responsive-16by9">
			<?php echo apply_filters('the_content', $videoUrl); ?>
		</div>
		<?php 
	}
	function youtube_thumb($videoUrl){
		parse_str( parse_url( $videoUrl, PHP_URL_QUERY ), $url_vars );
		echo '<img src="http://img.youtube.com/vi/'.$url_vars['v'].'/maxresdefault.jpg" alt=""/>';
	}
	
	function the_child_pages_menu() 
	{
		global $post;
		if($post->post_parent != 0){
			wp_list_pages("title_li=&child_of=".$post->post_parent."&depth=1&echo=1");
		}else{
			wp_list_pages("title_li=&child_of=".$post->ID."&depth=1&echo=1");
		};
	}
	
	function has_subpage()
	{
		global $post;
		if( is_page() && $post->post_parent){
		  $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
		}else{
		  $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
		};
		if($children){
		  return true;
		}else{
		  return false;
		};
	}
	function is_subpage()
	{	
		global $post;
		if( $post->post_parent == 0)
		{
			return false;
		}else {
			return true;
		}
	}
		
	function get_post_first_term($taxonomy) 
	{
		global $post;
		$terms = get_the_terms( $post->ID, $taxonomy );
		$show = true;
		foreach ($terms as $term) {
		if ($show) return $term->slug;
		$show = false;
		}
	}
	
	function the_date_tag()
	{
		?>
			<time datetime="<?php echo get_the_date('Y'); ?>-<?php echo get_the_date('m'); ?>-<?php echo get_the_date('d'); ?>"><?php echo get_the_date('d/m/Y'); ?></time>
		<?php
	}
	
	function the_taxonomy_name()
	{
		echo get_queried_object()->name; 
	}
	
	function get_slug($id) {
		$post_data = get_post($id, ARRAY_A);
		$slug = $post_data['post_name'];
		return $slug;
	}
	
	function list_post_attachments_gallery($id , $n=-1)
	{
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => $n,
			'post_status' => null,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_mime_type' => 'image/jpeg',
			'post_parent' => $id
		);
		$attachments = get_posts($args);
		if ($attachments):
		?>
			<ul class="gallery">
				<?php foreach ($attachments as $attachment): ?>
					<li>
						<a href="<?php echo wp_get_attachment_url($attachment->ID);?>"  rel = "lightbox" title="<?php echo $attachment->post_excerpt ?>"><img src="<?php echo wp_get_attachment_thumb_url($attachment->ID)?>" /></a>
					</li>
				<?php endforeach; ?>
				<div class="clear"></div>
			</ul>
					
			<?php endif;
	}
	
?>