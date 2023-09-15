<?php

namespace App\Services;

class StringSpanWrapper
{

    public static function createSpan($inputString): array|string|null
    {
        $pattern = '/(:\w+)/';
        $replacement = '<span dynamic class="p-1 bg-lime-400 rounded-md pointer-events-none">$1</span>';
        $outputString = preg_replace($pattern, $replacement, $inputString);

        return $outputString;
    }


    public static function getJsonizedParams($inputString): string|array
    {
        $parameters = [];
        $separated = explode(' ', $inputString);
        foreach ($separated as $word){
            if (str_contains($word, ':')){
                $parameters[] = $word;
            }
        }
//        if (!empty($parameters)){
//            dd(json_encode($parameters));
//        }
        return  json_encode($parameters);
    }

}
