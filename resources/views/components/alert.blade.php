@if(session('success'))

    <div id="success-alert" style="
        background:#f0fdf4;
        color:#166534;
        border:1px solid #86efac;
        padding:12px;
        margin-bottom:20px;
        border-radius:6px;
        width:fit-content;
    ">
        {{ session('success') }}
    </div>

@endif


@if($errors->any())

    <div id="error-alert" style="
        background:#fef2f2;
        color:#991b1b;
        border:1px solid #fca5a5;
        padding:12px;
        margin-bottom:20px;
        border-radius:6px;
        width:fit-content;
    ">

        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach

    </div>

@endif


<script>
    setTimeout(() => {

        let success = document.getElementById('success-alert');
        let error = document.getElementById('error-alert');

        if(success){
            success.style.display = 'none';
        }

        if(error){
            error.style.display = 'none';
        }

    }, 3000);
</script>