    <!-- Team Page
    ==========================================-->
    <div id="tf-team" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2>Conocer a <strong>nuestro equipo</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>

                <div id="team" class="owl-carousel owl-theme row">
                @foreach ($users as $user)
                    <div class="item">
                        <div class="thumbnail">
                            <img src="{{ $user->profiles->photo }}" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                                <p>{{ $user->email }}</p>
                                <p>{{ $user->profiles->phone }}</p>
                                <p>{{ $user->profiles->position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                
            </div>
        </div>
    </div>