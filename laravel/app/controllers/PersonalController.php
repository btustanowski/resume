<?php

class PersonalController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
	{
        return View::make('admin.personal');
	}

	public function getList()
	{
        $r = [];
        try {
            $r['entries'] = Personal::all()->toArray();
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
                $r['entry'] = Personal::find(Input::get('id'));
                if($r['entry']) {
                    $r['entry']->entry = Input::get('entry');
                    $r['entry']->content = Input::get('content');
                    $r['entry']->save();
                } else {
                    throw new Exception('Missing entry.');
                }
            } else {
                $r['action'] = 'add';
                $r['entry'] = Personal::create([
                    'entry' => Input::get('entry'),
                    'content' => Input::get('content')
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
            if((int)$id) {
                $r['status'] = Personal::destroy($id);
            } else {
                throw new Exception('Missing entry.');
            }
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

}
