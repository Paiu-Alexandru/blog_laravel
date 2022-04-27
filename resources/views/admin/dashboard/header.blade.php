<header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <div class="search-form d-none d-lg-inline-block">
                <div class="input-group">
                </div>
              </div>

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                  <!-- Github Link Button -->


                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                      <img src="{{ asset(Auth::user()->profile_photo_path)}}" class="user-image" alt="User Image" />
                      <span class="d-none d-lg-inline-block">{{ Auth::user()->name}}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <img src="{{ asset(Auth::user()->profile_photo_path)}}" class="rounded-circle" alt="User Image" />
                        <div class="d-inline-block">
                        {{ Auth::user()->name}}
                        </div>
                        <small class="pt-1">{{ Auth::user()->email}}</small>
                      </li>

                      <li>
                        <a href="{{ route('update.profile') }}">
                          <i class="mdi mdi-account"></i> My Profile
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('change.password') }}">
                          <i class="mdi mdi-email"></i> Change Password
                        </a>
                      </li>

                      <li class="dropdown-footer">
                        <a href="{{route('user.logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>
