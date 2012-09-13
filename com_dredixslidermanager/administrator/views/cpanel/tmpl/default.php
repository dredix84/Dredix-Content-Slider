<?php 


defined('_JEXEC') or die('Restricted access'); ?>

<table class="adminform">
	<tr>
		<td width="55%" valign="top">
			<div id="cpanel">
			<div style="float:left;">
				<div class="icon">
					<a href="index.php?option=com_categories&extension=com_dredixslidermanager">
						<?php echo JHTML::_('image.administrator', 'icon-48-category.png', '/components/com_dredixslidermanager/assets/', null, null, JText::_('COM_DREDIXSLIDERMANAGER_SUBMENU_CATEGORIES') ); ?>
						<span><?php echo JText::_('COM_DREDIXSLIDERMANAGER_SUBMENU_CATEGORIES'); ?></span>
					</a>
				</div>
			</div>
			<div style="float:left;">
				<div class="icon">
					<a href="index.php?option=com_dredixslidermanager&view=items">
						<?php echo JHTML::_('image.administrator', 'icon-48-slides.png', '/components/com_dredixslidermanager/assets/', null, null, JText::_('COM_DREDIXSLIDERMANAGER_SUBMENU_SLIDES') ); ?>
						<span><?php echo JText::_('COM_DREDIXSLIDERMANAGER_SUBMENU_SLIDES'); ?></span>
					</a>
				</div>
			</div>
			<div style="float:left;">
				<div class="icon">
					<a href="index.php?option=com_categories&view=category&layout=edit&extension=com_dredixslidermanager">
						<?php echo JHTML::_('image.administrator', 'icon-48-category-add.png', '/components/com_dredixslidermanager/assets/', null, null, JText::_('COM_DREDIXSLIDERMANAGER_NEW_CATEGORY') ); ?>
						<span><?php echo JText::_('COM_DREDIXSLIDERMANAGER_NEW_CATEGORY'); ?></span>
					</a>
				</div>
			</div>
			<div style="float:left;">
				<div class="icon">
					<a href="index.php?option=com_dredixslidermanager&view=item&layout=edit">
						<?php echo JHTML::_('image.administrator', 'icon-48-slide-add.png', '/components/com_dredixslidermanager/assets/', null, null, JText::_('COM_DREDIXSLIDERMANAGER_NEW_SLIDE') ); ?>
						<span><?php echo JText::_('COM_DREDIXSLIDERMANAGER_NEW_SLIDE'); ?></span>
					</a>
				</div>
			</div>
			<div style="float:left;">
				<div class="icon">
					<a href="http://www.dredix.net" target="_blank">
						<?php echo JHTML::_('image.administrator', 'icon-48-help.png', '/components/com_dredixslidermanager/assets/', null, null, JText::_('COM_DREDIXSLIDERMANAGER_DOCUMENTATION') ); ?>
						<span><?php echo JText::_('COM_DREDIXSLIDERMANAGER_DOCUMENTATION'); ?></span>
					</a>
				</div>
			</div>
			
			<div style="clear: both;" ></div>
		</div>
		</td>
	</tr>
</table>

<?php echo DREDIXSLIDERMANAGERFOOTER; ?>