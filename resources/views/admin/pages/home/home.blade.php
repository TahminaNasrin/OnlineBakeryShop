@extends('admin.master')
@section('content')

           
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">{{$customers}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        Total Customers
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">{{$orders}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        Total Orders
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">{{$pending}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        Total Pending Orders
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">{{$sales}}.BDT</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        Total Sales
                                    </div>
                                </div>
                            </div>
                        </div>


@endsection
