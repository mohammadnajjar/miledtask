@extends('welcome')
@section('content')
    <!-- Filter form -->
    <form id="filterForm">
    @csrf
        <!-- Model -->
            <input type="hidden" name="supplier" value="{{ $supplier }}">
            <input type="hidden" name="wholesaler" value="{{ $wholesaler }}">
            <input type="hidden" name="steeringType" value="{{ $steeringType }}">


            <div class="form-group">
            <label for="model">Model</label>
            <select class="form-control" id="model" name="model">
                <option value="">Select a model</option>
                @foreach($models as $id => $model)
                    <option value="{{ $model }}">{{ $model }}</option>
                @endforeach
            </select>
        </div>

        <!-- SFX -->
        <div class="form-group">
            <label for="sfx">SFX</label>
            <select class="form-control" id="sfx" name="sfx" disabled>
                <option value="">Select a SFX</option>
                @foreach($sfxs as $id => $sfx)
                    <option value="{{ $sfx }}">{{ $sfx }}</option>
                @endforeach
            </select>
        </div>

        <!-- Variant -->
        <div class="form-group">
            <label for="variant">Variant</label>
            <select class="form-control" id="variant" name="variant" disabled>
                <option value="">Select a variant</option>
                @foreach($variants as $id => $variant)
                    <option value="{{ $variant }}">{{ $variant }}</option>
                @endforeach
            </select>
        </div>

        <!-- Color -->
        <div class="form-group">
            <label for="color">Color</label>
            <select class="form-control" id="color" name="color" disabled>
                <option value="">Select a color</option>
                @foreach($colors as $id => $color)
                    <option value="{{ $color }}">{{ $color }}</option>
                @endforeach
            </select>
        </div>

    </form>
    <table id="result">
        <thead>
        <tr>
            <th>model</th>
            <th>sFX</th>
            <th>variant</th>
            <th>color</th>
            <th>supplier</th>
            <th>whole_seller</th>
            <th>steering_type</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
    <a href="{{route('supplier.index')}}">back</a>
    <script>
        $(document).ready(function(){
            $("#model").change(function(){
                $("#sfx").prop("disabled", false);
            });
            $("#sfx").change(function(){
                $("#variant").prop("disabled", false);
            });
            $("#variant").change(function(){
                $("#color").prop("disabled", false);
            });


        });
    </script>
    <script>
        $(document).ready(function(){
            function filterRecords() {
                var formData = $("#filterForm").serialize();
                $.ajax({
                    url: "{{ url('/filter') }}",
                    type: "POST", // Use POST method
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        var html = "";
                        $.each(data, function(index, item){
                            html += "<tr><td>" + item.model + "</td><td>" + item.sFX + "</td><td>" + item.variant + "</td><td>" + item.color + "</td><td>" + item.supplier + "</td><td>" + item.whole_seller + "</td><td>" + item.steering_type + "</td></tr>";
                            html+="<tr><td colspan='7'><form></form><td><tr>"
                        });
                        $("#result tbody").html(html);
                    }
                });
            }

            // Call filterRecords() when the color select field changes
            $("#color").change(function() {
                filterRecords();
            });

            // Call filterRecords() on page load
            filterRecords();
        });
    </script>


@endsection
