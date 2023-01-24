@extends('Template.template')
@section('vue')
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>List of business cards</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        @foreach($cards as $cards)
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-user yellow_color"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p>Name: <b>{{$cards->name}}</b></p>
                        <p>Company Name: <b>{{$cards->companyName}}</b></p>
                        <p>Email: <b>{{$cards->emailAddress}}</b></p>
                        <p>Phone Number: <b>{{$cards->telephoneNumber}}</b></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection