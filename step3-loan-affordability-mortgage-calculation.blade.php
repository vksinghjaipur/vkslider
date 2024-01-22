@extends('frontend.layouts.appuser')
@section('title') {{app_name()}} @endsection
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bankrate Affordability Calculator -->
<link rel="stylesheet" href="{{ asset('frontend/bankrate/asset/app.9b9275d0.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/bankrate/asset/main.css') }}">

<!-- Breadcrumb Start -->
<link rel="stylesheet" href="{{ asset('frontend/vbreadcrumb.css') }}">


    <style type="text/css">
        .vtable {
            border: 1px solid;
            border-color: #000 !important;
        }

        .vbutton {
            color: #fff !important;
        }
        ul li{
        line-height: 15px !important;
        }
    </style>

<?php $appnumber = $formstatus = DB::table('property_buying_applications')->where('user_id',auth()->user()->id)->first();?>    

<div class="dashboard-right-box">
    <div class="dash-right-mid">
        
        
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                 <div class="row">
                    <div class="col-lg-12">
                      <ul class="breadcrumb">
                        <li><a href="{{ route('users.dashboard')}}">Dashboard</a></li>
                        <li><a href="#">Affordability & Mortgage</a></li>
                      </ul>
                    </div>  
                </div>
                <div class="notification-heading">
                   <div class="col">
                        <h5 class="text-left text-dark" style="float: left;">
                            @if(!empty($appnumber))
                            Application No. {{$appnumber->application_id}}
                            @else
                            @endif
                
                        </h5>
                        <a href="{{route('tenantcreditlist')}}"  class="pull-right">Skip >></a>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 text-center">                      
                        
                    </div>
                        
                    <div class="vformwizard">
                    
                            
                        <form name="contact" method="post" id="contactForm">
                            @csrf
                                <!-- @csrf -->
                                <div class="row mt-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="calculator">
                                            <script>
                                                window.zipcode = "302018";
                                            </script>
                                        
                                            <div id="calculator">
                                                <form class="Kd5byQis5wOPkQnfNJv_ ">
                                                
                                                <div class="mt-4 mb-6 mx-6">
                                                    <h2 class="type-heading-four wCSjLlOgUjU6rC0Uxr0z">Home Affordability & Mortgage Calculator</h2>
                                                    <div class="zFE1xBRtdBdL7TeVGUUc ">
                                                        <!-- <form class="Kd5byQis5wOPkQnfNJv_ ">-->
                                                        <div>
                                                            <div class="w-full display-flex flex-direction-row align-content-space-between">
                                                            <label class="Pwi47clRynwWcwi5CAdO w-full" for="homeAffordability-income">Annual gross income</label>
                                                                    
                                                            <div class="QxFwoV7XpSGcscMjndow eOefWr_gndhkV06DX3zj z5k5ZLJC3mSNiUZYo3o0 align-self-flex-start" data-hint="Annual gross income:  The amount of money you earn in one fiscal year before any taxes or deductions." role="note" aria-label="Annual gross income:  The amount of money you earn in one fiscal year before any taxes or deductions."><svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs Icon-glyph">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14ZM7 5.012a1 1 0 1 1 2 0A.994.994 0 0 1 8 6c-.549 0-1-.451-1-.988ZM7 12V7h2v5H7Z" class="icon-base"></path>
                                                            </svg></div>
                                                        </div>

                                            <div class="koERVitu2SzlvSsw6ho0 V9ee856NVbnqtNa7XEng" data-content="$">
                                                                
                                            <input type="text" class="ReactComponent BsPh5pITe4ngiBgWp7Vt qVwpghzECqFvciuwqvaW" inputmode="decimal" id="homeAffordability-income"name="homeAffordability_income" value="200,000">

                                                    <label for="homeAffordability-income" class="di9rx46mRpzNAidzESJM V9ee856NVbnqtNa7XEng">$</label>
                                                    </div>
                                                    <span class="uC5THFLTMU6DMTGEhmTO pvkmvqSCsogqw1gNxT73"></span>
                                                </div>
                                                            
                                                <div>
                                                    <div class="w-full display-flex flex-direction-row align-content-space-between"><label class="Pwi47clRynwWcwi5CAdO w-full" for="homeAffordability-debt">Monthly debt<span> (optional)</span></label>
                                                    <div class="QxFwoV7XpSGcscMjndow eOefWr_gndhkV06DX3zj z5k5ZLJC3mSNiUZYo3o0 align-self-flex-start" data-hint="Monthly debt: Any payments you make to pay back a creditor or lender for money you borrowed. Rent, loans or credit cards, alimony, child support, or any other payment obligations are considered monthly debts." role="note" aria-label="Monthly debt: Any payments you make to pay back a creditor or lender for money you borrowed. Rent, loans or credit cards, alimony, child support, or any other payment obligations are considered monthly debts."><svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs Icon-glyph">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14ZM7 5.012a1 1 0 1 1 2 0A.994.994 0 0 1 8 6c-.549 0-1-.451-1-.988ZM7 12V7h2v5H7Z" class="icon-base"></path>
                                                        </svg></div>
                                                    </div>
                                                    
                                                    <div class="koERVitu2SzlvSsw6ho0 V9ee856NVbnqtNa7XEng" data-content="$">
                                                        
                                            <input class="ReactComponent BsPh5pITe4ngiBgWp7Vt qVwpghzECqFvciuwqvaW" type="text" inputmode="decimal" id="homeAffordability-debt" name="homeAffordability_debt" data-testid="homeAffordability-debt" aria-required="false" value="500">

                                                        <label for="homeAffordability-debt" class="di9rx46mRpzNAidzESJM V9ee856NVbnqtNa7XEng">$</label>
                                                    </div><span class="uC5THFLTMU6DMTGEhmTO pvkmvqSCsogqw1gNxT73"></span>
                                                </div>
                                                            <div>
                                                                <div class="w-full display-flex flex-direction-row align-content-space-between"><label class="Pwi47clRynwWcwi5CAdO w-full" for="homeAffordability-downPayment">Down payment</label>
                                                                    <div class="QxFwoV7XpSGcscMjndow eOefWr_gndhkV06DX3zj z5k5ZLJC3mSNiUZYo3o0 align-self-flex-start" data-hint="Down payment: Portion of the sale price of a home that is not financed. Your down payment amount can affect the interest rate you get, as lenders typically offer lower rates for borrowers who make larger down payments." role="note" aria-label="Down payment: Portion of the sale price of a home that is not financed. Your down payment amount can affect the interest rate you get, as lenders typically offer lower rates for borrowers who make larger down payments."><svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs Icon-glyph">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14ZM7 5.012a1 1 0 1 1 2 0A.994.994 0 0 1 8 6c-.549 0-1-.451-1-.988ZM7 12V7h2v5H7Z" class="icon-base"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <div class="koERVitu2SzlvSsw6ho0 V9ee856NVbnqtNa7XEng" data-content="$">
                                            <input class="ReactComponent BsPh5pITe4ngiBgWp7Vt qVwpghzECqFvciuwqvaW" type="text" inputmode="decimal" id="homeAffordability-downPayment" name="homeAffordability_downPayment" data-testid="homeAffordability-downPayment" aria-required="true" value="50,000"><label for="homeAffordability-downPayment" class="di9rx46mRpzNAidzESJM V9ee856NVbnqtNa7XEng">$</label></div><span class="uC5THFLTMU6DMTGEhmTO pvkmvqSCsogqw1gNxT73"></span>
                                                            </div>
                                                            <div>
                                                                <div class="w-full display-flex flex-direction-row align-content-space-between"><label class="Pwi47clRynwWcwi5CAdO w-full" for="homeAffordability-interest">Interest rate</label>
                                                                    <div class="QxFwoV7XpSGcscMjndow eOefWr_gndhkV06DX3zj z5k5ZLJC3mSNiUZYo3o0 align-self-flex-start" data-hint="Interest rate: Amount you’ll pay each year to borrow the money for your loan, expressed as a percentage. " role="note" aria-label="Interest rate: Amount you’ll pay each year to borrow the money for your loan, expressed as a percentage. "><svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs Icon-glyph">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14ZM7 5.012a1 1 0 1 1 2 0A.994.994 0 0 1 8 6c-.549 0-1-.451-1-.988ZM7 12V7h2v5H7Z" class="icon-base"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <div class="koERVitu2SzlvSsw6ho0 GeqbVMxPrTZp4a2PPeaW" data-content="%">
                                            <input class="ReactComponent BsPh5pITe4ngiBgWp7Vt qVwpghzECqFvciuwqvaW" type="text" inputmode="decimal" id="homeAffordability-interest" name="homeAffordability_interest" data-testid="homeAffordability-interest" aria-required="true" value="7"><label for="homeAffordability-interest" class="di9rx46mRpzNAidzESJM GeqbVMxPrTZp4a2PPeaW">%</label></div><span class="uC5THFLTMU6DMTGEhmTO pvkmvqSCsogqw1gNxT73"></span>
                                                            </div>
                                                            <div class="display-flex flex-direction-column " id="SelectContainer473440">
                                                                <div class="w-full display-flex flex-direction-row align-content-space-between"><label class="Pwi47clRynwWcwi5CAdO w-full" for="Select360069">Loan term</label>
                                                                    <div class="QxFwoV7XpSGcscMjndow eOefWr_gndhkV06DX3zj z5k5ZLJC3mSNiUZYo3o0 align-self-flex-start" data-hint="Loan term: The amount of time or number of years that you will have to repay a loan. Longer term mortgages can make your monthly payment amount smaller than shorter term loans by stretching out your payments over more years." role="note" aria-label="Loan term: The amount of time or number of years that you will have to repay a loan. Longer term mortgages can make your monthly payment amount smaller than shorter term loans by stretching out your payments over more years."><svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs Icon-glyph">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14ZM7 5.012a1 1 0 1 1 2 0A.994.994 0 0 1 8 6c-.549 0-1-.451-1-.988ZM7 12V7h2v5H7Z" class="icon-base"></path>
                                                                        </svg></div>
                                                                </div>
                                        <div class="pos-relative">
                                            <select class="ReactComponent qR15cmi2RAw1rLRfnGe_ sGRcK_oTa4VG593sBEpP" id="Select360069" name="loan_term" tabindex="0">
                                                <option value="10">10 year</option>
                                                <option value="15">15 year</option>
                                                <option value="20">20 year</option>
                                                <option value="30">30 year</option>
                                            </select>

                                                            <span class="DR0Pggs8UJwz8itn3QdT">
                                                                <svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs">
                                                                <path d="m14 6.9-1.5-1.4L8 9.7 3.5 5.5 2 6.9l6 5.6 6-5.6Z" class="icon-base"></path>
                                                                        </svg>
                                                            </span>
                                        </div>
                                                            <span class="uC5THFLTMU6DMTGEhmTO pvkmvqSCsogqw1gNxT73">
                                                            </span>
                                                            </div>

                                                        <button type="button" data-testid="moreFilters" class="display-flex align-items-center justify-content-space-between Button Button--base font-circular-bold p-0 w-full" style="font-size: 16px;"><span>Edit taxes and fees</span><svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs icon-base-blue hover:icon-base-blue icon-highlight-blue hover:icon-highlight-blue-dark">
                                                                    <path d="m14 6.9-1.5-1.4L8 9.7 3.5 5.5 2 6.9l6 5.6 6-5.6Z" class="icon-base"></path>
                                                                </svg>
                                                        </button>

                                                <input class="ReactComponent BsPh5pITe4ngiBgWp7Vt qVwpghzECqFvciuwqvaW" type="text" inputmode="decimal" id="homeAffordability-taxes" name="homeAffordability_taxes" data-testid="homeAffordability-taxes" aria-required="false" value="281">

                                                <input class="ReactComponent BsPh5pITe4ngiBgWp7Vt qVwpghzECqFvciuwqvaW" type="text" inputmode="decimal" id="homeAffordability-insurance" name="homeAffordability_insurance" data-testid="homeAffordability-insurance" aria-required="false" value="78">

                                                <input class="ReactComponent BsPh5pITe4ngiBgWp7Vt qVwpghzECqFvciuwqvaW" type="text" inputmode="decimal" id="homeAffordability-pmi" name="homeAffordability_pmi" data-testid="homeAffordability-pmi" aria-required="false" value="0">

                                                <input class="ReactComponent BsPh5pITe4ngiBgWp7Vt qVwpghzECqFvciuwqvaW" type="text" inputmode="decimal" id="homeAffordability-hoa" name="homeAffordability_hoa" data-testid="homeAffordability-hoa" aria-required="false" value="0">


                                                    <div class="CkO_sm1OdX3aXTjyR0y1 ">
                                                    <div class="display-grid grid-cols-1 md:grid-cols-2 gap-6 border-b mb-12 pb-12" style="border-color: rgb(227, 230, 238);">
                                                        <div>
                                                            <div class="h-full rounded-md border-gray border p-6">
                                                                <p class="font-circular-book py-2 px-4 type-heading-six uppercase text-white bg-green-dark rounded-xl display-inline-block mb-2">Recommended Budget</p>
                                                        <table class="Table Table--borderedRows">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="font-weight-normal type-body-one pl-0">Price of home</th>
                                                                    <td class="pr-0" data-testid="homeAffordability-recPrice"><span class="KCTkhY8KcFAQ_lwwwXs4 Numeral"><span class="Numeral-accent">$</span><span>371,809</span></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="font-weight-normal type-body-one pl-0">Monthly payment</th>
                                                                    <td class="pr-0" data-testid="homeAffordability-recPayment"><span class="KCTkhY8KcFAQ_lwwwXs4 Numeral"><span class="Numeral-accent">$</span><span>2,141</span></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="display-flex font-weight-normal type-body-one pl-0"><span>Est. closing costs</span>
                                                                        <div class="w-10 ml-2">
                                                                            <div class="QxFwoV7XpSGcscMjndow eOefWr_gndhkV06DX3zj z5k5ZLJC3mSNiUZYo3o0 align-self-flex-start" data-hint="Estimated closing costs are equal to 2–5% of loan amount." role="note" aria-label="Estimated closing costs are equal to 2–5% of loan amount."><svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs Icon-glyph">
                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14ZM7 5.012a1 1 0 1 1 2 0A.994.994 0 0 1 8 6c-.549 0-1-.451-1-.988ZM7 12V7h2v5H7Z" class="icon-base"></path>
                                                                                </svg></div>
                                                                        </div>
                                                                    </th>
                                                                    <td class="pr-0" data-testid="homeAffordability-recClosing"><span class="KCTkhY8KcFAQ_lwwwXs4 Numeral"><span class="Numeral-accent">$</span><span>9,654</span></span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                                <p class="text-slate mt-8 mb-0 type-body-two">Your recommended budget should be a comfortable fit within your overall finances. You should aim to keep housing expenses below 28% of your monthly gross income. If you have additional debts, your housing expenses and those debts should not exceed 36% of your monthly gross income.</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="h-full rounded-md border-gray border p-6">
                                                                <p class="uppercase mt-2 mb-4 type-heading-six">Max purchase budget</p>
                                                                <table class="Table Table--borderedRows">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="font-weight-normal type-body-one pl-0">Price of home</th>
                                                                            <td class="pr-0" data-testid="homeAffordability-maxPrice"><span class="KCTkhY8KcFAQ_lwwwXs4 Numeral"><span class="Numeral-accent">$</span><span>459,488</span></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="font-weight-normal type-body-one pl-0">Monthly payment</th>
                                                                            <td class="pr-0" data-testid="homeAffordability-maxPayment"><span class="KCTkhY8KcFAQ_lwwwXs4 Numeral"><span class="Numeral-accent">$</span><span>2,724</span></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="display-flex font-weight-normal type-body-one pl-0"><span>Est. closing costs</span>
                                                                                <div class="w-10 ml-2">
                                                                                    <div class="QxFwoV7XpSGcscMjndow eOefWr_gndhkV06DX3zj z5k5ZLJC3mSNiUZYo3o0 align-self-flex-start" data-hint="Estimated closing costs are equal to 2–5% of loan amount." role="note" aria-label="Estimated closing costs are equal to 2–5% of loan amount."><svg viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" focusable="false" class="Icon Icon--xs Icon-glyph">
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm0-1A7 7 0 1 1 8 1a7 7 0 0 1 0 14ZM7 5.012a1 1 0 1 1 2 0A.994.994 0 0 1 8 6c-.549 0-1-.451-1-.988ZM7 12V7h2v5H7Z" class="icon-base"></path>
                                                                                        </svg></div>
                                                                                </div>
                                                                            </th>
                                                                            <td class="pr-0" data-testid="homeAffordability-maxClosing"><span class="KCTkhY8KcFAQ_lwwwXs4 Numeral"><span class="Numeral-accent">$</span><span>12,285</span></span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <p class="text-slate mt-8 mb-0 type-body-two">Your max purchase budget is the loan amount that lenders could probably give you based on what you’ve told us. However, spending up to the max may be an uncomfortable fit in your budget (about 43% of your total debts).</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row mb-4">  
                                <div class="col-md-5">
                                <button class="btn btn-primary" onclick="history.back()">Prev</button>
                                </div>
                                <div class="col-md-4">                      
                                <a href="{{route('tenantcreditlist')}}" class="btn btn-danger btn-submit">Skip</a>
                                </div>
                                <div class="col-md-3">      
                                <button type="submit" class="btn btn-primary btn-submit">Submit & Next</button>
                                </div> 
                            </div>
                        </form>
                    </div>      
                </div> 
            </div>
        </div>

    </div>
