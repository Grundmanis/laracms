<form>
    <div class="form-group row">
        <div class="col-md-6">
            <input class="form-control" placeholder="Search.." type="text" name="q" value="{{ request()->get('q') }}">
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>