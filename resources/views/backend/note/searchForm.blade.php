<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Search for user by ID') }}</div>
                <div class="card-body">
                    <form action="{{ route('notes.search') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('User ID') }}</label>
                            <div class="col-md-6">
                                <input id="id" class="form-control" name="id" type="number" placeholder="User ID" required>
                                @if ($errors->has('id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