</div>





<script>
$('#contactForm').on('submit',function(event){
    event.preventDefault();
   
    homeAffordability_income = $('#homeAffordability-income').val();
    homeAffordability_debt = $('#homeAffordability-debt').val();
    homeAffordability_downPayment = $('#homeAffordability-downPayment').val();
    homeAffordability_interest = $('#homeAffordability-interest').val();
    loan_term = $('#Select360069').val();
    homeAffordability_taxes = $('#homeAffordability-taxes').val();
    homeAffordability_insurance = $('#homeAffordability-insurance').val();
    homeAffordability_pmi = $('#homeAffordability-pmi').val();
    homeAffordability_hoa = $('#homeAffordability-hoa').val();
    //homeAffordability_recPrice = $('.KCTkhY8KcFAQ_lwwwXs4').text();

    //alert(homeAffordability_income);
    homeAffordability_recPrice = $('[data-testid=homeAffordability-recPrice]').text();
    homeAffordability_recPayment = $('[data-testid=homeAffordability-recPayment]').text();
    homeAffordability_recClosing = $('[data-testid=homeAffordability-recClosing]').text();

    homeAffordability_maxPrice = $('[data-testid=homeAffordability-maxPrice]').text();
    homeAffordability_maxPayment = $('[data-testid=homeAffordability-maxPayment]').text();
    homeAffordability_maxClosing = $('[data-testid=homeAffordability-maxClosing]').text();
    
    $.ajax({
        url: "step2-procees-affordability-calculator",
        type:"POST",
        data:{
            "_token": "{{ csrf_token() }}",
            homeAffordability_income:homeAffordability_income,
            homeAffordability_debt:homeAffordability_debt,
            homeAffordability_downPayment:homeAffordability_downPayment,
            homeAffordability_interest:homeAffordability_interest,
            loan_term:loan_term,
            homeAffordability_taxes:homeAffordability_taxes,
            homeAffordability_insurance:homeAffordability_insurance,
            homeAffordability_pmi:homeAffordability_pmi,
            homeAffordability_hoa:homeAffordability_hoa,
            homeAffordability_recPrice:homeAffordability_recPrice,
            homeAffordability_recPayment:homeAffordability_recPayment,
            homeAffordability_recClosing:homeAffordability_recClosing,

            homeAffordability_maxPrice:homeAffordability_maxPrice,
            homeAffordability_maxPayment:homeAffordability_maxPayment,
            homeAffordability_maxClosing:homeAffordability_maxClosing,
        },
        
        success: function(response){
        window.location.href = "{{route('tenantcreditlist')}}";        
        //window.location = "{{url('/step3-procees-mortgage-calculator')}}";        
        //window.location = "http://127.0.0.1:8000/step3-procees-mortgage-calculator";        
        $('#res_message').show();
        $('#res_message').html(response.msg);
        $('#msg_div').removeClass('d-none');
 
        document.getElementById("contactForm").reset();
        setTimeout(function(){
        $('#res_message').hide();
        $('#msg_div').hide();
        },4000);
   },
  });
});
</script>

