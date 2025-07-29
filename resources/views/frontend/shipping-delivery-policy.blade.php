@extends('frontend.layouts.app')

@section('title', 'Shipping & Delivery Policy')
@section('header_img')
<img class="header-img" src="{{ url('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/shipping-delivery-policy" class="active">Shipping & Delivery Policy</a>
    </div>
    <h1 class="text-white NewKansas-medium">Shipping & Delivery Policy</h1>
</div>
@endsection
@section('content')
<section class="container wrapper m-100">
    <h4 class="NewKansas-medium">Shipping & Delivery Policy</h4>
    <p class="text-justify">
        At <i>Curtains And Blinds</i>, we take customer satisfaction very seriously. Please be assured that we take extra care to ensure that all our customers receive their items on time, and we will do our best to ensure that your order reaches your address promptly. Please understand that while we take every effort to minimize delays, factors beyond our control (i.e., Natural calamities, Peak Seasons, <b>Weather conditions, Traffic congestion, Delivery area challenges and Technical issues</b>) may affect delivery times. Here are some frequently asked questions on shipping and payment that you might find helpful.
    </p>

    <h4 class="NewKansas-medium">What Are The Shipping & Delivery Charges?</h4>
    <p class="text-justify">
        Once your order is confirmed, it will take 15 working days for us to fabricate and dispatch your orders. For a limited time, delivery across India is Complimentary with no additional charges.
    </p>

    <h4 class="NewKansas-medium">How To Cancel The Order?</h4>
    <p class="text-justify">
        All cancellation can be done within 24hrs of placing the order. Once the order is in production, you cannot cancel it.
    </p>
    <h4 class="NewKansas-medium">Contact Us</h4>
    <p class="text-justify">
    All other questions should be addressed to <a href="mailto:info@curtainsandblinds.in">info@curtainsandblinds.in</a>
    </p>
</section>
@endsection