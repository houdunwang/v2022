<?php

function create($class, $attributes = [], $num = null)
{
    return $class::factory($num)->create($attributes);
}

function make($class, $attributes = [], $num = null)
{
    return $class::factory($num)->make($attributes);
}
