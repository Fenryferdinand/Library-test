@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Author Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6>Author</h6>

                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#create-author-modal">
                        Add Author
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author Nationality
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Author Description</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author)
                                    <tr data-author="{{$author}}">
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$author->author_name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$author->author_nationality}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$author->author_desc}}</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <p class="text-sm font-weight-bold mb-0 text-info" style="cursor:pointer" onclick="edit(this)">Edit</p>
                                                <p class="text-sm font-weight-bold mb-0 ps-2 text-danger" style="cursor:pointer" onclick="deleteauthor(this)">Delete</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $authors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="create-author-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <form action="{{ route('author.create') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Create author</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="form-label">Name</label>
                                <input type="text"
                                    class="form-control" name="author_name" id="" aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Nationality</label>
                                <input type="text"
                                    class="form-control" name="author_nationality" id="" placeholder="">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Author Desctiption</label>
                                <textarea class="form-control" name="author_desc" id=""aria-describedby="helpId" placeholder=""></textarea>
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
  
    <div class="modal fade" id="edit-author-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
          
            <form action="{{ route('author.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Update author</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="form-label">Name</label>
                                <input type="text"
                                    class="form-control" name="author_name" id="" aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Nationality</label>
                                <input type="text"
                                    class="form-control" name="author_nationality" id="" placeholder="">
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Author Desctiption</label>
                                <textarea class="form-control" name="author_desc" id=""aria-describedby="helpId" placeholder=""></textarea>
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

  
    <div class="modal fade" id="delete-author-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
          
            <form action="{{ route('author.delete') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Delete author</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                    Are you sure want to delete <span class="authorName"> </span> ?
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
        let data = $(el).closest('tr').data('author');
        $('#edit-author-modal').modal('show');
        $('#edit-author-modal').find('input[name="id"]').val(data.id)
        $('#edit-author-modal').find('input[name="author_name"]').val(data.author_name)
        $('#edit-author-modal').find('input[name="author_nationality"]').val(data.author_nationality)
        $('#edit-author-modal').find('textarea[name="author_desc"]').val(data.author_desc)
    }

    function deleteauthor(el){
        let data = $(el).closest('tr').data('author');
        $('#delete-author-modal').modal('show');
        $('#delete-author-modal').find('input[name="id"]').val(data.id)
    }
</script>
@endpush