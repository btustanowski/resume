<?php

class SampleController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
	{
        return View::make('admin.samples');
	}

	public function getList()
	{
        $r = [];
        try {
            $r['entries'] = Sample::all()->toArray();;
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
                $r['entry'] = Sample::find(Input::get('id'));
                if($r['entry']) {
                    $r['entry']->language = Input::get('language');
                    $r['entry']->content = Input::get('content');
                    $r['entry']->description = Input::get('description');
                    $r['entry']->save();
                } else {
                    throw new Exception('Missing entry.');
                }
            } else {
                $r['action'] = 'add';
                $r['entry'] = Sample::create([
                    'language' => Input::get('language'),
                    'content' => Input::get('content'),
                    'description' => Input::get('description')
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
                $r['status'] = Sample::destroy($id);
            } else {
                throw new Exception('Missing entry.');
            }
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

}
