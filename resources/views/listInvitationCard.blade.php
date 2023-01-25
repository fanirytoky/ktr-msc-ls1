@extends('Template.template')
@section('vue')
<div class="container-fluid">
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Invitation of business cards</h2>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="full graph_head">
        <div class="inbox">
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        </div>
    </div>
    @endif
    <div class="row column1">
        @foreach($li as $li)
        <div class="col-md-6 col-lg-3">
            <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                    <div>
                        <i class="fa fa-user yellow_color"></i>
                    </div>
                </div>
                <div class="counter_no">
                    <div>
                        <p>Name: <b>{{$li->name}}</b></p>
                        <p>Company Name: <b>{{$li->companyName}}</b></p>
                        <p>Email: <b>{{$li->emailAddress}}</b></p>
                        <p>Phone Number: <b>{{$li->telephoneNumber}}</b></p>
                        <p><a class="fw_icon" href="{{ route('addToMyCard', ['share_id' => $li->id
                            ,'name' => $li->name,'companyName' => $li->companyName,'emailAddress'=>$li->emailAddress,
                            'telephoneNumber'=>$li->telephoneNumber]) }}"><button class="userinfo btn btn-success">Add</button></a></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection