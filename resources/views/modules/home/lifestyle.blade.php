<style>
#lifestyle img {
  width: 200px;
  height: 400px;
  object-fit: cover;
}
</style>
@if ($lifestyle = get_field('lifestyle'))
@endif
<section id="lifestyle">
  <div class="container">
    <div class="row">
      @foreach($lifestyle['images'] as $image)
      <div class="col p-0">
        <img src="{{ $image }}" alt="" class="w-100"/>
      </div>
      @endforeach
    </div>
  </div>
</section>
