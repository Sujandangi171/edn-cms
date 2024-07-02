<!-- client start -->
<section id="clients">
    <div class="client-text">
        <div class="title">OUR CLIENTS</div>
    </div>

    <div class="client__container">
        <div class="client-content" id="clientSet1">
            @foreach ($clients->take(9) as $client)
                <img src="{{ asset('uploads/business') . '/' . $client->files()->value('title') }}" alt="DoC"
                    data-id="clientSet1">
            @endforeach
        </div>

        <div class="client-content1" id="clientSet2">
            @foreach ($clients->slice(8) as $client)
                <img src="{{ asset('uploads/business') . '/' . $client->files()->value('title') }}" alt="DoC"
                    data-id="clientSet2">
            @endforeach
        </div>

    </div>


</section>

<!-- client end -->
