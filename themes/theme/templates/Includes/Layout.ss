<main role="main">
  <div class="container">

    <% if $URLSegment == "home" %>
    <% else %>
    <div class="row">
      <div class="col">
        $Breadcrumbs
      </div>
    </div>
    <% end_if %>

    <div class="row">
      <div class="col-md-9">
        $Layout
      </div>
      <% include Sidebar %>
    </div>
    
  </div>
</main>