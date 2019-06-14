<?php

namespace App\Http\Composers;

use App\Category;
use Illuminate\View\View;

class NavigationComposer {

	public function categories(View $view) {
		$categories = Category::all();
		$view->with(['categories'=>$categories]);
	}

}