<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">{{ __('Page Settings') }}</h5>
        <span class="badge bg-secondary">{{ $page->slug }}</span>
    </div>
    <div class="card-body">
        <form action="{{ route('cms.pages.builder.update', $page) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-8">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($languages as $index => $lang)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                    id="page-tab-{{ $lang->code }}"
                                    data-bs-toggle="tab"
                                    data-bs-target="#page-content-{{ $lang->code }}"
                                    type="button" role="tab">
                                {{ $lang->flag ?? '' }} {{ $lang->name }}
                            </button>
                        </li>
                        @endforeach
                    </ul>

                    <div class="tab-content pt-3">
                        @foreach($languages as $index => $lang)
                        @php
                            $translation = $page->translations->where('locale', $lang->code)->first();
                        @endphp
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                             id="page-content-{{ $lang->code }}" role="tabpanel">

                            <div class="mb-3">
                                <label class="form-label">{{ __('Title') }} ({{ $lang->name }}) <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control"
                                       name="translations[{{ $lang->code }}][title]"
                                       value="{{ old('translations.'.$lang->code.'.title', $translation->title ?? '') }}"
                                       dir="{{ $lang->direction }}"
                                       data-required-title="1">
                            </div>

                            @include('backend.components.rich-text-editor', [
                                'inputId' => 'page_meta_description_' . $lang->code,
                                'inputName' => 'translations[' . $lang->code . '][meta_description]',
                                'label' => __('Meta Description') . ' (' . $lang->name . ')',
                                'value' => old('translations.'.$lang->code.'.meta_description', $translation->meta_description ?? ''),
                                'direction' => $lang->direction,
                                'placeholder' => __('Enter meta description...')
                            ])

                            <div class="mb-3">
                                <label class="form-label">{{ __('Meta Keywords') }} ({{ $lang->name }})</label>
                                <input type="text"
                                       class="form-control"
                                       name="translations[{{ $lang->code }}][meta_keywords]"
                                       value="{{ old('translations.'.$lang->code.'.meta_keywords', $translation->meta_keywords ?? '') }}"
                                       dir="{{ $lang->direction }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Internal Name') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $page->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Slug') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="slug" value="{{ old('slug', $page->slug) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Order') }}</label>
                        <input type="number" class="form-control" name="order" value="{{ old('order', $page->order) }}">
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" name="is_active" id="page_is_active" value="1"
                                   {{ old('is_active', $page->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="page_is_active">{{ __('Active') }}</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="mdi mdi-content-save"></i> {{ __('Save Page Settings') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
