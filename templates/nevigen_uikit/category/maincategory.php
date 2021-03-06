<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Nevigen.com
* @website http://nevigen.com/
* @email support@nevigen.com
* @copyright Copyright � Nevigen.com. All rights reserved.
* @license Proprietary. Copyrighted Commercial Software
* @license agreement http://nevigen.com/license-agreement.html
**/

defined('_JEXEC') or die;
print $this->_tmp_maincategory_html_start;
?>
<?php if ($this->params->get('show_page_heading') && $this->params->get('page_heading')){?>
	<div class="shophead <?php print $this->params->get('pageclass_sfx');?>">
		<h1><?php print $this->params->get('page_heading')?></h1>
	</div>
<?php }?>
<div class="main-page-description"><?php echo $this->category->description?></div>

<div class="jshop_list_category" id="comjshop">
	<?php if (count($this->categories)){?>
		<div class="jshop">
			<div class="uk-grid uk-grid-match" data-uk-grid-margin data-uk-grid-match="{target:'.categ_block'}">
				<?php foreach($this->categories as $k=>$category){?>
					<div class="uk-width-large-1-<?php echo $this->count_category_to_row ?> uk-width-medium-1-1 uk-width-small-1-1">
						<figure class="uk-overlay uk-overlay-hover categ_block uk-panel uk-panel-box uk-text-center">
							<h3><?php echo $category->name?></h3>
							<img class="jshop_img uk-thumbnail" src="<?php echo $this->image_category_path;?>/<?php if ($category->category_image) echo $category->category_image; else echo $this->noimage;?>" alt="<?php echo htmlspecialchars($category->name);?>" title="<?php echo htmlspecialchars($category->name);?>" />
							<figcaption class="uk-overlay-panel uk-overlay-slide-left uk-flex uk-flex-center uk-flex-middle uk-text-center uk-overlay-background">
								<p class="category_short_description"><?php echo $category->short_description?></p>
							</figcaption>
							<a class="uk-position-cover" href="<?php echo $category->category_link;?>"></a>
						</figure>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	<?php print $this->_tmp_maincategory_html_end;?>
</div>