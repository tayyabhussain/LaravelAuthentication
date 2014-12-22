<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@showHome'
        )
);
/*
 * UnAuthorize Group
 */
Route::group(array('before' => 'guest'), function() {
    /*
     * CSRF Group
     */
    Route::group(array('before' => 'csrf'), function() {

        /*
         * Post Create
         */
        Route::post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AccountController@postCreate'
                )
        );
        /*
         * GET Create
         */
        Route::get('/account/create', array(
            'as' => 'account-create',
            'uses' => 'AccountController@getCreate'
                )
        );
        /*
         * Get Activate
         */
        Route::get('/account/activate/{code}', array(
            'as' => 'account-activate',
            'uses' => 'AccountController@getActivate'
                )
        );

        /*
         * Get Sign IN
         */
        Route::get('/account/sign-in', array(
            'as' => 'account-sign-in',
            'uses' => 'AccountController@getSignIn'
                )
        );

        /*
         * Post Sign IN
         */
        Route::Post('/account/sign-in', array(
            'as' => 'account-sign-in',
            'uses' => 'AccountController@postSignIn'
                )
        );
    }
    );
}
);

/*
 * Authenticated Group
 */
Route::group(array('before' => 'auth'), function() {
    /*
     * Sign Out Get
     */
    Route::get('/account/sign-out',array(
        'as'=> 'account-sign-out',
        'uses'=>'AccountController@getSignOut'
    ));
    Route::get('/account/show-profile',array(
        'as'=> 'account-show-profile',
        'uses'=>'AccountController@getShowProfile'
    ));
});
