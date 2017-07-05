<div class="container_12">

	<!-- news -->
	<section class="grid_4">
		<h2><span>Laatste</span> Nieuws</h2>
		<?php foreach($blogs as $blog): ?>
			<article class="item">
				<div class="date_dot graydot">
					<span class="day">{{ strtolower(date('d', strtotime($blog->created_at))) }}</span>
					<span class="month">{{ strtolower(date('M', strtotime($blog->created_at))) }}</span>
				</div>
				
				<div class="news_item">
					{!!  $blog->body !!}
				</div>
			</article>
		<?php endforeach; ?>
	</section>
	
	<!-- dates -->
	<section class="grid_4">
		<h2><span>Belangrijke</span> data</h2>
		
		<article class="item">
			<div class="date_dot bluedot">
				<span class="day">1</span>
				<span class="month">mei</span>
			</div>
			
			<div class="news_item">
				Op 1 mei begint de kaartverkoop voor GeekRock 2015! Bij <a href="http://www.ticketmaster.nl/" target="_blank">Ticketmaster</a> en alle bekende voorverkoopadressen.
			</div>
		</article>
		
		<article class="item">
			<div class="date_dot bluedot">
				<span class="day">22</span>
				<span class="month">aug</span>
			</div>
			
			<div class="news_item">
				Dag 1 van GeekRock, de Rockende Zaterdag!<br>
				Rotterdam trilt op zijn vesten.
			</div>
		</article>
		
		<article class="item">
			<div class="date_dot bluedot">
				<span class="day">23</span>
				<span class="month">aug</span>
			</div>
			
			<div class="news_item">
				Dag 2 van GeekRock, de Chille Zondag!<br>
				Het zondaggevoel van de havenstad.
			</div>
		</article>
		
		<article class="item">
			<div class="date_dot bluedot">
				<span class="day">29</span>
				<span class="month">aug</span>
			</div>
			
			<div class="news_item">
				De offici&euml;le GeekRock afterparty in <a href="http://www.rotown.nl/" target="_blank">RoTown</a>, nog even een keertje nagenieten.
			</div>
		</article>
	</section>
	
	<!-- store -->
	<section class="grid_4">
		<h2><span>Voorplezier</span> te koop</h2>
		
		<div class="item">
			<ul class="bxslider2">
				<li><img src="{{ url() }}/assets/img/store/ed_sheeran_plus_cover.jpg" width="275" height="275" alt="Ed Sheeran - +" title="Ed Sheeran - +"/></li>
				<li><img src="{{ url() }}/assets/img/store/devo_something_for_everybody_cover.jpg" width="275" height="275" alt="Devo - Something For Everybody" title="Devo - Something For Everybody"/></li>
				<li><img src="{{ url() }}/assets/img/store/they_might_be_giants_nanobots_cover.jpg" width="275" height="275" alt="They Might Be Giants - Nanobots" title="They Might Be Giants - Nanobots"/></li>
				<li><img src="{{ url() }}/assets/img/store/harry_and_the_potters_and_the_power_of_love_cover.jpg" width="275" height="275" alt="Harry and the Potters and The Power of Love" title="Harry and the Potters and The Power of Love"/></li>
				<li><img src="{{ url() }}/assets/img/store/hellogoodbye_would_it_kill_you_cover.jpg" width="275" height="275" alt="Hellogoodbye - Would It Kill You?" title="Hellogoodbye - Would It Kill You?"/></li>
				
				<li><img src="{{ url() }}/assets/img/store/BalthazarRats.jpg" width="275" height="275" alt="Balthazar – Rats" title="Balthazar – Rats"></li>
				<li><img src="{{ url() }}/assets/img/store/Nature-Fear.jpg" width="275" height="275" alt="School is Cool – Nature Fear" title="School is Cool – Nature Fear"></li>
				<li><img src="{{ url() }}/assets/img/store/Wir-Sind-Helden.jpg" width="275" height="275" alt="Wir Sind Helden – Bring Mich Nach Hause" title="Wir Sind Helden – Bring Mich Nach Hause"></li>
			</ul>
		</div>
	</section>
	
</div>
	
<section class="container_12">

	<!-- about -->
	<article class="grid_4">
		<h2><span>Over</span> GeekRock</h2>
		
		<div class="item">
			<p>GeekRock is een Rotterdams rock- en popfestival voor geeks, nerds, dweebs en gamers. Intelligente muziek in een geweldig feest met een techie tintje.<br>
			<br>
			Een zaterdagmiddag en -avond plus nog een chille zondagmiddag en -avond genieten van topmuziek, duivelse drankjes en de beste sfeer van Rotterdam.</p>
		</div>
	</article>
	
	<!-- video -->
	<article class="grid_4">
		<h2><span>Vette</span> Video's</h2>
		
		<div class="item">
			<a href="{{ url('video') }}"><img src="{{ url() }}/assets/video/hellogoodbye_everything_is_debatable.png" width="275" height="155" alt="" class="video"/></a>
		</div>
	</article>
	
	<!-- contact -->
	<article class="grid_4">
		<h2><span>Waarom</span> voor geeks?</h2>
		
		<div class="item">
			<p>De geek is cool. De geek is slim. Maar de geek voelt zich niet op zijn plek tussen hipsters, toyboys, playas en wannabe's. De geek heeft zijn eigen wereld.<br>
			<br>
			Daarom is GeekRock voor jou. Geen pretentie, niet doen alsof je hip bent, maar gewoon met net-zo-awkward-als-jij anderen genieten van je eigen festival.</p>
		</div>
	</article>
	
</section>