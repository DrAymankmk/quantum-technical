@extends('backend.layouts.app')

@section('content')
<div class="container-fluid page-builder">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{ route('cms.pages.index') }}" class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i> {{ __('Back to Pages') }}
                    </a>
                </div>
                <h4 class="page-title">
                    <i class="mdi mdi-puzzle-edit-outline"></i>
                    {{ __('Page Builder') }}: {{ $page->name }}
                </h4>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @include('backend.cms.page-builder.partials.page-form')

    <div class="row mt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">{{ __('Sections') }} ({{ $page->sections->count() }})</h5>
                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#addSectionForm">
                    <i class="mdi mdi-plus"></i> {{ __('Add Section') }}
                </button>
            </div>

            <div class="collapse mb-3" id="addSectionForm">
                @include('backend.cms.page-builder.partials.add-section-form')
            </div>

            <div class="accordion" id="sectionsAccordion">
                @forelse($page->sections as $section)
                    @include('backend.cms.page-builder.partials.section-card', ['section' => $section])
                @empty
                    <div class="alert alert-info">
                        {{ __('No sections yet. Add a section to start building this page.') }}
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.page-builder .accordion-button:not(.collapsed) {
    background-color: rgba(114, 124, 245, 0.1);
}
.page-builder .section-header-meta .badge {
    font-size: 0.75rem;
}
.page-builder .item-card {
    border-left: 3px solid var(--bs-primary);
}
.page-builder .builder-form-actions {
    position: sticky;
    bottom: 0;
    background: #fff;
    padding: 0.75rem 0;
    border-top: 1px solid #dee2e6;
    margin-top: 1rem;
    z-index: 1;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    function syncQuillEditors(form) {
        form.find('textarea[id]').each(function() {
            var textarea = this;
            var editorDiv = document.getElementById('editor-' + textarea.id);
            if (editorDiv) {
                var quillRoot = editorDiv.querySelector('.ql-editor');
                if (quillRoot) {
                    textarea.value = quillRoot.innerHTML;
                }
            }
        });
    }

    function validateBuilderForm(form) {
        var errors = [];

        form.find('[data-required-title]').each(function() {
            if (!this.value.trim()) {
                var locale = (this.name.match(/translations\[([^\]]+)\]/) || [])[1] || '';
                errors.push('{{ __("Title is required for") }} ' + locale.toUpperCase());
            }
        });

        form.find('[data-required-slug]').each(function() {
            if (!this.value.trim()) {
                errors.push('{{ __("Slug is required") }}');
            }
        });

        form.find('[name="name"]').each(function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                errors.push('{{ __("Internal name is required") }}');
            }
        });

        if (errors.length) {
            Swal.fire({
                icon: 'warning',
                title: '{{ __("Validation Error") }}',
                html: errors.join('<br>')
            });
            return false;
        }

        return true;
    }

    function submitBuilderForm(form, successMessage) {
        if (!validateBuilderForm(form)) {
            return;
        }

        syncQuillEditors(form);

        var formData = new FormData(form[0]);
        var submitBtn = form.find('[type="submit"]');
        submitBtn.prop('disabled', true);

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: '{{ __("Success") }}',
                    text: response.message || successMessage,
                    timer: 1800,
                    showConfirmButton: false
                });
            },
            error: function(xhr) {
                var message = '{{ __("An error occurred") }}';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    message = Object.values(xhr.responseJSON.errors).flat().join('\n');
                }
                Swal.fire({
                    icon: 'error',
                    title: '{{ __("Error") }}',
                    text: message
                });
            },
            complete: function() {
                submitBtn.prop('disabled', false);
            }
        });
    }

    $(document).on('submit', '.builder-section-form, .builder-item-form', function(e) {
        e.preventDefault();
        var form = $(this);
        var isSection = form.hasClass('builder-section-form');
        submitBuilderForm(form, isSection ? '{{ __("Section updated successfully") }}' : '{{ __("Item updated successfully") }}');
    });

    $('form[action*="builder"]').on('submit', function(e) {
        if (!validateBuilderForm($(this))) {
            e.preventDefault();
        }
    });

    $(document).on('click', '.delete-section-btn', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: '{{ __("Are you sure?") }}',
            text: '{{ __("This will also delete all items in this section!") }}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: '{{ __("Yes, delete it!") }}',
            cancelButtonText: '{{ __("Cancel") }}'
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('cms/sections') }}/" + id,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        if (response.success) {
                            $('#section-card-' + id).remove();
                            Swal.fire({
                                icon: 'success',
                                title: '{{ __("Deleted!") }}',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }
        });
    });

    $(document).on('click', '.delete-item-btn', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: '{{ __("Are you sure?") }}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: '{{ __("Yes, delete it!") }}',
            cancelButtonText: '{{ __("Cancel") }}'
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('cms/items') }}/" + id,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        if (response.success) {
                            $('#item-card-' + id).remove();
                            Swal.fire({
                                icon: 'success',
                                title: '{{ __("Deleted!") }}',
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }
        });
    });

    $(document).on('change', '.builder-toggle-status', function() {
        var el = $(this);
        var url = el.data('url');

        $.ajax({
            url: url,
            type: 'POST',
            data: { _token: '{{ csrf_token() }}' },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '{{ __("Success") }}',
                        text: response.message,
                        timer: 1200,
                        showConfirmButton: false
                    });
                }
            },
            error: function() {
                el.prop('checked', !el.prop('checked'));
            }
        });
    });
});
</script>
@endpush
