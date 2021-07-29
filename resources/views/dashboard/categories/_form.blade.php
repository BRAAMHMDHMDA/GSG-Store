<div class="row">
    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="name">Name</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $category->name) }}" placeholder="Name" required />
                @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="parent">Parent</label>
            </div>
            <div class="col-sm-9">
                <select class="select2 form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                    <option value="" selected>No Parent</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" @if(old('parent_id',$category->parent_id)==$parent->id) selected @endif>{{ $parent->name }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="contact-info">Image</label>
            </div>
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" id="customFile1"/>
                    <label class="custom-file-label" for="customFile1">Choose Category pic</label>
                    @error('image')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="contact-info">Status</label>
            </div>
            <div class="col-sm-9">
                <div class="custom-control custom-switch custom-switch-success">
                    <input type="checkbox" class="custom-control-input @error('status') is-invalid @enderror" name="status" value="active" @if(old('status',$category->status) == "active") checked @endif id="customSwitch111"/>
                    <label class="custom-control-label" for="customSwitch111">
                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                    </label>
                    @error('status')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-9 offset-sm-3">
        <button type="submit" class="btn btn-primary mr-1"><i data-feather='save'></i> {{$button}}</button>
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
    </div>
</div>
