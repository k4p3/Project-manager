@extends('adminlte::page')

@section('content')
<div class="wrap">
<div class="game"></div>

	<div class="modal-overlay">
		<div class="modal">
			<h2 class="winner">You Rock!</h2>
			<button class="restart">Play Again?</button>
			<p class="message">Developed on <a href="https://codepen.io">CodePen</a> by <a href="https://codepen.io/natewiley">Nate Wiley</a></p>
			<p class="share-text">Share it?</p>
			<ul class="social">
				<li><a target="_blank" class="twitter" href="https://twitter.com/share?url=https://codepen.io/natewiley/pen/HBrbL"><span class="fa fa-twitter"></span></a></li>
				<li><a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?u=https://codepen.io/natewiley/pen/HBrbL"><span class="fa fa-facebook"></span></a></li>
				<li><a target="_blank" class="google" href="https://plus.google.com/share?url=https://codepen.io/natewiley/pen/HBrbL"><span class="fa fa-google"></span></a></li>
			</ul>
		</div>
	</div>
  </div><!-- End Wrap -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="{{ asset('js/game.js') }}" defer></script>

@stop
