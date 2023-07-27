<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CRMLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */

     /**
     * The page tile for <head>-><title> tag
     *
     * @var string
     */
    public $pageTitle;
    public $pageDescription;

    /**
     * Create the component instance.
     *
     * @param  string  $pageTitle
     * @return void
     */
    public function __construct($pageTitle, $pageDescription = '')
    {
        $this->pageTitle = $pageTitle;
        $this->pageDescription = $pageDescription;
    }


    public function render()
    {
        return view('crmlayout.layout');
    }
}
