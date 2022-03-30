<h1>Edit Session:</h1>



<form method="POST" action={{ route('edit.session.store', ['session' => $session]) }} enctype="multipart/form-data">
    @csrf

    <div class="row">
        <p>Date of Session:   <input type="date" name="date"></p>
    </div>

    <div class="row">
        <p>Time of Session:   <input type="time" name="time"></p>
    </div>
    
    <div class="row">
        <label for="task_type">Task Type:</label>
            <select name="task_type">
                <option value="0">Kit</option>
                <option value="1">Phone</option>
            </select>
    </div>
    <div class="row">
        <br>
    </div>
    <p>Message:     <input type="text" name="message"></p>
    <br>

    <input type="submit" value="Apply Changes">

</form>



@foreach ($movements as $movement)
    <p>{{$movement->movement_type}}, {{$movement->order}}</p>
    @if ($movement->order > 0)
        <a href={{ route('move_down', ['session' => $session, 'movement' => $movement]) }}>Move Down</a>
    @endif
    @if ($movement->order < $movements->count() - 1)
        <a href={{ route('move_up', ['session' => $session, 'movement' => $movement]) }}>Move Up</a>
    @endif
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
<a href={{ route('session.redirect', ['session' => $session]) }}>Finish</a>