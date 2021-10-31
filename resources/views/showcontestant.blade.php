@php
    $winpercent = $contestant->win/$contestant->played*100;
    $lostpercent = $contestant->lost/$contestant->played*100;
    $winoneonone = $contestant->oneononewin/$contestant->played*100;
    $wingroup1 = $contestant->group1win/$contestant->played*100;
    $wingroup05 = $contestant->group05win/$contestant->played*100;
    $winpersonal = $contestant->personalwin/$contestant->played*100;
    $winsymbol = $contestant->symbolwin/$contestant->played*100;
    $winnational = $contestant->nationalwin/$contestant->played*100;
@endphp


@extends('layouts.app')
    @section('content')
    <div class="wrapper">
        <div class="container">
            <div class="card" style="width: 18rem; float: left; margin-right: 5px;">
                <div class="card-body">
                <h4 class="card-title" style="color:red;"><b>{{$contestant->name}}</b></h4>
                <h6 class="card-subtitle mb-2 text-muted">Wins: {{$contestant->win}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Losses: {{$contestant->lost}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Played: {{$contestant->played}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Win Percentage: {{round($winpercent)}}%</h6>
                <p class="card-text"></p>
                @if (!Auth::guest())
                <a href="{{ url('edit/' . $contestant->id) }}" class="btn btn-primary">Edit</a>
                @endif
                
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5>Played Game Types</h5>
                <h6 class="card-subtitle mb-2 text-muted">1on1 wins: {{$contestant->oneononewin}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">1on1 losses: {{$contestant->oneononelost}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Grup game 1 point wins: {{$contestant->group1win}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Grup game 1 point losses: {{$contestant->group1lost}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Grup game 0,5 point wins: {{$contestant->group05win}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Grup game 0,5 point losses: {{$contestant->group05lost}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Personal wins: {{$contestant->personalwin}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Personal losses: {{$contestant->personallost}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Symbol games wins: {{$contestant->symbolwin}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Symbol games losses: {{$contestant->symbollost}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">National games wins: {{$contestant->nationalwin}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">National games losses: {{$contestant->nationallost}}</h6>
                <p class="card-text"></p>
                </div>
            </div>
            <br>
            <h2>Overall Percentage</h2>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: {{$winpercent}}%" aria-valuenow="{{$contestant->win}}" aria-valuemin="0" aria-valuemax="{{$contestant->total}}">{{round($winpercent)}}%</div>
            </div>
            <br>
            <h3>Played Game Types Percentages</h3>
            <h5>1 On 1 Wins </h5>
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: {{$winoneonone}}%" aria-valuenow="{{$contestant->oneononewin}}" aria-valuemin="0" aria-valuemax="{{$contestant->total}}">{{round($winoneonone)}}%</div>
            </div>
            <br>
            <h5>Group 1 Point Wins </h5>
            <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: {{$wingroup1}}%" aria-valuenow="{{$contestant->group1win}}" aria-valuemin="0" aria-valuemax="{{$contestant->total}}">{{round($wingroup1)}}%</div>
            </div>
            <br>
            <h5>Group 0.5 point Wins</h5>
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$wingroup05}}%" aria-valuenow="{{$contestant->group05win}}" aria-valuemin="0" aria-valuemax="{{$contestant->total}}">{{round($wingroup05)}}%</div>
            </div>
            <br>
            <h5>Personal Wins</h5>
            <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$winpersonal}}%" aria-valuenow="{{$contestant->personalwin}}" aria-valuemin="0" aria-valuemax="{{$contestant->total}}">{{round($winpersonal)}}%</div>
            </div>
            <br>
            <h5>Symbol Games Wins</h5>
            <div class="progress">
                <div class="progress-bar bg-dark" role="progressbar" style="width: {{$winsymbol}}%" aria-valuenow="{{$contestant->symbolwin}}" aria-valuemin="0" aria-valuemax="{{$contestant->total}}">{{round($winsymbol)}}%</div>
            </div>
            <br>
            <h5>National Games Wins</h5>
            <div class="progress">
                <div class="progress-bar bg-secondary" role="progressbar" style="width: {{$winnational}}%" aria-valuenow="{{$contestant->nationalwin}}" aria-valuemin="0" aria-valuemax="{{$contestant->total}}">{{round($winnational)}}%</div>
            </div>
        </div>    
    </div>
    @endsection