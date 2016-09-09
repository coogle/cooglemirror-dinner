<?php

namespace Cooglemirror\Dinner\Controllers;

use Cooglemirror\Dinner\Models\DinnerMenu;
class DinnerController extends \Controller {

    public function editDinners()
    {
        $menuItems = DinnerMenu::all()->lists('menu', 'day');
        
        return \View::make("cooglemirror-dinner::editor", compact('menuItems'));
    }
    
    public function saveDinners()
    {
        $menuItems = \Input::get('menuItem', []);
        
        if(!is_array($menuItems)) {
            return \Redirect::route('cooglemirror-dinner.dinner');
        }
        
        foreach($menuItems as $day => $item) {
            switch($day) {
                case 'sun':
                case 'mon':
                case 'tues':
                case 'weds':
                case 'thurs':
                case 'fri':
                case 'sat':
                    
                    $menuObj = DinnerMenu::where('day', '=', $day)->first();
                    
                    if(!$menuObj instanceof DinnerMenu) {
                        $menuObj = new DinnerMenu();
                        $menuObj->day = $day;
                    }
                    
                    $menuObj->menu = (string)$item;
                    $menuObj->save();
                    break;
                default:
                    break;
            }
        }
        
        return \Redirect::route('cooglemirror-dinner.dinner');
    }
}