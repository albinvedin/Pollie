@if(count($errors) > 0)
    <div class="col-md-6 mx-auto mt-2">
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Oh snap!</strong> {{ count($errors) === 1 ? 'Looks like we have an error.' : 'Looks like we have some errors.' }}
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
