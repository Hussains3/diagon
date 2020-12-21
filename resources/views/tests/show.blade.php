@extends('layouts.sb')

@section('title')
{{$doctor->name}}'s Profile
@endsection


@section('content')


<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-file-text bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctor</h5>
                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('doctors.index')}}">Doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center"> 
                    <img src="../img/user.jpg" class="rounded-circle" width="150" />
                    <h4 class="card-title mt-10">{{$doctor->name}}</h4>
                    <p class="card-subtitle">Front End Developer</p>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-8"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">{{$user->balance}}</font></a></div>
                    </div>
                </div>
            </div>
            <hr class="mb-0"> 
            <div class="card-body"> 
                <small class="text-muted d-block pt-10">Phone</small>
                <h6>{{$doctor->phone}}</h6> 
                <small class="text-muted d-block pt-10">Comission</small>
                <h6>{{$doctor->comission}}</h6>
                <small class="text-muted d-block pt-10">Balance</small>
                <h6>{{$doctor->balance}}</h6>
                {{-- <div class="map-box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.886539092!2d77.49085452149588!3d12.953959988118836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1542005497600" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <div class="profiletimeline mt-0">
                            <div class="sl-item">
                                <div class="sl-left"> <img src="../img/doctors/1.jpg" alt="user" class="rounded-circle" /> </div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                        <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img2.jpg" class="img-fluid rounded" /></div>
                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img3.jpg" class="img-fluid rounded" /></div>
                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img4.jpg" class="img-fluid rounded" /></div>
                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img5.jpg" class="img-fluid rounded" /></div>
                                        </div>
                                        <div class="like-comm"> 
                                            <a href="javascript:void(0)" class="link mr-10">2 comment</a> 
                                            <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left"> <img src="../img/doctors/2.jpg" alt="user" class="rounded-circle" /> </div>
                                <div class="sl-right">
                                    <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                        <div class="mt-20 row">
                                            <div class="col-md-3 col-xs-12"><img src="../img/big/img6.jpg" alt="user" class="img-fluid rounded" /></div>
                                            <div class="col-md-9 col-xs-12">
                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a>
                                            </div>
                                        </div>
                                        <div class="like-comm mt-20"> 
                                            <a href="javascript:void(0)" class="link mr-10">2 comment</a> 
                                            <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left"> <img src="../img/doctors/3.jpg" alt="user" class="rounded-circle" /> </div>
                                <div class="sl-right">
                                    <div>
                                        <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                        <p class="mt-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                    </div>
                                    <div class="like-comm mt-20"> 
                                        <a href="javascript:void(0)" class="link mr-10">2 comment</a> 
                                        <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> 
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left"> <img src="../img/doctors/4.jpg" alt="user" class="rounded-circle" /> </div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                        <blockquote class="mt-10">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-6"> <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">Johnathan Deo</p>
                            </div>
                            <div class="col-md-3 col-6"> <strong>Mobile</strong>
                                <br>
                                <p class="text-muted">(123) 456 7890</p>
                            </div>
                            <div class="col-md-3 col-6"> <strong>Email</strong>
                                <br>
                                <p class="text-muted">johnathan@admin.com</p>
                            </div>
                            <div class="col-md-3 col-6"> <strong>Location</strong>
                                <br>
                                <p class="text-muted">London</p>
                            </div>
                        </div>
                        <hr>
                        <p class="mt-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <h4 class="mt-30">Skill Set</h4>
                        <hr>
                        <h6 class="mt-30">Wordpress <span class="pull-right">80%</span></h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h6 class="mt-30">HTML 5 <span class="pull-right">90%</span></h6>
                        <div class="progress  progress-sm">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h6 class="mt-30">jQuery <span class="pull-right">50%</span></h6>
                        <div class="progress  progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                        <h6 class="mt-30">Photoshop <span class="pull-right">70%</span></h6>
                        <div class="progress  progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">50% Complete</span> </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        @include('layouts.messages')
                    {!! Form::open(['route' =>['doctors.update',$doctor->id], 'method' => 'put','class'=>'forms-sample','enctype'=>'multipart/form-data']) !!}
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('name', 'Doctor Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Username']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('degree', 'Email Address') !!}
                                {!! Form::text('degree', null, ['class'=>'form-control','id'=>'degree','placeholder'=>'MBBS']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12">
                                {!! Form::label('designation', 'Designation') !!}
                                {!! Form::text('designation', null, ['class'=>'form-control','id'=>'designation','placeholder'=>'Assistent Professor']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('phone', 'Phone Number') !!}
                                {!! Form::text('phone', null, ['class'=>'form-control','id'=>'phone','placeholder'=>'012345678910']) !!}
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('comission', 'Comission') !!}
                                {!! Form::number('comission', null, ['class'=>'form-control','id'=>'comission','placeholder'=>'30%']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                {!! Form::label('balance', 'balance') !!}
                                {!! Form::number('balance', 0, ['class'=>'form-control','id'=>'balance']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Create', ['class'=>'btn btn-primary mr-2']) !!}
                        <button class="btn btn-light">Cancel</button>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 


@section('scripts')
     @include('doctors.script')
@endsection