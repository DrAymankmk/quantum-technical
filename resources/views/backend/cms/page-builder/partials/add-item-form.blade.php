<div class="card border-success">
    <div class="card-header bg-success text-white py-2">
        <h6 class="card-title mb-0 text-white">{{ __('Add New Item') }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('cms.items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="cms_section_id" value="{{ $section->id }}">
            <input type="hidden" name="redirect" value="builder">

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Slug') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="slug" required placeholder="item-slug">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Order') }}</label>
                        <input type="number" class="form-control" name="order" value="{{ $section->items->count() }}">
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($languages as $lang)
                <div class="col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('Title') }} ({{ $lang->name }})
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control item-title-input"
                               name="translations[{{ $lang->code }}][title]"
                               data-lang="{{ $lang->code }}"
                               {{ $loop->first ? 'required' : '' }}>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input" name="is_active" value="1" checked>
                <label class="form-check-label">{{ __('Active') }}</label>
            </div>

            <button type="submit" class="btn btn-success btn-sm">
                <i class="mdi mdi-plus"></i> {{ __('Create Item') }}
            </button>
        </form>
    </div>
</div>
