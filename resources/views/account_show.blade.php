<h1>{{$account->name}}</h1>
@foreach ($sessions as $session)
    <p>{{$session->session_date}}, {{$session->session_time}}</p>
    <a href={{ route('create.session', ['account' => $account]) }}>Delete Session</a>
    <a href={{ route('create.session', ['account' => $account]) }}>Edit Session</a>
@endforeach
<a href={{ route('create.session', ['account' => $account]) }}>Add Session</a>