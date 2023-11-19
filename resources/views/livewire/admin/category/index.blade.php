<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- this is done with the livewire --}}
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Category
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end"> Add
                            Category</a>
                    </h4>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->stat == '1' ? 'Hidden' : 'Visible' }}</td>
                                        <td>
                                            {{-- -------this is the edit part here we are using the url and a whole new page- --}}

                                            <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                                class="btn btn-success me-2">Edit</a>

                                            {{-- deleteCategory is  a function in the index.php of category  --}}

                                            <a href="" wire:click="deleteCategory({{ $category->id }})"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            // this id is the data-bs-modal
            $('#deleteModal').modal('hide');
        })
    </script>
@endpush
