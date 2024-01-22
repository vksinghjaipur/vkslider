@extends('frontend.layouts.appuser')
@section('title') {{app_name()}} @endsection
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/formwizard.css') }}">

<!-- Scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js"></script> -->
<!-- Fonts -->

<!---V Final Review Page Print and Download start---->
<link rel="stylesheet" href="{{ asset('frontend/loanreview.css') }}">
<!---V Final Review Page Print and Download end ----->

<!-- Bankrate Affordability Calculator -->
<link rel="stylesheet" href="{{ asset('frontend/bankrate/asset/app.9b9275d0.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/bankrate/asset/main.css') }}">

<!-- Breadcrumb Start -->
<link rel="stylesheet" href="{{ asset('frontend/vbreadcrumb.css') }}">


<style type="text/css">
    ul li{
        line-height: 15px !important;
    }
    .vtable {
        border: 1px solid;
        border-color: #000 !important;
    }

    .vbutton {
        color: #fff !important;
    }

    .vtop {
        margin-top: -45px;
    }

    .vleft {
        margin-left: -56px;
    }
    .vbox{
        background-color: #fff !important;
    }
    .vboxhead{
        background-color: #3989c6 !important;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
    }
    .vboxborder{
        border-bottom: 1px solid #000 !important;
    }
    .invoice table td h3 {
        font-size: 1.6em !important;
    }
    .vborder{
        border:1px solid !important;
    }
    .vtext{
        font-size: 16px !important;
        font-weight: bold;
    }
    .vtbody{
        width: 10%;
    }
</style>                  

<div class="dashboard-right-box">
    <div class="dash-right-mid">
        <div class="notification-heading">
           <div class="col">
                <h3 class="type-heading-one text-center text-info">
                    <!-- <u><span style="color:#1E334E">Whishlist Property</span></u> -->
                </h3>
            </div>
        </div> 
       
        <div class="row">
            <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('users.dashboard')}}">Dashboard</a></li>
                        <li><a href="{{ route('tenantcreditlist')}}">Tenant Screening Checklist</a></li>
                        <li><a href="#">Stripe Checkout</a></li>
                    </ul>
                </div>
                <div class="ibox-body">
                    <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:30%">Particulars</th>
                            <th style="width:20%">Charges</th>
                            <th style="width:10%">Valid</th>
                            <th style="width:10%" class="text-center">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">Credit Check Fees</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">$2</td>
                            <td data-th="Quantity">1 Time</td>
                            <td data-th="Subtotal" class="text-center">$2</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align:right;"><h4>
                                <strong class="mr-9">Total <span class="text-success">$2</span></strong></h4></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align:right;">
                                <form action="{{route('session')}}" method="POST">
                               
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <input type='hidden' name="total" value="2">
                                <input type='hidden' name="productname" value="Credit Check Fees">
                                <button class="btn btn-success mr-5" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                    
                </div>
            </div><br>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
@endsection