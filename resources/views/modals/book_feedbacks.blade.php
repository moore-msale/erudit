<div class="modal fade" id="book_feedback" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header border-0">
                <h5 class="modal-title text-dark font-weight-bold" id="exampleModalLabel">Оставьте свой отзыв.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div>
                <div class="modal-body">
                    <form class="text-secondary" action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name">Имя <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control input-without-focus rounded-0 border-right-0 border-left-0 border-top-0 border-bottom" id="recipient-name" placeholder="Ваше ФИО" required>
                        </div>
                        <div class="form-group text-center pt-4">
                            <label for="like" class="">Вам понравилась книга?
                                <input class="" type="checkbox" name="like" id="like">
                            </label>
                        </div>
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <div class="form-group">
                            <label for="message-text">Ваша рецензия <span class="text-danger">*</span></label>
                            <textarea class="form-control rounded-0" rows="5" id="message-text" name="comment" required></textarea>
                        </div>
                        <button type="submit" class="text-fut-bold mt-3 pointer bg-primary text-white border-0 py-2 px-4" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 4px 15px;">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

