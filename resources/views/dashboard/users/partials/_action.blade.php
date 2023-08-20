  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      action
    </button>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('dashboard.users.notes',$id) }}" class="btn btn-outline-secondary">
                notes
               </a>
            </li>
           
              <li> <a class="dropdown-item" href="{{ route('dashboard.users.notifications',$id) }}" class="btn btn-outline-secondary">
                notifications
               </a></li>
    
          <li>
            <button onclick="add_note({{ $id }},'{{ $name }}')" class="dropdown-item">Send notification</button>
          </li>
    </ul>
  </div>