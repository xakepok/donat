<?php
defined('_JEXEC') or die;

$action = $params->get('url', 'https://money.yandex.ru/quickpay/confirm.xml');
$receiver = $params->get('receiver');
$qp = $params->get('quickpay-form');
$service = $params->get('service');
$amount = $params->get('sum');
$need_fio = (!$params->get('need-fio')) ? 'false' : 'true';
$need_email = (!$params->get('need-email')) ? 'false' : 'true';
$need_phone = (!$params->get('need-phone')) ? 'false' : 'true';
$need_address = (!$params->get('need-address')) ? 'false' : 'true';
$successURL = $params->get('successURL');
$targets = JText::sprintf($params->get('targets'), JFactory::getUser()->name);
$dat = JDate::getInstance();
$userID = JFactory::getUser()->id;
$label = $service."_".$userID;
$pc = (bool) $params->get('paymentType-PC');
$ac = (bool) $params->get('paymentType-AC');
$mc = (bool) $params->get('paymentType-MC');
?>
<div class="card" style="padding: 7px;">
    <div class="card-body">
        <form action="<?php echo $action; ?>" method="post" target="_blank">
            <input type="hidden" name="receiver" value="<?php echo $receiver;?>">
            <input type="hidden" name="quickpay-form" value="<?php echo $qp;?>">
            <input type="hidden" name="sum" value="<?php echo $amount;?>">
            <input type="hidden" name="need-fio" value="<?php echo $need_fio;?>">
            <input type="hidden" name="need-email" value="<?php echo $need_email;?>">
            <input type="hidden" name="need-phone" value="<?php echo $need_phone;?>">
            <input type="hidden" name="need-address" value="<?php echo $need_address;?>">
            <input type="hidden" name="need-address" value="<?php echo $need_address;?>">
            <input type="hidden" name="successURL" value="<?php echo $successURL;?>">
            <input type="hidden" name="label" value="<?php echo $label;?>">
            <input type="hidden" name="targets" value="<?php echo $targets;?>">
            <?php if ($pc): ?>
                <div class="row">
                    <div class="col-1">
                        <input class="form-check-input" type="radio" name="paymentType" id="paymentTypePC" value="paymentType-PC">
                    </div>
                    <div class="col-11">
                        <label class="form-check-label" for="paymentTypePC"><?php echo JText::sprintf('MOD_DONAT_PAYMENT_TYPE_PC_USER');?></label>
                    </div>
                </div>
            <?php endif;?>
            <?php if ($ac): ?>
            <div class="row">
                <div class="col-1">
                    <input class="form-check-input" type="radio" name="paymentType" id="paymentTypeAC" value="paymentType-AC" checked>
                </div>
                <div class="col-11"><label class="form-check-label" for="paymentTypeAC"><?php echo JText::sprintf('MOD_DONAT_PAYMENT_TYPE_AC_USER');?></label></div>
            </div>
            <?php endif;?>
            <?php if ($mc): ?>
            <div class="row">
                <div class="col-1">
                    <input class="form-check-input" type="radio" name="paymentType" id="paymentTypeMC" value="paymentType-MC">
                </div>
                <div class="col-11">
                    <label class="form-check-label" for="paymentTypeMC"><?php echo JText::sprintf('MOD_DONAT_PAYMENT_TYPE_MC_USER');?></label>
                </div>
            </div>
            <?php endif;?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary"><?php echo JText::sprintf('MOD_DONAT_GO_DONAT');?></button>
            </div>
        </form>
    </div>
</div>