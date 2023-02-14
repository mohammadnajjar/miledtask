@extends('welcome')
@section('content')
    <form id="filterForm" method="post" action="{{route('supplier.store')}}">
        @csrf
        <div class="form-group">
            <label for="supplier">Supplier:</label>
            <select class="form-control" name="supplier" id="supplier">
                <option value="">Select Supplier</option>
                @foreach($suppliers as $id => $supplier)
                    <option value="{{ $supplier }}">{{ $supplier }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="wholesaler">Wholesaler:</label>
            <select class="form-control" name="wholesaler" id="wholesaler" disabled>
                <option value="">Select Wholesaler</option>
                @foreach($wholesalers as $id => $wholesaler)
                    <option value="{{ $wholesaler }}">{{ $wholesaler }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="steering_type">Steering Type:</label>
            <select class="form-control" name="steering_type" id="steering_type" disabled>
                <option value="">Select Steering Type</option>
                @foreach($steeringTypes as $id => $steeringType)
                    <option value="{{ $steeringType}}">{{ $steeringType }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Filter">
    </form>
{{--    <table id="result">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Supplier</th>--}}
{{--            <th>Whole Seller</th>--}}
{{--            <th>Steering Type</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        </tbody>--}}
{{--    </table>--}}

    <script>
        $(document).ready(function(){
            $("#supplier").change(function(){
                $("#wholesaler").prop("disabled", false);
            });
            $("#wholesaler").change(function(){
                $("#steering_type").prop("disabled", false);
            });
        });
    </script>


@endsection
