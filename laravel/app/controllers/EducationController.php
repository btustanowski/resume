<?php

class EducationController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
	{
        return View::make('admin.education');
	}

	public function getList()
	{
        $r = [];
        try {
            $r['entries'] = Education::all()->toArray();;
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
                $r['entry'] = Education::find(Input::get('id'));
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
                $r['entry'] = Education::create([
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
                $r['status'] = Education::destroy($id);
            } else {
                throw new Exception('Missing entry.');
            }
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

}
