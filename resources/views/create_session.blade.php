<h1>{{$account->name}}'s session:</h1>
<form method="POST" action={{ route('store.session', ['account' => $account]) }} enctype="multipart/form-data">
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

    <input type="submit" value="Next">
</form>