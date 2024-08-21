
@extends('layouts.dashboard_master')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Movie</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.movie.save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-md-flex">
                                        <div class="form-group col-md-4">
                                            <label for="posterImage">Poster Image</label>
                                            <div id="posterPreviewBox" class="mb-2 preview-box">
                                                <span class="watermark">250x100</span>
                                                <img id="posterPreview" src="" alt="Poster Image Preview">
                                            </div>
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="posterImage">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="bannerImage">Banner Image</label>
                                            <div id="bannerPreviewBox" class="mb-2 preview-box">
                                                <span class="watermark">250x400</span>
                                                <img id="bannerPreview" src="" alt="Banner Image Preview">
                                            </div>
                                            <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror" id="bannerImage">
                                            @error('banner')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email2">Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="email2" placeholder="Enter Movie Title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                                  <div class="d-md-flex">
                                    <div class="form-group col-md-4">
                                        <label for="email2">Category</label>
                                        <select name="category_id" class="form-select form-control" id="exampleFormControlSelect1">
                                            <option value="">Select Category</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}</option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email2">Sub Category</label>
                                        <select name="subcategory_id" class="form-select form-control" id="exampleFormControlSelect1">
                                            <option value="">Select Sub Category</option>
                                            @forelse ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">
                                                    {{ $subCategory->name }}</option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse
                                        </select>
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="genres">Genre</label>
                                        <select name="genre" class="form-select form-control" id="exampleFormControlSelect1">
                                            <option value="">Select Genre</option>
                                            @forelse ($genres as $genre)
                                                <option value="{{ $genre->id }}">
                                                    {{ $genre->name }}</option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse

                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email2">Meta Description</label>
                                        <textarea id="metaDescription" name="short_desc" class="form-control @error('short_desc') is-invalid @enderror" cols="30" rows="5" maxlength="350"></textarea>
                                        <small id="charCount" class="form-text text-muted">0/350 characters</small>
                                        @error('short_desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                <div class="form-group">
                                    <label for="email2">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" id="summernote"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-md-flex">
                                    <div class="form-group col-md-6">
                                        <label for="trailerLink">Trailer</label>
                                        <input type="url" name="trailer" class="form-control @error('trailer') is-invalid @enderror" id="trailerLink" placeholder="YouTube Link">
                                        @error('trailer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      </div>
                                    <div class="form-group col-md-6">
                                        <label for="email2">Director</label>
                                        <input type="text" name="director" class="form-control @error('director') is-invalid @enderror" id="email2" placeholder="Enter Director Name">
                                        @error('director')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  </div>

                                    <div class="d-md-flex">
                                        <div class="form-group col-md-6">
                                            <label for="email2">Casts</label>
                                            <input type="text" name="casts" class="form-control @error('casts') is-invalid @enderror" id="email2" placeholder="Ex- Salman Khan, Sharukh Khan">
                                            @error('casts')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email2">Rating</label>
                                            <input type="text" name="rating" class="form-control @error('rating') is-invalid @enderror" id="email2" placeholder="Enter Movie Rating">
                                            @error('rating')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                  <div class="d-md-flex">

                                    <div class="form-group col-md-6">
                                        <label for="email2">Language</label>
                                        <select name="language" class="form-select form-control" id="exampleFormControlSelect1">
                                            <option value="">Select Language</option>
                                            @forelse ($languages as $language)
                                                <option value="{{ $language->id }}">
                                                    {{ $language->name }}</option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse

                                        </select>
                                    </div>
                                        <div class="form-group col-md-6">
                                            <label for="email2">Version</label>
                                            <select name="version" class="form-select form-control" id="exampleFormControlSelect1">
                                                <option value="0">Free</option>
                                                <option value="1">Premium</option>
                                            </select>
                                        </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="form-label">Tags <a href="#" data-bs-toggle="modal" data-bs-target="#tagCreate">Create New</a></label>
                                    <br>
                                    <div class="selectgroup selectgroup-pills" id="tagListContainer">

                                        @forelse ($tags as $tag)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="selectgroup-input">
                                                <span class="selectgroup-button">{{ $tag->name }}</span>
                                            </label>
                                        @empty
                                            <p>Not Found!</p>
                                        @endforelse
                                    </div>
                                  </div>

                                    <div class="d-flex">
                                      <div class="form-group">
                                          <label for="email2">Status</label>
                                          <br>
                                          <label class="switch" title="Status">
                                              <input type="checkbox" id="statusCheckbox" checked>
                                              <span class="slider"></span>
                                          </label>
                                          <input type="hidden" id="statusValue" name="status" value="1">
                                        </div>
                                        <div class="form-group">
                                          <label for="email2">Feature</label>
                                          <br>
                                          <label class="switch" title="feature">
                                              <input type="checkbox" id="featureCheckbox">
                                              <span class="slider"></span>
                                          </label>
                                          <input type="hidden" id="featureValue" name="feature" value="0">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="form-group col-md-5">
                                    <label for="downloadLinks">Download Links</label>
                                    <div id="downloadLinksContainer">
                                        <div class="d-flex mb-2 download-link-row">
                                            <input type="text" name="download_titles[]" class="form-control col-md-5 @error('download_titles') is-invalid @enderror" placeholder="Download Title">
                                            <input type="url" name="download_links[]" class="form-control col-md-5 mx-2 @error('download_links') is-invalid @enderror" placeholder="Download Link">
                                            <button type="button" class="btn btn-success addDownloadLink fw-bold">+</button>
                                        </div>
                                    </div>
                                    @error('download_links')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center pb-10">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tagCreate" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="tagForm">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New Tag</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tag Name</label>
                                    <input type="text" name="name" id="tagName" class="form-control @error('name') is-invalid @enderror">
                                    <span class="invalid-feedback" id="tagError" role="alert" style="display: none;">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')

<script>
    $(document).ready(function () {
        $('#tagForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.tag.add') }}",
                type: "POST",
                data: {
                    _token: @json(csrf_token()),
                    name: $('#tagName').val()
                },
                success: function (response) {
                    if (response.success) {
                        $('#tagName').val(''); // Clear the input field
                        $('#tagError').hide(); // Hide error message if any

                        // Trigger Bootstrap Notify alert
                        var content = {};
                        content.message = 'Tag created successfully!';
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

                        // Close the modal
                        $('.modal').modal('hide');

                        // Append the new tag as a checkbox
                        $('#tagListContainer').append(
                            '<label class="selectgroup-item">' +
                                '<input type="checkbox" name="tags[]" value="' + response.tag.id + '" class="selectgroup-input" checked>' +
                                '<span class="selectgroup-button">' + response.tag.name + '</span>' +
                            '</label>'
                        );
                    }
                },
                error: function (xhr) {
                    var errors = xhr.responseJSON.errors;
                    if (errors && errors.name) {
                        $('#tagError').show().find('strong').text(errors.name[0]);
                    }
                }
            });
        });
    });
