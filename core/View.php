<?php

namespace app\core;

use app\models\Cart;

class View {
    
    public string $title = 'Tennis';

    public function render($view, $params){
        $templateRend = $this->renderTemplate($params);
        $viewRend = $this->renderView($templateRend, $view, $params);
        return $view === 'home' || $view === 'cart' || $view === 'product'
            ? $this->renderComponents($view, $viewRend, $params)
            : $viewRend;
    }

    public function renderTemplate($params){
        $layout = Application::$ROOT_DIR."/views/layouts/main.php";
        $idcustomer = Session::get('user')['idcustomer'] ?? 0;
        $params['cartProducts'] = Cart::getCart($idcustomer);
        $params += Cart::getTotalElements($idcustomer);
        $templateRend = $this->captureOutput($layout, $params);
        $params['profileName'] = Session::get('user')['name'] ?? false;
        if(!$params['profileName']){
            $profile = Application::$ROOT_DIR."/views/nav/login.php";
        } else {
            $profile = Application::$ROOT_DIR."/views/nav/profile.php";
        }
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
            case 'home': case'product': case 'category':
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