@extends('layouts.main')

@section('title', 'Home Page - AMS')

@section('active-page-db')
active
@endsection

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center zoom90 justify-content-between mb-4">
    <h1 class="h4 mb-0 font-weight-bold text-gray-800"><i class="fas fa-project-diagram"></i> Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
@if ($message = Session::get('welcoming'))
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
<!-- Content Row -->
<div class="row zoom90">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 laptop">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Laptops Asset</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $LaptopCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-laptop fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 email">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Email Asset</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $EmailCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 access">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Card Asset</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $CardCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 holder">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Holders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $HolderCount }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row zoom90">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tools Overview</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('img/hl-login.png') }}" alt="...">
                </div>
                <p>
                    An asset management system is a system used for managing, organizing, monitoring, 
                    and documenting company assets that have value, 
                    in order to create efficiency and effectiveness in asset management.
                </p>

                {{-- <a href="#exampleModalCenter" data-toggle="modal" data-backdrop="static"
                    data-keyboard="false">Read More &rarr;</a> --}}
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-15">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">AMS : Asset Management System</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="container-video">
                        <div class="file-man-box"><a href="" class="file-close"><i class="fa fa-times-circle"></i></a>
                            <div class="file-img-box">
                                <img src="{{ asset('img/github.png') }}" alt="icon">
                            </div>
                                    <a href="https://github.com/DioFbrian" target="_blank" class="file-download"><i class="fa fa-external-link-alt"></i></a>
                            <div class="file-man-title">
                                <h5 class="mb-0 text-overflow">AMS : Managements of Assets</h5>
                                <p class="mb-0"><small>github.com/DioFbrian</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

.laptop:hover .card {
    animation-name: zoomIn;
    animation-duration: 0.5s;
    animation-fill-mode: forwards;
}

.email:hover .card {
    animation-name: zoomIn;
    animation-duration: 0.5s;
    animation-fill-mode: forwards;
}

.access:hover .card {
    animation-name: zoomIn;
    animation-duration: 0.5s;
    animation-fill-mode: forwards;
}

.holder:hover .card {
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cardLaptop = document.querySelector('.col-xl-3:nth-child(1) .card');
        const cardEmail = document.querySelector('.col-xl-3:nth-child(2) .card');
        const cardAccess = document.querySelector('.col-xl-3:nth-child(3) .card');
        const cardHolder = document.querySelector('.col-xl-3:nth-child(4) .card');

        // asset laptop
        cardLaptop.addEventListener('click', function() {
            window.location.href = '/asset/laptop';
        });

        cardLaptop.addEventListener('mouseover', function() {
            cardLaptop.style.cursor = 'pointer';
        });

        cardLaptop.addEventListener('mouseout', function() {
            cardLaptop.style.cursor = 'default';
        });

        //asset email
        cardEmail.addEventListener('click', function() {
            window.location.href = '/asset/email';
        });

        cardEmail.addEventListener('mouseover', function() {
            cardEmail.style.cursor = 'pointer';
        });

        cardEmail.addEventListener('mouseout', function() {
            cardEmail.style.cursor = 'default';
        });

        //asset card
        cardAccess.addEventListener('click', function() {
            window.location.href = '/asset/card';
        });

        cardAccess.addEventListener('mouseover', function() {
            cardAccess.style.cursor = 'pointer';
        });

        cardAccess.addEventListener('mouseout', function() {
            cardAccess.style.cursor = 'default';
        });

        //holder
        cardHolder.addEventListener('click', function() {
            window.location.href = '/manage/holder';
        });

        cardHolder.addEventListener('mouseover', function() {
            cardHolder.style.cursor = 'pointer';
        });

        cardHolder.addEventListener('mouseout', function() {
            cardHolder.style.cursor = 'default';
        });
    });
</script>


@endsection

