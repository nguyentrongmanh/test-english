@extends('layouts.app')
@php
$class->image = $class->image ?? 'default_class_image.jpg';
@endphp
@section('content')
<section class="section" id="our-classes">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>
                        Our
                        <em>
                            Classes
                        </em>
                    </h2>
                    <img alt="" src="assets/images/line-dec.png">
                        <p>
                            Having a solid foundation knowledge after each lesson, increasing difficulty helps students keep up with the progress of the new TOEIC FORMAT test.
                        </p>
                    </img>
                </div>
            </div>
        </div>
        <div class="row ui-tabs ui-widget ui-widget-content ui-corner-all" id="tabs">
            <div class="col-lg-4">
                <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                    @foreach ($classes as $item)
                    @php
                    	$classBinding = 'class="ui-state-default ui-corner-top"';
                    	if ($item->id == $classId) {
                    		$classBinding = 'class="ui-state-default ui-corner-top ui-tabs-active ui-state-active"';
                    	} 
                    @endphp
                    <li {{ $classBinding }}>
                        <a class="ui-tabs-anchor" href="{{ url('class?id=' . $item->id) }}">
                            <i class="fas fa-bookmark">
                            </i>
                            {{ $item->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-8">
                <section class="tabs-content">
                    <article aria-labelledby="ui-id-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                        <img src="{{ url('image/'. $class->image) }}"/>
                        <h4>
                            {{ $class->name }}
                        </h4>
                        <p class="class_item_detail">
                            Description: <span>{{ $class->description }}</span>
                        </p>
                        <p class="class_item_detail">
                            Target: <span>{{ $class->target }}</span>
                        </p>
                        <p class="class_item_detail">
                        	Schedule: <span>{{ $class->schedule }}</span>
                        </p>
                        <p class="class_item_detail">
                            Start Date: <span>{{ $class->start_date }}</span>
                        </p>
                        <p class="class_item_detail">
                            End Date: <span>{{ $class->end_date }}</span>
                        </p>
                        <div class="main-button">
                            <a href="#">
                                Register Now
                            </a>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection
