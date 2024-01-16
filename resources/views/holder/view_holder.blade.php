@extends('layouts.main')

@section('title', 'View Holder Page - AMS')

@section('active-page-db')
active
@endsection

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-2 text-gray-800"><i class="fa fa-user" aria-hidden="true"></i><b> Holder H - 00{{ $holder->id }}</b></h1>
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
<div class="row zoom90">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" data-toggle="collapse" data-target="#collapseDropdown">
                <h6 class="m-0 font-weight-bold text-primary">Employee Details</h6>
            </div>
            <div id="collapseDropdown" class="collapse">
                <ul class="nav nav-tabs" id="pageTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="page1-tab" data-toggle="tab" href="#page1" role="tab" aria-controls="page1" aria-selected="true"><i class="fas fa-user-circle"></i> Account Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="page2-tab" data-toggle="tab" href="#page2" role="tab" aria-controls="page2" aria-selected="false"><i class="fas fa-user-tie"></i> Profile Details</a>
                    </li>
                </ul>
                <!-- Card Body -->
                <div class="card-body" >
                    <div class="tab-content" id="pageTabContent">
                        <div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="page1-tab">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email">Employee ID :</label>
                                                        <input  class="form-control"   name="employee_id" placeholder="Employee ID..." value="{{ $user->users_detail->employee_id }}" readonly/>
                                                        @if($errors->has('employee_id'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('employee_id')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="password">User ID :</label>
                                                    <input  class="form-control flex"    name="usr_id" placeholder="User ID..." value="{{ $user->id }}" readonly/>
                                                    @if($errors->has('usr_id'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_id')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="password">Email :</label>
                                                    <input readonly class="form-control" name="email" placeholder="Email..." value="{{ $user->email }}" />
                                                    @if($errors->has('email'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('email')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="comment">Position :</label>
                                                    <select class="form-control" id="position" name="position" disabled>
                                                        <option selected disabled>Choose...</option>
                                                        @foreach($pos_data as $pos)
                                                        <option value="{{ $pos->id }}" @if($pos->id == $user->users_detail->position_id) selected @endif>{{ $pos->position_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Department :</label>
                                                    <select disabled class="form-control" id="department" name="department"  >
                                                        <option selected disabled>Choose...</option>
                                                        @foreach($dep_data as $depart)
                                                        <option value="{{ $depart ->id }}" @if($depart ->id == $user->users_detail->department_id) selected @endif>{{ $depart ->department_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Status :</label>
                                                    <select disabled class="form-control" name="status"  >
                                                        <option selected disabled>Choose...</option>
                                                        <option value="Active" @if($user->users_detail->status_active == 'Active') selected @endif>Active</option>
                                                        <option value="nonActive" @if($user->users_detail->status_active == 'nonActive') selected @endif>Non Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Employement Status :</label>
                                                    <select disabled class="form-control " name="employee_status" >
                                                        <option selected disabled>Choose...</option>
                                                        <option value="Freelance" @if($user->users_detail->employee_status == 'Freelance') selected @endif>Freelance</option>
                                                        <option value="Probation" @if($user->users_detail->employee_status == 'Probation') selected @endif>Probation</option>
                                                        <option value="Contract" @if($user->users_detail->employee_status == 'Contract') selected @endif>Contract</option>
                                                        <option value="Permanent"@if($user->users_detail->employee_status == 'Permanent') selected @endif>Permanent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Hired Date :</label>
                                                    <input readonly class="form-control" type="date"  name="hired_date" id="hired_date" value="{{ $user->users_detail->hired_date }}" />
                                                    @if($errors->has('hired_date'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('hired_date')}}
                                                        </div>
                                                    @endif
                                                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Resignation Date :</label>
                                                    <input readonly class="form-control" type="date"  name="resignation_date" id="resignation_date" value="{{ $user->users_detail->resignation_date }}" />
                                                    @if($errors->has('resignation_date'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('resignation_date')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="page2" role="tabpanel" aria-labelledby="page2-tab">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="comment">Name :</label>
                                                    <input readonly class="form-control" type="text" name="name"value="{{ $user->name }}">
                                                    @if($errors->has('name'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('name')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="comment">Personal Email :</label>
                                                    <input readonly class="form-control" type="text" name="Personal Email" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Home Number :</label>
                                                    <input readonly class="form-control"   name="usr_phone_home" placeholder="Home Phone Number..." value="{{ $user->users_detail->usr_phone_home }}"/>
                                                    @if($errors->has('usr_phone_home'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_phone_home')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Phone Number :</label>
                                                    <input readonly class="form-control" type="text" name="usr_phone_mobile" placeholder="Mobile Phone Number..." value="{{ $user->users_detail->usr_phone_mobile }}"/>
                                                    @if($errors->has('usr_phone_mobile'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_phone_mobile')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Address :</label>
                                                    <textarea disabled class="form-control" name="usr_address" placeholder="User Address..." style="height: 120px;">{{ $user->users_detail->usr_address }}</textarea>
                                                    @if($errors->has('usr_address'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_address')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Current Address :</label>
                                                    <textarea disabled class="form-control" name="current_address" placeholder="Current Address..." style="height: 120px;">{{ $user->users_detail->current_address }}</textarea>
                                                    @if($errors->has('current_address'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('current_address')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">City :</label>
                                                    <input readonly class="form-control"   name="usr_address_city" placeholder="Address City..." value="{{ $user->users_detail->usr_address_city }}"/>
                                                    @if($errors->has('usr_address_city'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_address_city')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Postal Code :</label>
                                                    <input readonly class="form-control"   name="usr_address_postal" placeholder="Address Postal..." value="{{ $user->users_detail->usr_address_postal}}"/>
                                                    @if($errors->has('usr_address_postal'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_address_postal')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Assets Details</h6>
            </div>
            <div>
                <ul class="nav nav-tabs" id="pageTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="asset-page1-tab" data-toggle="tab" href="#assetPage1" role="tab" aria-controls="page1" aria-selected="true"><i class="fas fa-laptop"></i> Laptop Asset Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="asset-page2-tab" data-toggle="tab" href="#assetPage2" role="tab" aria-controls="page2" aria-selected="false"><i class="fas fa-list"></i> Other Asset Details</a>
                    </li>
                </ul>
                <!-- Card Body -->
                <div class="card-body" >
                    <div class="tab-content" id="pageTabContent">
                        <div class="tab-pane fade show active" id="assetPage1" role="tabpanel" aria-labelledby="page1-tab">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email">Laptop ID :</label>
                                                        <input  class="form-control"   name="laptop_id" placeholder="Laptop ID..." value="L - PC{{$holder->laptop->laptops_num}}" readonly/>
                                                        @if($errors->has('laptop_id'))
                                                            <div class="text-danger">
                                                                {{ $errors->first('laptop_id')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="password">Laptop Name :</label>
                                                    <input  class="form-control flex" name="Laptop Name" placeholder="Laptop Name..." value="{{ $holder->laptop->laptop_name }}" readonly/>
                                                    @if($errors->has('usr_id'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_id')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Date Granted :</label>
                                                    <input class="form-control" name="date_granted" type="date" placeholder="Date Granted..." value="{{ $holder->date_granted}}" />
                                                    @if($errors->has('date_granted'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('date_granted')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Date Returned :</label>
                                                    <input class="form-control" name="date_returned" type="date" placeholder="Date Returned..." value="{{ $holder->date_granted}}" />
                                                    @if($errors->has('email'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('email')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="comment">Processor :</label>
                                                    <input class="form-control" name="processor" placeholder="Processor..." value="{{ $holder->laptop->laptops_detail->processor }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="comment">Ram :</label>
                                                    <input class="form-control" name="Ram" placeholder="Ram.." value="{{ $holder->laptop->laptops_detail->ram }}" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="comment">Storage :</label>
                                                    <input class="form-control" name="storage" placeholder="Storage.." value="{{ $holder->laptop->laptops_detail->storage }}" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Employement Status :</label>
                                                    <select disabled class="form-control " name="employee_status" >
                                                        <option selected disabled>Choose...</option>
                                                        <option value="Freelance" @if($user->users_detail->employee_status == 'Freelance') selected @endif>Freelance</option>
                                                        <option value="Probation" @if($user->users_detail->employee_status == 'Probation') selected @endif>Probation</option>
                                                        <option value="Contract" @if($user->users_detail->employee_status == 'Contract') selected @endif>Contract</option>
                                                        <option value="Permanent"@if($user->users_detail->employee_status == 'Permanent') selected @endif>Permanent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Hired Date :</label>
                                                    <input readonly class="form-control" type="date"  name="hired_date" id="hired_date" value="{{ $user->users_detail->hired_date }}" />
                                                    @if($errors->has('hired_date'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('hired_date')}}
                                                        </div>
                                                    @endif
                                                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Resignation Date :</label>
                                                    <input readonly class="form-control" type="date"  name="resignation_date" id="resignation_date" value="{{ $user->users_detail->resignation_date }}" />
                                                    @if($errors->has('resignation_date'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('resignation_date')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="assetPage2" role="tabpanel" aria-labelledby="page2-tab">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="comment">Name :</label>
                                                    <input readonly class="form-control" type="text" name="name"value="{{ $user->name }}">
                                                    @if($errors->has('name'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('name')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="comment">Personal Email :</label>
                                                    <input readonly class="form-control" type="text" name="Personal Email" value="{{ $user->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Home Number :</label>
                                                    <input readonly class="form-control"   name="usr_phone_home" placeholder="Home Phone Number..." value="{{ $user->users_detail->usr_phone_home }}"/>
                                                    @if($errors->has('usr_phone_home'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_phone_home')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Phone Number :</label>
                                                    <input readonly class="form-control" type="text" name="usr_phone_mobile" placeholder="Mobile Phone Number..." value="{{ $user->users_detail->usr_phone_mobile }}"/>
                                                    @if($errors->has('usr_phone_mobile'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_phone_mobile')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Address :</label>
                                                    <textarea disabled class="form-control" name="usr_address" placeholder="User Address..." style="height: 120px;">{{ $user->users_detail->usr_address }}</textarea>
                                                    @if($errors->has('usr_address'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_address')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Current Address :</label>
                                                    <textarea disabled class="form-control" name="current_address" placeholder="Current Address..." style="height: 120px;">{{ $user->users_detail->current_address }}</textarea>
                                                    @if($errors->has('current_address'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('current_address')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">City :</label>
                                                    <input readonly class="form-control"   name="usr_address_city" placeholder="Address City..." value="{{ $user->users_detail->usr_address_city }}"/>
                                                    @if($errors->has('usr_address_city'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_address_city')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Postal Code :</label>
                                                    <input readonly class="form-control"   name="usr_address_postal" placeholder="Address Postal..." value="{{ $user->users_detail->usr_address_postal}}"/>
                                                    @if($errors->has('usr_address_postal'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('usr_address_postal')}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
