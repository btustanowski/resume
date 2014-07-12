<?php

class SkillController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
	{
        return View::make('admin.skills');
	}

	public function getList()
	{
        $r = [];
        try {
            $r['entries'] = Skill::all()->toArray();
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
                $r['entry'] = Skill::find(Input::get('id'));
                if($r['entry']) {
                    $r['entry']->name = Input::get('name');
                    $r['entry']->save();
                } else {
                    throw new Exception('Missing entry.');
                }
            } else {
                $r['action'] = 'add';
                $r['entry'] = Skill::create([
                    'name' => Input::get('name')
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
                $r['status'] = Skill::destroy($id);
            } else {
                throw new Exception('Missing entry.');
            }
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

}
