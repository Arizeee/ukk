<section class="home section" id="home">
    <div class="home__container container grid">
        <div class="home__data">
            <h1 class="home__title">
                Deciding 
                what <br> to read next?

            </h1>
            <p class="home__description">
                Find the best e-books from your favorites writers, explore hundreds of books with all possible categories
            </p>
            <a href="" class="button">
                explore now
            </a>
        </div>
       <div class="home__images container">
        <div class="home__swiper swiper">
            <div class="swiper-wrapper">
                @foreach ($buku as $item) 
                    <article class="home__article swiper-slide">
                        <img src="{{ asset('storage/buku/' . $item->sampul) }}" alt="" class="home__img">
                    </article>
                @endforeach
            </div>
        </div>        
</div>

    </div>
 </section>