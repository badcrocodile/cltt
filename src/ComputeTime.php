<?php namespace Acme;



class ComputeTime
{
    public static function computeSomething($some_time)
    {
        $upper = strtolower($some_time);
        return $upper;
    }
}