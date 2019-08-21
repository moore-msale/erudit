<div class="position-relative">
    <input type="text" class="border-bottom form-control" id="search-input-select2" style="border-radius: 25px;" placeholder="Поиск">
    <div id="search-result-select2" class="bg-white position-absolute" style="max-height: 300px;overflow-y: scroll; width: 350px; overflow-x: hidden; left: -50%;"></div>
</div>

@push('scripts')
    <script>
        let result = $('#search-result-select2');
        $('#search-input-select2').on('keyup click', function () {
            let value = $(this).val();
            console.log(value);
            if (value != '' && value.length >= 3) {
                // let searchBtn = $('#search-btn');
                // searchBtn.prop('href', '');
                // searchBtn.prop('href', '/search?search=' + value);
                $.ajax({
                    url: '{!! route('search') !!}',
                    data: {'search': value},
                    success: (data) => {
                        console.log(data);
                        result.removeClass('d-none');
                        result.html(data);
                    },
                    error: () => {
                        console.log('error');
                    }
                });
            } else {
                result.empty();
                result.addClass('d-none');
            }
        });

        $(document).click(function(event) {
            if (!$(event.target).is("#search-result-select2, #search-result-ajax, .collapses, .collapse, .products")) {
                $("#search-result-select2").addClass('d-none');
            }
        });
    </script>
@endpush