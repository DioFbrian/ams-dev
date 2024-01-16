@extends('layouts.main')

@section('title', 'Manage Card Asset Page - AMS')

@section('active-page-db')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-2 text-gray-800"><i class="fa fa-credit-card" aria-hidden="true"></i><b> Manage Card Asset</b></h1>
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
        <h6 class="m-0 font-weight-bold text-primary">Manage Card</h6>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AddCard"><i class="fa fa-plus" aria-hidden="true"></i> Add New Card</button>
            {{-- <a href="" class="btn btn-primary btn-sm">View Report</a> --}}
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <table class="table table-bordered zoom90 table-hover" id="dataTableCard">
                <thead>
                    <tr class="text-center">
                        <th>ID Card</th>
                        <th>Name Card</th>
                        <th>Holder Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($card as $c )
                    <tr>
                        <td>C - PC0{{$c->id}}</td>
                        <td>{{$c->name_card}}</td>
                        <td class="text-center">
                             @switch($c->status)
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
                            <a data-toggle="modal" data-target="#EditCard{{ $c->id }}" title="Edit" class="btn btn-primary btn-sm" >
                                <i class="fas fa-fw fa-edit justify-content-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#DeleteCard{{ $c->id }}" title="Hapus" class="btn btn-danger btn-sm" ><i class="fas fa-fw fa-trash justify-content"></i></a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Card -->
<form method="POST" action="/asset/card/add" enctype="multipart/form-data" >
@csrf
    <div class="modal fade" id="AddCard" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddCardLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="AddCardLabel">Add New Card</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-start">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Card_name">Card Name :</label>
                        <input class="form-control flex" name="input_card_name" id="Card_name" placeholder="Card Name..." required/>
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

<!-- Modal Edit Card -->
@foreach ($card as $c)
<form method="POST" action="/asset/card/edit/{{ $c->id }}" enctype="multipart/form-data" >
@csrf
@method('PUT')
    <div class="modal fade" id="EditCard{{ $c->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="EditCardLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="EditCardLabel">Edit Card ID C - PC0{{ $c->card_num }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-start">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Card_name">Card Name :</label>
                        <input class="form-control flex" name="edit_card_name" id="edit_card_name" value="{{ $c->name_card }}"/>
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
@foreach ($card as $c)
<form action="/asset/card/delete/{{ $c->id }}" method="POST">
@csrf
@method('DELETE')
<div class="modal fade" id="DeleteCard{{ $c->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="DeleteCardLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title  text-white" id="DeleteCardLabel">Alert !!</h5>
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
