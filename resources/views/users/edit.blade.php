<x-app-layout>
<!-- Datatable -->
<link href="{{ asset('Amzonestep/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ asset('Amzonestep/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ asset('Amzonestep/css/style.css') }}" rel="stylesheet">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
                
                <div class="col-xl-12 col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                @if ($errors->any())
                                 <div class="alert alert-danger">
                                   <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                     <ul>
                                       @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                       @endforeach
                                     </ul>
                                  </div>
                                @endif
                                <form method="POST" action="{{ route('admin.user.update',$user->id) }}">
                                   @method("PUT")
                                   @csrf
                                   {{ method_field("PUT") }}
                                       <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control input-rounded" value="{{ $user->name }}" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control input-rounded" value="{{ $user->email }}" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control input-rounded" value="{{ $user->password }}" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9">
                                            
                                            <select class="form-control">
                                                <option selected value="{{ $user->roles }}">{{ $user->roles }}</option>
                                                <option name="superadmin" value="1">Super Admin</option>
                                                <option name="admin" value="2">Admin</option>
                                                <option name="client" value="3">Client</option>
                                            </select>
                                       
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					
				</div>
            </div>
            
          
</x-app-layout>

   <!-- Required vendors -->
    <script src="{{ asset('Amzonestep/vendor/global/global.min.js')}}"></script>
	<script src="{{ asset('Amzonestep/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('Amzonestep/js/custom.min.js')}}"></script>
	<script src="{{ asset('Amzonestep/js/deznav-init.js')}}"></script>
