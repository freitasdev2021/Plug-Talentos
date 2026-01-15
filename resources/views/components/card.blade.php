<div class="row">
    <div class="col-8">
        <div class="tab-content">
            @foreach($cards as $c)
                <div
                    class="tab-pane fade {{ $c['active'] ?? '' }}"
                    id="{{ $c['id'] }}"
                    role="tabpanel"
                >
                    <div class="card">
                        <div class="card-header">
                            {{ $c['title'] }}
                        </div>

                        <div class="card-body">
                            {{-- slot com o mesmo nome do id --}}
                            {{ ${$c['id']} ?? '' }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-4">
        <div class="list-group" role="tablist">
            @foreach($cards as $c)
                <a
                    class="list-group-item list-group-item-action {{ $c['active'] ?? '' }}"
                    data-bs-toggle="list"
                    href="#{{ $c['id'] }}"
                    role="tab"
                >
                    {{ $c['title'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>