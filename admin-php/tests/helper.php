<?php

function create($class, int $num = null, array $attributes = [])
{
    return $class::factory($num)->create($attributes);
}

function make($class, int $num = null, array $attributes = [])
{
    return $class::factory($num)->make($attributes);
}
