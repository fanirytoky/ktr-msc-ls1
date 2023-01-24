@extends('Template.template')
@section('vue')

<div class="card-header col-md-5 mx-auto" id="entete">
    <div class="card-title">
        <h5 style="color: white;">Ajout informations du marché</h5>
    </div>
</div>

<div class="card-body col-md-5 mx-auto">
    @if(session('success'))
    <div class="inbox">
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
    </div>
    @endif
    <form method="POST" action="{{ route('card.Store') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control input-solid" id="name" name="name" placeholder="Name">

        </div>

        <!-- Company name -->
        <div class="form-group">
            <label for="companyName">Company Name</label>
            <input type="text" class="form-control input-solid" id="companyName" name="companyName" placeholder="Company Name">

        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="emailAddress">Email Address</label>
            <input type="text" class="form-control input-solid" id="emailAddress" name="emailAddress" placeholder="Email address">

        </div>

        <!-- telephoneNumber -->
        <div class="form-group">
            <label for="telephoneNumber">Telephone Number</label>
            <input type="text" class="form-control input-solid" id="telephoneNumber" name="telephoneNumber" placeholder="Telephone Number">

        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mx-auto">
                Valider
            </button>
        </div>
    </form>
</div>
@endsection