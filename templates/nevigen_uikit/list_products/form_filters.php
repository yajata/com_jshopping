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
JSFactory::loadExtLanguageFile('templates/nevigen_uikit');
$app = JFactory::getApplication();
$order = $app->getUserStateFromRequest( 'order', 'order', $this->config->product_sorting, 'int');
$orderby = $app->getUserStateFromRequest( 'orderby', 'orderby', $this->config->product_sorting_direction, 'int');
$sorting_products_name_select = array(
	1 => _JSHOP_NEVIGEN_UIKIT_SORT_BY_ALPH,
	2=>_JSHOP_NEVIGEN_UIKIT_SORT_BY_PRICE,
	6=>_JSHOP_NEVIGEN_UIKIT_SORT_BY_POPULAR,
	3=>_JSHOP_NEVIGEN_UIKIT_SORT_BY_DATE,
	// 5 => _JSHOP_NEVIGEN_UIKIT_SORT_BY_RATING,
	// 4 => _JSHOP_NEVIGEN_UIKIT_SORT_BY_MANUAL,
);
?>
<form class="uk-form" action="<?php echo $this->action;?>" method="post" name="sort_count" id="sort_count">
	<?php if ($this->config->show_sort_product || $this->config->show_count_select_products){?>
			<div class="block_sorting_count_to_page uk-navbar uk-hidden-small">
				<?php if ($this->config->show_sort_product){?>
					<div class="box_products_sorting uk-navbar-nav uk-margin-small-top">
						<?php echo _JSHOP_NEVIGEN_UIKIT_SORT_BY ?>
						<?php if (isset($sorting_products_name_select[$order])) { ?>
						<span class="order active" onclick="submitListProductFilterSortDirection()">
							<?php echo $sorting_products_name_select[$order] ?>
							<i class="uk-text-small uk-icon-sort-amount-<?php echo strtolower(getQuerySortDirection($order, $orderby)) ?>"></i>
						</span>
						<?php } ?>
						<span class="order other">
						<?php
						foreach($sorting_products_name_select as $key=>$value) {
							if ($key != $order) {
						?>
							<span onclick="$_('order').value=<?php echo $key ?>;submitListProductFilters();">
								<?php echo $value ?>
							</span>
						<?php 
							}
						}
						?>
						</span>
					</div>
				<?php }?>
				<?php if ($this->config->show_count_select_products){?>
					<div class="box_products_count_to_page uk-navbar-flip">
						<i class="uk-icon-bars"></i> <?php echo $this->product_count?>
					</div>
				<?php }?>
			</div>
	<?php }?>

<?php if ($this->config->show_product_list_filters && $this->filter_show){?>
		<div class="block_filter_list_category uk-navbar">
			<?php if ($this->filter_show_category){?>
				<div class="box_category uk-display-inline-block"><?php echo _JSHOP_CATEGORY.": ".$this->categorys_sel?></div>
			<?php }?>
			<?php if ($this->filter_show_manufacturer){?>
				<div class="box_manufacrurer uk-display-inline-block"><?php echo _JSHOP_MANUFACTURER.": ".$this->manufacuturers_sel?></div>
			<?php }?>
			<?php echo $this->_tmp_ext_filter_box;?>
			
			<?php if (getDisplayPriceShop()){?>
			<div class="filter_price uk-display-inline-block uk-margin-left"><?php echo '<i class="uk-icon-tags"></i>'?>
				<span class="box_price_from"> <input type="text" placeholder="<?php echo _JSHOP_FROM?>" class="uk-form-small" name="fprice_from" id="price_from" size="4" value="<?php if ($this->filters['price_from']>0) echo $this->filters['price_from']?>" /></span>
				<span class="box_price_to"> <input type="text" placeholder="<?php echo _JSHOP_TO?>" class="uk-form-small" name="fprice_to"  id="price_to" size="4" value="<?php if ($this->filters['price_to']>0) echo $this->filters['price_to']?>" /></span>
				<?php echo $this->config->currency_code?>
			</div>
			<?php }?>
			
			<?php echo $this->_tmp_ext_filter;?>
				<div class="uk-button-group uk-margin-left">
					<button class="uk-button uk-button-primary uk-button-small" type="submit" onclick="submitListProductFilters();"><i class="uk-icon-search"></i></button>
					<a class="uk-button uk-button-small" href="#" onclick="clearProductListFilter();return false;"><i class="uk-icon-remove"></i></a>
				</div>
		</div>
<?php }?>
<input type="hidden" name="order" id="order" value="<?php echo $order ?>" />
<input type="hidden" name="orderby" id="orderby" value="<?php echo $this->orderby ?>" />
<input type="hidden" name="limitstart" value="0" />
</form>