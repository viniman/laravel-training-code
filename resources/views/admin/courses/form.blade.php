<div class="row">
    <div class="form-group col-6">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" required class="form-control" autofocus value="{{ old('name', $course->name )}}">
    </div>
    <div class="form-group col-6">
        <label for="video" class="required">Link do video </label>
        <input type="url" name="video" id="video" autocomplete="off" required class="form-control" value="{{ old('video', $course->video )}}">
    </div>
    <div class="form-group col-6">
        <label for="category_id" class="required" >Categoria</label>
        <select name="category_id" id="category_id" class="form-control select2" value="{{ old('category_id', $course->category_id) }}">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"  class="select2">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-6">  
        <label for="image_link">Imagem </label>
        <input type="file" accept="image/*" class="form-control-file" name="image_link">
    </div>
    <div class="form-group col-sm-12 col-md-12" >
        <label for="description" class="required">Descrição: </label>
        <textarea type="text" name="description" id="description" class="form-control" rows="6" required value="{{ old('description', $course->description) }}">{{ old('description', $course->description) }}</textarea>
    </div>
</div>



@push('scripts')
    <!-- include libraries(jQuery, bootstrap) required from summernote -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $(function(){
            $('.select2').select2();
        })
        $('select[value]').each(function(){
            $(this).val($(this).attr('value'));
        })
        $(document).ready(function() {
                $('textarea').summernote({
                    placeholder: 'Digite a descrição',
                    tabsize: 2,
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });
    </script>
@endpush