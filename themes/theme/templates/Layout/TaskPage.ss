<div class="content-container">
  <article class="typography">
    <header>
      <h1>$Title</h1>
    </header>
    <div class="content">

      $Content

      <script type="text/javascript">
          function goToNewPage()
          {
              var url = document.getElementById('user-switcher').value;
              if(url != 'none') {
                  window.location = url;
              }
          }
      </script>

      <p>
        Show tasks for
        <select class="custom-select" id="user-switcher">
          <option value=''>Choose user</option>
          <% loop $Users %>
            <option value="/tasks/user/{$ID}/">$Name</option>
          <% end_loop %>
        </select>
        <input type=button value="Go" onclick="goToNewPage()" />
      </p>

    </div>
    <% if $Form %>
      <div class="form">
        $Form
      </div>
    <% end_if %>
  </article>
</div>