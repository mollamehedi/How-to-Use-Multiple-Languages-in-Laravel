<!DOCTYPE html>
<html>
<head>
    <title> Laravel Multiple Language With Molla Mehedi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
      
        <div class="row">
            <div class="col-md-8 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('logo.jpg') }}" alt="">
                        <h2>Laravel Multiple Language With Molla Mehedi</h2>
                    </div>
               
                <div class="card-body">
                    <strong>Select Language: </strong>
                    <select class="form-control lang-change">
                        <option value="en" {{ session()->get('lang_code')=='en' ? 'selected' : ''}}>English</option>
                        <option value="fr" {{ session()->get('lang_code')=='fr' ? 'selected' : ''}}>French</option>
                        <option value="bn" {{ session()->get('lang_code')=='bn' ? 'selected' : ''}}>Bengali</option>
                    </select>
                <h4 class="mt-5">{{ __('content.heading') }}</h4>
                </div>
                <div class="card-footer">
                    <h4 class="mt-5">Support</h4>
                    <strong>Email : </strong> <a href="mailto:mollameehedi@gmail.com">mollameehedi@gmail.com</a>
                    <br/>
                    <strong>Website : </strong><a href=" mlmehedi.com"> mlmehedi.com</a>
                </div>
            </div>
            </div>
        </div>
     
    </div>
</body>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
 
  var url = "{{ route('lang.change') }}";

    $('.lang-change').change(function(){
     let lang_code = $(this).val();
      window.location.href = url + "?lang="+ lang_code;
    });

</script>
</html>