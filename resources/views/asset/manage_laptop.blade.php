@extends('layouts.main')

@section('title', 'Manage Laptop Asset Page - AMS')

@section('active-page-db')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-2 text-gray-800"><i class="fa fa-laptop" aria-hidden="true"></i><b> Manage Laptop Asset</b></h1>
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
        <h6 class="m-0 font-weight-bold text-primary">Manage Laptop</h6>
        <div class="text-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AddLaptop"><i class="fa fa-plus" aria-hidden="true"></i> Add New Laptop</button>
            {{-- <a href="" class="btn btn-primary btn-sm">View Report</a> --}}
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <table class="table table-bordered zoom90 table-hover" id="dataTableLaptop">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>ID Laptop</th>
                        <th>Name Laptop</th>
                        <th>Ownership Status</th>
                        <th>Processor</th>
                        <th>Ram</th>
                        <th>Storage</th>
                        <th>Holder Status</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laptop as $l )
                    <tr>
                        <td>{{$l->id}}</td>
                        <td>L - PC0{{$l->laptops_num}}</td>
                        <td>{{$l->laptop_name}}</td>
                        <td>
                            @switch($l->ownership_status)
                                @case(0)
                                    <span>Rent</span>
                                @break
                                @case(1)
                                    <span>Permanent</span>
                                @break
                                @default
                                    <span>Tidak Diketahui</span>
                            @endswitch
                        </td>
                        <td>{{$l->laptops_detail->processor}}</td>
                        <td>{{$l->laptops_detail->ram}} </td>
                        <td>{{$l->laptops_detail->storage}} </td>
                        <td class="text-center">
                             @switch($l->status)
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
                            <a data-toggle="modal" data-target="#EditLaptop{{ $l->id }}" title="Edit" class="btn btn-primary btn-sm" >
                                <i class="fas fa-fw fa-edit justify-content-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#DeleteLaptop{{ $l->id }}" title="Hapus" class="btn btn-danger btn-sm" ><i class="fas fa-fw fa-trash justify-content"></i></a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Laptop -->
<form method="POST" action="/asset/laptop/add" enctype="multipart/form-data" >
@csrf
    <div class="modal fade" id="AddLaptop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddLaptopLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="AddLaptopLabel">Add New Laptop</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-start">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="laptop_name">Laptop Name :</label>
                        <input class="form-control flex" name="input_laptop_name" id="laptop_name" placeholder="Laptop Name..." required/>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Ownership Status :</label>
                                <select name="input_ownership_status" class="form-control" id="ownership_status" required>
                                    <option value="">Choose..</option>
                                    <option value="0">Permanent</option>
                                    <option value="1">Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password">Purchase Date :</label>
                            <input class="form-control flex" type="date" name="input_purchase_date" id="purchase_date" value="" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="laptop_name">Processor :</label>
                        <input class="form-control flex" name="input_processor" id="processor" placeholder="Processor..." required/>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Ram :</label>
                                <select name="input_ram" class="form-control" id="ram" required>
                                    <option value="">Choose..</option>
                                    <option value="4 GB">4 GB</option>
                                    <option value="6 GB">6 GB</option>
                                    <option value="8 GB">8 GB</option>
                                    <option value="10 GB">10 GB</option>
                                    <option value="16 GB">16 GB</option>
                                    <option value="20 GB">20 GB</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Storage :</label>
                                <select name="input_storage" class="form-control" id="storage" required>
                                    <option value="">Choose..</option>
                                        <option value="120 GB">120 GB</option>
                                        <option value="256 GB">256 GB</option>
                                        <option value="512 GB">512 GB</option>
                                        <option value="1 TB">1 TB</option>
                                </select>
                            </div>
                        </div>
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

<!-- Modal Edit Laptop -->
@foreach ($laptop as $l)
<form method="POST" action="/asset/laptop/edit/{{ $l->id }}" enctype="multipart/form-data" >
@csrf
@method('PUT')
    <div class="modal fade" id="EditLaptop{{ $l->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="EditLaptopLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="EditLaptopLabel">Edit Laptop No L - PC0{{ $l->laptops_num }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-start">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="laptop_name">Laptop Name :</label>
                        <input class="form-control flex" name="edit_laptop_name" id="edit_laptop_name" value="{{ $l->laptop_name }}"/>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Ownership Status :</label>
                                <select name="edit_ownership_status" class="form-control" id="ownership_status" required>
                                    <option value="">Choose..</option>
                                    <option value="0"@if($l->ownership_status == '0') selected @endif>Rent</option>
                                    <option value="1"@if($l->ownership_status == '1') selected @endif>Permanent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password">Purchase Date :</label>
                            <input class="form-control flex" type="date" name="edit_purchase_date" id="purchase_date" value="{{ $l->purchase_date }}" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="laptop_name">Processor :</label>
                        <input class="form-control flex" name="edit_processor" id="processor" placeholder="Processor..." value="{{ $l->laptops_detail->processor }}" required/>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Ram :</label>
                                <select name="edit_ram" class="form-control" id="ram" required>
                                    <option value="">Choose..</option>
                                    <option value="4" @if($l->laptops_detail->ram == '4') selected @endif>4 GB</option>
                                    <option value="6" @if($l->laptops_detail->ram == '6') selected @endif>6 GB</option>
                                    <option value="8" @if($l->laptops_detail->ram == '8') selected @endif>8 GB</option>
                                    <option value="10" @if($l->laptops_detail->ram == '10') selected @endif>10 GB</option>
                                    <option value="16" @if($l->laptops_detail->ram == '16') selected @endif>16 GB</option>
                                    <option value="20" @if($l->laptops_detail->ram == '20') selected @endif>20 GB</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Storage :</label>
                                <select name="edit_storage" class="form-control" id="storage" required>
                                    <option value="">Choose..</option>
                                        <option value="120" @if($l->laptops_detail->storage == '120') selected @endif>120 GB</option>
                                        <option value="256" @if($l->laptops_detail->storage == '256') selected @endif>256 GB</option>
                                        <option value="512" @if($l->laptops_detail->storage == '512') selected @endif>512 GB</option>
                                        <option value="1" @if($l->laptops_detail->storage == '1') selected @endif>1 TB</option>
                                </select>
                            </div>
                        </div>
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

<!-- Modal Delete -->
@foreach ($laptop as $l)
<form action="/asset/laptop/delete/{{ $l->id }}" method="POST">
@csrf
@method('DELETE')
<div class="modal fade" id="DeleteLaptop{{ $l->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="DeleteLaptopLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title  text-white" id="DeleteLaptopLabel">Alert !!</h5>
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
