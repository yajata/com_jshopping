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
<?php if ($this->allow_review || $this->config->show_hits){?>
<div class="ratinghits" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <?php if ($this->allow_review and $this->product->average_rating>0){?>
		<span data-uk-tooltip title="<?php echo _JSHOP_RATING?>"><i class="uk-icon-star-half-empty"> </i><?php echo round($this->product->average_rating, 1)?></span>
		<meta itemprop="ratingValue" content="<?php print $this->product->average_rating;?>" />
		<span class="uk-text-muted"> | </span>
		<!-- <span><?php echo showMarkStar($this->product->average_rating);?></span> -->
		<meta itemprop="bestRating" content="10" />
    <?php } ?>
	
	<?php if ($this->config->show_hits){?>
		<span data-uk-tooltip title="<?php echo _JSHOP_HITS?>"><i class="uk-icon-eye"> </i> <?php echo $this->product->hits;?>  </span>
		<span class="uk-text-muted"> | </span>
    <?php } ?>
	
	<?php if ($this->allow_review){?>
		<span class="count_commentar" data-uk-tooltip title="<?php echo sprintf(_JSHOP_X_COMENTAR, $product->reviews_count);?>"><i class="uk-icon-comments"></i> <?php echo '('.$product->reviews_count.')';?></span>
		<span class="uk-text-muted">| </span>
		<meta itemprop="reviewCount" content="<?php print $this->product->reviews_count;?>" />
	<?php } ?>

</div>
<?php } ?>