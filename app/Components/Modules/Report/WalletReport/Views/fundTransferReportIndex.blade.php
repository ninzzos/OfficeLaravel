@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 reportFilters">
        </div>
        <div class="col-md-12 reportContainer">
        </div>
    </div>
    <script>
        "use strict";

        $(function () {
            loadReportFilters();
        });

        function loadReportFilters() {
            $.get('{{ route(strtolower(getScope()).'.walletReport.fundTransferReport.filters') }}', function (response) {
                $('.reportFilters').html(response);
                $('.filterRequest').trigger('click')
            });
        }

        function fetchFundTransferData(route) {
            route = route ? route : '{{ route(strtolower(getScope()).'.walletReport.FundTransferReport.fetch') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                Ladda.stopAll();
            })
        }
    </script>
    <style>
        .page-content {
            overflow: hidden;
        }
    </style>
@endsection
