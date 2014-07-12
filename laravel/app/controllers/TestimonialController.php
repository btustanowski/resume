<?php

class TestimonialController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function getIndex()
	{
        return View::make('admin.testimonials');
	}

	public function getList()
	{
        $r = [];
        try {
            $r['entries'] = Testimonial::all()->toArray();;
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
                $r['entry'] = Testimonial::find(Input::get('id'));
                if($r['entry']) {
                    $r['entry']->company = Input::get('company');
                    $r['entry']->content = Input::get('content');
                    $r['entry']->save();
                } else {
                    throw new Exception('Missing entry.');
                }
            } else {
                $r['action'] = 'add';
                $r['entry'] = Testimonial::create([
                    'company' => Input::get('company'),
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
                $r['status'] = Testimonial::destroy($id);
            } else {
                throw new Exception('Missing entry.');
            }
        } catch(Exception $e) {
            $r['error'] = $e->getMessage();
        }
        return Response::json($r);
    }

}
