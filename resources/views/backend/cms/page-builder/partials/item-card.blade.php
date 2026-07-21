@php
    $uid = 'item-' . $item->id;
    $itemTranslation = $item->translation(app()->getLocale()) ?? $item->translations->first();
@endphp

<div class="accordion-item item-card mb-2" id="item-card-{{ $item->id }}">
    <h2 class="accordion-header" id="heading-{{ $uid }}">
        <button class="accordion-button collapsed py-2" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse-{{ $uid }}"
                aria-expanded="false">
            <div class="d-flex flex-wrap align-items-center gap-2 w-100">
                <i class="mdi mdi-format-list-bulleted text-primary"></i>
                <strong>{{ $itemTranslation->title ?? $item->slug }}</strong>
                <code class="small">{{ $item->slug }}</code>
                @if($item->is_active)
                    <span class="badge bg-success">{{ __('Active') }}</span>
                @else
                    <span class="badge bg-secondary">{{ __('Inactive') }}</span>
                @endif
            </div>
        </button>
    </h2>

    <div id="collapse-{{ $uid }}" class="accordion-collapse collapse"
         data-bs-parent="#itemsAccordion-{{ $section->id }}">
        <div class="accordion-body">
            <form action="{{ route('cms.items.update', $item) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="builder-item-form"
                  id="form-{{ $uid }}"
                  novalidate>
                @csrf
                @method('PUT')
                <input type="hidden" name="cms_section_id" value="{{ $section->id }}">

                <div class="d-flex justify-content-end gap-2 mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox"
                               class="form-check-input builder-toggle-status"
                               data-url="{{ route('cms.items.toggle-status', $item) }}"
                               {{ $item->is_active ? 'checked' : '' }}>
                        <label class="form-check-label">{{ __('Active') }}</label>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-danger delete-item-btn" data-id="{{ $item->id }}">
                        <i class="mdi mdi-delete"></i> {{ __('Delete Item') }}
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
                                $translation = $item->translations->where('locale', $lang->code)->first();
                            @endphp
                            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                 id="{{ $uid }}-content-{{ $lang->code }}" role="tabpanel">

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Title') }} ({{ $lang->name }}) <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control"
                                           name="translations[{{ $lang->code }}][title]"
                                           value="{{ $translation->title ?? '' }}"
                                           dir="{{ $lang->direction }}"
                                           data-required-title="1">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Subtitle') }} ({{ $lang->name }})</label>
                                    <input type="text"
                                           class="form-control"
                                           name="translations[{{ $lang->code }}][sub_title]"
                                           value="{{ $translation->sub_title ?? '' }}"
                                           dir="{{ $lang->direction }}">
                                </div>

                                @include('backend.components.rich-text-editor', [
                                    'inputId' => $uid . '_content_' . $lang->code,
                                    'inputName' => 'translations[' . $lang->code . '][content]',
                                    'label' => __('Content') . ' (' . $lang->name . ')',
                                    'value' => $translation->content ?? '',
                                    'direction' => $lang->direction,
                                    'placeholder' => __('Enter content...')
                                ])

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Icon') }} ({{ $lang->name }})</label>
                                    @include('backend.components.icon-picker', [
                                        'inputId' => $uid . '_icon_' . $lang->code,
                                        'inputName' => 'translations[' . $lang->code . '][icon]',
                                        'value' => $translation->icon ?? ''
                                    ])
                                </div>

                                <hr class="my-3">
                                <h6 class="mb-3">{{ __('Images') }} ({{ $lang->name }})</h6>

                                @include('backend.components.image-upload', [
                                    'inputId' => $uid . '_image_' . $lang->code,
                                    'inputName' => 'translations[' . $lang->code . '][image]',
                                    'collection' => 'images_' . $lang->code,
                                    'label' => __('Main Image'),
                                    'existingImage' => $item->getFirstMediaUrl('images_' . $lang->code)
                                ])

                                @include('backend.components.image-upload', [
                                    'inputId' => $uid . '_icon_image_' . $lang->code,
                                    'inputName' => 'translations[' . $lang->code . '][icon_image]',
                                    'collection' => 'icons_' . $lang->code,
                                    'label' => __('Icon Image'),
                                    'existingImage' => $item->getFirstMediaUrl('icons_' . $lang->code)
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
                                    'existingImages' => $item->getMedia('gallery')
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" value="{{ $item->slug }}" data-required-slug="1">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Order') }}</label>
                                    <input type="number" class="form-control" name="order" value="{{ $item->order }}">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" name="is_active" id="{{ $uid }}_is_active" value="1"
                                               {{ $item->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $uid }}_is_active">{{ __('Active') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="builder-form-actions">
                    <button type="submit" class="btn btn-success">
                        <i class="mdi mdi-content-save"></i> {{ __('Save Item') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
