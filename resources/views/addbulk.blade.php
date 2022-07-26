@extends('layouts.master')
<link rel="stylesheet" href="css\index.css">
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex">
                <div style="width:500px;" class="card">
                    <div class="card-header">Import certificate data</div>
                    <div class="card-body">
                    <form action="{{ route('certstore') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="file" />
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                    </form>
                    </div>
                </div>
                <div style="margin-left:50px;margin-top:50px;">
                    <a href="{{ route('sampledownload') }}"><strong style="font-size:16px;">Download Sample</strong></a>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection