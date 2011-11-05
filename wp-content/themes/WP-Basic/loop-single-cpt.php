<div class="container">
<div class="col">
<h2 style="padding-bottom:20px"><?php the_title(); ?></h2>

<?php while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $agendaFlyer = get_post_meta($post->ID, 'agendaFlyer', true);?>
		<?php $agendaDatum = get_post_meta($post->ID, 'agendaDatum', true);?>
		<?php $agendaLocatie = get_post_meta($post->ID, 'agendaLocatie', true);?>
		<?php $agendaTijd = get_post_meta($post->ID, 'agendaTijd', true);?>
		<?php $agendaBeschrijving = get_post_meta($post->ID, 'agendaBeschrijving', true);?>	
		<?php $agendaVoorbij = get_post_meta($post->ID, 'agendaVoorbij', true);?>			
		<?php if ($agendaVoorbij != 1){ ?>
			<div class="agenda-content">
			<a style="text-decoration:none;color:#000;font-weight:bold" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<table style="width:100%;font-size:0.7em">
				<tr>
					<td style="width:200px;padding:10px;background:#ccc"><?php the_title(); ?><td>
					<td style="text-align:left;padding:10px 0px 10px 10px;width:170px"><?php echo $agendaLocatie; ?><td>
					<td style="text-align:left;padding:10px 0px;width:145px"><?php echo $agendaDatum; ?><td>
					<td style="text-align:left;padding:10px 0px"><?php echo $agendaTijd; ?><td>
				</tr>
			</table>		
			</a>
			</div><!-- .agenda-content -->
			<div class="flyerbox">
			<?php echo wp_get_attachment_image( $agendaFlyer, full ); ?>
			</div>
			<div class="agendaDesc">
			<p>
				<?php echo $agendaBeschrijving; ?>
			</p>
			</div>
		</div><!-- #post-## -->				
		<?php }; ?>
<?php endwhile;?>
</div><!-- endcol -->				
</div><!-- endcontainer -->				
