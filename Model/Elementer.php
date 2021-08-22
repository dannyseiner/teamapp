<?php 

class Elementer{
    public static function Create(string $block, array $variables = []){
        $layout = fopen("Src/Blocks.layout", 'r');
        $reader = fread($layout, 9999);
        $data = self::getBetween($reader, '{'.$block.'}' , '{/'.$block.'}');

        foreach($variables as $key){
            $index =  array_search($key, $variables);
            if(str_contains($data, "[#$index]")){
                $data = str_replace( "[#".$index."]", $key, $data);
            }
        }
        echo $data;
    }

    public static function getBetween($string, $start = "", $end = ""){
        if(!strpos($string, $start) || !strpos($string, $end)) ErrorHandler::init([ 
            "header" => "Elementer ERROR",
            "code" => 404,
            "text" => "Block $start doesn't exists or wrong syntax!",
            "file" => "__FILE__",
            "line" => "__LINE__"
        ]);
        if (strpos($string, $start)) {
            $startCharCount = strpos($string, $start) + strlen($start);
            $firstSubStr = substr($string, $startCharCount, strlen($string));
            $endCharCount = strpos($firstSubStr, $end);
            if ($endCharCount == 0) {
                $endCharCount = strlen($firstSubStr);
            }
            return substr($firstSubStr, 0, $endCharCount);
        } else {
            ErrorHandler::init([ 
                "header" => "Elementer ERROR",
                "code" => 404,
                "text" => "Block $start doesn't exists!",
                "file" => "__FILE__",
                "line" => "__LINE__"
            ]);
            return;
        }
    }
}