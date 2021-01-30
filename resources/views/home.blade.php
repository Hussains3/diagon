@extends('layouts.sb')

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Bookmarks</h6>
                            <h2>1,410</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-award"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">6% higher than last month</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Likes</h6>
                            <h2>41,410</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-thumbs-up"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">61% higher than last month</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Events</h6>
                            <h2>410</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-calendar"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">Total Events</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Comments</h6>
                            <h2>41,410</h2>
                        </div>
                        <div class="icon">
                            <i class="ik ik-message-square"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">Total Comments</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <a href="{{route('sales.create')}}">
            <button type="button" class="btn btn-info btn-block">New Sell</button>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <a href="{{route('patients.create')}}">
            <button type="button" class="btn btn-warning btn-block">New Patient</button>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <a href="{{route('doctors.create')}}">
            <button type="button" class="btn btn-success btn-block">New Doctor</button>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <a href="{{route('tests.index')}}">
            <button type="button" class="btn btn-danger btn-block">New Test</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th class="nosort">Avatar</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
