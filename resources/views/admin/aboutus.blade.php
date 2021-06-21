@extends('layouts.master')


@section('title')
     User Information | Find a Physiotherapist
@endsection



@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/save-aboutus" method="POST">
         {{ csrf_field() }}


      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mobile:</label>
            <input type="text" name="mobile" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Blood Group:</label>
            <select id="blood group" type="option" class="form-control" name="BloodGroup" value="{{ old('blood group ') }}" required autofocus>
              <option disabled="disabled" selected="selected">--Choose Option</option>
                <option> A+ </option>
                <option> A- </option>
                <option> O+ </option>
                <option> O- </option>
                <option> B+ </option>
                <option> B- </option>
                <option> AB+ </option>
                <option> AB- </option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gender:</label>
            <select id="gender" type="option" class="form-control" name="Gender" value="{{ old('gender') }}" required autofocus>
              <option disabled="disabled" selected="selected">--Choose Option</option>
                <option> Male </option>
                <option> Female </option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Experience:</label>
            <select id="experience" type="option" class="form-control" name="Experience" value="{{ old('experience') }}" required autofocus>
              <option disabled="disabled" selected="selected">--Choose Option</option>
                <option> 1 </option>
                <option> 2 </option>
                <option> 3 </option>
                <option> 4 </option>
                <option> 5 </option>
                <option> 6 </option>
                <option> 7 </option>
                <option> 8 </option>
                <option> 9 </option>
                <option> 10 </option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Qualification:</label>
            <select id="qualification" type="option" class="form-control" name="Qualification" value="{{ old('qualification') }}" required autofocus>
              <option disabled="disabled" selected="selected">--Choose Option</option>
                <option> Bachelor of Physiotherapy (BPT) </option>
                <option>  Diploma in Physiotherapy </option>
                <option>  Master of Physiotherapy (MPT) </option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE</button>
      </div>
     </form>

    </div>
  </div>
</div>

{{--Delete - Modal --}}
<!-- Modal -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete_modal_Form" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
          

      <div class="modal-body">
           <input type="hidden" id="delete_aboutus_id">
           <h5>Are you sure,you want to delete Data?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes, Delete It.</button>
      </div>
      </form>

    </div>
  </div>
</div>
{{--End - Delete Modal --}}

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Admin Information
                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
                </h4>
                @if (session('status'))
                   <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                   </div>
                @endif
              </div>
              <style>
                  .w-10{
                    width: 10% !important;
                  }
              </style>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table">
                    <thead class=" text-primary">
                      <th>Id</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Blood Group</th>
                      <th>Gender</th>
                      <th>Experience</th>
                      <th>Qualification</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                    </thead>

                    <tbody>
                       @foreach ($aboutus as $data)
                      <tr>
                        <td>{{  $data->id }}</td>
                        <td>{{  $data->name }}</td>
                        <td>{{  $data->mobile }}</td>
                        <td>{{  $data->BloodGroup }}</td>
                        <td>{{  $data->Gender }}</td>
                        <td>{{  $data->Experience }}</td>
                        <td>{{  $data->Qualification }}</td>
                        <td>
                            <a href="{{ url('about-us/'.$data->id) }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger deletebtn">DELETE</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        $(document).ready( function () {
           $('#datatable').DataTable();


          $('#datatable').on('click','.deletebtn',function(){
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            console.log(data);
            
            $('#delete_aboutus_id').val(data[0]);

            $('#delete_modal_Form').attr('action','/about-us-delete/'+data[0]);

            $('#deletemodalpop').modal('show');
          });
        } );
    </script>

@endsection