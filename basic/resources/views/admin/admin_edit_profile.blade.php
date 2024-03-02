@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile</h4>

                        <form action="{{ route('admin.store_profile')  }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ $adminData->name}}"
                                        id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email"
                                        value="{{ $adminData->email }}" id="example-email-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image-select" name="image-select">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="image-show" class="rounded avatar-lg" src="{{ !empty($adminData->profile_img)? url('upload_image/admin/'.$adminData->profile_img):
                                    url('upload_image/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <input class="btn btn-primary waves-effect waves-light" type="submit" value="UPDATE">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>

</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    var imageInput = document.getElementById('image-select');
    var showImage = document.getElementById('image-show');

    imageInput.addEventListener('change', function(e) {
        var reader = new FileReader();

        reader.onload = function(e) {
            showImage.src = e.target.result;
        };

        reader.readAsDataURL(e.target.files[0]);
    });
});
</script>
@endsection