</script>

<script>
    // Script for the status checkbox
    const statusCheckbox = document.getElementById('statusCheckbox');
    const statusValue = document.getElementById('statusValue');

    statusCheckbox.addEventListener('change', () => {
        if (statusCheckbox.checked) {
            statusValue.value = 1;
        } else {
            statusValue.value = 0;
        }
    });
</script>

<script>
    // Script for the feature checkbox
    const featureCheckbox = document.getElementById('featureCheckbox');
    const featureValue = document.getElementById('featureValue');

    featureCheckbox.addEventListener('change', () => {
        if (featureCheckbox.checked) {
            featureValue.value = 1;
        } else {
            featureValue.value = 0;
        }
    });
</script>

<script>
    $(document).ready(function() {
    $('#summernote').summernote();
    });
</script>

<script>
    document.getElementById('posterImage').addEventListener('change', function(event) {
        previewImage(event, 'posterPreview');
    });

    document.getElementById('bannerImage').addEventListener('change', function(event) {
        previewImage(event, 'bannerPreview');
    });

    function previewImage(event, previewElementId) {
        const reader = new FileReader();
        reader.onload = function() {
            const previewElement = document.getElementById(previewElementId);
            previewElement.src = reader.result;
            previewElement.style.display = 'block';
            previewElement.previousElementSibling.style.display = 'none'; // Hide watermark
        }
        reader.readAsDataURL(event.target.files[0]);

        // Ensure the grey box is hidden when an image is selected
        document.getElementById(previewElementId).parentElement.style.backgroundColor = 'transparent';
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const downloadLinksContainer = document.getElementById('downloadLinksContainer');

        // Function to add a new download link input row
        function addDownloadLink() {
            const newLinkRow = document.createElement('div');
            newLinkRow.classList.add('d-flex', 'mb-2', 'download-link-row');

            newLinkRow.innerHTML = `
                <input type="text" name="download_titles[]" class="form-control col-md-5 @error('download_titles') is-invalid @enderror" placeholder="Download Title">
                <input type="url" name="download_links[]" class="form-control col-md-5 mx-2 @error('download_links') is-invalid @enderror" placeholder="Download Link">
                <button type="button" class="btn btn-danger removeDownloadLink">-</button>
            `;
            downloadLinksContainer.appendChild(newLinkRow);
        }

        // Add the first download link input row
        document.querySelector('.addDownloadLink').addEventListener('click', addDownloadLink);

        // Event delegation for removing download link rows
        downloadLinksContainer.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('removeDownloadLink')) {
                e.target.closest('.download-link-row').remove();
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
    $('#metaDescription').on('input', function() {
        var maxLength = 350;
        var currentLength = $(this).val().length;
        $('#charCount').text(currentLength + '/' + maxLength + ' characters');
    });
});

</script>

@endsection

