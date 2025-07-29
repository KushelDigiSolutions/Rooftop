@extends('frontend.layouts.app')

@section('title', 'Privacy Policy')
@section('header_img')
<img class="header-img" src="{{ url('frontend/images/franchise-bg.jpg') }}" style="width: 100% !important;" alt="">
@endsection
@section('hero')
<div class="page-title-section m-auto">
    <div class="breadcrumbs">
        <a class="text-white" href="/">Home </a>
        <i class="bi bi-arrow-right"></i>
        <a class="text-white" href="/refund-policy" class="active">Refund Policy</a>
    </div>
    <h1 class="text-white NewKansas-medium">Refund Policy</h1>
</div>
@endsection
@section('content')
<section class="container wrapper m-100">
    <h4 class="NewKansas-medium">Payment Method, Refund & Cancellation Policy</h4>
    <p class="text-justify">
    At <b><i>Curtains And Blinds</i></b>, we take customer satisfaction very seriously. Hence we make sure that our quality check team thoroughly checks all the products before dispatching them. Here are some frequently asked questions on Payments, Returns and Refunds that you might find helpful.
    </p>
    <h4 class="NewKansas-medium">What Is The Accepted Payment Method?</h4>
    <ul class="text-justify">
        <li>Curtaints And Blinds and its Franchise Partners <u>do not accept</u> cash payments</li>
        <li>All payments to be made via UPI or Bank Transfer. We also accept all major Credit & Debit cards, Gpay, PhonePe, and Net Banking (All payments are safe and secured by encryption, and your card details will not be stored)</li>
        <li>All prices mentioned are in INR (Indian Rupees)</li>
    </ul>

    <h4 class="NewKansas-medium">We Do Not Offer Warranty On</h4>
    <ul class="text-justify">
        <li>Normal wear and tear including fading of fabric and other materials</li>
        <li>Slight fabric colour shades and texture variations may occur from batch to batch; therefore exact colour match may not be possible</li>
        <li>Not following care procedures on products (washing instruction)</li>
    </ul>


    <h4 class="NewKansas-medium">Will my end Product be Returnable if I am Not Satisfied?</h4>
    <p class="text-justify">
        As all our products are custom made-to-measure, <u>we do not accept returns</u>. However, if your order does not meet your expectations, we are committed to working with you to resolve the issue.
    </p>

    <h4 class="NewKansas-medium">When am I eligible for a refund?</h4>
    <p class="text-justify">
        Refund can only be initiated if the cancellation is done within 24hrs of placing the order. Initial booking amount of Rs. 750/- is non refundable. All Forward & Reverse shipping charges will be deducted from the final refund amount.
    </p>

    <h4 class="NewKansas-medium">Contact Us</h4>
    <p class="text-justify">
        All other questions should be addressed to <a href="mailto:info@curtainsandblinds.in">info@curtainsandblinds.in</a>
    </p>
</section>
@endsection