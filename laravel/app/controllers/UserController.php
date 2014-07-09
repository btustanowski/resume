<?php

class UserController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
	{
        return View::make('admin.users');
	}

	public function getList()
	{
        $r = [];
        try {
            $r['users'] = User::all()->toArray();;
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
	}

	public function postSave()
	{
        $r = [];
        try {
            if(Input::get('id')) {
                $r['action'] = 'edit';
                $r['user'] = User::find(Input::get('id'));
                if($r['user']) {
                    $r['user']->name = Input::get('name');
                    $r['user']->username = Input::get('username');
                    $r['user']->email = Input::get('email');
                    $r['user']->level = Input::get('level');
                    if(Input::get('password')) $r['user']->password = Hash::make(Input::get('password'));
                    $r['user']->save();
                } else {
                    throw new Exception('Missing user.');
                }
            } else {
                $r['action'] = 'add';
                $r['user'] = User::create([
                    'name' => Input::get('name'),
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'level' => Input::get('level'),
                    'password' => Hash::make(Input::get('password'))
                ]);
            }

        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
	}

    public function deleteDestroy($id)
    {
        $r = [];
        try {
            if(Auth::user()->id == $id) {
                throw new Exception('Nie można usunąć aktualnego użytkownika.');
            }
            if((int)$id) {
                $r['status'] = User::destroy($id);
            } else {
                throw new Exception('Missing user.');
            }
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

}
