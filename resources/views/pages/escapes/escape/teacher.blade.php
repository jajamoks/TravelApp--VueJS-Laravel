<div class="space-bottom">
		<div class="escape-teacher">
			@if(!empty($teacher->media()->first()))
			<div class="escape-teacher-image" style="background-image:url({{$teacher->media()->first()->fullSize}})"></div>
			@endif
			<div>
				<h4>{{$teacher->name}}</h4>
				<p class="teacher-credential">{{$teacher->credentials}}</p>
			</div>
		</div>
		<div>
			<p>{!! $teacher->bio !!}</p>
		</div>
</div>
