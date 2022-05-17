<x-app-layout>
<!-- Datatable -->
<link href="{{ asset('Amzonestep/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('Amzonestep/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ asset('Amzonestep/css/style.css') }}" rel="stylesheet">
<div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">All Users</a></li>
					</ol>
                </div>
                <!-- row -->


                <div class="row">
                
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <a class="btn btn-primary" href="{{ route('admin.user.create') }}"><i class="fa fa-plus"> Add User</i></a>
                            </div>
                            <div class="card-body">
                            @if ($message = Session::get('success'))
                               <div class="alert alert-success">
                                 <p>{{ $message }}</p>
                               </div>
                             @endif
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>                                
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <!-- <td><img class="rounded-circle" width="35" src="images/profile/small/pic1.jpg" alt=""></td> -->
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td> @if($user->roles == 1)
                                                       Super Admin
                                                     @elseif($user->roles == 2)
                                                       Admin
                                                     @elseif($user->roles == 3) 
                                                       Client            
                                                     @endif
                                                </td>
                                                <td>
                                               
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>   
														<a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
                                                
												</td>												
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					
				</div>
            </div>
          
</x-app-layout>

<!-- Datatable -->
<script src="{{ asset('Amzonestep/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('Amzonestep/js/plugins-init/datatables.init.js')}}"></script>