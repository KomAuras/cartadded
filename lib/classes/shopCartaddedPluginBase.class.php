<?php

class shopCartaddedPluginBase
{
    // функция возвращает текст из шаблона с процентом текущей скидки
    // процент вычисляется из суммы корзины и суммы скидки
    public function getData()
    {
        $code = waRequest::cookie('shop_cart');
        if (!$code) {
            return '';
        }
        $cart = new shopCart($code);

        if ($cart->discount() > 0) {

            $view = wa()->getView();
            $view->assign(array(
                'percent' => round($cart->discount() / ($cart->total() + $cart->discount()) * 100)
            ));

            return $view->fetch(wa()->getAppPath('plugins/cartadded/templates/hooks/frontendCartAdded.html'));
        }

        return '';
    }
}