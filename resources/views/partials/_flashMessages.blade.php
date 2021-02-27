@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Bien hecho! </strong><i class="far fa-thumbs-up"></i> {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Opps...! </strong><i class="far fa-thumbs-up"></i> {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
@endif