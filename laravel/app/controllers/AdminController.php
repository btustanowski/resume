<?php

class AdminController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', ['except' => ['getIndex', 'postLogin']]);
    }

	public function getIndex()
	{
        if(Auth::check()) {
            return View::make('admin.dash');
        }
		return View::make('admin.login');
	}

    public function postLogin()
    {
        $r = [];
        try {
            if (!Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')]))
                throw new Exception('Wrong username or password.');

            if (Auth::user()->id == 0)
                throw new Exception('Incorrect user.');

            $r['status'] = 1;
        } catch(Exception $e) {
            Auth::logout();
            $r['status'] = 0;
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/admin');
    }

    public function getWelcome()
    {
        return View::make('admin.welcome');
    }

}