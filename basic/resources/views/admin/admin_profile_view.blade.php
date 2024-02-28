@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <img class="img-thumbnail rounded-circle avatar-xl mx-auto"
                        src="{{ asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $adminData->name}}</h4>
                        <hr>
                        <h4 class="card-title">Email: {{ $adminData->email}}</h4>
                        <hr>
                        <a href="" class="btn btn-primary btn-rounded waves-effect waves-light">Edit Profile</a>

                    </div>
                </div>
            </div>
        </div>



    </div>

</div>
@endsection