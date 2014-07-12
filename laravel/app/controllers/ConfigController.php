<?php

class ConfigController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
	{
        return View::make('admin.config');
	}

	public function getList()
	{
        $r = [];
        try {
            $r['entries'] = Conf::all()->toArray();
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
                $r['entry'] = Conf::find(Input::get('id'));
                if($r['entry']) {
                    $r['entry']->entry = Input::get('entry');
                    $r['entry']->value = Input::get('value');
                    $r['entry']->save();
                } else {
                    throw new Exception('Missing entry.');
                }
            } else {
                $r['action'] = 'add';
                $r['entry'] = Conf::create([
                    'entry' => Input::get('entry'),
                    'value' => Input::get('value')
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
                $r['status'] = Conf::destroy($id);
            } else {
                throw new Exception('Missing entry.');
            }
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

}
