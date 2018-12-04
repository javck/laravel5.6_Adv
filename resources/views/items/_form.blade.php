<div class="row">
    <div class="col-lg-6"> 
    	<div class="col-lg-12">

			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error }}</li>
						@endforeach

					</ul>
				</div>
			@endif

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
			
			<!-- 分類 cgy_id -->
			<div class="form-group">
				{{ Form::label('cgy_id[]','分類',['class'=>'text-warning']) }}<br>
				{!! Form::select('cgy_id[]', $cgys , null , ['id'=>'cgy_id' , 'class'=> 'form-control', 'multiple']) !!}
				<p class="help-block">請選擇商品分類</p>
			</div>
            
            <!-- price 價格-->
    		@if (isset($errors) and $errors->has('price'))
		    	<div class="form-group has-error">
		    		{{ Form::label('price','價格') }}&nbsp;&nbsp;{{ Form::label('price',$errors->first('url'),['class'=>'text-danger control-label','for'=>'inputError']) }}
					{{ Form::number('price',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入價格</p>
				</div>
	    	@else
	    		<div class="form-group">
		    		{{ Form::label('price','價格',['class'=>'text-warning']) }}
					{{ Form::number('price',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入價格</p>
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

			<!-- picUpload 圖片上傳 -->
			@if (isset($errors) and $errors->has('picUpload'))
		    	<div class="form-group has-error">
					{{ Form::label('picUpload','圖片上傳') }}&nbsp;&nbsp;{{ Form::label('picUpload',$errors->first('picUpload'),['class'=>'text-danger control-label','for'=>'inputError']) }}<br>
					{{ Form::file('picUpload[]',['multiple'=>true]) }}
				</div>
	    	@else
	    		<div class="form-group">
					{{ Form::label('picUpload','圖片上傳') }}<br>
					{{ Form::file('picUpload[]',['multiple'=>true]) }}
				</div>
			@endif

			<!-- attachment 附件上傳 -->
			@if (isset($errors) and $errors->has('attachmentUpload'))
		    	<div class="form-group has-error">
					{{ Form::label('attachmentUpload','附件上傳') }}&nbsp;&nbsp;{{ Form::label('attachmentUpload',$errors->first('attachmentUpload'),['class'=>'text-danger control-label','for'=>'inputError']) }}<br>
					{{ Form::file('attachmentUpload[]',['multiple'=>true]) }}
				</div>
	    	@else
	    		<div class="form-group">
					{{ Form::label('attachmentUpload','附件上傳') }}<br>
					{{ Form::file('attachmentUpload[]',['multiple'=>true]) }}
				</div>
			@endif
			
			<!-- 描述 desc-->
    		@if (isset($errors) and $errors->has('desc'))
		    	<div class="form-group has-error">
		    		{{ Form::label('desc','描述') }}&nbsp;&nbsp;{{ Form::label('desc',$errors->first('desc'),['class'=>'text-danger control-label','for'=>'inputError']) }}
					{{ Form::text('desc',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入描述</p>
				</div>
	    	@else
	    		<div class="form-group">
		    		{{ Form::label('desc','描述',['class'=>'text-warning']) }}
					{{ Form::text('desc',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入描述</p>
				</div>
			@endif
			
			<!-- publish_at 上架日期-->
    		@if (isset($errors) and $errors->has('publish_at'))
		    	<div class="form-group has-error">
		    		{{ Form::label('publish_at','上架日期') }}&nbsp;&nbsp;{{ Form::label('publish_at',$errors->first('publish_at'),['class'=>'text-danger control-label','for'=>'inputError']) }}
					{{ Form::date('publish_at',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入上架日期</p>
				</div>
	    	@else
	    		<div class="form-group">
		    		{{ Form::label('publish_at','上架日期',['class'=>'text-warning']) }}
					{{ Form::date('publish_at',null,['class'=>'form-control','rows'=>'3']) }}
					<p class="help-block">请输入上架日期</p>
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
	 $('#cgy_id').select2({
		placeholder: "請選擇分類",
		allowClear: true,            
		width: 'resolve',                        
	});
</script>
@stop