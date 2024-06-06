@extends('layouts.app')

@section('content')
<div style="padding-left: 30px; border-width: 2px;">
    <div>
        <h3>bulk email validation</h3>
        <br>
    </div>
    <div class="col p-3" style="border-style: solid; border-width: 1px;border-radius: 30px;margin:auto;width: 100%;padding-bottom: 50px;">
    <form action="/action_page.php">
  <p><label for="batchvalidation">list validation</label></p>
  <textarea id="batchvalidation" name="batchvalidation" rows="4" cols="50"></textarea>
  <br>
  <input type="submit" value="check">
</form>
    </div><br>
   <div style="align-content: center;"> <p>or</p></div>
    <div class="col p-3" style="border-style: solid; border-width: 1px;border-radius: 30px;margin:auto;width: 100%;padding-bottom: 50px;">
    <p>Click on the "Choose File" button to upload a file:</p>

<form action="/action_page.php">
  <input type="file" id="myFile" name="filename">
  <input type="submit">
</form>

    </div>
    

        


@endsection