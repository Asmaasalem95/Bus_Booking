<div class="form-group">
    <label>{{$label ?? 'label'}} {!! isset($required)?'<font color="red">*</font>':''!!} </label>
    <textarea
             {{ isset($required)? 'required' : '' }}   name="{{$name ?? ''}}" class="{{$class ?? ''}} form-control"   id ={{$id ?? ''}}>{!! $value ?? '' !!} </textarea>
</div>
