@extends('layouts.master')


@section('title')
    Check Splitter
@endsection

<!-- Removed push of css file, not needed here -->

@section('content')
    <h1>Check Splitter in index.blade.php</h1>

    <form>
        <div class='form-group'>
            <label for='billAmount'>Bill Amount: $</label>
            <input name='billAmount' id='billAmount' type='text'>
            <span class="hint">(Required)</span>
         </div>
         <div class='form-group'>
           <label for='tip'>Tip:</label>
           <select name='tip' id='tip'>
               <option value='10'>Poor (10%)</option>
               <option value='15' selected>Average (15%)</option>
               <option value='18'>Good (18%)</option>
               <option value='20'>Excellent (20%)</option>
           </select>
         </div>
         <div class='form-group'>
            <label for='round'>Round:</label>
            <input name='round' id='round' type='checkbox' checked>
         </div>
         <div class='form-group'>
            <label for='divideBy'>Divide By:</label>
            <input name='divideBy' id='divideBy' type='number' min='1' max='100' step='1' required/>
         </div>

         <input type='submit' value='Calculate' />
    </form>

@endsection

<!-- Removed push of js file, not needed here -->
