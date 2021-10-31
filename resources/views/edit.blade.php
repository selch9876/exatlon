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
                <h2>Edit Contestant: <a href="{{ url('contestant/' . $contestant->id) }}">{{$contestant->name }}</a></h2>
            {!! Form::open(['action'=> ['ContestantController@update', $contestant->id], 'method'=>'POST']) !!}
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', $contestant->name, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                
                {!! Form::label('oneononewin', '1on1 Wins') !!}
                {!! Form::text('oneononewin', $contestant->oneononewin, ['class'=>'form-control', 'placeholder'=>'1on1win']) !!}
                
                {!! Form::label('oneononelost', '1on1 Lost') !!}
                {!! Form::text('oneononelost', $contestant->oneononelost, ['class'=>'form-control', 'placeholder'=>'1on1lost']) !!}
                
                {!! Form::label('group1win', 'Group 1 Point Wins') !!}
                {!! Form::text('group1win', $contestant->group1win, ['class'=>'form-control', 'placeholder'=>'Group 1 Point Wins']) !!}
                
                {!! Form::label('group1lost', 'Group 1 Point Lost') !!}
                {!! Form::text('group1lost', $contestant->group1lost, ['class'=>'form-control', 'placeholder'=>'Group 1 Point Lost']) !!}
                
                {!! Form::label('group05win', 'Group 0,5 Point Win') !!}
                {!! Form::text('group05win', $contestant->group05win, ['class'=>'form-control', 'placeholder'=>'Group 0,5 Point Win']) !!}
                </div>
                <div class="form-group col-md-6">    
                {!! Form::label('group05lost', 'Group 0,5 Point Lost') !!}
                {!! Form::text('group05lost', $contestant->group05lost, ['class'=>'form-control', 'placeholder'=>'Group 0,5 Point Lost']) !!}
                
                {!! Form::label('personalwin', 'Personal Wins') !!}
                {!! Form::text('personalwin', $contestant->personalwin, ['class'=>'form-control', 'placeholder'=>'Personal Wins']) !!}

                {!! Form::label('personallost', 'Personal Lost') !!}
                {!! Form::text('personallost', $contestant->personallost, ['class'=>'form-control', 'placeholder'=>'Personal Lost']) !!}

                {!! Form::label('symbolwin', 'Symbol Wins') !!}
                {!! Form::text('symbolwin', $contestant->symbolwin, ['class'=>'form-control', 'placeholder'=>'Symbol Win']) !!}

                {!! Form::label('symbollost', 'Symbol Lost') !!}
                {!! Form::text('symbollost', $contestant->symbollost, ['class'=>'form-control', 'placeholder'=>'Symbol Lost']) !!}

                {!! Form::label('nationalwin', 'National Wins') !!}
                {!! Form::text('nationalwin', $contestant->nationalwin, ['class'=>'form-control', 'placeholder'=>'National Wins']) !!}

                {!! Form::label('nationallost', 'National Lost') !!}
                {!! Form::text('nationallost', $contestant->nationallost, ['class'=>'form-control', 'placeholder'=>'National Lost']) !!}
                
                {{ Form::hidden('_method', 'PUT') }}
                {!! Form::submit('Send') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>    
    @endsection