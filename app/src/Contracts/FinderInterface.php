<?php namespace Bakeoff\Contracts;

interface FinderInterface
{
    public function commonQuery();

    public function getResults();

    public function getModel();

    public function find($id);
}