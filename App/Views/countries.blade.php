@extends('layout')

@section('content')
		<div class="masthead">
        <ul class="nav nav-justified">
          <li class="active"><a href="/countries/А">А</a></li>
          <li><a href="/countries/Б">Б</a></li>
          <li><a href="/countries/В">В</a></li>
          <li><a href="/countries/Г">Г</a></li>
          <li><a href="/countries/Д">Д</a></li>
          <li><a href="/countries/Е">Е</a></li>
          <li><a href="/countries/З">З</a></li>
          <li><a href="/countries/И">И</a></li>
          <li><a href="/countries/Й">Й</a></li>
          <li><a href="/countries/К">К</a></li>
          <li><a href="/countries/Л">Л</a></li>
          <li><a href="/countries/М">М</a></li>
          <li><a href="/countries/Н">Н</a></li>
          <li><a href="/countries/О">О</a></li>
          <li><a href="/countries/П">П</a></li>
          <li><a href="/countries/Р">Р</a></li>

        </ul>
      </div>
      <br />
      <!-- Example row of columns -->
	  @foreach ($countries as $country)
      <div class="row">
        <div class="col-md-12">
          <a title="{{ $country["name"] }}" href="{{ $country["country_href"] }}"> {{ $country["name"] }} - <img src="{{ $country["flag_img_src"] }}">
		@if(! empty($country["country_img_src"]))          
        	  <img src="{{ $country["country_img_src"] }}"/>
    	@endif
        </a></div>
      </div>
	  @endforeach
@endsection
	  
