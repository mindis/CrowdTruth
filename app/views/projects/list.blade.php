@extends('layouts.default_new')
@section('title','Userlist')
@section('content')

<div class="col-xs-12 col-md-10 col-md-offset-1">
	<div class='maincolumn CW_box_style'>

		<div class='tab'>
			<div class='title'>
				<h2>Projects</h2>
			</div>
			@include('layouts.flashdata')
			<div class='row'>
				<div class="col-xs-12"  style="padding-bottom:40px; padding-top:20px">
					<table class="table table-striped" style='width:100%'>
						<tr>
							<th>Project</th>
							<th>Members</th>
						</tr>
						
						@foreach($groupInfo as $grInfo)
						<tr class='text-left' >
							<td>
							@if($grInfo['canview'])
								{{ link_to('group/'.$grInfo['name'], $grInfo['name']) }}
							@else
								{{ $grInfo['name'] }}
							@endif
							</td>
						</tr>
						@endforeach
						
						@if($isAdmin)
						<tr class='text-left' >
							<td>
								{{ Form::open([ 'action' => 'ProjectController@createGroup', 'class' => 'form-horizontal jobconf' ] ) }}
								<div class="form-group">
									{{ Form::label('addGrp', 'Add group', [ 'class' => 'col-xs-3 control-label' ]) }}
									<div class='col-xs-3'>
										{{ Form::text('addGrp', '', [ 'class' => 'form-control', 'placeholder' => 'Username' ] ) }}
									</div>
									<div class='col-xs-3'>
										{{ Form::submit('Create', [ 'class' => 'btn btn-primary pull-right' ]); }}
									</div>
								</div>
								{{ Form::close() }}
							</td>
						</tr>
						@endif
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop