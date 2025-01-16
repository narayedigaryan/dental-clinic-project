<?php

namespace core;

class View
{
    public string $layout;
    public string $content = '';

    public function __construct($layout='default')
    {
        $this->layout = $layout;
    }

    public function render($view, $data = [], $layout = ''): string
    {
        extract($data);
        //  $view = new \core\View('default');
        $view_file = VIEW . "/{$view}.php";
        if (is_file($view_file)) {
            ob_start();
            require $view_file;
            $this->content = ob_get_clean();
        } else {
            abort("View {$view_file} not found", 404);
        }

        if (false === $layout) {
            return $this->content;
        }
        $layout_file_name = $layout ?: $this->layout;
        $layout_file = VIEW . "/{$layout_file_name}.php";
        if (is_file($layout_file)) {
            ob_start();
            require_once $layout_file;
            return ob_get_clean();

        } else {
            abort("View {$layout_file} not found", 500);
        }

        return '';
    }
    public function renderPartial($view, $data = []): string
    {
        extract($data);
        $view_file = VIEW . "/{$view}.php";
        if (is_file($view_file)) {
            ob_start();
            require $view_file;
            return ob_get_clean();
        } else {
            return "File {$view_file} not found";
        }
    }


}




