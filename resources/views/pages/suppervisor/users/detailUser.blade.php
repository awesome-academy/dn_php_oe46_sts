@extends('index')
@section( 'content')
<div class="container-fluid">       
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header">
                            {{ trans('messages.Information') }}
                        </div>
                        <div class="card-body">
                          <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">{{ trans('messages.FullName') }}: <cite title="Source Title">{{ $user->name }}</cite></footer>
                            <footer class="blockquote-footer">{{ trans('messages.Age') }}: <cite title="Source Title">{{ $user->age }}</cite></footer>
                            <footer class="blockquote-footer">{{ trans('messages.Address') }}: <cite title="Source Title">{{ $user->address }}</cite></footer>
                            <footer class="blockquote-footer">{{ trans('messages.Email') }}: <cite title="Source Title">{{ $user->email }}</cite></footer>
                            <footer class="blockquote-footer">{{ trans('messages.Role') }}: <cite title="Source Title">{{ $user->role }}</cite></footer>
                          </blockquote>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
