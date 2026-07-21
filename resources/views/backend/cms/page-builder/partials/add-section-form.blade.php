<div class="card border-primary">
    <div class="card-header bg-primary text-white">
        <h6 class="card-title mb-0 text-white">{{ __('Add New Section') }}</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('cms.sections.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="cms_page_id" value="{{ $page->id }}">
            <input type="hidden" name="redirect" value="builder">

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Internal Name') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required placeholder="{{ __('Hero') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                        <select class="form-select" name="type" required>
                            @foreach(['default', 'hero', 'gallery', 'testimonial', 'features', 'cta', 'content', 'about'] as $type)
                            <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Order') }}</label>
                        <input type="number" class="form-control" name="order" value="{{ $page->sections->count() }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Title') }} ({{ $languages->first()->name ?? 'EN' }})</label>
                        <input type="text" class="form-control" name="translations[{{ $languages->first()->code ?? 'en' }}][title]">
                    </div>
                </div>
            </div>

            @foreach($languages as $lang)
                @if(!$loop->first)
                <input type="hidden" name="translations[{{ $lang->code }}][title]" value="">
                @endif
            @endforeach

            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input" name="is_active" value="1" checked>
                <label class="form-check-label">{{ __('Active') }}</label>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-plus"></i> {{ __('Create Section') }}
            </button>
        </form>
    </div>
</div>
