
@extends('layouts.dashboard_master')

@section('content')

<div class="container">
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Movie List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Version</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Status</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Feature</th>
                                        <th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($movies as $key=>$movie)
                                        <tr role="row" class="odd">
                                            <td>{{ $key+1 }}</td>
                                            <td class="sorting_1">{{ $movie->title }}</td>
                                            <td class="sorting_1">{{ $movie->RelationCategory->name }}</td>
                                            <td class="sorting_1">
                                                @if ($movie->version == 1)
                                                    <span class="badge text-bg-success">Premium</span>
                                                @else
                                                    <span class="badge text-bg-danger">Free</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="javascript:void(0);" data-id="{{ $movie->id }}" class="toggle-status">
                                                    @if ($movie->status == 1)
                                                    <i class="fa fa-check-circle fa-lg text-success"></i>
                                                    @else
                                                    <i class="fa fa-times-circle fa-lg text-danger"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="javascript:void(0);" data-id="{{ $movie->id }}" class="toggle-feature">
                                                    @if ($movie->feature == 1)
                                                    <i class="fa fa-check-circle fa-lg text-success"></i>
                                                    @else
                                                    <i class="fa fa-times-circle fa-lg text-danger"></i>
                                                    @endif
                                                </a>
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('admin.movie.edit', $movie->id) }}" class="btn btn-icon btn-round btn-primary"><i class="fa fa-edit fa-sm"></i></a>
                                                <a href="javascript:void(0);" data-id="{{ $movie->id }}" class="btn btn-icon btn-round btn-danger delete-movie"><i class="fa fa-trash-alt fa-sm"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="7">Not Found!</td>
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

        </div>
    </div>
</div>

@endsection

@section('footer_script')

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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle delete button click
        document.querySelectorAll('.delete-movie').forEach(function (button) {
            button.addEventListener('click', function () {
                var movieId = this.getAttribute('data-id');

                // SweetAlert confirmation dialog
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this movie!",
                    icon: "warning",
                    buttons: true,

                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Send AJAX request
                        fetch(`/admin/movie/delete/${movieId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                swal("Success!", data.message, {
                                    icon: "success",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-success d-none",
                                        },
                                    },
                                    timer: 1500
                                });

                                // Optionally, remove the deleted item from the DOM
                                this.closest('tr').remove();
                            } else {
                                swal("Failed!", data.message, {
                                    icon: "error",
                                    buttons: {
                                        confirm: {
                                            className: "btn btn-danger",
                                        },
                                    }
                                });
                            }
                        })
                        .catch(error => {
                            swal("Error!", "An error occurred. Please try again.", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: "btn btn-danger",
                                    },
                                }
                            });
                            console.error('Error:', error);
                        });
                    }
                });
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle status toggle
        document.querySelectorAll('.toggle-status').forEach(function (button) {
            button.addEventListener('click', function () {
                var movieId = this.getAttribute('data-id');

                // Send AJAX request to toggle status
                fetch(`/admin/movie/status/${movieId}`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success_alert) {
                        // Update the icon based on the new status
                        const icon = this.querySelector('i');
                        if (data.status) {
                            icon.classList.remove('fa-times-circle', 'text-danger');
                            icon.classList.add('fa-check-circle', 'text-success');
                        } else {
                            icon.classList.remove('fa-check-circle', 'text-success');
                            icon.classList.add('fa-times-circle', 'text-danger');
                        }

                        // Display success notification
                        var content = {};
                        content.message = 'Status updated successfully!';
                        content.title = "Success";
                        content.icon = "fa fa-check";
                        content.url = "#";
                        content.target = "_blank";

                        $.notify(content, {
                            type: 'success',
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            time: 3000,
                            delay: 3000,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        // Handle feature toggle
        document.querySelectorAll('.toggle-feature').forEach(function (button) {
            button.addEventListener('click', function () {
                var movieId = this.getAttribute('data-id');

                // Send AJAX request to toggle feature
                fetch(`/admin/movie/feature/${movieId}`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success_alert) {
                        // Update the icon based on the new feature status
                        const icon = this.querySelector('i');
                        if (data.feature) {
                            icon.classList.remove('fa-times-circle', 'text-danger');
                            icon.classList.add('fa-check-circle', 'text-success');
                        } else {
                            icon.classList.remove('fa-check-circle', 'text-success');
                            icon.classList.add('fa-times-circle', 'text-danger');
                        }

                        // Display success notification
                        var content = {};
                        content.message = 'Feature updated successfully!';
                        content.title = "Success";
                        content.icon = "fa fa-check";
                        content.url = "#";
                        content.target = "_blank";

                        $.notify(content, {
                            type: 'success',
                            placement: {
                                from: "top",
                                align: "right"
                            },
                            time: 3000,
                            delay: 3000,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    });
</script>

@endsection
