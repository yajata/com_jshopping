<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Nevigen.com
* @website http://nevigen.com/
* @email support@nevigen.com
* @copyright Copyright © Nevigen.com. All rights reserved.
* @license Proprietary. Copyrighted Commercial Software
* @license agreement http://nevigen.com/license-agreement.html
**/

defined('_JEXEC') or die;
?>
<?php
if (count ($this->demofiles)){?>
	<div class="list_product_demo uk-panel">
		<h3><?php echo "ИНСТРУКЦИЯ ПО НАКЛЕИВАНИЮ ПАНЕЛЕЙ ПВХ";?></h3>
		<ul class="uk-grid uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-1 uk-button uk-button-middle">
			<?php foreach($this->demofiles as $demo){?>
				<li>            
					<?php if ($this->config->demo_type == 1) { ?>
						<div class="download">
							<a data-uk-lightbox data-uk-tooltip  href="<?php echo $this->config->demo_product_live_path."/".$demo->demo;?>" title="<?php echo _JSHOP_DOWNLOAD ?>" >
								<i class="uk-icon-play-circle"></i> <span class="descr"><?php echo $demo->demo_descr?></span> 
							</a>
						</div>
					<?php } else { ?>
						<div class="download">
							<a target="_blank" href="<?php echo $this->config->demo_product_live_path."/".$demo->demo;?>" data-uk-tooltip title="<?php echo _JSHOP_DOWNLOAD ?>">
								<i class="uk-icon-large uk-icon-download"></i> <span class="descr"><?php echo $demo->demo_descr?></span>
							</a>
						</div>
					<?php }?>
				</li>
			<?php }?>
		</ul>
	</div>
<?php } ?>