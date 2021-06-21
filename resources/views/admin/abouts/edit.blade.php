@extends('layouts.master')


@section('title')
     User Information Edit
@endsection


@section('content')

<div class="row">
    <div class="col-mod-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">User Information - Edit Data</h4>

                <form action="{{ url('aboutus-update/'.$aboutus->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                     <div class="modal-body">
                         <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ $aboutus->name }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mobile:</label>
                            <input type="text" name="mobile" class="form-control" value="{{ $aboutus->mobile }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Blood Group:</label>
                            <input type="text" name="BloodGroup" class="form-control" value="{{ $aboutus->BloodGroup }}">   
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Gender:</label>
                            <input type="text" name="Gender" class="form-control" value="{{ $aboutus->Gender }}">   
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Experience:</label>
                            <input type="text" name="Experience" class="form-control" value="{{ $aboutus->Experience }}">   
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Qualification:</label>
                            <input type="text" name="Qualification" class="form-control" value="{{ $aboutus->Qualification }}">   
                        </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('abouts') }}" class="btn btn-secondary">BACK</a>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
