<div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h2>Your Answer</h2>
                            </div>

                            <div class="media">
                                <div class="media-body">
                                    <form method="POST" action="{{ route('answers.store',['question_id'=>$question->id]) }}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Explain your Answer</label>
                                            <textarea name="body" class="form-control" required style="height: 275px;"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value="Post Your Answer" >
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

