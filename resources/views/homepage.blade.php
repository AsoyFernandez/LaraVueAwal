@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron" id="jumbotron_index">
              <div class="text-center">
                  <h1>Belajar Vue</h1>
                  <p>CRUD Laravel dan Vue</p>
                  <router-view></router-view>
              </div>
            </div>

        </div>
    </div>
</div>
@endsection
