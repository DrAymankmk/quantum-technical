@php
    $uid = 'section-' . $section->id;
    $translation = $section->translation(app()->getLocale()) ?? $section->translations->first();
@endphp

<div class="accordion-item mb-2" id="section-card-{{ $section->id }}">
    <h2 class="accordion-header" id="heading-{{ $uid }}">
        <button class="accordion-button collapsed" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-{{ $uid }}"
                aria-expanded="false"
                aria-controls="collapse-{{ $uid }}">
            <div class="d-flex flex-wrap align-items-center gap-2 w-100 section-header-meta">
                <strong>{{ $section->name }}</strong>
                <span class="badge bg-secondary">{{ $section->type }}</span>
                <span class="badge bg-info">{{ $section->items->count() }} {{ __('items') }}</span>
                @if($section->is_active)
                    <span class="badge bg-success">{{ __('Active') }}</span>
                @else
                    <span class="badge bg-danger">{{ __('Inactive') }}</span>
                @endif
                @if($translation && $translation->title)
                    <span class="text-muted ms-auto me-3 d-none d-md-inline">{{ Str::limit($translation->title, 60) }}</span>
                @endif
            </div>
        </button>
    </h2>

    <div id="collapse-{{ $uid }}" class="accordion-collapse collapse"
         aria-labelledby="heading-{{ $uid }}" data-bs-parent="#sectionsAccordion">
        <div class="accordion-body">
            <form action="{{ route('cms.sections.update', $section) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="builder-section-form"
                  id="form-{{ $uid }}"
                  novalidate>
                @csrf
                @method('PUT')
                <input type="hidden" name="cms_page_id" value="{{ $page->id }}">

                <div class="d-flex justify-content-end gap-2 mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox"
                               class="form-check-input builder-toggle-status"
                               data-url="{{ route('cms.sections.toggle-status', $section) }}"
                               {{ $section->is_active ? 'checked' : '' }}>
                        <label class="form-check-label">{{ __('Active') }}</label>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-danger delete-section-btn" data-id="{{ $section->id }}">
                        <i class="mdi mdi-delete"></i> {{ __('Delete Section') }}
                    </button>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach($languages as $index => $lang)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                        id="{{ $uid }}-tab-{{ $lang->code }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#{{ $uid }}-content-{{ $lang->code }}"
                                        type="button" role="tab">
                                    {{ $lang->flag ?? '' }} {{ $lang->name }}
                                </button>
                            </li>
                            @endforeach
                        </ul>

                        <div class="tab-content pt-3">
                            @foreach($languages as $index => $lang)
                            @php
                                $sectionTranslation = $section->translations->where('locale', $lang->code)->first();
                            @endphp
                            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                 id="{{ $uid }}-content-{{ $lang->code }}" role="tabpanel">

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Title') }} ({{ $lang->name }})</label>
                                    <input type="text"
                                           class="form-control"
                                           name="translations[{{ $lang->code }}][title]"
                                           value="{{ old('translations.'.$lang->code.'.title', $sectionTranslation->title ?? '') }}"
                                           dir="{{ $lang->direction }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Subtitle') }} ({{ $lang->name }})</label>
                                    <input type="text"
                                           class="form-control"
                                           name="translations[{{ $lang->code }}][subtitle]"
                                           value="{{ old('translations.'.$lang->code.'.subtitle', $sectionTranslation->subtitle ?? '') }}"
                                           dir="{{ $lang->direction }}">
                                </div>

                                @include('backend.components.rich-text-editor', [
                                    'inputId' => $uid . '_description_' . $lang->code,
                                    'inputName' => 'translations[' . $lang->code . '][description]',
                                    'label' => __('Description') . ' (' . $lang->name . ')',
                                    'value' => old('translations.'.$lang->code.'.description', $sectionTranslation->description ?? ''),
                                    'direction' => $lang->direction,
                                    'placeholder' => __('Enter description...')
                                ])

                                <hr class="my-3">
                                <h6 class="mb-3">{{ __('Images') }} ({{ $lang->name }})</h6>

                                @include('backend.components.image-upload', [
                                    'inputId' => $uid . '_image_' . $lang->code,
                                    'inputName' => 'translations[' . $lang->code . '][image]',
                                    'collection' => 'images_' . $lang->code,
                                    'label' => __('Main Image'),
                                    'existingImage' => $section->getFirstMediaUrl('images_' . $lang->code)
                                ])
                            </div>
                            @endforeach
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="card-title mb-0">{{ __('Gallery') }}</h6>
                            </div>
                            <div class="card-body">
                                @include('backend.components.gallery-upload', [
                                    'inputId' => $uid . '_gallery',
                                    'inputName' => 'gallery',
                                    'collection' => 'gallery',
                                    'label' => __('Gallery Images'),
                                    'existingImages' => $section->getMedia('gallery')
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Internal Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ $section->name }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                                    <select class="form-select" name="type" required>
                                        @foreach(['default', 'hero', 'gallery', 'testimonial', 'features', 'cta', 'content', 'about', 'header', 'footer'] as $type)
                                        <option value="{{ $type }}" {{ $section->type === $type ? 'selected' : '' }}>
                                            {{ ucfirst(str_replace('_', ' ', $type)) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Template') }}</label>
                                    <input type="text" class="form-control" name="template" value="{{ $section->template }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Order') }}</label>
                                    <input type="number" class="form-control" name="order" value="{{ $section->order }}">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" name="is_active" id="{{ $uid }}_is_active" value="1"
                                               {{ $section->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $uid }}_is_active">{{ __('Active') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="builder-form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i> {{ __('Save Section') }}
                    </button>
                </div>
            </form>

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0">{{ __('Items') }} ({{ $section->items->count() }})</h6>
                <button class="btn btn-sm btn-outline-success" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#add-item-{{ $uid }}">
                    <i class="mdi mdi-plus"></i> {{ __('Add Item') }}
                </button>
            </div>

            <div class="collapse mb-3" id="add-item-{{ $uid }}">
                @include('backend.cms.page-builder.partials.add-item-form', ['section' => $section])
            </div>

            <div class="accordion" id="itemsAccordion-{{ $section->id }}">
                @foreach($section->items as $item)
                    @include('backend.cms.page-builder.partials.item-card', ['item' => $item, 'section' => $section])
                @endforeach
            </div>
        </div>
    </div>
</div>
