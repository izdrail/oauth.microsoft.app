<?php

namespace LzoMedia\Heineken\Classes;

use Microsoft\Graph\Graph;


class OutlookEmail
{

    protected $token;

    public function getConnection(): Graph
    {
        $folder = getcwd();
        $token = trim(file_get_contents($folder . '/token.txt'));
        $graph = new Graph();
        $graph->setAccessToken($token);
        return $graph;
    }



}
