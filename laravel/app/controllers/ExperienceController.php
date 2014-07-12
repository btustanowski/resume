<?php

class ExperienceController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
	{
        return View::make('admin.experience');
	}

	public function getList()
	{
        $r = [];
        try {
            $r['entries'] = Experience::all()->toArray();;
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
                $r['entry'] = Experience::find(Input::get('id'));
                if($r['entry']) {
                    $r['entry']->from = Input::get('from');
                    $r['entry']->to = Input::get('to');
                    $r['entry']->title = Input::get('title');
                    $r['entry']->description = Input::get('description');
                    $r['entry']->save();
                } else {
                    throw new Exception('Missing entry.');
                }
            } else {
                $r['action'] = 'add';
                $r['entry'] = Experience::create([
                    'from' => Input::get('from'),
                    'to' => Input::get('to'),
                    'title' => Input::get('title'),
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
                $r['status'] = Experience::destroy($id);
            } else {
                throw new Exception('Missing entry.');
            }
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

}
