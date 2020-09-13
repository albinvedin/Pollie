<form method="POST" action="{{ route('polls.store') }}">
    @csrf
    <div class="form-group">
        <label>
            Question
        </label>
        <input type="text" name="question" class="form-control"/>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>
                    Multiple Choice
                </label>
                <div>
                    <label>
                        <input name="multiple_choice" type="checkbox" data-toggle="switch" value="1" checked="" data-on-color="primary" data-off-color="primary">
                        <span class="toggle"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>
                    Private
                </label>
                <div>
                    <label>
                        <input name="private" type="checkbox" data-toggle="switch" value="1" data-on-color="primary" data-off-color="primary">
                        <span class="toggle"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="expander-root">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="expander-toggle form-check-input" type="checkbox" value="false">
                        Start Date
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>

                <div class="expander-container card d-none">
                    <div class="card-body">
                        <input name="starts_at" type="text" class="form-control datetimepicker" value="{{ now() }}" placeholder="{{ now() }}"  disabled="true"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="expander-root">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="expander-toggle form-check-input" type="checkbox" value="false">
                        End Date
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>

                <div class="expander-container card d-none">
                    <div class="card-body">
                        <input name="ends_at" type="text" class="form-control datetimepicker" value="{{ now() }}" placeholder="{{ now() }}" disabled="true"/>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="options">
        <div class="form-group">
            <label>
                Option #1
            </label>
            <input name="options[]" class="form-control" placeholder="Option..."/>
        </div>

        <div class="form-group">
            <label>
                Option #2
            </label>
            <input name="options[]" class="form-control" placeholder="Option..."/>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-primary">
            Create
        </button>
    </div>
</form>
