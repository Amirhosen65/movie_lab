
@extends('layouts.dashboard_master')

@section('content')


<div class="container">
    <div class="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Movie Edit</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-md-flex">
                                        <div class="form-group col-md-4">
                                            <label for="posterImage">Poster Image</label>
                                            <div id="posterPreviewBox" class="mb-2 preview-box">
                                                <span class="watermark" style="{{ $movie->image ? 'display:none;' : '' }}">250x100</span>
                                                <img id="posterPreview" src="{{ $movie->image ? asset($movie->image) : '' }}"
                                                     alt="Poster Image Preview"
                                                     style="{{ $movie->image ? 'display:block;' : 'display:none;' }}">
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
                                                <span class="watermark" style="{{ $movie->banner ? 'display:none;' : '' }}">250x400</span>
                                                <img id="bannerPreview" src="{{ $movie->banner ? asset($movie->banner) : '' }}"
                                                     alt="Banner Image Preview"
                                                     style="{{ $movie->banner ? 'display:block;' : 'display:none;' }}">
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
                                        <input type="text" name="title" value="{{ $movie->title }}" class="form-control @error('title') is-invalid @enderror" id="email2" placeholder="Enter Movie Title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                  </div>
                                  <div class="d-md-flex">
                                    <div class="form-group col-md-4">
                                        <label for="categorySelect">Category</label>
                                        <select name="category_id" class="form-select form-control" id="categorySelect">
                                            <option value="">Select Category</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $movie->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
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
                                                <option value="{{ $subCategory->id }}" {{ $movie->subcategory_id == $subCategory->id ? 'selected' : '' }}>
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
                                                <option value="{{ $genre->id }}" {{ $movie->genre == $genre->id ? 'selected' : '' }}>
                                                    {{ $genre->name }}</option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse

                                        </select>
                                    </div>
                                    </div>
                                  <div class="form-group">
                                    <label for="email2">Meta Description</label>
                                    <textarea name="short_desc" class="form-control @error('short_desc') is-invalid @enderror" cols="30" rows="5">{{ $movie->short_desc }}</textarea>
                                    @error('short_desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email2">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" id="summernote">{{ $movie->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-md-flex">
                                    <div class="form-group col-md-6">
                                        <label for="trailerLink">Trailer</label>
                                        <input type="url" value="{{ $movie->trailer }}" name="trailer" class="form-control @error('trailer') is-invalid @enderror" id="trailerLink" placeholder="YouTube Link">
                                        @error('trailer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      </div>
                                    <div class="form-group col-md-6">
                                        <label for="email2">Director</label>
                                        <input type="text" value="{{ $movie->director }}" name="director" class="form-control @error('director') is-invalid @enderror" id="email2" placeholder="Enter Director Name">
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
                                            <input type="text" name="casts" value="{{ $movie->casts }}" class="form-control @error('casts') is-invalid @enderror" id="email2" placeholder="Ex- Salman Khan, Sharukh Khan">
                                            @error('casts')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email2">Rating</label>
                                            <input type="text" name="rating"value="{{ $movie->rating }}" class="form-control @error('rating') is-invalid @enderror" id="email2" placeholder="Enter Movie Rating">
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
                                                <option value="{{ $language->id }}" {{ $movie->language == $language->id ? 'selected' : '' }}>
                                                    {{ $language->name }}</option>
                                            @empty
                                                <option value="">Not Found</option>
                                            @endforelse

                                        </select>
                                    </div>
                                        <div class="form-group col-md-6">
                                            <label for="email2">Version</label>
                                            <select name="version" class="form-select form-control" id="exampleFormControlSelect1">
                                                <option value="0" {{ $movie->version == 0 ? 'selected' : '' }}>Free</option>
                                                <option value="1" {{ $movie->version == 1 ? 'selected' : '' }}>Premium</option>
                                            </select>
                                        </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="form-label">Tags <a href="#" data-bs-toggle="modal" data-bs-target="#tagCreate">Create New</a></label>
                                    <br>
                                    <div class="selectgroup selectgroup-pills" id="tagListContainer">

                                        @forelse ($tags as $tag)
                                            <label class="selectgroup-item">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="selectgroup-input"
                                                @foreach ($movie->MovieRelationTags as $m_tag)
                                                @if ($m_tag->id == $tag->id)
                                                checked
                                                @endif
                                                @endforeach
                                                >
                                                <span class="selectgroup-button">{{ $tag->name }}</span>
                                            </label>
                                        @empty
                                            <p>Not Found!</p>
                                        @endforelse
                                    </div>
                                  </div>

                                    <div class="d-flex">
                                        <div class="form-group">
                                            <label for="statusCheckbox">Status</label>
                                            <br>
                                            <label class="switch" title="Status">
                                                <input type="checkbox" id="statusCheckbox" {{ $movie->status ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                            <input type="hidden" id="statusValue" name="status" value="{{ $movie->status ? '1' : '0' }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="featureCheckbox">Feature</label>
                                            <br>
                                            <label class="switch" title="Feature">
                                                <input type="checkbox" id="featureCheckbox" {{ $movie->feature ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                            <input type="hidden" id="featureValue" name="feature" value="{{ $movie->feature ? '1' : '0' }}">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="form-group col-md-5">
                                    <label for="downloadLinks">Download Links</label>
                                    <button type="button" class="btn btn-success btn-xs addDownloadLink fw-bold ms-2">Add New</button>
                                    <div id="downloadLinksContainer" class="pt-2">
                                        {{-- @if(isset($movie->download_links) && !empty($movie->download_links))
                                            @foreach(json_decode($movie->download_links) as $link)
                                                <div class="d-flex mb-2 download-link-row">
                                                    <input type="text" name="download_titles[]" value="{{ $link->title }}" class="form-control col-md-5 @error('download_titles') is-invalid @enderror" placeholder="Download Title">
                                                    <input type="url" name="download_links[]" value="{{ $link->link }}" class="form-control col-md-5 mx-2 @error('download_links') is-invalid @enderror" placeholder="Download Link">
                                                    <button type="button" class="btn btn-danger removeDownloadLink fw-bold">-</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="d-flex mb-2 download-link-row">
                                                <input type="text" name="download_titles[]" class="form-control col-md-5 @error('download_titles') is-invalid @enderror" placeholder="Download Title">
                                                <input type="url" name="download_links[]" class="form-control col-md-5 mx-2 @error('download_links') is-invalid @enderror" placeholder="Download Link">
                                                <button type="button" class="btn btn-success addDownloadLink fw-bold">+</button>
                                            </div>
                                        @endif --}}
                                    </div>
                                    @error('download_links')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center pb-10">
                                <button class="btn btn-success">Update</button>
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
    // Status checkbox event listener
    document.getElementById('statusCheckbox').addEventListener('change', function() {
        document.getElementById('statusValue').value = this.checked ? '1' : '0';
    });

    // Feature checkbox event listener
    document.getElementById('featureCheckbox').addEventListener('change', function() {
        document.getElementById('featureValue').value = this.checked ? '1' : '0';
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
                <input type="text" name="download_titles[]" class="form-control col-md-5" placeholder="Download Title">
                <input type="url" name="download_links[]" class="form-control col-md-5 mx-2" placeholder="Download Link">
                <button type="button" class="btn btn-danger removeDownloadLink">-</button>
            `;
            downloadLinksContainer.appendChild(newLinkRow);
        }

        // Function to initialize existing download links
        function initializeExistingLinks() {
            const existingLinks = @json(json_decode($movie->download_links, true));

            if (Array.isArray(existingLinks) && existingLinks.length > 0) {
                existingLinks.forEach(link => {
                    const linkRow = document.createElement('div');
                    linkRow.classList.add('d-flex', 'mb-2', 'download-link-row');

                    const title = link.title || '';
                    const url = link.link || '';

                    linkRow.innerHTML = `
                        <input type="text" name="download_titles[]" value="${title}" class="form-control col-md-5" placeholder="Download Title">
                        <input type="url" name="download_links[]" value="${url}" class="form-control col-md-5 mx-2" placeholder="Download Link">
                        <button type="button" class="btn btn-danger removeDownloadLink">-</button>
                    `;
                    downloadLinksContainer.appendChild(linkRow);
                });
            } else {
                // Add the initial empty row if no existing links
                addDownloadLink();
            }
        }

        // Initialize existing download links on page load
        initializeExistingLinks();

        // Add a new download link row
        document.querySelector('.addDownloadLink').addEventListener('click', addDownloadLink);

        // Event delegation for removing download link rows
        downloadLinksContainer.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('removeDownloadLink')) {
                e.target.closest('.download-link-row').remove();
            }
        });
    });
</script>


@endsection

