<h1>{{$account->name}}'s Sessions:</h1>
@foreach ($sessions as $session)
    <br>
    <p>Session on: {{$session->session_date}} at: {{$session->session_time}}</p>
    <p>Message: {{$session->message}}</p>
    <form method="POST" action={{ route('store.message2', ['session' => $session]) }} enctype="multipart/form-data">
        @csrf
        <p>Feedback:     <input type="text" name="message"></p>
        <input type="submit" value="Set Feedback">
    </form>
    <a href={{ route('destroy.session', ['session' => $session]) }}>Delete Session</a>
    <a href={{ route('edit.session', ['session' => $session]) }}>Edit Session</a>
    <br>
@endforeach
<br>
<br>
<br>
<a href={{ route('create.session', ['account' => $account]) }}>Add Session</a>