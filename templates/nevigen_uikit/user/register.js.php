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
<script type="text/javascript">
//<![CDATA[
var register_field_require = {};
<?php
foreach($config_fields as $key=>$val){
    if ($val['require']){
        print "register_field_require['".$key."']=1;";
    }
}
?>
//]]>
</script>