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
<div class="jshop" id="comjshop">
    <h1><?php print _JSHOP_USER_GROUPS_INFO?></h1>
    
    <table class="groups_list uk-table">
		<tr>
			<th class="title"><?php print _JSHOP_TITLE?></th> 
			<th class="discount"><?php print _JSHOP_DISCOUNT?></th> 
		</tr>
		<?php foreach($this->rows as $row){?>
			<tr>
				<td class="title"><?php print $row->name?></td>
				<td class="discount"><?php print floatval($row->usergroup_discount)?>%</td>
			</tr>
		<?php }?>
    </table>
</div>