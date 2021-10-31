@extends('layouts.app')
    @section('content')
    
        <div class="container">
                <div class="container">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                <h2>Add Contestant</h2>
            {!! Form::open(['action'=>'ContestantController@store', 'method'=>'POST']) !!}
            @csrf
            <div class="form-group">
                {!! Form::label('country', 'Country') !!}
                {!! Form::select('country', array('ROM'=> 'ROM', 'EEUU'=>'EEUU', 'MEX'=>'MEX', 'HUN'=>'HUN', 'COL'=>'COL', 'TUR'=>'TUR')) !!}
                <br>
                {!! Form::label('season', 'Season') !!}
                {!! Form::select('season', array('1'=> '1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10')) !!}
                <br>
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', ' ', ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                <br>
                {!! Form::label('win', 'Win') !!}
                {!! Form::text('win', ' ', ['class'=>'form-control', 'placeholder'=>'Win']) !!}
                <br>
                {!! Form::label('played', 'Played') !!}
                {!! Form::text('played', ' ', ['class'=>'form-control', 'placeholder'=>'Played']) !!}
                
                
                {!! Form::submit('Send') !!}
            </div>
            
            {!! Form::close() !!}
        </div>    
    @endsection