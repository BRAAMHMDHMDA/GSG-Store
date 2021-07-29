<div class="row">
    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="name">Name</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $tag->name) }}" placeholder="Name" required />
                @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-sm-9 offset-sm-3">
        <button type="submit" class="btn btn-primary mr-1"><i data-feather='save'></i> {{$button}}</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</div>
