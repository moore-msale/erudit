<div class="position-relative">
    <input type="text" class="border-right-0 border-left-0 border-top-0 rounded-0 border-bottom bg-transparent form-control" style="width: 350px;" id="search-input-select2" placeholder="Поиск">
    <i class="fas fa-search fa-flip-horizontal position-absolute" style="right: 5px; top: 15px;"></i>
    <div id="" class="bg-white shadow position-absolute" style="left: 0; top: 160%;">
        <span class="position-absolute text-white" style="z-index: -1; text-shadow: rgba(68, 67, 67, 0.85) 0px 2px 2px; left: 10%; top: -13px; transform: scale(2.5);">&#9650;</span>
        <div id="search-result-select2" class="position-relative" style="z-index: 4;"></div>
    </div>
</div>

@push('scripts')
    <script>
        let result = $('#search-result-select2');

        result.parent().hide(0);
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
                        result = result.html(data.html);
                        result.parent().slideDown(400);
                        result.find('.collapse').each((e, i) => {
                            registerCollapse($(i));
                        });
                        // registerCollapse(result);
                    },
                    error: () => {
                        console.log('error');
                    }
                });
            } else {
                result.parent().slideUp(400);
                result.empty();
            }
        });

        function registerCollapse(i)
        {
            i.on('show.bs.collapse', e => {
                let btn = $(e.currentTarget);
                let icons = $(btn.siblings('.collapses').find('span')[1]).find('i');
                let firstIcon = $(icons[0]);
                let secondIcon = $(icons[1]);
                firstIcon.addClass('d-none');
                secondIcon.removeClass('d-none');
                console.log(icons);
            });
            i.on('hide.bs.collapse', e => {
                let btn = $(e.currentTarget);
                let icons = $(btn.siblings('.collapses').find('span')[1]).find('i');
                let firstIcon = $(icons[0]);
                let secondIcon = $(icons[1]);
                secondIcon.addClass('d-none');
                firstIcon.removeClass('d-none');
                console.log(icons);
            });
        }

        // $('.collapse.collapse-multi').on('show.bs.collapse', e => {
        //     console.log(e);
        // });

        $(document).click(function(event) {
            if (!$(event.target).is("#search-input-select2, #search-result-select2, #search-result-ajax, .collapses, .collapse, .products, .collapses > span, .collapses > span > i")) {
                $("#search-result-select2").parent().slideUp(400);
            }
        });
    </script>
@endpush
