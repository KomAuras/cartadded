<?php

class shopCartaddedPlugin extends shopPlugin
{
    public function frontendCartAdded()
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

            return [
                'after_items' => $view->fetch($this->path . '/templates/hooks/frontendCartAdded.html')
            ];
        }
    }
}