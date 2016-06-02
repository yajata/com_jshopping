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
<?php if ($this->allow_review){?>
    <div class="review_header uk-article-title no_display"><?php echo _JSHOP_REVIEWS?></div>

    <?php foreach($this->reviews as $curr){?>
        <article class="uk-comment review_item" itemprop="review" itemscope itemtype="http://schema.org/Review">
			<header class="uk-comment-header">
				<img class="uk-comment-avatar" src="/components/com_jshopping/images/review_avatar.svg" alt="Отзыв о <?php echo $this->product->name?>" title="Отзыв о <?php echo $this->product->name?>"/>
				<div class="review_rating uk-comment-meta"> 
					<?php if ($curr->mark) {?>
						<span class="review_mark"><?php echo showMarkStar($curr->mark);?></span>
					<?php } ?>
				</div>
				<h4 class="review_user uk-comment-title" itemprop="author"><?php echo $curr->user_name?> <span class="uk-comment-meta review_time">(<?php echo formatdate($curr->time);?>)</span></h4>
				<div class="review_text" itemprop="reviewBody"><?php echo nl2br($curr->review)?></div>
			</header>
			<meta itemprop="datePublished" content="<?php print $curr->time;?>" />
		</article>
    <?php }?>
	
	
    <?php if ($this->display_pagination){?>
    <div class="jshop_pagination">
        <div class="pagination"><?php echo $this->pagination?></div>
    </div>
    <?php }?>
	
	
    <?php if ($this->allow_review > 0){?>
        <?php JHTML::_('behavior.formvalidation'); ?> 
        <button class="uk-button uk-button-primary" data-uk-toggle="{target:'#nvg_revform'}"><?php echo _JSHOP_ADD_REVIEW_PRODUCT?></button>
		<div id="nvg_revform" class="uk-panel uk-panel-box uk-hidden">
			<form class="uk-form" action="<?php echo SEFLink('index.php?option=com_jshopping&controller=product&task=reviewsave');?>" name="add_review" method="post" onsubmit="return validateReviewForm(this.name)">
				<input type="hidden" name="product_id" value="<?php echo $this->product->product_id?>" />
				<input type="hidden" name="back_link" value="<?php echo jsFilterUrl($_SERVER['REQUEST_URI'])?>" />
				<?php echo JHtml::_('form.token');?>
			
				<div id="jshop_review_write" class="uk-panel uk-panel-box" >
					<div class="uk-form-row">
						<input type="text" name="user_name" id="review_user_name" placeholder="<?php echo _JSHOP_REVIEW_USER_NAME?>" class="inputbox" value="<?php echo $this->user->username?>" />
					</div>
					
					<div class="uk-form-row">
						<input type="text" name="user_email" placeholder="<?php echo _JSHOP_REVIEW_USER_EMAIL?>" id="review_user_email" class="inputbox" value="<?php echo $this->user->email?>" />
					</div>

					<div class="uk-form-row">
						<textarea name="review" id="review_review" placeholder="<?php echo _JSHOP_REVIEW_REVIEW?>"rows="4" cols="60" class="jshop inputbox review_textarea"></textarea>
					</div>

					<div class="uk-form-row">
						<?php for($i=1; $i<=$this->stars_count*$this->parts_count; $i++){?>
							<input name="mark" type="radio" class="star {split:<?php echo $this->parts_count?>}" value="<?php echo $i?>" <?php if ($i==$this->stars_count*$this->parts_count){?>checked="checked"<?php }?>/>
						<?php } ?>
						<span class="uk-form-help-block">  <?php echo _JSHOP_REVIEW_MARK_PRODUCT?></span>
					</div>

					<?php echo $this->_tmp_product_review_before_submit;?>
					<div>
						<input class="uk-button" type="submit" value="<?php echo  _JSHOP_REVIEW_SUBMIT?>" />
					</div>
				</div>
			</form>
		</div>
    <?php }else{?>
        <div class="review_text_not_login uk-text-bold uk-text-warning "><?php echo $this->text_review?></div>
    <?php } ?>
<?php }?>