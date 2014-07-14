<?php

class HomeController extends BaseController {

	public function landing()
	{
        return View::make('hello', [
            'conf' => Conf::getArray(),
            'personal' => Personal::all(),
            'experience' => Experience::all(),
            'education' => Education::all(),
            'skills' => Skill::all(),
            'interests' => Interest::all(),
            'samples' => Sample::all(),
        ]);
	}
}
