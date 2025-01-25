<?php

namespace app\core;

use app\models\Cart;

class View {

    public function render($view, $params){
        $layout = Application::$ROOT_DIR."/views/layouts/".Application::$app->layout.".php";
        $templateRend = $this->captureOutput($layout, $params);
        $viewRend = $this->renderView($templateRend, $view, $params);
        return $view === 'home' || $view === 'cart' || $view === 'product' || $view === 'orders' || $view === 'orderDetails'
            ? $this->renderComponents($view, $viewRend, $params)
            : $viewRend;
    }

    public function renderView($template, $view, $params){
        $view = Application::$ROOT_DIR."/views/$view.php";
        $viewOut = $this->captureOutput($view, $params);
        return str_replace('{{view}}', $viewOut, $template);
    }

    public function renderComponents($view, $viewRend, $params){
        $componentsContent = '';
        $comp = '';
        switch($view){
            case 'home': case'product':
                $comp = 'homeProduct';
                break;
            case 'cart':
                $comp = 'cartProduct';
                break;
            case 'orders':
                $comp = 'orderComponent';
                break;
            case 'orderDetails':
                $comp = 'orderDetailsComponent';
                break;
            default:
        }

        foreach($params["{$comp}"] as $prod){
            foreach ($prod as $key => $value) {
                $$key = $value;
            }
            $componentsContent .= $this->captureOutput(Application::$ROOT_DIR."/views/components/{$comp}.php", $prod);
        }

        return str_replace('{{components}}', $componentsContent, $viewRend);
    }

    private function captureOutput($file, $params) {
        extract($params);
        ob_start();
        include $file;
        return ob_get_clean();
    }
}