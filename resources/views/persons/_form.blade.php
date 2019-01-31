<form method="POST" action="{{$url}}">
    @csrf
    @if(!empty($person))
        @method("patch")
    @endif

    <div class="form-group row">

        <label for="first_name" class="col-sm-3 col-form-label">First Name <span class="required">*</span></label>
        <div class="col-md-6">
            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" @if(isset($person)) value="{{$person->first_name}}" @endif required>
            @if ($errors->has('first_name'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('first_name') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="surname" class="col-sm-3 col-form-label">Surname <span class="required">*</span></label>
        <div class="col-md-6">
            <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" @if(isset($person)) value="{{$person->surname}}" @endif required>
            @if ($errors->has('surname'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('surname') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="date_of_birth" class="col-sm-3 col-form-label">Date of Birth <span class="required">*</span></label>
        <div class="col-md-6">
            <input id="date_of_birth" type="text" class="form-control{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" name="date_of_birth" @if(isset($person)) value="{{$person->date_of_birth->format('Y-m-d')}}" @endif required pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
            @if ($errors->has('date_of_birth'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('date_of_birth') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="date_of_birth" class="col-sm-3 col-form-label">Personal Attributes</label>
        <div class="col-md-6">
            <table id="attributes-table">
                <tbody>
                @if(!empty($person))
                    @foreach($person->personal_attributes as $attribute)
                        <tr>
                            <td> <input type="text" class="form-control" required name="saved_attribute_name[{{$attribute->id}}]" value="{{$attribute->attribute_name}}"> </td>
                            <td> <input type="text" class="form-control" required name="saved_attribute_value[{{$attribute->id}}]" value="{{$attribute->attribute_value}}"> </td>
                            <td> <button class="btn btn-sm btn-danger btn-remove-saved-attribute" id="{{$attribute->id}}">Remove</button></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="text-right">
                <button class="btn btn-sm btn-outline-info" id="new-attribute-btn">Add Attribute</button>
            </div>
            <span class="text-muted help-block">Personal Attributes suh as height, weight etc.</span>

        </div>
    </div>




    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-success">
                Save Person
            </button>
        </div>
    </div>
</form>
