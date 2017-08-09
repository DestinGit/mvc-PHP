<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 09/08/2017
 * Time: 16:02
 */

namespace m2i\Framework;


class View
{
    public function renderView($template, $data = [], $layout='default-layout') {
        $content = $this->getTemplateHtml($template, $data);

        $data['viewContent'] = $content;

        if (!isset($data['pageTitle'])) {
            $data['pageTitle'] = 'Mon Site Du Boss';
        }

        return $this->getTemplateHtml($layout, $data);
    }

    private function getTemplateHtml($template, $data = []) {
        ob_start();

        extract($data);

        require VIEW_PATH . '/' . $template . '.php';

        return ob_get_clean();
    }
}