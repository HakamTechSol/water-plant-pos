<?php $page="Employee Salaries - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Salary Calcualtion @endslot
        @slot('title_1') Manage your Employee Salaries @endslot
        @endcomponent

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <select class="select" name="expense_account" id="getMonth" required>
                        <option selected disabled>Select Month</option>
                        <option value="01">Januray</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Emplyee Name</th>
                        <th>Leave</th>
                        <th>Calculated Salary</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody id="salTable">
                    

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /product list -->
</div>
</div>
@endsection
