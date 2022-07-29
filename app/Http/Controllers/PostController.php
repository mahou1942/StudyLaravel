<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 顯示創建博客文章的表單。
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user_create');
    }

    public function create2()
    {
        return view('user_create2');
    }

    public function create3()
    {
        return view('user_create');
    }

    /**
     * 存儲一篇新的博客文章。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request);



//        $validated = $request->validate([
//            'title' => 'required|unique:posts|max:255',
//            'body' => 'required',
//        ]);

//        $validated = $request->validate([
//            'title' => ['required' , 'unique:posts' , 'max:255'],
//            'body' => ['required'],
//        ]);
//
//        $validated = $request->validateWithBag('post' , [
//            'title' => ['bail' , 'required' , 'unique:posts' , 'max:255'],
//            'body' => ['required'],
//        ]);

        return "aaaa";


        // 博客文章驗證通過...
    }
}
