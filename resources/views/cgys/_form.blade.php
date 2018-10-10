<div class="row">
    <div class="col-lg-6"> 
    	<div class="col-lg-12">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		<!-- 名稱 name-->
    		@if (isset($errors) and $errors->has('name'))
		    	<div class="form-group has-error">
		    		{{ Form::label('name','名稱') }}&nbsp;&nbsp;{{ Form::label('name',$errors->first('name'),['class'=>'text-danger control-label','for'=>'inputError']) }}
					{{ Form::text('name',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入名稱</p>
				</div>
	    	@else
	    		<div class="form-group">
		    		{{ Form::label('name','名稱',['class'=>'text-warning']) }}
					{{ Form::text('name',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入名稱</p>
				</div>
            @endif
            
            <!-- url 網址-->
    		@if (isset($errors) and $errors->has('url'))
		    	<div class="form-group has-error">
		    		{{ Form::label('url','網址') }}&nbsp;&nbsp;{{ Form::label('url',$errors->first('url'),['class'=>'text-danger control-label','for'=>'inputError']) }}
					{{ Form::text('url',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入網址</p>
				</div>
	    	@else
	    		<div class="form-group">
		    		{{ Form::label('url','網址',['class'=>'text-warning']) }}
					{{ Form::text('url',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入網址</p>
				</div>
			@endif
			
			<!-- pic 圖片-->
    		@if (isset($errors) and $errors->has('pic'))
		    	<div class="form-group has-error">
		    		{{ Form::label('pic','圖片網址') }}&nbsp;&nbsp;{{ Form::label('pic',$errors->first('pic'),['class'=>'text-danger control-label','for'=>'inputError']) }}
					{{ Form::text('pic',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入圖片網址</p>
				</div>
	    	@else
	    		<div class="form-group">
		    		{{ Form::label('pic','圖片網址',['class'=>'text-warning']) }}
					{{ Form::text('pic',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入圖片網址</p>
				</div>
	    	@endif

     		<div class="form-group">
				{{ Form::label('enabled','是否啟用') }}
				{{ Form::label('enabled','是',['class'=>'radio-inline']) }}
				{{ Form::radio('enabled', 1,true) }}
				{{ Form::label('enabled','否',['class'=>'radio-inline']) }}
				{{ Form::radio('enabled', 0) }}
			</div>

     	</div>

		<div class="col-lg-12">

			<div class="form-group">
				{{ Form::submit($submitBtnText,['class'=>'btn btn-primary form-control']) }}
				{{ Form::reset('清除',['class'=>'btn btn-default form-control']) }}
			</div>
	   
    	</div>		

    </div>

    <div class="col-lg-6">
    	<div class="col-lg-12"> 
    		
    	</div>
    </div>
     

    
</div>

@section('js')
<script>
	 
</script>
@stop