@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Transaction</div>
                
                <div class="card-body">

                    <form method="post" action="{{url('transactions')}}">
                      <div class="form-group col-md-4">
                        <label for="price">To address:</label>
                        <input type="text" class="form-control" name="toAddress">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="price">Amount:</label>
                        <input type="text" class="form-control" name="amount">
                      </div>
                      <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                      {{csrf_field()}}
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
