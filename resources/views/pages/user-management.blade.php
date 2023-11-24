@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6>Users</h6>

                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#create-user-modal">
                        Add User
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Create Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr data-user="{{$user}}">
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$user->first_name}} {{$user->last_name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                @if($user->is_admin == TRUE)
                                                    Admin
                                                @else
                                                    Member
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$user->created_at}}</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <p class="text-sm font-weight-bold mb-0 text-info" style="cursor:pointer" onclick="edit(this)">Edit</p>
                                                <p class="text-sm font-weight-bold mb-0 ps-2 text-danger" style="cursor:pointer" onclick="deleteuser(this)">Delete</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="create-user-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <form action="{{ route('user.create') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Create User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="form-label">First Name</label>
                                <input type="text"
                                    class="form-control" name="first_name" id="" aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text"
                                    class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Email</label>
                                <input type="text"
                                    class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-12">

                                <label for="" class="form-label me-3">User Type:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_admin" id="" value="1" required>
                                    <label class="form-check-label" for="">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_admin" id="" value="0" required>
                                    <label class="form-check-label" for="">Member</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  
    <div class="modal fade" id="edit-user-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
          
            <form action="{{ route('user.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Update User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="form-label">First Name</label>
                                <input type="text"
                                    class="form-control" name="first_name" id="" aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text"
                                    class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label me-3">User Type:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_admin" id="" value="1" required>
                                    <label class="form-check-label" for="">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_admin" id="" value="0" required>
                                    <label class="form-check-label" for="">Member</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

  
    <div class="modal fade" id="delete-user-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
          
            <form action="{{ route('user.delete') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Delete User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                    Are you sure want to delete <span class="userName"> </span> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
<script>
    function edit(el){
        let data = $(el).closest('tr').data('user');
        $('#edit-user-modal').modal('show');
        $('#edit-user-modal').find('input[name="id"]').val(data.id)
        $('#edit-user-modal').find('input[name="first_name"]').val(data.first_name)
        $('#edit-user-modal').find('input[name="last_name"]').val(data.last_name)
        if(data.is_admin == true){
            $('#edit-user-modal').find('input[name="is_admin"]').eq(0).prop("checked", true)
        }
        else{
            $('#edit-user-modal').find('input[name="is_admin"]').eq(1).prop("checked", true)
        }
    }

    function deleteuser(el){
        let data = $(el).closest('tr').data('user');
        $('#delete-user-modal').modal('show');
        $('#delete-user-modal').find('input[name="id"]').val(data.id)
    }
</script>
@endpush