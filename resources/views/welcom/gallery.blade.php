@if(count($shops)>0)
@foreach($shops as $shop)
 <section id="section_gallery">
                   <!-- ギャラリー -->
  <section id="gallery" class="gallery">
    <div class="gallery__phrase animated">ギャラリー</div>
    <h2 class="gallery__title animated">Gallery</h2>
    <div class="image-gallery animated">
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/kitten1.jpg">
          <img class="gallery-photo" src="{{Storage::disk('s3')->url($shop->image_location)}}" width="150" height="150" alt="アメリカンショートヘア">
        </a>
      </div>
    </div>
    <!--/.image-gallery -->
  </section>

</section>
@endforeach
@else
 <section id="section_gallery">
                   <!-- ギャラリー -->
  <section id="gallery" class="gallery">
    <div class="gallery__phrase animated">ギャラリー</div>
    <h2 class="gallery__title animated">Gallery</h2>
    <div class="image-gallery animated">
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/kitten1.jpg">
          <img class="img-fluid" src="{{ secure_asset('img/gallery-thumbnail/kitten1.jpg') }}" width="150" height="150" alt="アメリカンショートヘア">
        </a>
      </div>
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/kitten2.jpg">
          <img class="img-fluid" src="{{ secure_asset('img/gallery-thumbnail/kitten2.jpg') }}" width="150" height="150" alt="スコティッシュフォールド">
        </a>
      </div>
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/kitten3.jpg">
          <img class="img-fluid" src="{{ secure_asset('img/gallery-thumbnail/kitten3.jpg') }}" width="150" height="150" alt="ベンガル">
        </a>
      </div>
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/kitten4.jpg">
          <img class="img-fluid" src="{{ secure_asset('img/gallery-thumbnail/kitten4.jpg') }}" width="150" height="150" alt="ロシアンブルー">
        </a>
      </div>
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/puppy1.jpg">
          <img class="img-fluid" src="{{ secure_asset('img/gallery-thumbnail/puppy1.jpg') }}" width="150" height="150" alt="シェパード">
        </a>
      </div>
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/puppy2.jpg">
          <img class="img-fluid" src="{{ secure_asset('img/gallery-thumbnail/puppy2.jpg') }}" width="150" height="150" alt="レトリバー">
        </a>
      </div>
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/puppy3.jpg">
          <img class="img-fluid" src="{{ secure_asset('img/gallery-thumbnail/puppy3.jpg') }}" width="150" height="150" alt="プードル">
        </a>
      </div>
      <div class="image-gallery__item">
        <a class="d-inline-block" href="img/puppy4.jpg">
          <img class="img-fluid" src="{{ secure_asset('img/gallery-thumbnail/puppy4.jpg') }}" >
        </a>
      </div>
    </div>
    <!--/.image-gallery -->
  </section>
  <!--/.gallery -->
@endif
  <!-- フッター -->
  <footer>
    &copy; 2019 Puppies and Kittens
  </footer>