<!---V Date Save in db Ajax end --->

<!-- <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  
    $(".btn-submit").click(function(e){
        e.preventDefault();
        var homeAffordability_income = $("input[name=homeAffordability_income]").val();
        var homeAffordability_debt = $("input[name=homeAffordability_debt]").val();

        aleter(homeAffordability_debt);

        $.ajax({
           type:'POST',
           url:"{{ route('affordabilitycalc.store') }}",
           data:{homeAffordability_income:homeAffordability_income, homeAffordability_debt:homeAffordability_debt},
           success:function(data){
              alert(data.success);
           }
        });
    });

});

</script> -->

<!-- <script type="text/javascript">
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $("#btn").click(function(e){
    
        e.preventDefault();
     
        var income = $("#homeAffordability-income").val();
        var debt = $("#homeAffordability-debt").val();

        alert(income);
        alert(debt);
     
        $.ajax({
            type:'POST',
            // dataType: 'JSON',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           url:"{{ route('affordabilitycalc.store') }}",
           data:{income:income, debt:debt},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    alert(data.success);
                    //location.reload();
                }else{
                    printErrorMsg(data.error);
                }
           }
        });
    
    });
  
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
  
</script> -->


<script src="https://www.bankrate.com/calculators/v1.358.0/react-home-affordability/bundle.js" defer="defer"></script>

<!-- <script type="module" src="https://www.bankrate.com/v5.272.0/next/build/assets/classy.ec0bdbd8.js"></script> -->
<!-- <script type="text/javascript">
function OptanonWrapper() { }
</script> -->
    @endsection

    @section('script')
    @endsection