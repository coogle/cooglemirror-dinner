<?php namespace Cooglemirror\Dinner;

use Illuminate\Support\ServiceProvider;
use Cooglemirror\Dinner\Models\DinnerMenu;
use Carbon\Carbon;

class DinnerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('cooglemirror/dinner', 'cooglemirror-dinner');
		
		if(!\App::runningInConsole()) {
    		if(!\Schema::hasTable('dinner_menu')) {
    		    throw new \Exception("You must run migrations to use this plugin");
    		}
    		
    		DinnerMenu::where('updated_at', '<', Carbon::now()->startOfWeek())->delete();
    		$activeDays = DinnerMenu::lists('day');
    		
            foreach(['mon', 'tues', 'weds', 'thurs', 'fri', 'sat', 'sun'] as $dayOfWeek) {
                if(!in_array($dayOfWeek, $activeDays)) {
                    $blankDay = new DinnerMenu();
                    $blankDay->day = $dayOfWeek;
                    $blankDay->menu = "?????";
                    $blankDay->save();
                }
            }
		}
        
		\Event::listen(\Cooglemirror\Events::RENDER, function($layoutView) {
		    \View::composer('cooglemirror-dinner::widget', '\Cooglemirror\Dinner\Widget');
		    
		    $view = \View::make('cooglemirror-dinner::widget')->render();
		    $layoutView->with(\Config::get('cooglemirror-dinner::widget.placement'), $view);
		});
		
	    \Event::listen(\Cooglemirror\Events::PROCESS_CRON, function(\CronRunCommand $cronCmd) {
	    
	        $this->sundays(function() {
	           DinnerMenu::all()->delete();
	           foreach(['mon', 'tues', 'weds', 'thurs', 'fri', 'sat', 'sun'] as $dayOfWeek) {
	               $blankDay = new DinnerMenu();
	               $blankDay->day = $dayOfWeek;
	               $blankDay->menu = "?????";
	               $blankDay->save();
	           }
	        });
	    
	    });
		
		\Route::get('dinner', [
            'as' => 'cooglemirror-dinner.dinner',
            'uses' => 'Cooglemirror\Dinner\Controllers\DinnerController@editDinners'
        ]);
		
		\Route::post('dinner', [
		    'as' => 'cooglemirror-dinner.dinner.save',
		    'uses' => 'Cooglemirror\Dinner\Controllers\DinnerController@saveDinners'
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
