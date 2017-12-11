<header>
  <div class="fixed-announcement row">
    <div class="announcement">

      <div class="nav-wrapper col s0 m0 l5 left">
        <form>
          <div class="input-field hide-on-med-and-down">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons" id="close-search">close</i>
          </div>
        </form>
      </div>

      <div class="nav-wrapper col s12 m12 l7 right">
          <a href="#" data-activates="nav-mobile" class="button-collapse hide-on-large-only">
          <i class="material-icons">menu</i></a>
          <ul class="right">
            <li id="welcome" class="hide-on-small-and-down">
              <?php echo escape($user->data()->vName); ?></li>
            <li class="fixed-width">
              <a href="#">
                <span>
                  <i class="material-icons">notifications</i><span class="new badge red">3</span>
                </span>
              </a>
            </li>
            <li class="fixed-width">
              <a href="#">
                <span>
                  <i class="material-icons">message</i><span class="new badge green">3</span>
                </span>
              </a>
            </li>
            <li>
              <a href="logout.php" id="logout">
                <span>
                  <i class="material-icons">exit_to_app</i>
                </span>
              </a>
            </li>
          </ul>
        </div>

    </div>
  </div>
  <ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(0%);">
    <li class="logo"><a id="logo-container" href="/" class="brand-logo"></a></li>
    <li class="bold"><a href="?page=dashboard" class="waves-effect waves-teal">Dashboard</a></li>
    <li class="bold"><a href="?page=product-maintenance" class="waves-effect waves-teal">Product Maintenance</a></li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li class="bold"><a class="collapsible-header waves-effect waves-teal">Orders</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#">Placed Orders</a></li>
              <li><a href="#">Confirmed Orders</a></li>
            </ul>
          </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal">File Maintenance</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#">Family</a></li>
              <li><a href="#">Sub Family</a></li>
              <li><a href="#">Tribe</a></li>
              <li><a href="#">Sub Tribe</a></li>
              <li><a href="#">Genus</a></li>
            </ul>
          </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-teal">Page Maintenance</a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Comments</a></li>
              <li><a href="#">Contact Deatails</a></li>
            </ul>
          </div>
        </li>
        <li class="bold"><a href="?page=user-settings" class="waves-effect waves-teal">User Settings</a></li>
      </ul>
    </li>
  </ul>
</header>