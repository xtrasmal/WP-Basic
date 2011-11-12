<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
<div class="topmetabox">
	<div class="factuurinfo">
		<div class="infobox">
			<h4>Factuurnr</h4>
		</div>
		<div class="infobox">
			<h4>Samenvatting</h4>
		</div>			
		<div class="infobox">
			<h4>Factuur</h4>
		</div>	
	</div>
	<div class="factuurinput">
		<?php while($mb->have_fields_and_multi('docs')): ?>
		<?php $mb->the_group_open(); ?>
			<?php $mb->the_field('factuururl'); ?>
			<?php $wpalchemy_media_access->setGroupName('factuur-n'. $mb->get_the_index())->setInsertButtonLabel('Invoegen')->setTab('type'); ?>
			
			<div class="monkey"><input type="text" name="<?php $mb->the_name('factuurnr'); ?>" value="<?php $mb->the_value('factuurnr');?>"/></div>
			<div class="monkey"><input type="text" name="<?php $mb->the_name('samenvatting'); ?>" value="<?php $mb->the_value('samenvatting');?>"/></div>
			<div class="monkey"><?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?></div>
			<div class="monkeytwo"><?php echo $wpalchemy_media_access->getButton(array('label' => 'Factuur')); ?></div>
			<div class="monkeytwo"><a href="#" class="dodelete button">Minder</a></div>

		<?php $mb->the_group_close(); ?>
		<?php endwhile; ?>
	</div>
</div>	
 	<a href="#" class="docopy-docs button">Meer</a>
</div>