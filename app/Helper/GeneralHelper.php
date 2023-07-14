<?php
if (! function_exists('changeDateFormat'))
{
    function changeDateFormat($date)
    {
        return date('d.m.Y', strtotime($date));
    }
}
