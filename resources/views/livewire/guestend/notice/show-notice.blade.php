<div class="card p-1 rounderd">
    <span class="card-title text-center mb-3 h2 ">Notices</span>
    <div class="card-body px-2 py-0">
        <div class="list-group p-0 m-0 ">
            @foreach ($notice as $item)
                <a href="#" class="list-group-item list-group-item-action">{{ $item->description }}</a>
            @endforeach
            
        </div>
        <div>
            {{ $notice->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
