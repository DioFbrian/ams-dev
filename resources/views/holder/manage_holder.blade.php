@extends('layouts.main')

@section('title', 'Manage Holder Page - AMS')

@section('active-page-db')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-2 text-gray-800"><i class="fa fa-users" aria-hidden="true"></i><b> Manage Holder</b></h1>
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

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 newUser">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            New User</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><small>Add New User</small></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-plus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <div class="outer">
            <div class="inner"></div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 existing">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Add Holder Form ESS User</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><small>Existing Users</small></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-export fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>

<div class="card shadow mb-4  zoom80">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Manage Holder</h6>
        {{-- <div class="text-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#AddHolder"><i class="fa fa-plus" aria-hidden="true"></i> Add Holder</button>
            <a href="" class="btn btn-primary btn-sm">View Report</a>
        </div> --}}
    </div>
    <!-- Card Body -->
    <div class="card-body zoom80">
        <table class="table table-bordered  table-hover" id="dataTableLaptop">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name Holder</th>
                        <th>Laptop Number</th>
                        <th>Laptop Name</th>
                        <th>Email Holder</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($holder as $h )
                    <tr>
                        <td>{{$h->id}}</td>
                        <td>{{$h->user->name}}</td>
                        <td>
                            @if($h->laptop && $h->laptop->laptops_num)
                                L - PC{{$h->laptop->laptops_num}}
                            @else
                                Tidak ada informasi laptop
                            @endif
                        </td>
                         <td>
                            @if($h->laptop && $h->laptop->laptop_name)
                                {{$h->laptop->laptop_name}}
                            @else
                                Tidak ada informasi laptop
                            @endif
                        </td>
                        <td>{{$h->email}}</td>

                        {{-- <td class="text-center">
                             @switch($h->status)
                                @case(0)
                                    <span><i class="fas fa-user-check" style="color: #0053fa;"></i></span>
                                @break
                                @case(1)
                                    <span><i class="fas fa-user-times" style="color: #ff0000;"></i></span>
                                @break
                                @default
                                    <span>Tidak Diketahui</span>
                            @endswitch
                        </td> --}}
                        <td class="justify-content-between text-center">
                            <a title="View" class="btn btn-primary btn-sm" href="/manage/holder/view/{{ $h->id }}">
                                <i class="fas fa-fw fa-eye justify-content-center"></i> View
                            </a>
                            {{-- <a data-toggle="modal" data-target="#DeleteLaptop{{ $h->id }}" title="Hapus" class="btn btn-danger btn-sm" ><i class="fas fa-fw fa-trash justify-content"></i></a> --}}
                    </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

<!-- Modal Add Holder -->
<form method="POST" action="/manage/holder/add" enctype="multipart/form-data" >
@csrf
    <div class="modal fade" id="addHolder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="AddHolderLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="AddHolderLabel">Add New Holder</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-start">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="laptop_name">Name :</label>
                        <select name="input_user_id" class="form-control" id="input_user_id" required>
                            <option value="">Choose..</option>
                            @foreach($user as $us)
                            <option value="{{ $us->id }}">{{ $us->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="laptop_name">Laptop :</label>
                        <select name="input_laptop" class="form-control" id="input_laptop" required>
                            <option value="">Choose..</option>
                            @foreach($laptop as $lp)
                            <option value="{{ $lp->id }}">{{ $lp->laptop_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Date Granted :</label>
                        <input class="form-control flex" type="date" name="input_date_granted" id="date" value="" required/>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes :</label>
                        <textarea class="form-control flex" name="input_notes" id="notes" placeholder="Notes...."></textarea>
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


<script>
    const cardNewUser = document.querySelector('.newUser');
    const cardExist = document.querySelector('.existing');

    cardNewUser.addEventListener('click', function() {
    window.location.href = '/po/tambah';
    });
    
    cardExist.addEventListener('click', function() {
        $('#addHolder').modal('show');
    });

    cardNewUser.addEventListener('mouseover', function() {
    cardNewUser.style.cursor = 'pointer';
    });
    cardNewUser.addEventListener('mouseout', function() {
    cardNewUser.style.cursor = 'default';
    });

    cardExist.addEventListener('mouseover', function() {
    cardExist.style.cursor = 'pointer';
    });
    cardExist.addEventListener('mouseout', function() {
    cardExist.style.cursor = 'default';
    });
</script>
<style>
    @keyframes zoomIn {
  from {
    transform: scale(1);
  }
  to {
    transform: scale(1.05);
  }
}

.action{
    width: 190px;
}

.newUser:hover .card {
    animation-name: zoomIn;
    animation-duration: 0.5s;
    animation-fill-mode: forwards;
}

.existing:hover .card {
    animation-name: zoomIn;
    animation-duration: 0.5s;
    animation-fill-mode: forwards;
}

.outer {
  width: 1px;
  height: 100%;
  margin: auto;
  margin-left: 10px;
  margin-right: 10px;
  position: relative;
  overflow: hidden;
}
.inner {
  position: absolute;
  width:100%;
  height: 40%;
  background: black;
  top: 30%;
  box-shadow: 0px 0px 30px 20px black;
}
</style>
@endsection
