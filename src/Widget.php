<?php

namespace Cooglemirror\Dinner;

use Cooglemirror\Dinner\Models\DinnerMenu;
use Carbon\Carbon;

class Widget
{
    public function compose($view)
    {
        $menuItems = DinnerMenu::all()->lists('menu', 'day');

        switch(Carbon::now()->dayOfWeek) {
            case 0:
                $dayOfWeek = 'sun';
                break;
            case 1:
                $dayOfWeek = 'mon';
                break;
            case 2:
                $dayOfWeek = 'tues';
                break;
            case 3:
                $dayOfWeek = 'weds';
                break;
            case 4:
                $dayOfWeek = 'thurs';
                break;
            case 5:
                $dayOfWeek = 'fri';
                break;
            case 6:
                $dayOfWeek = 'sat';
                break;
        }
        
        $view->with("cooglemirror_dinner_menuitems", $menuItems);
        $view->with("cooglemirror_dinner_dayofweek", $dayOfWeek);
    }
    
}