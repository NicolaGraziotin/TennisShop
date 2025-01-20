<?php

namespace app\core;

use app\models\Cart;

class View {

    public function render($view, $params){
        $templateRend = $this->renderTemplate($params);
        $viewRend = $this->renderView($templateRend, $view, $params);
        return $view === 'home' || $view === 'cart' || $view === 'product' || $view === 'orders' || $view === 'orderDetails'
            ? $this->renderComponents($view, $viewRend, $params)
            : $viewRend;
    }

    public function renderTemplate($params){
        $layout = Application::$ROOT_DIR."/views/layouts/".Application::$app->layout.".php";
        $templateRend = $this->captureOutput($layout, $params);
        $nav = '';
        if(!Session::isLogged()){
            $nav = 'login';
            
        } else {
            $nav = 'profile';
        }
        $profile = Application::$ROOT_DIR."/views/nav/{$nav}.php";
        return str_replace('{{profile}}', $this->captureOutput($profile, $params), $templateRend);
    }

    public function renderView($template, $view, $params){
        $view = Application::$ROOT_DIR."/views/$view.php";
        $viewOut = $this->captureOutput($view, $params);
        return str_replace('{{view}}', $viewOut, $template);
    }

    public function renderComponents($view, $viewRend, $params){
        $componentsContent = '';
        switch($view){
            case 'home': case'product':
                foreach($params["homeProducts"] as $prod){
                    foreach ($prod as $key => $value) {
                        $$key = $value;
                    }
                    $componentsContent .= $this->captureOutput(Application::$ROOT_DIR."/views/components/homeProduct.php", $prod);
                }
                break;
            case 'cart':
                foreach($params["cartProducts"] as $prod){
                    foreach ($prod as $key => $value) {
                        $$key = $value;
                    }
                    $componentsContent .= $this->captureOutput(Application::$ROOT_DIR."/views/components/cartProduct.php", $prod);
                }
                break;
            case 'orders':
                foreach($params["orders"] as $prod){
                    foreach ($prod as $key => $value) {
                        $$key = $value;
                    }
                    $componentsContent .= $this->captureOutput(Application::$ROOT_DIR."/views/components/orderComponent.php", $prod);
                }
                break;
            case 'orderDetails':
                foreach($params["orderDetails"] as $prod){
                    foreach ($prod as $key => $value) {
                        $$key = $value;
                    }
                    $componentsContent .= $this->captureOutput(Application::$ROOT_DIR."/views/components/orderDetailsComponent.php", $prod);
                }
                break;
            default:
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