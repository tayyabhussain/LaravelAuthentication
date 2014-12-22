<?php

class AccountController extends BaseController
{
    /*
     *  GET Create
     */

    public function getCreate()
    {

        return View::make('account.create');
    }

    /*
     *  POST Create
     */

    public function postCreate()
    {
        $validator = Validator::make(
                        Input::all(), array(
                    'username' => 'required|max:50|min:6',
                    'email' => 'required|max:50|min:6',
                    'password' => 'required|max:50|min:6',
                    'password_confirm' => 'required|same:password'
                        )
        );
        if ($validator->fails()) {
            return Redirect::route('account-create')
                            ->withErrors($validator)
                            ->withInput();
        }
        else {
            $username = Input::get('username');
            $email = Input::get('email');
            $password = Input::get('password');

            $code = str_random(60);

            $person = Person::create(array(
                        'username' => $username,
                        'email' => $email,
                        'password' => Hash::make($password),
                        'code' => $code,
                        'active' => 0
            ));
            if ($person) {
                // email sending
                Mail::send('emails.auth.mailbody', array('link' => URL::route('account-activate', $code), 'username' => $username), function($msg) use ($person) {
                    $msg->to($person->email, $person->username)
                            ->subject('Activate you account');
                });
                return Redirect::route('home')
                                ->with('global', 'check email to varify account');
            }
        }
        return 'POST';
    }

    /*
     * Get Activate
     */

    public function getActivate($code)
    {
        $person = Person::where('code', '=', $code)->where('active', '=', '0')->first();
        if ($person) {
            $person->active = '1';
            $person->code = '';
            $person->save();
        }
        if ($person->save()) {
            return Redirect::route('home')
                            ->with('global', 'Account has been activatedm You can now Sign In');
        }
        else {
            return Redirect::route('home')
                            ->with('global', 'Account cannot be activated');
        }
    }

    /*
     * Get Sign In
     */

    public function getSignIn()
    {
        return View::make('account.signin');
    }

    /*
     * Post Sign In
     */

    public function postSignIn()
    {
        $validator = Validator::make(Input::all(), array(
                    'email' => 'required|email',
                    'password' => 'required'
        ));
        $remember=(Input::has('remember')) ? true :false;
        if ($validator->fails()) {
            return Redirect::route('account-sign-in')
                            ->withErrors($validator);
        }
        else {
            $auth = Auth::attempt(array(
                        'email' => Input::get('email'),
                        'password' => Input::get('password'),
                        'active' => '1'
            ),$remember);
            if ($auth) {
                return Redirect::route('home')->with('global', 'welcome');
            }
        }
        return Redirect::route('account-sign-in')
                        ->with('global', 'Error, Try Again');
    }

    public function getSignOut()
    {
        Auth::logout();
        return Redirect::route('home')->with('global','You are now Signed Out');
    }
    
    public function getShowProfile(){
        return View::make('account.showprofile');
    }

}
