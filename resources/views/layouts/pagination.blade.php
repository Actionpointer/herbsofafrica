<div class="row">
    <div class="col-sm-12">
        <div class="card-body">
            <ul class="pagination d-flex justify-content-center">
                <li class="page-item @if($data->onFirstPage()) disabled @endif">
                    <a href="{{$data->previousPageUrl()}}" class="page-link">«</a>
                </li>
            
                @for ($i = 1; $i <= $data->lastPage(); $i++)
                <li class="page-item @if($data->currentPage() == $i) active @endif">
                    <a href="{{$data->url($i)}}" class="page-link">{{$i}}</a>
                </li>
                @endfor

                <li class="page-item @if($data->currentPage() == $data->lastPage()) disabled @endif">
                    <a href="{{$data->nextPageUrl()}}" class="page-link">»</a>
                </li>
                
            </ul>
        </div>
    </div>
</div>
