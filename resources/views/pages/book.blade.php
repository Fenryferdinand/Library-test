@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Book Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6>Book</h6>

                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#create-book-modal">
                        Add Book
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Author Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Book Publisher (Publish Year)
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Book Synopsis</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr data-book="{{$book}}">
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{$book->book_name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$book->author->author_name}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$book->book_publisher}} ( {{$book->publish_year}} )</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$book->book_synopsis}}</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <p class="text-sm font-weight-bold mb-0 text-info" style="cursor:pointer" onclick="edit(this)">Edit</p>
                                                <p class="text-sm font-weight-bold mb-0 ps-2 text-danger" style="cursor:pointer" onclick="deletebook(this)">Delete</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="create-book-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <form action="{{ route('book.create')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Create book</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="form-label">Book Name</label>
                                <input type="text"
                                    class="form-control" name="book_name" id="" aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Book Publisher</label>
                                <input type="text"
                                    class="form-control" name="book_publisher" id="" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Publish Year</label>
                                <input type="text"
                                    class="form-control" name="publish_year" id="" placeholder="">
                            </div>
                            <div class="col-6">

                                <label for="" class="form-label">Book Author</label>
                                <select name="author_id" class="form-control">
                                    <option value="" disabled selected>Select an author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Book Synopsis</label>
                                <textarea class="form-control" name="book_synopsis" id=""aria-describedby="helpId" placeholder=""></textarea>
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
  
    <div class="modal fade" id="edit-book-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
          
            <form action="{{ route('book.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Update book</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                        <div class="row">

                        <div class="col-6">
                                <label for="" class="form-label">Book Name</label>
                                <input type="text"
                                    class="form-control" name="book_name" id="" aria-describedby="helpId" placeholder="" required>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Book Publisher</label>
                                <input type="text"
                                    class="form-control" name="book_publisher" id="" placeholder="">
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Publish Year</label>
                                <input type="text"
                                    class="form-control" name="publish_year" id="" placeholder="">
                            </div>
                            <div class="col-6">

                                <label for="" class="form-label">Book Author</label>
                                <select name="author_id" class="form-control">
                                    <option value="" disabled selected>Select an author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="" class="form-label">Book Synopsis</label>
                                <textarea class="form-control" name="book_synopsis" id=""aria-describedby="helpId" placeholder=""></textarea>
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

  
    <div class="modal fade" id="delete-book-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
          
            <form action="{{ route('book.delete') }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Delete book</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"> 
                    Are you sure want to delete <span class="bookName"> </span> ?
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
        $('#edit-book-modal').find('input[name="last_name"]').val(data.last_name)
    function edit(el){
        let data = $(el).closest('tr').data('book');
        $('#edit-book-modal').modal('show');
        $('#edit-book-modal').find('input[name="id"]').val(data.id)
        $('#edit-book-modal').find('input[name="book_name"]').val(data.book_name)
        $('#edit-book-modal').find('input[name="book_publisher"]').val(data.book_publisher)
        $('#edit-book-modal').find('input[name="publish_year"]').val(data.publish_year)
        $('#edit-book-modal').find('textarea[name="book_synopsis"]').val(data.book_synopsis)
        $('#edit-book-modal').find('select[name="author_id"]').val(data.author_id)
    }

    function deletebook(el){
        let data = $(el).closest('tr').data('book');
        $('#delete-book-modal').modal('show');
        $('#delete-book-modal').find('input[name="id"]').val(data.id)
    }
</script>
@endpush