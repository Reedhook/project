<?php

namespace App\Http\Controllers\Admin\Main;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __invoke(){
        return view('admin.main.index');
    }
}
