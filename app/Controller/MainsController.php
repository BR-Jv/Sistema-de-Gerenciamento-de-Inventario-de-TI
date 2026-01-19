<?php

class MainsController extends AppController
{
    public $name = 'Mains';

    public function index()
    {
        $this->set('title_for_layout', 'SGTI - Dashboard');
        $this->layout = 'example';
    }

}
