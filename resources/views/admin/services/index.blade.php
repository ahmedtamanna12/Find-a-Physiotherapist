@extends('layouts.master')


@section('title')
     Therapy Category | Find a Physiotherapist
@endsection



@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">Service Category
                <a href="{{ url('service-create') }}" class="btn btn-primary float-right py-2">ADD</a>
                </h4>
            </div>
              <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <tr>
                      <th>ID</th>
                      <th>Therapy Name</th>
                      <th>Description</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $item)
                    <tr>
                    <td>{{  $item->id }}</td>
                    <td>{{  $item->service_name }}</td>
                    <td>{{  $item->service_description }}</td>
                    
                    <td>
                      <a href="{{ url('service-cate-edit/'.$item->id) }}"  class="btn btn-info">EDIT</a>
                    </td>
                    <td>
                    <button type="submit" class="btn btn-danger servideletebtn">DELETE</button>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
              </div>
            </div>
          </div>
</div>
@endsection

@section('scripts')


@endsection