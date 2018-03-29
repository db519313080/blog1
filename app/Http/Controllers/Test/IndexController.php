<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * 根据路由 paht=comt  ...
     * 选择中间件
     * IndexController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        if(strpos($request->getUri(),'path=comt') !== false)
        {
            $this->middleware('comt');
        } elseif (strpos($request->getUri(),'path=rank') !== false) {
            $this->middleware('rank');
        }
    }

    public function vueIndex()
    {
        echo 123;
    }
}