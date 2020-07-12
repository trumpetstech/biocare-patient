<li class="nav-item dropdown notifications mr-2">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       <i class="fe-bell"></i> 
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <div class="dropdown-header">Notifications</div>
      <div id="notifications">
       @forelse ($notifications as $notification)
        <a class="dropdown-item" href="{{ $notification->link }}"
        >
            <i class="fe-info mr-2"></i>   {{ $notification->message }}
        </a>
        <div class="dropdown-divider"></div>
       @empty
       <a class="dropdown-item" id="no-new" href="#"
       >
           You have no new notifications
       </a>
       @endforelse
        </div>
        
    </div>
</li>

@push('js')

<script>

    var self = this;
    window.Echo.channel('user-' + {{ patient()->id }} + '-notifications') 
        .listen('.new-notification', (e) => {
            console.log(e);
      
            var audio = new Audio('/sounds/new-message.mp3');
            audio.play();     
            toastr.options.onclick = function() { window.location = e.link };
            toastr.info(e.message);
            toastr.options.onclick = function() { };
            $('#no-new').hide();
            $('#notifications').prepend(
                `<a class="dropdown-item" href="${e.link}">
                    <i class="fe-info mr-2"></i> ${e.message}
                </a> <div class="dropdown-divider"></div>`
            );

        });

</script>

@endpush