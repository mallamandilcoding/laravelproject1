@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password</h4>

                        @if (count($errors))
                        @foreach ($errors->all() as $err)
                        <p class="alert alert-danger alert-dismissible fade show">{{ $err }}</p>
                        @endforeach

                        @endif

                        <form action="{{ route('admin.update_password')  }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="oldpassword" value=""
                                        id="oldpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="newpassword" value=""
                                        id="newpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="confirmpassword" value=""
                                        id="confirmpassword">
                                </div>
                            </div>

                            <input class="btn btn-primary waves-effect waves-light" type="submit"
                                value="CHANGE PASSWORD">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>

</div>


</script>
@endsection