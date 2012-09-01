<?php 
/**
 * Template Name: Blog - Left Sidebar
 */
get_header();?>
<?php include (TEMPLATEPATH.'/get-option.php');?>
	    <div id="page">
            <div id="container">
                <div class="page-wrapper">
            		<div class="page-w600-right">
						<div class="last-port-title">
							<h3 class="cufon"><?php the_title();?></h3>		
						</div>
			<!-- get Cat ID -->
			<?php $cat_id = get_post_meta($post->ID, "cat-id-blog", true); ?>
			<?php  $blog_num = get_post_meta($post->ID, "blog-item-number", true); ?>
			<?php	query_posts('showposts='.$blog_num.'&cat='.get_cat_ID(htmlspecialchars($cat_id)).'&paged='.$paged)?>
				 	<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post();?>	
							<div class="blog-sidebar-wrapper">				
									<!-- post container -->
										
										<?php  
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_src($image_id,'large', true);
												$video_type = get_post_meta($post->ID, "video-type", true);
												$video_id = get_post_meta($post->ID, "video-id", true);
										?>
									
									
									<?php if($video_type !=  "No video" && $video_id != ""):?>
										<?php echo videoThumbnail( '700', '255',$video_type, $video_id );?>
									<?php elseif($image_id!=null):?>	
												<div class="frame h255 alignleft relative">
										
												<a href="<?php the_permalink();?>" class="hover">
														<img src="<?php echo get_template_directory_uri(); ?>/scripts/timthumb.php?src=<?php echo $image_url[0] ;?>&amp;h=255&amp;w=700&amp;zc=1" alt="<?php the_title(); ?>" />
												</a>
											
												
											</div>		
									<?php endif ?>
									
																	
								<div class="blog-detail-wrapper">	
									<?php getPostDate();?>
									<div class="blog-excerpt-wrapper">
										<!-- Title -->
											<div class="title-wrapper">
												<div class="title">
													<h4>
														<a href="<?php the_permalink();?>">
															<?php the_title();?>
														</a>
													</h4>
												</div>
											</div>			
											<?php singlePostDate();?>		
										<div class="blog-sidebar-content">																
												<div class="meta-left-full">								
													<?php echo mb_substr(get_the_excerpt(),0,270)."...";?>
												</div>
												
										<?php //end blog sidebar content ?>
										</div>
									<?php //end blog-excerpt-wrapper ?>
									</div>	
								<?php //end blog-detail-wrapper ?>
								</div>
							<?php //end blog-sidebar-wrapper?>
							</div>
							<div class="space h20"></div>
						<?php endwhile?>
					<?php endif ?>
               
				<?php if (function_exists("pagination")) {
						pagination();
				} ?>
            </div>
                    <?php get_sidebar('blog-left')?>    
					
                </div>
            </div>
        </div>
<?php get_footer();?>