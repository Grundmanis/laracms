<form>
    <div class="row">
        <div class="col-md-12">
            <div class="form-inline">
                <div class="form-group">
                    <input class="form-control" placeholder="{{ __('laracms::admin.search') }}.." type="text" name="q" value="{{ request()->get('q') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('laracms::admin.search') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>