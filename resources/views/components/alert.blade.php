@if (session()->has('success'))
    
        <p style="color: rgb(0, 255, 42)">
            {{ session('success') }}
        </p>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', () =>{
            swal.fire('Pronto!', "{{session('success')}}", 'success');
        })
    </script>
@endif

@if(session('error'))
    <p style="color: #f00">
        {{session('error')}}
    </p>
@endif

@if($errors->any())
    <p style="color:#f00;">
        @foreach($errors->all() as $error)
            {{ $error}} <br>
        @endforeach
    </p>
    @php
        $mensagem = '';
        foreach ($errors->all() as $error){
            $mensagem .= $error . '<br>';
        }
    @endphp
    <script>
        document.addEventListener('DOMContentLoaded', () =>{
            swal.fire('Error!', "{!! $mensagem !!}", 'error');
        })
    </script>

@endif