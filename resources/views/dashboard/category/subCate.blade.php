
@extends('layouts.dashboard_master')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sub Categories</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center">SL</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Parent</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Status</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @forelse ($subCategories as $key=>$subCategory)
                                        <tr role="row" class="odd">
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td class="sorting_1">{{ $subCategory->name }}</td>
                                            <td class="sorting_1">{{ $subCategory->RelaCategory->name }}</td>
                                            <td>
                                                @if ($subCategory->status == 1)
                                                <span class="badge text-bg-success">Active</span>
                                                @else
                                                    <span class="badge text-bg-danger">Deactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-icon btn-round btn-info" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $subCategory->id }}">
                                                    <i class="fa fa-edit fa-sm"></i>
                                                </button>
                                                <a href="{{ route('admin.category.delete', $subCategory->id) }}" class="btn btn-icon btn-round btn-danger">
                                                    <i class="fa fa-trash-alt fa-sm"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editCategoryModal{{ $subCategory->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.category.edit', $subCategory->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Category Edit</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="email2">Category Name</label>
                                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="email2" value="{{ $subCategory->name }}">
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email2">Parent Category</label>
                                                                    <select name="category_id" class="form-select" id="exampleFormControlSelect1">
                                                                        <option value="">Select Category</option>
                                                                        @forelse ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                @if ($subCategory->category_id==$category->id)
                                                                                selected
                                                                                @endif>
                                                                                {{ $category->name }}</option>
                                                                        @empty
                                                                            <option value="">Not Found</option>
                                                                        @endforelse
                                                                    </select>
                                                                  </div>
                                                                <div class="form-group">
                                                                    <label for="email2">Status</label>
                                                                    <br>
                                                                    <label class="switch" title="Status">
                                                                        <input type="checkbox" id="statusCheckbox" @if ($subCategory->status == 1) checked @endif>
                                                                        <span class="slider"></span>
                                                                    </label>
                                                                    <input type="hidden" id="statusValue" name="status" value="1">
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    @empty
                                        <tr>
                                            <td class="text-center text-danger" colspan="5">Not Found!</td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Add Sub Category</div>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.subcategory.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="email2">Sub Category Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="email2" placeholder="Enter Sub Category Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="email2">Parent Category</label>
                                <select name="category_id" class="form-select" id="exampleFormControlSelect1">
                                    <option value="">Select Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option value="">Not Found</option>
                                    @endforelse
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="email2">Status</label>

                                <br>
                                <label class="switch" title="Status">
                                    <input type="checkbox" id="statusCheckbox" checked>
                                    <span class="slider"></span>
                                </label>
                                <input type="hidden" id="statusValue" name="status" value="1">
                              </div>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>

        </div>
    </div>
</div>

@endsection

@section('footer_script')

<script>
    const checkbox = document.getElementById('statusCheckbox');
    const statusValue = document.getElementById('statusValue');

    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            statusValue.value = 1;
        } else {
            statusValue.value = 0;
        }
    });
</script>
<script>
          $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });


      });
</script>

@endsection
