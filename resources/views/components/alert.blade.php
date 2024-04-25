@if (session()->has('success'))
    {{-- <div class="alert alert-success m-3" role="alert">
        <p>
            {{ session('success') }}
        </p>
    </div> --}}
    <script>
        document.addEventListener('DOMContentLoaded', () =>{
            swal.fire('Pronto!', "{{session('success')}}", 'success');
        })
    </script>
@endif

@if($errors->any())
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