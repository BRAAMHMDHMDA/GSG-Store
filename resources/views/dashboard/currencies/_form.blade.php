<div class="row">
    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="name">Name</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' , $currency->name) }}" placeholder="Name" required />
                @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="code">Code</label>
            </div>
            <div class="col-sm-9">
                <input type="text" id="code" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code' , $currency->code) }}" placeholder="Code" required />
                @error('code')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="decimal_numbers">Decimal Numbers</label>
            </div>
            <div class="col-sm-9">
                <input type="number" id="decimal_numbers" class="form-control @error('decimal_numbers') is-invalid @enderror" name="decimal_numbers" value="{{ old('decimal_numbers' , $currency->decimal_numbers) }}" placeholder="Decimal Numbers" required />
                @error('decimal_numbers')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-3 col-form-label">
                <label for="contact-info">Primary</label>
            </div>
            <div class="col-sm-9">
                <div class="custom-control custom-switch custom-switch-success">
                    <input type="checkbox" class="custom-control-input @error('is_primary') is-invalid @enderror" name="is_primary" value="1" @if(old('is_primary',$currency->is_primary) == "active") checked @endif id="customSwitch111"/>
                    <label class="custom-control-label" for="customSwitch111">
                        <span class="switch-icon-left"><i data-feather="check"></i></span>
                        <span class="switch-icon-right"><i data-feather="x"></i></span>
                    </label>
                    @error('is_primary')
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
