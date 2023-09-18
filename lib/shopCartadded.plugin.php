<?php

class shopCartaddedPlugin extends shopPlugin
{
    // заполняем данные в хуке frontend_order_cart_vars
    // в переменную after_items
    public function frontendCartAdded()
    {
        $class = new shopCartaddedPluginBase();
        $result = $class->getData();

        if ($result) {
            return [
                'after_items' => $result
            ];
        }
    }

    // добавялем загрузку JS файла на сайте
    public function frontendFoot()
    {
        $view = wa()->getView();
        return $view->fetch($this->path . '/templates/frontend/script.html');
    }
}