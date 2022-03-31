<form method="POST" action={{ route('store.account') }} enctype="multipart/form-data">
    @csrf
    <p>Account name:     <input type="text" name="account"></p>
    <input type="submit" value="Create">

</form>