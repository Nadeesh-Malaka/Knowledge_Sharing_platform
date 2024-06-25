@guest
    <img id="profilePhoto" src="{{ asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Default Profile" width="40" height="40">
@else
    <img id="profilePhoto" src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Profile" width="40" height="40">
@endguest
