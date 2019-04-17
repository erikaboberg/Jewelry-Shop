@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Namnet på användaren -->
                    <!-- Email till användaren -->
                    Inloggad som:
                    <p> {!! Auth::user()->name !!}</p>
                    Mailadress:
                    <p> {!! Auth::user()->email !!}</p>

            <a href="{{ route('allproducts')}}" class="btn btn-primary">Tillbaka till hemsidan</a>

            <!-- Kolla om användare är admin för åtkomst till adminpanel -->
            <a href="{{ route('admin.displayProducts')}}" class="btn btn-primary">Admin panelen</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
