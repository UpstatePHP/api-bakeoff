<?php namespace Bakeoff\Traits;

trait UniqueID
{
    public static function generateID()
    {
        $now = microtime(true);
        $unique = uniqid();
        $combined = preg_replace('/\D/', '', $unique+$now);

        return base_convert($combined, 10, 32);
    }
}