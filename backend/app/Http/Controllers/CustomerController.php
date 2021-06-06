<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customers=DB::table('customers')
      ->select('id', 'FirstName','LastName', 'EmailAddress')
      ->get();

      return view('customer/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $customer=new \App\Models\Models\Customer;

        $customer->Firstname=$request->input('FirstName');
        $customer->Lastname=$request->input('LastName');
        $customer->EmailAddress=$request->input('EmailAddress');
    
        $customer->save();
    
        //一覧表示画面にリダイレクト
        return redirect('customer/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSearch(Request $request)
  {
    $serach=$request->input('q');

    $query=DB::table('customers');

    //検索ワードの全角スペースを半角スペースに変換
    $serach_spaceharf=mb_convert_kana($serach, 's');


    //検索ワードを半角スペースで区切る
    $keyword_array=preg_split('/[\s]+/', $serach_spaceharf, -1, PREG_SPLIT_NO_EMPTY);

    //検索ワードをループで回してマッチするレコードを探す
    foreach ($keyword_array as $keyword) {
        $query->where('EmailAddress', 'like', '%'.$keyword.'%');
      }

    $query->select('id', 'FirstName', 'LastName', 'EmailAddress');
    $customers=$query->paginate(20);

    return view('customer/index', compact('customers'));
  }
}
