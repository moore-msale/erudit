<div class="form-group">
    <label for="books">Книги</label>
    <select class="form-control m-0 w-100" name="items[]" id="books" multiple="">
        @foreach($books as $book)
            <option value="{{ $book->id }}" {{ isset($stock) && $stock->type == 1 ? $stock->data->where('id', $book->id)->isNotEmpty() ? 'selected' : '' : ''}}>{{ $book->name }}</option>
        @endforeach
    </select>
</div>

@push('scripts')
    <script>
        $('#books').select2({
            width: 'resolve'
        });
    </script>
@endpush

