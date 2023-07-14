<?php
if (! function_exists('textLimit'))
{
    function textLimit($text, $lenght = 100, $end = '...')
    {
        if (strlen($text) > $lenght)
        {
            $text = substr($text, 0, $lenght);
            $text = substr($text, 0, strrpos($text, ' '));
            $text = $text . $end;
        }
        return $text;
    }
}
