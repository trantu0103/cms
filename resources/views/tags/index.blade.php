@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{ route('tags.create') }}" class="btn btn-primary">Add tag</a>
</div>
<div class="card card-default">
  <div class="card-header">
    Categories
  </div>
  <div class="card-body">
    @if($tags->count() > 0)
    <table class="table">
      <thead>
        <th>Name</th>
        <th>Posts Count</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($tags as $tag)
        <tr>
          <td>
            {{ $tag->name }}
          </td>
          <td>
            {{ $tag->posts->count() }}
          </td>
          <td>
          <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm">Edit</a>
          <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Categories Yes</h3>
    @endif


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="" method="post" id="deletetagForm">
            @csrf
            @method('delete')
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="text-center text-bold">Are you sure to delete this tag ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                  </div>
                </div>
          </form>
        </div>
      </div>

  </div>
</div>
@endsection

@section('scripts')
    <script>
      function handleDelete(id) {

        let form = document.getElementById('deletetagForm');
        form.action = 'tags/' + id;
        $('#deleteModal').modal('show');
      }
    </script>
@endsection
