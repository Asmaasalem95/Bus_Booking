<div class="form-group">
    <label>{{$label ?? 'default' }} {!! isset($required)?'<font color="red">*</font>':''!!}
        <br>
        {!! isset($rules)?'<font color="red">'.$rules.'</font>':''!!}
    </label>
    <input name="{{$name ?? ''}}"  type="{{$type?? 'text'}}"
           class="form-control" placeholder=" {{$placeholder ?? ''}} "
           value="{{$value ?? ''}}"       maxlength="{{$maxlength ?? ''}}"
    {{ isset($required)? 'required' : '' }}
     {{isset($step) ? 'step =' .$step: ''}} >
</div>
