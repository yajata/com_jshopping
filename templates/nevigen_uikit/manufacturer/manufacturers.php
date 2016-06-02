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
<?php if ($this->params->get('show_page_heading') && $this->params->get('page_heading')) {?>    
	<div class="shophead<?php echo $this->params->get('pageclass_sfx');?>">
		<h1><?php echo $this->params->get('page_heading')?></h1>
	</div>
	<?php }?>
	<div class="jshop" id="comjshop">
		<?php echo $this->manufacturer->description?>

		<?php if (count($this->rows)){?>
		<div class="jshop_list_manufacturer">
			<div class="jshop">
				<?php foreach($this->rows as $k=>$row){?>
					<?php if ($k%$this->count_manufacturer_to_row==0) {?> <div class="uk-grid" data-uk-grid-match="{target:'.uk-panel-box'}"> <?php };?>
					<div class="jshop_categ uk-width-large-1-<?php echo $this->count_manufacturer_to_row?> uk-width-small-1-1">
					  <div class="manufacturer uk-panel uk-panel-box">
						 <div>
						   <div class="image">
								<a href="<?php echo $row->link;?>"><img class="uk-thumbnail jshop_img" src="<?php echo $this->image_manufs_live_path;?>/<?php if ($row->manufacturer_logo) echo $row->manufacturer_logo; else echo $this->noimage;?>" alt="<?php echo htmlspecialchars($row->name);?>" /></a>
						   </div>
						   <div>
							   <a class="product_link" href="<?php echo $row->link?>"><?php echo $row->name?></a>
							   <p class="manufacturer_short_description"><?php echo $row->short_description?></p>
							   <?php if ($row->manufacturer_url!=""){?>
							   <div class="manufacturer_url">
									<a target="_blank" href="<?php echo $row->manufacturer_url?>"><?php  echo _JSHOP_MANUFACTURER_INFO ?></a>
							   </div>
							   <?php }?>
						   </div>
						 </div>
					   </div>
					</div>    
					<?php if ($k%$this->count_manufacturer_to_row==$this->count_manufacturer_to_row-1) echo "</div>";?>
				 <?php } ?>
				 <?php if ($k%$this->count_manufacturer_to_row!=$this->count_manufacturer_to_row-1) echo "</div>";?>
		</div>
	</div>
<?php } ?>
	</div>