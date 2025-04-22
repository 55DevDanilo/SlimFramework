<?php

namespace MyApp\controllers;
class Home {


    protected $view;

    public function __construct($view)
    {
        $this->view = $view;
    }
    public function index ($request, $response)
    {
      //  $view = $this->conatainer->get('view');
        var_dump($this->view);
        return $response->write('teste index');
    }


}

?> 