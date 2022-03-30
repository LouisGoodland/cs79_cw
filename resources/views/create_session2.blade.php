<h1>session:</h1>
@foreach ($movements as $movement)
    <p>{{$movement->movement_type}}, {{$movement->order}}</p>
    <p> test </p>
@endforeach
<form method="POST" action={{ route('store.session2', ['session' => $session]) }} enctype="multipart/form-data">
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
    <input type="submit" value="Next">
</form>
<a href={{ route('session.redirect', ['session' => $session]) }}>Finish</a>