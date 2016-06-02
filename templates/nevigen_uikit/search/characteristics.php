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
?>
<?php
$characteristic_displayfields = $this->characteristic_displayfields;
$characteristic_fields = $this->characteristic_fields;
$characteristic_fieldvalues = $this->characteristic_fieldvalues;
$groupname = "";
?>
<?php print $this->tmp_ext_search_html_characteristic_start;?>
<?php if (is_array($characteristic_displayfields) && count($characteristic_displayfields)){?>
    <div class="filter_characteristic">
    <?php foreach($characteristic_displayfields as $ch_id){?>
        <?php if ($characteristic_fields[$ch_id]->groupname!=$groupname){ $groupname = $characteristic_fields[$ch_id]->groupname;?>
            <div class="characteristic_group"><?php echo $groupname;?></div>
        <?php }?>
        <div class="characteristic_name"><?php echo $characteristic_fields[$ch_id]->name;?></div>
        <?php if ($characteristic_fields[$ch_id]->type==0){?>
            <input type="hidden" name="extra_fields[<?php echo $ch_id?>][]" value="0" />
            <?php if (is_array($characteristic_fieldvalues[$ch_id])){?>
                <?php foreach($characteristic_fieldvalues[$ch_id] as $val_id=>$val_name){?>
                    <div class="characteristic_val"><input type="checkbox" name="extra_fields[<?php echo $ch_id?>][]" value="<?php echo $val_id;?>" <?php if (is_array($extra_fields_active[$ch_id]) && in_array($val_id, $extra_fields_active[$ch_id])) echo "checked";?> /> <?php echo $val_name;?></div>
                <?php }?>
            <?php }?>
        <?php }else{?>
            <div class="characteristic_val"><input type="text" name="extra_fields[<?php echo $ch_id?>]" class="inputbox" /></div>
        <?php }?>
    <?php }?>
    </div>
<?php } ?>
<?php print $this->tmp_ext_search_html_characteristic_end;?>