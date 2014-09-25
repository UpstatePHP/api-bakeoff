<?php namespace Bakeoff\Contracts;

interface ResourceControllerInterface
{

    public function listAll();

    public function show($id);

    public function create();

    public function update($id);

    public function delete($id);
}