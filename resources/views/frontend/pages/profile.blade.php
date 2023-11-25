@extends('frontend.master')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <!-- <img src="{{auth()->user()->image}}" alt="http://placehold.it/150x150"/> -->
                            <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <!-- <input type="file" name="file"/> -->
                            </div> 
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    {{auth()->user()->name}}
                                    </h5>
                                    <h6>
                                    {{auth()->user()->role}}
                                    </h6>
                            
                        </div>
                    </div>
                
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
        
                    <div class="col-md-8">
                        
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{auth()->user()->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{auth()->user()->email}}</p>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Role</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{auth()->user()->role}}</p>
                                            </div>
                                        </div>
                            </div>
                            
                    </div>
                </div>
            </form>           
        </div>

@endsection