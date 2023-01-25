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
                        <p><button data-id="{{$cards->id}}" class="userinfo btn btn-success" data-toggle="modal" data-target="#modalForm">Share</button></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="modal fade" id="modalForm" role="dialog">
        <div class="modal-dialog modal-lg fixed">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Fermer</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="full graph_head">
                                <div class="heading1 margin_0">
                                    <h2>Send to</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="ajaxliste">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery library -->
<script src="{{url('js/jquery2.min.js')}}"></script>

<!-- Latest minified bootstrap js -->
<script src="{{url('js/bootstrap2.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.userinfo').click(function() {
            var xhr = new XMLHttpRequest()
            xhr.onreadystatechange = (e) => {
                e.preventDefault()
                if (xhr.readyState === 4) {
                    document.getElementById("ajaxliste").innerHTML = xhr.responseText
                    console.log(xhr.responseText)
                }
            }
            var userid = $(this).data('id');
            var url = '/getAllUsers?idCard=' + userid;
            xhr.open('GET', url, true)
            xhr.send();
        });
    });
</script>
@endsection