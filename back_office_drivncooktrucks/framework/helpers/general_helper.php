<?php

function form_null_to_NULL_key_value(array $array) : array
{
    foreach ($array as $key => $value)
    {
        if($value == null)
        {
            $array[$key] = NULL;

        }
        else{
            echo $value  . '<br>';
        }
    }

    return $array;
}

