<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>config('mvc.route_prefix')], function () { // remove this line if you dont have route group prefix
    Route::group(['middleware'=>['userRoles']], function () {
        //minute
		Route::prefix('minute')->as('minute')->group(function () {
			Route::get('data', 'Minute\MinuteController@data');
			Route::get('delete/{id}', 'Minute\MinuteController@delete');
		});
		Route::resource('minute', 'Minute\MinuteController');
		//end-minute
		//{{route replacer}} DON'T REMOVE THIS LINE
    });
});
