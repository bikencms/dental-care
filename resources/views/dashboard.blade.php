@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <h3>
                    Dashboard
                </h3>

                <p>
                    Welcome {{ auth()->user()->name }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection