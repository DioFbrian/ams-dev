@extends('layouts.main')

@section('title', 'Manage Email Asset Page - AMS')

@section('active-page-db')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-2 text-gray-800"><i class="fa fa-envelope" aria-hidden="true"></i><b> Manage Email Asset</b></h1>
    {{-- <a data-toggle="modal" data-target="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> New Assignment</a> --}}
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('failed'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="card shadow mb-4  zoom90">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Manage email</h6>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AddEmail"><i class="fa fa-plus" aria-hidden="true"></i> Add New email</button>
            {{-- <a href="" class="btn btn-primary btn-sm">View Report</a> --}}
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <table class="table table-bordered zoom90 table-hover" id="dataTableEmail">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($email as $em )
                    <tr>
                        <td>{{$em->id}}</td>
                        <td>{{$em->name}}</td>
                        <td>{{$em->email}}</td>
                        <td class="text-center">
                             @switch($em->status)
                                @case(0)
                                    <span><i class="fas fa-user-check" style="color: #0053fa;"></i></span>
                                @break
                                @case(1)
                                    <span><i class="fas fa-user-times" style="color: #ff0000;"></i></span>
                                @break
                                @default
                                    <span>Tidak Diketahui</span>
                            @endswitch
                        </td>
                        <td class="row-cols-2 justify-content-between text-center">
                            <a data-toggle="modal" data-target="#EditEmail{{ $em->id }}" title="Edit" class="btn btn-primary btn-sm" >
                                <i class="fas fa-fw fa-edit justify-content-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#DeleteEmail{{ $em->id }}" title="Hapus" class="btn btn-danger btn-sm" ><i class="fas fa-fw fa-trash justify-content"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Email -->
<form method="POST" action="/asset/email/add" enctype="multipart/form-data" >
@csrf
    <div class="modal fade" id="AddEmail" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddEmailLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="AddEmailLabel">Add New email</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-start">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email_name">Name :</label>
                        <input class="form-control flex" name="input_name" id="name" placeholder="Name..." required/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email Name :</label>
                        <input class="form-control flex" name="input_email" id="email" placeholder="Email..." required/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
            </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Edit email -->
@foreach ($email as $em)
<form method="POST" action="/asset/email/edit/{{ $em->id }}" enctype="multipart/form-data" >
@csrf
@method('PUT')
    <div class="modal fade" id="EditEmail{{ $em->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="EditemailLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="EditEmailLabel">Edit Email</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-start">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email_name">Name :</label>
                        <input class="form-control flex" name="edit_email_name" id="edit_email_name" value="{{ $em->name }}"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email_name">Email :</label>
                        <input class="form-control flex" name="edit_email_name" id="edit_email_name" value="{{ $em->email }}"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Active Status :</label>
                        <select name="edit_ownership_status" class="form-control" id="ownership_status" required>
                            <option value="">Choose..</option>
                            <option value="0"@if($em->status == '0') selected @endif>Active</option>
                            <option value="1"@if($em->status == '1') selected @endif>Non Active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary "><i class="fa fa-save" aria-hidden="true"></i> Save</button>
            </div>
            </div>
        </div>
    </div>
</form>
@endforeach

<!-- Modal Deelete -->
@foreach ($email as $em)
<form action="/asset/email/delete/{{ $em->id }}" method="POST">
@csrf
@method('DELETE')
<div class="modal fade" id="DeleteEmail{{ $em->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="DeleteemailLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title  text-white" id="DeleteemailLabel">Alert !!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img class="mb-2" width="96" height="96" src="https://img.icons8.com/color/96/general-warning-sign.png" alt="general-warning-sign"/>
        <h6>Are You Sure Want Delete This Record !!!</h6>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn-sm btn-danger" title="Delete" class="btn btn-danger btn-sm" >Yes Im Sure</button>
      </div>
    </div>
  </div>
</div>
</form>
@endforeach

@endsection
