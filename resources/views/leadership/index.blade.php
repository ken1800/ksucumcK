@extends('layouts.template')
@section('content')
    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area br_image">
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Church Leadership</h2>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <!--================Event Blog Area=================-->









        <section class="event_blog_area section_gap">
            <div class="container">
                <div class="row ministries_info">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="event_post">
                        @forelse($leader as $leader)
                            <img src="{{ asset($leader->image) }}" alt="">
                            <a href="#"><h2 class="event_title"> {{ $leader->name }}</h2></a>
                            <p> {{ $leader->description }}</p>
                            <p> {{ $leader->position->position }}</p>
                            {{--  <a href="#" class="btn_hover"> {{ $leader->year->year }}</a>  --}}
                            @empty
         @endforelse
                        </div>
                    </div>

      </div>
    </div>
  </div>
</main>

        <!--================Blog Area=================-->{{--
        <!--================Event Date Area =================-->
        <section class="event_date_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d_flex">
                        <div class="evet_location flex">
                            <h3>Spreading the faith to all</h3>
                            <p><span class="lnr lnr-calendar-full"></span>5th may, 2018</p>
                            <p><span class="lnr lnr-clock"></span>Saturday, 09.00 am to 05.00 pm</p>
                        </div>
                    </div>
                    <div class="col-md-6 event_time">
                        <h4>Our Next Event Starts in</h4>
                        <div id="timer" class="timer">
                            <div class="timer__section days">
                                <div class="timer__number"></div>
                                <div class="timer__label">days</div>
                            </div>
                            <div class="timer__section hours">
                                <div class="timer__number"></div>
                                <div class="timer__label">hours</div>
                            </div>
                            <div class="timer__section minutes">
                                <div class="timer__number"></div>
                                <div class="timer__label">Minutes</div>
                            </div>
                            <div class="timer__section seconds">
                                <div class="timer__number"></div>
                                <div class="timer__label">seconds</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Event Date Area =================-->--}}
@endsection
