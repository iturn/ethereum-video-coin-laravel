@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account overview</div>
                <div class="card-body">
                  <p>Address: 0xd912aecb07e9f4e1ea8e6b4779e7fb6aa1c3e4d8</p>
                  <p>Balance: 0.00 VC</p>
                </div>
                
            </div>
        </div>

        <div class="col-md-12 pt-3">
          <div class="card">
              <div class="card-header">Transaction history</div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>0xd912aecb07e9f4e1ea8e6b4779e7fb6aa1c3e4d8</td>
                            <td>0xd912aecb07e9f4e1ea8e6b4779e7fb6aa1c3e4d8</td>
                            <td>0.00</td>
                          </tr>
                          <tr>
                            <td>0xd912aecb07e9f4e1ea8e6b4779e7fb6aa1c3e4d8</td>
                            <td>0xd912aecb07e9f4e1ea8e6b4779e7fb6aa1c3e4d8</td>
                            <td>0.00</td>
                          </tr>
                          <tr>
                            <td>0xd912aecb07e9f4e1ea8e6b4779e7fb6aa1c3e4d8</td>
                            <td>0xd912aecb07e9f4e1ea8e6b4779e7fb6aa1c3e4d8</td>
                            <td>0.00</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>    
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
