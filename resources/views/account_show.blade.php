<h1>{{$account->name}}'s Sessions:</h1>
@foreach ($sessions as $session)
    <p>Session on: {{$session->session_date}} at: {{$session->session_time}}</p>
    <a href={{ route('destroy.session', ['session' => $session]) }}>Delete Session</a>
    <a href={{ route('edit.session', ['session' => $session]) }}>Edit Session</a>
@endforeach
<br>
<br>
<br>
<a href={{ route('create.session', ['account' => $account]) }}>Add Session</a>