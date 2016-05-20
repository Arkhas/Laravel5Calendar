<div class="calendar">
	<table>
		<header>
			<a class="btn-prev fontawesome-angle-left calendarButton" href="{{ $data['url'] }}{{ $calendar['previous_month_url'] }}"></a>
			<a href="{{ $data['url'] }}{{ $calendar['current_month_url'] }}" title=""><h2>{{ $calendar['current_month']->format('M Y') }}</h2></a>
			<a class="btn-next fontawesome-angle-right calendarButton" href="{{ $data['url'] }}{{ $calendar['next_month_url'] }}"></a>
		</header>
		<tr>
		@foreach ($calendar['weeks'][0] as $day)
			<td>{{ $day['day']->format('D') }}</td>
		@endforeach
		
		</tr>
		@foreach ($calendar['weeks'] as $week)
			<tr>
				@foreach ($week as $day)
					<td>
						<a href="{{ $data['url'] }}{{ $day['day']->year }}/{{ $day['day']->month }}/{{ $day['day']->day }}" class="{{ $day['class'] }}">{{ $day['day']->day }}
						</a>
					</td>
				@endforeach
			</tr>
		@endforeach
	</table>
</div>