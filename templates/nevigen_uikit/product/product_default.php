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

JSFactory::loadExtLanguageFile('templates/nevigen_uikit');
jimport('joomla.application.module.helper');
$modsOplata=JModuleHelper::getModules('prodfull_oplata');
$modsDostavka=JModuleHelper::getModules('prodfull_dostavka');
$template = JFactory::getApplication()->getTemplate();
$product=$this->product;
include dirname(__FILE__).'/load.js.php';
?>
<div itemscope itemtype="http://schema.org/Product">
<article class="uk-article" data-uk-observe>
	<div class="jshop productfull" id="comjshop">
		<form name="product" class="uk-form" method="post" action="<?php echo $this->action?>" enctype="multipart/form-data" autocomplete="off">
			<h1 class="uk-article-title"><span itemprop="name"><?php echo $this->product->name?></span></h1>
			<?php echo $this->_tmp_product_html_start;?>
			<div class="uk-grid">
				<div class="uk-width-1-2">
					<?php if ($this->config->show_product_code){?> 
						<div class="jshop_ean" data-uk-tooltip="{pos:'left'}" title="<?php echo _JSHOP_EAN?>"><i class="uk-icon-barcode"></i>&nbsp;&nbsp;<span id="product_code"><?php print $this->product->getEan();?></span>&nbsp;</div>
					<?php }?>
					<?php echo ('&nbsp;')?>
				</div>
				<div class="uk-width-1-2 uk-text-right">
					<span><?php include dirname(__FILE__).'/ratingandhits.php' ?>
					<?php if ($this->config->display_button_print) {
						$print=JRequest::getInt("print");
						if ($print) {
							$onclick='window.print();return false';
						} else {
							$link= str_replace("&", '&amp;', $_SERVER["REQUEST_URI"]);
							if (strpos($link,'?') === false) {
								$link .= "?tmpl=component&amp;print=1";
							} else {
								$link .= "&amp;tmpl=component&amp;print=1";
							}
							$onclick='window.open(\''.$link.'\',\'win2\',\'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no\'); return false';
						}
					?>
					<a class="profullprint" href="#print" onclick="<?php echo $onclick ?>"> <i class="uk-icon-print"></i></span></a>
					<?php }?>
				</div>
			</div>
			<hr class="uk-article-divider">
			
			<div class="uk-grid" data-uk-margin>
				<div class="image_middle uk-width-small-1-1 uk-width-medium-1-3">
					<?php echo $this->_tmp_product_html_before_image;?>
					<?php if ($product->label_id){?>
						<div class="product_label">
							<?php if ($product->_label_image){?>
								<img src="<?php echo $product->_label_image?>" alt="<?php echo htmlspecialchars($product->_label_name)?>" />
							<?php }else{?>
								<span class="label_name"><?php echo $product->_label_name;?></span>
							<?php }?>
						</div>
					<?php }?>
				
					<div id="list_product_image_middle">
						<?php print $this->_tmp_product_html_body_image?>
						<?php include dirname(__FILE__).'/block_image_middle.php' ?>
					</div>
					<?php echo $this->_tmp_product_html_after_image;?>
					
				</div>
				<div class="uk-width-small-1-1 uk-width-medium-1-3">
				<div id="list_product_image_middle">
						<?php print $this->_tmp_product_html_body_image?>
						<?php include dirname(__FILE__).'/block_image_middle_b.php' ?>
					</div></div>

				<div class="uk-width-small-1-1 uk-width-medium-1-3">
					
					<div class="uk-panel uk-panel-box uk-float-right">
						<?php if ($this->product->delivery_time && $this->product->delivery_time != '' ){ ?>
							<div class="deliverytime <?php if ($product->hide_delivery_time) echo 'uk-hidden' ?>">
								<?php print _JSHOP_DELIVERY_TIME?>: <?php print $this->product->delivery_time?>
							</div>
						<?php } ?>
						<?php if (count($modsOplata)){?>
							<div>
							<a class="uk-margin" href="#modal-oplata" data-uk-modal>
								<i class="uk-icon-money"></i> <?php echo _JSHOP_NEVIGEN_UIKIT_PAYMENT?>
							</a>
							</div>
						<?php } ?>
						<?php if (count($modsDostavka)){?>
							<div>
							<a class="uk-margin" href="#modal-dostavka" data-uk-modal>
								<i class="uk-icon-truck"></i> <?php echo _JSHOP_NEVIGEN_UIKIT_DELIVERY?>
							</a>
							</div>
						<?php } ?>
						<div class="uk-margin-top"><?php echo $this->_tmp_product_html_after_buttons;?></div>
					</div>
					
					<?php if (count($this->attributes)){?>
						<div class="jshop_prod_attributes">
							<div class="jshop attributes">
							<?php foreach($this->attributes as $attribut){?>
								<?php if ($attribut->grshow){?>
									<div class="attributgr_title">
										<span class="attributgr_name"><?php print $attribut->groupname?></span>
									</div>
								<?php }?>
								<div class="attributes_<?php echo $attribut->attr_id?>">
									<label class="attributes_title">

										<span class="attributes_name"><?php echo $attribut->attr_name?></span>
									</label>
									<?php if ($attribut->attr_description) {?> 
										<span class="infotultip" data-uk-tooltip="{pos:'right'}" title="<?php echo $attribut->attr_description;?>"> <i class="uk-icon-info-sign"></i> </span>
									<?php } ?>
									<span id='block_attr_sel_<?php echo $attribut->attr_id?>'>
										<?php echo $attribut->selects?>
									</span>
								</div>
							<?php }?>
							</div>
						</div>
					<?php }?>
					   
					<?php if (count($this->product->freeattributes)){?>
						<div class="prod_free_attribs">
							<div class="jshop">
							<?php foreach($this->product->freeattributes as $freeattribut){?>
								<label class="freeattributes_title">
									<span class="freeattribut_name"><?php echo $freeattribut->name;?></span> 	
								<?php if ($freeattribut->description) {?> 
									<span class="infotultip" data-uk-tooltip="{pos:'right'}" title="<?php echo $freeattribut->description;?>"> <i class="uk-icon-check"></i> </span>
								<?php } ?>
								</label>
								<span class="field"><?php echo $freeattribut->input_field;?></span>
								<?php if ($freeattribut->required){?>
								<span class="requiredtext" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_REQUIRED?>">
									<i class="uk-icon-warning-sign"></i><?php }?>
								</span>
							<?php }?>
							</div>
						</div>
					<?php }?>
					
					
					<div class="old_price uk-badge uk-badge-danger <?php if ($this->product->product_old_price==0) echo "uk-hidden"?>">
						<?php print _JSHOP_OLD_PRICE?>: <span class="old_price" id="old_price"><?php print formatprice($this->product->product_old_price)?><?php print $this->product->_tmp_var_old_price_ext;?></span>
					</div>
						
					<?php if ($this->product->product_price_default > 0 && $this->config->product_list_show_price_default){?>
							<div class="default_price"><?php echo _JSHOP_DEFAULT_PRICE?>: <span id="pricedefault"><?php echo formatprice($this->product->product_price_default)?></span></div>
					<?php }?>        
						
					<?php if ($this->product->_display_price){?>
						<div class="prod_price" itemtype="http://schema.org/Offer" itemscope="" itemprop="offers">
							<i class="uk-icon-tags"></i>  <span data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_PRICE;?>" id="block_price" itemprop="price"> <?php echo formatprice($this->product->getPriceCalculate())?><?php echo $this->product->_tmp_var_price_ext;?></span>
						</div>
						<?php if ($this->product->product_is_add_price) { ?>
							<div class="productfull-whosaleprice">
								<a class="uk-button uk-button-success uk-button-small" href="#whosaleprice" title="<?php echo _JSHOP_NEVIGEN_UIKIT_PRICE_FOR_QTY ?>" data-uk-modal>
									<?php echo _JSHOP_NEVIGEN_UIKIT_PRICE_FOR_QTY ?>
								</a>
							</div>
						<?php } ?>
						
						
					<?php }?>
					<?php echo $this->product->_tmp_var_bottom_price;?>
						
					<?php if ($this->config->show_tax_in_product && $this->product->product_tax > 0){?>
						<span class="taxinfo"><?php echo productTaxInfo($this->product->product_tax);?></span>
					<?php }?>
					<?php if ($this->config->show_plus_shipping_in_product){?>
						<span class="plusshippinginfo"><?php print sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>
					<?php }?>
						
					<?php if ($this->product->product_basic_price_show){?>
						<div class="prod_base_price"><?php echo _JSHOP_BASIC_PRICE?>: <span id="block_basic_price"><?php echo formatprice($this->product->product_basic_price_calculate)?></span> / <?php echo $this->product->product_basic_price_unit_name;?></div>
					<?php }?>
						
					<?php if ($this->config->product_show_qty_stock){?>
						<div class="qty_in_stock"><?php echo _JSHOP_QTY_IN_STOCK?>: <span id="product_qty"><?php echo sprintQtyInStock($this->product->qty_in_stock);?></span></div>
					<?php }?> 
					<?php if ($this->config->product_show_weight && $this->product->product_weight > 0){?>
						<div class="productweight"><?php echo _JSHOP_WEIGHT?>: <span id="block_weight"><?php print formatweight($this->product->getWeight())?></span></div>
					<?php }?> 
					<br/>
					<div class="uk-panel uk-panel-box"> 
						<?php if (!$this->config->hide_text_product_not_available){ ?>
							<div class="not_available" id="not_available"><?php echo $this->available?></div>
						<?php }?>
						<?php echo $this->_tmp_product_html_before_buttons;?>
						<?php if (!$this->hide_buy){?>                         
							<div class="prod_buttons" data-uk-margin style="<?php echo $this->displaybuttons?>">
								<div class="quantity prod_qty_input" data-uk-tooltip title="<?php echo _JSHOP_QUANTITY?>">
									<span class="quantitymore" onclick="qty=jQuery('#quantity');qty.val(parseFloat(qty.val())+1);qty.change();reloadPrices();"></span>
									<input type="text" name="quantity" id="quantity" onkeyup="reloadPrices();" class="uk-form-small" value="<?php echo $this->default_count_product?>" />
									<span class="quantityless" onclick="qty=jQuery('#quantity');if (parseFloat(qty.val())-1 > 0) qty.val(parseFloat(qty.val())-1);qty.change();reloadPrices();"></span>
									<?php echo $this->_tmp_qty_unit;?>
								</div>

								<div class="buttons" data-uk-margin>            
									
									<button type="submit" class="uk-button uk-button-primary"   onclick="jQuery('#to').val('cart');"> <i class="uk-icon-shopping-cart"></i> <?php echo _JSHOP_ADD_TO_CART?> </button>
									
									<?php if ($this->enable_wishlist){?>
										<button type="submit" data-uk-tooltip="{pos:'right'}" title="<?php echo _JSHOP_ADD_TO_WISHLIST?>" class="uk-button" onclick="jQuery('#to').val('wishlist');"><i class="uk-icon-clock-o uk-text-large"></i></button>
									<?php }?>
								</div>
								<br/>
								<?php echo $this->_tmp_product_html_buttons;?>	
								<div id="jshop_image_loading" class="no_display"></div>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="prodfull-thumb-slidset">
				<?php echo $this->_tmp_product_html_before_image_thumb ?>
				
				<span id="list_product_image_thumb" >
					<?php include dirname(__FILE__).'/block_image_thumb.php' ?>
				</span>
				<?php echo $this->_tmp_product_html_after_image_thumb ?>
			</div>
		<input type="hidden" name="to" id="to" value="cart" />
		<input type="hidden" name="product_id" id="product_id" value="<?php echo $this->product->product_id?>" />
		<input type="hidden" name="category_id" id="category_id" value="<?php echo $this->category_id?>" />
		</form>
		<p></p>

		<ul class="uk-tab" data-uk-tab="{connect:'#prod_tabcont'}">
			<li class="uk-active">
				<a href="#">
					<i class="uk-icon-paperclip"></i> <?php echo _JSHOP_NEVIGEN_UIKIT_DESCRIPTION ?>
				</a>
			</li>
			<?php if (is_array($this->product->extra_field)) { ?>
			<li>
				<a href="#">
					<i class="uk-icon-list-alt"></i> <?php echo _JSHOP_NEVIGEN_UIKIT_PARAMS ?>
				</a>
			</li>
			<?php } ?>
			<?php if (count($this->videos)){?>
			<li>
				<a href="#">
					<i class="uk-icon-film"></i> <?php echo _JSHOP_NEVIGEN_UIKIT_VIDEO ?>
				</a>
			</li>
			<?php }?>
			<?php if ($this->related_prod || $this->_tmp_product_html_before_related){ ?>
			<li>
				<a href="#">
					<i class="uk-icon-bookmark"></i> <?php echo _JSHOP_NEVIGEN_UIKIT_RECOMMENDED ?>
				</a>
			</li>
			<?php } ?>
			<?php if ($this->allow_review || $this->_tmp_product_html_before_review){ ?>
			<li>
				<a href="#">
					<i class="uk-icon-comments"></i> <?php echo _JSHOP_REVIEWS ?>(<?php echo $product->reviews_count ?>)
				</a>
			</li>
			<?php } ?>
		</ul>

		<ul id="prod_tabcont" class="uk-switcher uk-margin">
			<li>
				<?php if ($this->config->product_show_manufacturer_logo && $this->product->manufacturer_info->manufacturer_logo!=""){?>
					<div class="manufacturer_logo uk-float-right uk-width-1-3">
						<a href="<?php echo SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$this->product->product_manufacturer_id, 2);?>">
							<img class="uk-thumbnail" src="<?php echo $this->config->image_manufs_live_path."/".$this->product->manufacturer_info->manufacturer_logo?>" alt="<?php echo htmlspecialchars($this->product->manufacturer_info->name);?>" title="<?php echo htmlspecialchars($this->product->manufacturer_info->name);?>" border="0" />
						</a>
					</div>
				<?php }?>
				<?php if ($this->config->product_show_manufacturer && $this->product->manufacturer_info->name != ''){?>
					<div class="manufacturer_name" >
						<div class="manufacturer_title uk-display-inline-block"><?php echo _JSHOP_MANUFACTURER?>:&nbsp;</div>
						<div class="uk-text-large uk-display-inline-block"> <span itemprop="brand"><?php echo $this->product->manufacturer_info->name?></span>
							<?php if ($this->product->manufacturer_info->description != '') {?>
								<a class="uk-margin-small-left" href="#manufinfo" title="<?php echo _JSHOP_MANUFACTURER_INFO?>" data-uk-modal><i class="uk-icon-check"></i></a>
							<?php } ?>
							<a class="uk-margin-small-left" href="<?php echo SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$this->product->product_manufacturer_id, 2)?>" title="<?php echo _JSHOP_NEVIGEN_UIKIT_MANUFALLPRODUCTS?>">
								<i class="uk-icon-cubes"></i>
							</a>
						</div>
					</div>
				<?php }?>

				<?php if ($this->product->vendor_info){?>
					<div class="vendorinfo">
						<div class="vendor_title uk-display-inline-block"><?php echo _JSHOP_VENDOR?>: </div> 
						<?php if ($this->config->product_show_vendor_detail){?>
							<div class="uk-text-large uk-display-inline-block">
								<?php echo $this->product->vendor_info->shop_name?>
								<a class="uk-margin-small-left" href="#vendinfo" data-uk-modal title="<?php echo _JSHOP_ABOUT_VENDOR?>"><i class="uk-icon-check"></i></a>
								<a class="uk-margin-small-left" href="<?php echo $this->product->vendor_info->urllistproducts?>" title="<?php echo _JSHOP_VIEW_OTHER_VENDOR_PRODUCTS?>"> <i class="uk-icon-cubes"></i></a>
							</div>
						<?php }?> 
					</div>
				<?php }?>

				
				
				<div class="jshop_prod_description" itemprop="description">
					<?php echo $this->product->description; ?>
				</div>
				<?php if ($this->product->product_url!=""){?>
				<div class="prod_url">
					<a target="_blank" href="<?php echo $this->product->product_url ?>">
						<?php echo _JSHOP_READ_MORE?>
					</a>
				</div>
				<?php }?>
			</li>
			<?php if (is_array($this->product->extra_field)){?>
			<li>
				<div class="extra_fields">
					<?php foreach($this->product->extra_field as $extra_field){?>
						<?php if ($extra_field['grshow']){?>
							<div class="block_efg">
							<div class="extra_fields_group uk-text-primary"><?php print $extra_field['groupname']?></div>
						<?php }?>
						<dl class="uk-description-list uk-description-list-horizontal dl_extrafields">
							<dt><?php echo $extra_field['name'];?></dt>
							<dd>
								<?php echo $extra_field['value'];?>
								<?php if ($extra_field['description']) {?>  
									<span class="infotultip" data-uk-tooltip="{pos:'right'}" title="<?php echo $extra_field["description"];?>"> <i class="uk-icon-check"></i> </span>
								<?php } ?>	
							</dd>
						</dl>
						<?php if ($extra_field['grshow']){?>
							</div>
						<?php }?>
					<?php }?>
				</div>
			</li>
			<?php }?>
			<?php if (count($this->videos)){?>
			<li>
				<div class="jshop_img_description">
					<?php echo _JSHOP_NEVIGEN_UIKIT_VIDEO?>
							<?php foreach($this->videos as $k=>$video){?>
								<?php if ($video->video_code) { ?>
								<div class="video_full" id="hide_video_<?php echo $k?>"><?php echo $video->video_code?></div>
								<?php } else { ?>
								<a href="<?php echo $this->video_product_path?>/<?php echo $video->video_name?>" id="video_<?php echo $k?>" onclick="jQuery(this).media( { width: <?php echo $this->config->video_product_width;?>, height: <?php echo $this->config->video_product_height;?>} ); return false;">
									<img class="jshop_video_thumb" src="<?php echo $this->video_image_preview_path."/"; if ($video->video_preview) echo $video->video_preview; else echo 'video.gif'?>" alt="video" />
								</a>
								<?php } ?>
							<?php } ?>
							<?php echo $this->_tmp_product_html_after_video ?>					
				</div>
			</li>
			<?php } ?>
			<?php if ($this->related_prod || $this->_tmp_product_html_before_related){ ?>
			<li>
				<?php
				echo $this->_tmp_product_html_before_related;
				include dirname(__FILE__).'/related.php';
?>
			</li>
			<?php }?>
			<?php if ($this->allow_review || $this->_tmp_product_html_before_review){ ?>
			<li>
				<?php 
				echo $this->_tmp_product_html_before_review;
				if ($this->allow_review) {
					include dirname(__FILE__).'/review.php';
				}
				?>
			</li>
			<?php }?>
		</ul>		
		
		<?php echo $this->_tmp_product_html_before_demofiles ?>
		<div id="list_product_demofiles uk-panel uk-panel-box">
			<?php include dirname(__FILE__).'/demofiles.php' ?>
		</div>
		<?php if ($this->config->product_show_button_back){ ?>
		<div class="button_back">
			<input type="button" class="uk-button uk-button-small" value="<?php echo _JSHOP_BACK;?>" onclick="<?php echo $this->product->button_back_js_click;?>" />
		</div>
		<?php }?>
		<?php echo $this->_tmp_product_html_end ?>
	</div>
</article>


<?php if (count($modsOplata)){?>
	<div id="modal-oplata" class="uk-modal">
		<div class="uk-modal-dialog uk-panel-header">
			<a class="uk-modal-close uk-close"></a>
			<h3 class="price_prod_qty_list_head uk-panel-title"><?php echo _JSHOP_NEVIGEN_UIKIT_PAYMENT?></h3>
			<?php foreach ($modsOplata as $mod) { 
				echo JModuleHelper::renderModule($mod);
			}?>
		</div>
	</div>
<?php } ?>

<?php if (count($modsDostavka)){?>
	<div id="modal-dostavka" class="uk-modal">
		<div class="uk-modal-dialog uk-panel-header">
			<a class="uk-modal-close uk-close"></a>
			<h3 class="price_prod_qty_list_head uk-panel-title"><?php echo _JSHOP_NEVIGEN_UIKIT_DELIVERY?></h3>
			<?php foreach ($modsDostavka as $mod) { 
				echo JModuleHelper::renderModule($mod);
			}?>
		</div>
	</div>
<?php } ?>



<?php if ($this->product->product_is_add_price) { ?>
	<div id="whosaleprice" class="uk-modal" >
		<div class="uk-modal-dialog uk-panel-header">
			<a class="uk-modal-close uk-close"></a>
			<h3 class="price_prod_qty_list_head uk-panel-title"><?php echo _JSHOP_PRICE_FOR_QTY?></h3>
				<div class="price_prod_qty_list">
					<?php foreach($this->product->product_add_prices as $k=>$add_price){?>
						<div>
							<div class="qtyfromto">
								<span class="qty_from" <?php if ($add_price->product_quantity_finish==0){?>class="collspan3"<?php } ?>>
									<?php if ($add_price->product_quantity_finish==0) echo _JSHOP_FROM?>
									<?php echo $add_price->product_quantity_start?> <?php echo $this->product->product_add_price_unit?>
								</span>
								<?php if ($add_price->product_quantity_finish > 0){?>
									<span class="qty_line"> - </span>
								<?php } ?>
								<?php if ($add_price->product_quantity_finish > 0){?>
									<span class="qty_to"><?php echo $add_price->product_quantity_finish?> <?php echo $this->product->product_add_price_unit?></span>
								<?php } ?>
							</div>
							<span class="qty_price">            
								<span id="pricelist_from_<?php echo $add_price->product_quantity_start?>"><?php echo formatprice($add_price->price)?><?php echo $add_price->ext_price?></span> <span class="per_piece">/ <?php echo $this->product->product_add_price_unit?></span>
							</span>
							<?php print $add_price->_tmp_var?>
						</div>
					<?php }?>
				</div>
		</div>
	</div>
<?php } ?>

<?php if ($this->config->product_show_manufacturer && $this->product->manufacturer_info->name!=""){?>
	<div id="manufinfo" class="uk-modal" >
		<div class="uk-modal-dialog uk-panel-header">
			<a class="uk-modal-close uk-close"></a>
			<h3 class="uk-panel-title"><?php echo $this->product->manufacturer_info->name?></h1>
			<img class="uk-thumbnail uk-float-right" src="<?php echo $this->config->image_manufs_live_path."/".$this->product->manufacturer_info->manufacturer_logo?>" alt="<?php echo htmlspecialchars($this->product->manufacturer_info->name);?>" title="<?php echo htmlspecialchars($this->product->manufacturer_info->name);?>" border="0" />
			<p><?php echo $this->product->manufacturer_info->description?></p>
			<div class="uk-text-right">
				<a class="uk-button " href="<?php echo SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$this->product->product_manufacturer_id, 2)?>"><?php echo _JSHOP_NEVIGEN_UIKIT_MANUFALLPRODUCTS?>
				</a>
			</div>
			
		</div>
	</div>
<?php } ?>

<?php if ($this->config->product_show_vendor_detail){?>
<div id="vendinfo" class="uk-modal" >
	<div class="uk-modal-dialog uk-panel-header">
		<a class="uk-modal-close uk-close"></a>
		<h1 class="uk-panel-title uk-text-bold"><?php echo $this->product->vendor_info->shop_name?></h1>
			<div>
			  <span class="name">
				<?php echo _JSHOP_F_NAME?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->vendor->f_name ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_L_NAME?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->vendor->l_name ?>
			  </span>
			</div>        
			<div>
			  <span class="name">
				<?php echo _JSHOP_FIRMA_NAME ?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->company_name ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_EMAIL?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->email ?>
			  </span>
			</div>        
			<div>
			  <span  class="name">
				<?php echo _JSHOP_STREET_NR?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->adress ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_ZIP ?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->zip ?>
			  </span>
			</div>        
			<div>
			  <span class="name">
				<?php echo _JSHOP_CITY?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->city ?>
			  </span>
			</div>        
			<div>
			  <span class="name">
				<?php echo _JSHOP_STATE ?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->state ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_COUNTRY?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->country ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_TELEFON?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->phone ?>
			  </span>
			</div>
			
			<div>
			  <span class="name">
				<?php echo _JSHOP_FAX?>:&nbsp;&nbsp; 
			  </span>
			  <span>
				<?php echo $this->product->vendor_info->fax ?>
			  </span>
			</div>
	</div>
</div>
<?php } ?>
</div>