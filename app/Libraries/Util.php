<?php

namespace App\Libraries;

class Util
{
    /**
     * @param string $lang
     * @param $date
     * @return \DateTime|string
     * @throws \Exception
     */
    static function formatDate($lang = 'es', $date)
    {
        $dateFormat = new \DateTime($date);

        switch ($lang)
        {
            case "pt-br":
                $dateFormat = $dateFormat->format('d/m/Y H:i:s');
                break;
            default:
                $dateFormat = $dateFormat->format('Y-m-d H:i:s');
                break;
        }

        return $dateFormat;
    }

    /**
     * Monta uma página com o component padrão head e body
     * 
     * @param string $viewPath Arquivo principal da página
     * @param string $titleView Titulo dá página ou da view para o head
     * @param array $data
     * @param array option
     * 
     * @return string
     */
    static function renderView(
        string $viewPath, 
        string $titleView = "",
        array $data = [],
        array $option = []
    )
    {
        $content = view($viewPath, $data, $option);
        $footer  = view("components/footer_default");
        
        return view("components/head_default", [
            "titleView" => $titleView,
            "content"   => $content,
            "footer"    => $footer
        ]);
    }
}
