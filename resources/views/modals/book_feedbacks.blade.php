<div class="modal fade" id="book_feedback" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary" id="exampleModalLabel">Оставьте свой отзыв.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div>
                <div class="modal-body">
                    <form class="text-secondary" action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="recipient-name" class="col-form-label">Введите ваше ФИО:</label>
                                    <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Ваше ФИО" required>
                                </div>
                                <div class="form-group col-6 text-center pt-4">
                                    <label for="like" class="col-form-label">Вам понравилась книга?</label>
                                    <input class="w-50 h-25" type="checkbox" name="like" id="like">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <div class="form-group">
                            <p class="mt-3">
                                Ваша рецензия :
                            </p>
                            <textarea class="form-control h6" id="message-text" name="comment" required></textarea>
                        </div>
                        <button class="submit btn-primary ">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

