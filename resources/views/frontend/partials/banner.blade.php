<section class="about-hero">
    <div class="container about-hero-container">
        <div class="about-hero-content">
            <h1 class="staggered-heading">
                @foreach (explode('|', $title ?? '') as $key => $line)
                    <span class="line-{{ $key + 1 }}"> {{ $line }} </span>
                @endforeach
            </h1>
            <div class="about-hero-text">
                <svg class="about-arrow" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- A perfectly matching looping arrow -->
                    <path d="M 90,80 C 60,95 20,80 30,50 C 40,20 70,30 60,60 C 50,80 30,70 20,20" stroke="#00f2ff"
                        stroke-width="2.5" stroke-linecap="round" />
                    <path d="M 10,35 L 20,20 L 35,25" stroke="#00f2ff" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <p>{!!$description??""!!}</p>
            </div>
        </div>
        <div class="about-hero-visual">
            <div class="about-glow-circle"></div>
            <img src="{{asset('storage/'.$image)}}" alt="profile" class="about-profile-img">
        </div>
    </div>
</section>
