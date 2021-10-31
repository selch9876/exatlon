 @extends('layouts.app')
    @section('content')
        <div class="container">
            <h2>Contestant List</h2>
            
            {!!Form::open(array('route' => 'filter', 'method' => 'GET', 'files'=>true))!!}
                {{Form::label('country', 'Country')}}
                {{Form::select('country', array('ROM' => 'ROM', 'MEX' => 'MEX', 'EEUU' => 'EEUU', 'HUN' => 'HUN', 'COL' => 'COL', 'TUR' => 'TUR'), request('country'))}}
                {{Form::label('season', 'Season')}}
                {{Form::select('season', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10',),request('season'))}} 
                {{Form::submit('Filter', ['class'=>'btn btn-primary', 'style'=>'margin:5px'])}}   
            {{ Form::close() }}

             
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Played</th>
                            <th>Win</th>
                            <th>Lost</th>
                            <th>Win Percentage</th>
                            <th>Country</th>
                            <th>Season</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contestants as $contestant)
                            @php
                                $win = $contestant->win;
                                $played = $contestant->played;

                                if ($win == 0 | $played == 0){
                                    $winpercent = 0;
                                } else {
                                    $winpercent = $contestant->win/$contestant->played*100;
                                }
                            @endphp
                        <tr>
                            <td><a href="{{ url('contestant/' . $contestant->id) }}">{{$contestant->name }}</a></td>
                            <td>{{$contestant->played }}</td>
                            <td>{{$contestant->win }}</td>
                            <td>{{$contestant->lost }}</td>
                            <td>{{round($winpercent) }}%</td>
                            <td>{{$contestant->country }}</td>
                            <td>{{$contestant->season }}</td>
                        </tr>
                        
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No Contestants</td>
                            </tr>
                        @endforelse
                        {{ $contestants->appends('country', request('country'))->appends('season', request('season'))->links() }}
                    </tbody>
                </table>
            </div>
    @endsection