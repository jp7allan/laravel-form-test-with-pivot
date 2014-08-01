@extends('layouts.scaffold')

@section('main')

<h1>All Details</h1>

<p>{{ link_to_route('details.create', 'Add New Detail', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($details->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($details as $detail)
				<tr>
					<td>{{{ $detail->name }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('details.destroy', $detail->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('details.edit', 'Edit', array($detail->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no details
@endif

@stop
