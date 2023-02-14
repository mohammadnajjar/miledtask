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
                        });
                        html += "<tr><td><input type='text' name='model[]'></td><td><input type='text' name='sFX[]'></td><td><input type='text' name='variant[]'></td><td><input type='text' name='color[]'></td><td><input type='text' name='supplier[]'></td><td><input type='text' name='whole_seller[]'></td><td><input type='text' name='steering_type[]'></td><td><button id='addRow'>Add New Row</button> </td></tr>";
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

            $(document).on("click", "#addRow", function() {
                // code to add a new row
                $.ajax({
                    url: "/add",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Append new row to table
                        var html = "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                        html += "<tr><td colspan='7'><form data-id='" + response.id + "'><input type='text' name='model'><input type='text' name='sFX'><input type='text' name='variant'><input type='text' name='color'><input type='text' name='supplier'><input type='text' name='whole_seller'><input type='text' name='steering_type'><button type='submit' id='saveRecord'>Save</button></form></td></tr>";
                        $("#result tbody").append(html);
                    }
                });
            });

            $(document).on("click", "#saveRecord", function(e)
            {

                e.preventDefault();
                var form = $(this).closest("form");
                var id = form.data("id");
                var data = form.serializeArray();
                $.ajax({
                    url: "/save",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        model: data[0].value,
                        sFX: data[1].value,
                        variant: data[2].value,
                        color: data[3].value,
                        supplier: data[4].value,
                        whole_seller: data[5].value,
                        steering_type: data[6].value,
                    },
                    success: function(response) {
                        // Perform any desired action on successful response
                    }
                });
            });
        });
    </script>

@endsection
