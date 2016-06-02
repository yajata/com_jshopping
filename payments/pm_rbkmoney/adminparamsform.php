<div class="col100">
    <fieldset class="adminform">
        <table class="admintable" width="100%">
            <tr>
                <td class="key">
                    Merchant Id of your site
                </td>
                <td>
                    <input type="text" class="inputbox" name="pm_params[eshop_id]" size="45"
                           value="<?php echo $params['eshop_id'] ?>"/>
                    <?php echo JHTML::tooltip('You can view it on merchant settings page at http://rbkmoney.ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="key">
                    Secret key
                </td>
                <td>
                    <input type="text" class="inputbox" name="pm_params[secret_key]" size="45"
                           value="<?php echo $params['secret_key'] ?>"/>
                    <?php echo JHTML::tooltip('Secret key entered on merchant settings page at http://rbkmoney.ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="key">
                    Preferable payment method (optional)
                </td>
                <td>
                    <input type="text" class="inputbox" name="pm_params[preference]" size="45"
                           value="<?php echo $params['preference'] ?>"/>
                    <?php echo JHTML::tooltip('You can define default payment method (for example, "bankcard"). Allow to skip payment method selection page'); ?>
                </td>
            </tr>
            <tr>
                <td class="key">
                    <?php echo _JSHOP_TRANSACTION_END; ?>
                </td>
                <td>
                    <?php
                    print JHTML::_('select.genericlist', $orders->getAllOrderStatus(), 'pm_params[transaction_end_status]', 'class = "inputbox" size = "1"', 'status_id', 'name', $params['transaction_end_status']);     ?>
                    <?php echo JHTML::tooltip('Define transaction end status'); ?>
                </td>
            </tr>
            <tr>
                <td class="key">
                    <?php echo _JSHOP_TRANSACTION_PENDING; ?>
                </td>
                <td>
                    <?php
                    echo JHTML::_('select.genericlist', $orders->getAllOrderStatus(), 'pm_params[transaction_pending_status]', 'class = "inputbox" size = "1"', 'status_id', 'name', $params['transaction_pending_status']);?>
                    <?php echo JHTML::tooltip('Define transaction pending status'); ?>
                </td>
            </tr>
            <tr>
                <td class="key">
                    <?php echo _JSHOP_TRANSACTION_FAILED; ?>
                </td>
                <td>
                    <?php
                    echo JHTML::_('select.genericlist', $orders->getAllOrderStatus(), 'pm_params[transaction_failed_status]', 'class = "inputbox" size = "1"', 'status_id', 'name', $params['transaction_failed_status']);?>
                    <?php echo JHTML::tooltip('Define transaction failed status'); ?>
                </td>
            </tr>
            <tr>
                <td class="key">
                    Notification Url
                </td>
                <td>
                    <?php
                    echo JURI::root() . "index.php?option=com_jshopping&controller=checkout&task=step7&act=notify&js_paymentclass=pm_rbkmoney&no_lang=1";
                    echo " " . JHTML::tooltip('Response Url for insertion into "Payment notification URL" on merchant settings page at http://rbkmoney.ru');
                    ?>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="clr"></div>