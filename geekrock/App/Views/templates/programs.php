<div class="container_12">

	<p>&nbsp;</p>

	<div class="grid_12">
		<h2><span>Rockende</span> Zaterdag</h2>
	</div>
	
</div>
<section>
	<div class="container_12">

		<p>&nbsp;</p>

		<div class="grid_12">
			<?php foreach($events as $event): if($event->ticket_id == 1): ?>
				<article class="item" id="event_{{ $event->id }}">
					<div class="date_dot bluedot">
						<span class="hour">{{ date('H:i', strtotime($event->time)) }}</span>
						<span class="month">uur</span>
					</div>
					
					<div class="prog_item">
						<h3>{{ $event->title }}</h3>
						<p>{{ $event->description }}</p>
					</div>
				</article>
			<?php endif; endforeach; ?>
			
		</div>
		
	</div>

	<div class="container_12">

		<p>&nbsp;</p>

		<div class="grid_12">
			<h2><span>Chille</span> Zondag</h2>
		</div>
		
	</div>

	<div class="container_12">

		<div class="grid_12">

			<?php foreach($events as $event): if($event->ticket_id == 2): ?>
				<article class="item" id="event_{{ $event->id }}">
					<div class="date_dot bluedot">
						<span class="hour">{{ date('H:i', strtotime($event->time)) }}</span>
						<span class="month">uur</span>
					</div>
					
					<div class="prog_item">
						<h3>{{ $event->title }}</h3>
						<?php if(!empty($event->artist)):?><p class="program_artist"><strong>Artiest:</strong> {{ $event->artist }}</p><br /><?php endif;?>
						<p>{{ $event->description }}</p>
					</div>
				</article>
			<?php endif; endforeach; ?>
			
		</div>

	</div>

	<div class="container_12">

		<p>&nbsp;</p>

		<div class="grid_12">
			<h2><span>After</span> Party</h2>
		</div>
		
	</div>

	<div class="container_12">

		<p>&nbsp;</p>

		<div class="grid_12">
			
			<?php foreach($events as $event): if($event->ticket_id == 3): ?>
				<article class="item" id="event_{{ $event->id }}">
					<div class="date_dot bluedot">
						<span class="hour">{{ date('H:i', strtotime($event->time)) }}</span>
						<span class="month">uur</span>
					</div>
					
					<div class="prog_item">
						<h3>{{ $event->title }}</h3>
						<p>{{ $event->description }}</p>
					</div>
				</article>
			<?php endif; endforeach; ?>
			
		</div>

	</div>
</section>