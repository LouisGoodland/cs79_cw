<form method="POST" action={{ route('update.account', ['account' => $account]) }} enctype="multipart/form-data">
    @csrf
    <div class="row">
        <input type="text" id="input" name="content" value="{{$account->name}}">
    </div>
    <div class="row">
        <br>
    </div>
    <div class="row">
        <input type="text" id="input" name="test2">
    </div>
    <br>
    <input type="submit" value="Submit">
</form>
