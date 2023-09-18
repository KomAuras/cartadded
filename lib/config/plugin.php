<?php

return array(
    'name' => 'Cart Added',
    'description' => /*_wp*/
        ('Добавление некоторого функционала в корзину'),
    'version' => '1.0.0',
    'vendor' => 1010465,
    'img' => 'img/cartadded.png',
    'frontend' => true,
    'shop_settings' => false,
    'handlers' => array(
        'frontend_order_cart_vars' => 'frontendCartAdded',
        'frontend_footer' => 'frontendFoot',
    )
);