<div class="content-container">
  <article class="typography">
    <header>
      <h1>{$TaskUser.Name}'s $Title</h1>
    </header>
    <div class="content">

      $Content

      $NewTaskForm

      <div style="margin-top: 32px;">
      <% if $TaskUser %>
        <% with $TaskUser %>
          <% if $Tasks %>
            <ul class="list-group">
            <% loop $Tasks %>
              <li class="list-group-item">
                <div class="container">
                  <div class="row">
                    <div class="col-sm col-10">
                      $Title
                    </div>
                    <div class="col-sm col-2" style="text-align: right;">
                      <a href="/tasks/delete/{$ID}" class="btn btn-secondary btn-sm" role="button" aria-pressed="true" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                  </div>
                </div>
              </li>
            <% end_loop %>
            </ul>
          <% else %>
            No Tasks Found
          <% end_if %>
        <% end_with %>
      <% end_if %>
    </div>

    </div>
    <% if $Form %>
      <div class="form">
        $Form
      </div>
    <% end_if %>
  </article>
</div>