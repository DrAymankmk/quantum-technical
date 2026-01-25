<div class="mb-3">
    <label class="form-label">{{ $label ?? __('Content') }}</label>
    <div id="editor-{{ $inputId }}" style="min-height: 200px;"></div>
    <textarea name="{{ $inputName }}" id="{{ $inputId }}" style="display: none;">{{ $value ?? '' }}</textarea>
</div>

@once
@push('styles')
<link href="{{ asset('backend/assets/css/vendor/quill.snow.css') }}" rel="stylesheet" type="text/css">
@endpush
@endonce

@push('scripts')
@once
<script src="{{ asset('backend/assets/js/vendor/quill.min.js') }}"></script>
@endonce
<script>
    (function() {
        var editorId = 'editor-{{ $inputId }}';
        var textareaId = '{{ $inputId }}';
        
        function initEditor() {
            var editorElement = document.getElementById(editorId);
            var textarea = document.getElementById(textareaId);
            
            if (!editorElement || !textarea) {
                return;
            }
            
            // Check if Quill is loaded
            if (typeof Quill === 'undefined') {
                setTimeout(initEditor, 100);
                return;
            }
            
            // Initialize Quill editor
            var quill = new Quill('#' + editorId, {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        [{ 'font': [] }],
                        [{ 'size': [] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        [{ 'direction': 'rtl' }, { 'align': [] }],
                        ['link', 'image', 'video'],
                        ['blockquote', 'code-block'],
                        ['clean']
                    ]
                },
                placeholder: '{{ $placeholder ?? "Enter content..." }}',
                @if(isset($direction) && $direction === 'rtl')
                direction: 'rtl'
                @endif
            });

            // Set initial content
            if (textarea.value) {
                quill.root.innerHTML = textarea.value;
            }

            // Update textarea on text change
            quill.on('text-change', function() {
                textarea.value = quill.root.innerHTML;
            });

            // Also update on form submit
            var form = textarea.closest('form');
            if (form) {
                form.addEventListener('submit', function() {
                    textarea.value = quill.root.innerHTML;
                });
            }
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initEditor);
        } else {
            initEditor();
        }
    })();
</script>
@endpush
