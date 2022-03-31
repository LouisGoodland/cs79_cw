<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Session;
use App\Models\Movement;

use Illuminate\Http\Request;

class AccountController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_content = $request->validate([
            'account' => 'required'
        ]);
        $a = new Account;
        $a->name = $validated_content['account'];
        $a->save();
        return redirect(route('show.account', ['account' => $a]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        $sessions = Session::where('account_id', $account->id)->get();
        return view('account_show', ['account' => $account, 'sessions' => $sessions]);
    }

    public function collect(Account $account)
    {
        $sessions = Session::where('account_id', $account->id)->
        with('movements')->get();
        return $sessions->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('account_edit', ['account' => $account]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account) 
    {
        

        $validated_content = $request->validate([
            'content' => 'required'
        ]);
        $account->name = $validated_content['content'];
        $account->save();
        
        return view('account_edit', ['account' => $account]);
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
}
