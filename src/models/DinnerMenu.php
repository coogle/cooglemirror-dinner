<?php

namespace Cooglemirror\Dinner\Models;

class DinnerMenu extends \Eloquent
{
    protected $table = "dinner_menu";
    protected $dates = ['created_at', 'updated_at'];
    protected $primaryKey = "day";
}