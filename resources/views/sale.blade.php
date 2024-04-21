<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Add Sales</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Styles -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-5">
                    <a href="{{ url('/') }}">View Sales Chart</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1>Add Sales</h1>

                        @if(session()->has('success'))
                            <p>
                                {{ session()->get('success') }}
                            </p>
                        @endif

                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('sale.store') }}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-group col-md-12 mt-4">
                                <label>Sale Name</label>
                                <input name="name" type="text" class="form-control" value="{{old('name')}}" required="" />
							</div>

                            <div class="form-group col-md-12 mt-4">
                                <label>Sale Date</label>
                                <input name="sale_date" type="text" class="form-control datepicker" value="{{old('sale_date')}}" required="" />
							</div>

                            <div class="form-group col-md-12 mt-4">
                                <label>Quantity</label>
                                <input name="quantity" type="number" class="form-control" value="{{old('quantity')}}" required="" />
							</div>

                            <div class="form-group col-md-12 mt-4">
                                <input type="submit" class="btn btn-primary mt-4">
							</div>      
                                    
                        </form>
                    </div>
                <div class="col-md-3"></div>
            </div>
        </div>

        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
		$( ".datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
		});
	});
</script>
    </body>
</html>
