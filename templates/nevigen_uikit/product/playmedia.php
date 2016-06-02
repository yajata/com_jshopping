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
<html>
	<head>
		<title><?php print $this->description; ?></title>
        <?php print $this->scripts_load?>
	</head>
	<body style = "padding: 0px; margin: 0px;">
        <?php if ($this->config->video_html5 && $this->file_is_video){?>
            <div class="file_demo_video">
                <video width="<?php print $this->config->video_product_width; ?>" height="<?php print $this->config->video_product_height; ?>" controls autoplay id = "video">
                    <source 
                        src="<?php print $this->config->demo_product_live_path.'/'.$this->filename;?>" 
                        <?php if ($this->config->video_html5_type){?>
                        type='<?php print $this->config->video_html5_type?>' 
                        <?php }?>
                    />
                </video>
            </div>
        <?php }else{?>
            <a class = "video_full" id = "video" href = "<?php print $this->config->demo_product_live_path.'/'.$this->filename; ?>"></a>
            <script type="text/javascript">
                var liveurl = '<?php print JURI::root()?>';
                jQuery('#video').media( { width: <?php print $this->config->video_product_width; ?>, height: <?php print $this->config->video_product_height; ?>, autoplay: 1} );
            </script>
        <?php }?>
	</body>
</html>
