<h1>Edit Session:</h1>

<p>Session on: {{$session->session_date}} at: {{$session->session_time}}</p>
<form method="POST" action={{ route('edit.session.store', ['session' => $session]) }} enctype="multipart/form-data">
    @csrf
    <div class="row">
        <p>Date of Session:   <input type="date" name="date" value="{{$session->session_date}}"></p>
    </div>

    <div class="row">
        <p>Time of Session:   <input type="time" name="time" value="{{$session->session_time}}"></p>
    </div>
    
    <div class="row">
        <label for="task_type">Task Type:</label>
            <select name="task_type">
                <option value="0">Kit</option>
                <option value="1">Phone</option>
                <option value="2">forceActivity</option>
            </select>
    </div>
    <div class="row">
        <br>
    </div>
    <input type="submit" value="Apply Changes">
    <br>
</form>

<p> Current Feedback: {{$session->message}}</p>
<form method="POST" action={{ route('store.message1', ['session' => $session]) }} enctype="multipart/form-data">
    @csrf
    <p>Feedback:     <input type="text" name="message"></p>
    <input type="submit" value="Set Feedback">
</form>


@if ($session->task_type == 2)

    @if($forceActivity != null)
        <p>Min force: {{$forceActivity->lower_threashold}} Max Force: {{$forceActivity->upper_threashold}}
             Duration: {{$forceActivity->time}}</p>
        <form method="POST" action={{ route('store.force.activity', ['session' => $session]) }} enctype="multipart/form-data">
            @csrf
            <p>Min value: <input type="number" name="min" min="0" max="1" step="0.01" value="{{$forceActivity->lower_threashold}}"></p>
            <p>Max value: <input type="number" name="max" min="0" max="1" step="0.01" value="{{$forceActivity->upper_threashold}}"></p>
            <p>Time: <input type="number" name="time" min="1" max="60" step="1" value="{{$forceActivity->time}}"></p>
            <input type="submit" value="Set">
        </form>
    @else
    <form method="POST" action={{ route('store.force.activity', ['session' => $session]) }} enctype="multipart/form-data">
        @csrf
        <p>Min value: <input type="number" name="min" min="0" max="1" step="0.01"></p>
        <p>Max value: <input type="number" name="max" min="0" max="1" step="0.01"></p>
        <p>Time: <input type="number" name="time" min="1" max="60" step="1"></p>
        <input type="submit" value="Set">
    </form>
    @endif

@else
    @foreach ($movements as $movement)
        <p>{{$movement->movement_type}}, {{$movement->order}}</p>
        @if ($movement->order > 0)
            <a href={{ route('move_down', ['session' => $session, 'movement' => $movement]) }}>Move Down</a>
        @endif
        @if ($movement->order < $movements->count() - 1)
            <a href={{ route('move_up', ['session' => $session, 'movement' => $movement]) }}>Move Up</a>
        @endif
        <a href={{ route('delete.movement', ['session' => $session, 'movement' => $movement]) }}>Delete</a>
        <br>
    @endforeach
    <form method="POST" action={{ route('add.movement', ['session' => $session]) }} enctype="multipart/form-data">
        @csrf
        <div class="row">
            <label for="movement_type">Movement Type:</label>
                <select name="movement_type">
                    <option value="Up">Up</option>
                    <option value="Down">Down</option>
                    <option value="Circle">Circle</option>
                    <option value="Left">Left</option>
                    <option value="Right">Right</option>
                </select>
        </div>
        <input type="submit" value="Add">
    </form>
@endif
<a href={{ route('session.redirect', ['session' => $session]) }}>Finish</a>