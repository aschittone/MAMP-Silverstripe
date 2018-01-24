<div class="content-container">
  <article class="typography">
    
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <% loop $Slides %>
        <div class="carousel-item <% if $First %>active<% end_if %>">
          <img class="d-block w-100" src="$Image.Fit(825,400).URL" alt="$Title" />
        </div>
        <% end_loop %>
      </div>
    </div>

    <div class="content">
      $Content
    </div>

    <% if $Form %>
    <div class="form">
       $Form
    </div>
    <% end_if %>

  </article>
</div>