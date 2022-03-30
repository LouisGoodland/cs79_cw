<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Session;
use App\Models\Movement;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Account $account)
    {
        return view('create_session', ['account' => $account]);
    }

    public function create2(Session $session)
    {
        $movements = Movement::where('session_id', $session->id)->
        orderBy('order', 'ASC')->get();
        $account = Account::where('id', $session->account_id);
        return view('create_session2', 
        ['session' => $session, 'account' => $account, 'movements' => $movements]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Account $account)
    {
        $validated_content = $request->validate([
            'date' => 'required',
            'task_type' => 'required',
            'time' => 'required'
        ]);
        //Make new session
        $s = new Session;
        $s->session_date = $validated_content['date'];
        $s->session_status = "Not Started";
        $s->task_type = $validated_content['task_type'];
        $s->session_time = $validated_content['time'];
        $s->account_id = $account->id;
        $s->save();
        
        return redirect(route('edit.session', ['session' => $s]));
    }

    public function store2(Request $request, Session $session)
    {

        if($request->date!=null){
            $session->session_date = $request->date;
        }
        if($request->task_type!=null){
            $session->task_type = $request->task_type;
        }
        if($request->time!=null){
            $session->session_time = $request->time;
        }
        if($request->message!=null){
            $session->message = $request->message;
        }
        
        //$session->task_type = $validated_content['task_type'];
        //$session->session_time = $validated_content['time'];
        //$session->message = $validated_content['message'];
        $session->save();
        
        return redirect(route('edit.session', ['session' => $session]));
    }

    public function store3(Request $request, Session $session)
    {
        $validated_content = $request->validate([
            'movement_type' => 'required'
        ]);

        $m = new Movement;
        $m->movement_type = $validated_content['movement_type'];
        $m->session_id = $session->id;
        $m->order = Movement::where('session_id', $session->id)->count();

        $m->save();
        return redirect(route('edit.session', ['session' => $session]));
    }

    public function redirect_to_account(Session $session)
    {
        $account = Account::where('id', $session->account_id)->first();
        return redirect(route('show.account', ['account' => $account]));
    }

    public function move_down(Session $session, Movement $movement)
    {
        $movement_to_go_up = Movement::where('session_id', $session->id)
        ->where('order', ($movement->order - 1))->first();
        $movement_to_go_up->order = $movement_to_go_up->order + 1;
        $movement_to_go_up->save();

        $movement->order = $movement->order - 1;
        $movement->save();
        
        return redirect(route('edit.session', ['session' => $session]));
    }

    public function move_up(Session $session, Movement $movement)
    {
        $movement_to_go_down = Movement::where('session_id', $session->id)
        ->where('order', ($movement->order + 1))->first();
        $movement_to_go_down->order = $movement_to_go_down->order - 1;
        $movement_to_go_down->save();

        $movement->order = $movement->order + 1;
        $movement->save();
        
        return redirect(route('edit.session', ['session' => $session]));
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
    public function destroy(Session $session)
    {
        $account = Account::where('id', $session->account_id)->first();
        $session->delete();

        return redirect(route('show.account', ['account' => $account]));
    }
}
