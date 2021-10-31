@extends('layouts.app')
   @section('content')
       
        
   <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Exatlon Stats Table Import-Export
        </div>
        <div class="card-body">
                @if (!Auth::guest())
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                
                <button class="btn btn-success">Import Contestant Data </button>
                @endif
                <a class="btn btn-warning" href="{{ route('export') }}">Export Contestant Data</a>
            </form>
        </div>
    </div>
</div>
@endsection 
