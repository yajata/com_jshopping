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
<div class="jshop order_menu uk-panel-box">
		<ul class="uk-breadcrumb uk-margin-bottom-remove" id="jshop_menu_order">
			<?php $i=0; ?> 
			<?php foreach($this->steps as $key => $step){?>
				<li class="num_step_<?php echo $i?>">
					<?php echo $step;?>
				</li>
			<?php $i++; ?>
			<?php }?>
		</ul>
</div>
<div class="nvg_clear"></div>