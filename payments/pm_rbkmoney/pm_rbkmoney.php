<?php
defined('_JEXEC') or die('Restricted access');

class pm_rbkmoney extends PaymentRoot
{

    function showPaymentForm($params, $pmconfigs)
    {
        include(dirname(__FILE__) . "/paymentform.php");
    }

    function showAdminFormParams($params)
    {
        $array_params = array('preference', 'transaction_end_status', 'transaction_pending_status', 'transaction_failed_status');
        foreach ($array_params as $key) {
            if (!isset($params[$key]))
                $params[$key] = '';
        }
        $orders = JSFactory::getModel('orders', 'JshoppingModel');
        include(dirname(__FILE__) . "/adminparamsform.php");
    }

    function checkTransaction($pmconfigs, $order, $act)
    {
        $secretKeyLocal = $pmconfigs['secret_key'];
        $eshopIdLocal = $pmconfigs['eshop_id'];
        $recipientAmountLocal = number_format(floatval($order->order_total), 2, '.', '');
        $recipientCurrencyLocal = $order->currency_code_iso;

        $post = JRequest::get('post'); // Get POST

        $orderId = $post['orderId'];
        $serviceName = $post['serviceName'];
        $eshopAccount = $post['eshopAccount'];
        $paymentStatus = $post['paymentStatus'];
        $userName = $post['userName'];
        $userEmail = $post['userEmail'];
        $paymentData = $post['paymentData'];
        $hash = $post['hash'];

        $eshopId = $post['eshopId'];
        $recipientAmount = $post['recipientAmount'];
        $recipientCurrency = $post['recipientCurrency'];

        // Hash checking & order status changing
        if (!empty($hash)) {
            $calc_string = @implode('::', array($eshopIdLocal, $orderId, $serviceName, $eshopAccount, $recipientAmountLocal, $recipientCurrencyLocal, $paymentStatus, $userName, $userEmail, $paymentData, $secretKeyLocal));
            $calc_hash = md5($calc_string);

            if ($hash == $calc_hash) {
                switch ($paymentStatus) {
                    case 3: // payment created
                        return array(2, "Status pending. Order ID " . $order->order_id);
                        break;
                    case 5: // payment received
                        return array(1, "Status paid. Order ID " . $order->order_id);
                        break;
                }
            } elseif ($hash !== $calc_hash) { // wrong hash
                saveToLog("payment.log", "Wrong hash. Order ID {$order->order_id}. \nRBKM string: {$eshopId}::{$orderId}::{$serviceName}::{$eshopAccount}::{$recipientAmount}::{$recipientCurrency}::{$paymentStatus}::{$userName}::{$userEmail}::{$paymentData}::YOUR_SECRET_KEY \nRBKM hash: {$hash}\n
                Your string: {$eshopIdLocal}::{$orderId}::{$serviceName}::{$eshopAccount}::{$recipientAmountLocal}::{$recipientCurrencyLocal}::{$paymentStatus}::{$userName}::{$userEmail}::{$paymentData}::YOUR_SECRET_KEY \nYour hash: {$calc_hash}\n");
                return array(0, "ERROR: wrong hash.\n");
            }
        }
    }

    function showEndForm($pmconfigs, $order)
    {
        $return = JURI::root() . "index.php?option=com_jshopping&controller=checkout&task=step7&act=return&js_paymentclass=pm_rbkmoney";
        $cancel_return = JURI::root() . "index.php?option=com_jshopping&controller=checkout&task=step7&act=cancel&js_paymentclass=pm_rbkmoney";
        $serviceName = sprintf(_JSHOP_PAYMENT_NUMBER, $order->order_number);
        $recipientAmount = number_format(floatval($order->order_total), 2, '.', '');
        $hash_string = $pmconfigs['eshop_id'] . '::' . $recipientAmount . '::' . $order->currency_code_iso . '::' . $order->email . '::' . $serviceName . '::' . $order->order_id . '::::' . $pmconfigs['secret_key'];
        ?>
        <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        </head>
        <body>
        <form id="paymentform" action="https://rbkmoney.ru/acceptpurchase.aspx" name="paymentform" method="post">
            <input type="hidden" name="eshopId" value="<?php echo $pmconfigs['eshop_id']; ?>">
            <input type="hidden" name="orderId" value="<?php echo $order->order_id; ?>">
            <?php if ($pmconfigs['preference']) { ?>
                <input type="hidden" name="preference" value="<?php echo $pmconfigs['preference']; ?>">
            <?php } ?>
            <input type="hidden" name="user_email" value="<?php echo $order->email; ?>">
            <input type="hidden" name="serviceName" value="<?php echo $serviceName; ?>">
            <input type="hidden" name="recipientAmount" value="<?php echo $recipientAmount; ?>">
            <input type="hidden" name="recipientCurrency" value="<?php echo $order->currency_code_iso; ?>">
            <input type="hidden" name="hash" value="<?php echo md5($hash_string); ?>">
            <input type="hidden" name="successUrl" value="<?php echo $return; ?>">
            <input type="hidden" name="failUrl" value="<?php echo $cancel_return; ?>">
        </form>
        <?php print _JSHOP_REDIRECT_TO_PAYMENT_PAGE ?>
        <script type="text/javascript">document.getElementById('paymentform').submit();</script>
        </body>
        </html>
        <?php
        die();
    }

    function getUrlParams($pmconfigs)
    {
        $params = array();
        $params['order_id'] = JRequest::getInt("orderId");
        $params['hash'] = JRequest::getString("hash");
        $params['checkHash'] = 0;
        $params['checkReturnParams'] = $pmconfigs['checkdatareturn'];
        return $params;
    }

}

?>
