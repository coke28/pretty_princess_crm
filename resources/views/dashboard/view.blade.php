<x-CRM-layout :pageTitle="$pageTitle" :pageDescription="$pageDescription">

  <!--start::Include your modals here-->
  <div class="card">
    <div class="card-body">
        <h5 class="card-title">Online Users</h5>
        <p class="card-text">Number of users currently online:</p>
        <p>Online Users: <span id="online-user-count">Loading...</span></p>
    </div>
</div>

  <!--start::Include your scripts here-->
  @section('scripts')
  <script src="{{ '/custom/broadcast/userCount.js' }}"></script>
  @endsection

  <!--start::Include your styles here-->
  @section('styles')

  @endsection

</x-CRM-layout>
