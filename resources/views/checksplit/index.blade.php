@extends('layouts.master')

@push('head')
    <link href='/css/chksplit.css' rel='stylesheet'>
@endpush

@section('title')
    Check Splitter
@endsection

<!-- Removed push of css file, not needed here -->

@section('content')
    <h1>Check Splitter</h1>

    <!--<form method='GET' action='/split-check'>-->
    <form method='POST' action='/split-check'>
        {{ csrf_field() }}
        <div class='form-group'>
            <label for='billAmount'>Bill Amount: $</label>
            <input name='billAmount' id='billAmount' type='text' value='{{ old('billAmount') }}'>
            <span class="hint">(Required)</span>
         </div>
         <div class='form-group'>
           <label for='tip'>Tip:</label>
           <select name='tip' id='tip'>
               <option value='10' {{ old('tip') == 10 ? 'selected' : '' }} > Poor (10%)</option>
               <option value='15' {{ old('tip') == 15 ? 'selected' : '' }} > Average (15%)</option>
               <option value='18' {{ old('tip') == 18 ? 'selected' : '' }} > Good (18%)</option>
               <option value='20' {{ old('tip') == 20 ? 'selected' : '' }} > Excellent (20%)</option>
           </select>
         </div>
         <div class='form-group'>
            <label for='round'>Round:</label>
            <input name='round' id='round' type='checkbox' {{ old('round') ? 'checked' : '' }}>
         </div>
         <div class='form-group'>
            <label for='divideBy'>Divide By:</label>
            <input name='divideBy' id='divideBy' value='{{ old('divideBy') }}' type='number' min='1' max='100' step='1' required/>
         </div>

         <input type='submit'/>
    </form>
    <h3>
        {{ $message }}
    </h3>
    @if(count($errors) > 0)
        <ul class='error-group'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection

<!-- Removed push of js file, not needed here -->
