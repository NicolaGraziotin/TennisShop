<?php

namespace app\core;

class View {
    public string $title = 'Tennis';
    public function renderView($view, array $params) {
        $layoutName = Application::$app->layout;
        $viewContent = $this->renderViewOnly($view, $params);
        ob_start();
        $cartQuantity = Application::$app->cartQuantity;
        include_once Application::$ROOT_DIR."/views/layouts/$layoutName.php";
        $layoutContent = ob_get_clean();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderViewOnly($view, array $params){
        if ($view === 'product') {
            return $this->renderProduct($view, $params);
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        $viewContent = ob_get_clean();
        if ($view === 'home'|| $view === 'cart') {
            $layoutContent = $this->renderComponents($view, $params);
            return str_replace('{{content}}', $layoutContent, $viewContent);
        }
        return $viewContent;
    }

    public function renderComponents($view, $params) {
        ob_start();
        foreach ($params as $prod) {
            foreach ($prod as $key => $value) {
                $$key = $value;
            }
            include Application::$ROOT_DIR."/views/components/{$view}Product.php";
        }
        return ob_get_clean();
    }

    public function renderProduct($view, $params) {
        ob_start();
        foreach ($params['item'] as $key => $value) {
            $$key = $value;
        }
        include_once Application::$ROOT_DIR."/views/$view.php";
        $viewContent = ob_get_clean();
        $view = 'home';
        $layoutContent = $this->renderComponents($view, $params['components']);
        return str_replace('{{content}}', $layoutContent, $viewContent);
    }
}